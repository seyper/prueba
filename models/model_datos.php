<?php
header('Content-Type: text/html; charset=UTF-8');

//Clase Datos
class class_datos
{
    //========== Atributos ==========//
    private $query; # Sentencia SQL para la base de datos
    public  $resultado; # Resultado de la sentencia SQL
    public  $buscar;
    public  $multi_buscar;
    public  $multi_buscar2;
    public  $total_reg;
    // public  $cantidad;

    //========== Metodos ==========//
    //Consultar una fila
    function consultar($conection, $busqueda, $tabla, $donde)
    {
        $this->query = "SELECT $busqueda FROM $tabla $donde"; #Nota: Escribir el WHERE en el $donde
        $this->resultado = mysqli_query($conection, $this->query); # Consulta a la base de datos
        $this->buscar = mysqli_fetch_row($this->resultado); # Resultado de la consulta
    }

    // Eliminar una fila
    function eliminar($conection, $tabla, $id, $donde){
        $this->query = "DELETE FROM $tabla $donde = $id";
        $this->resultado = mysqli_query($conection, $this->query) or die (mysqli_error($conection));
    }

    //Modificar una filas
    function modificar($conection, $modificar, $tabla, $donde)
    {
        $this->query = "UPDATE $tabla SET $modificar $donde";
        $this->resultado = mysqli_query($conection, $this->query) or die(mysqli_error($conection));
    }

    //Agregar filas nuevas
    function agregar($conection, $tabla, $columnas, $valores)
    {
        $this->query = "INSERT INTO $tabla ($columnas) VALUES ($valores)";
        $this->resultado = mysqli_query($conection, $this->query) or die('Error' . mysqli_error($conection));
    }

    // Consultar multiples filas

    /* Parametros de la función */

    // Conection = Conexion a la base de datos
    // Ordenar = Donde se ordenan las columnas en la tabla de la base de datos
    // Tabla = Es la tabla de la base de datos
    // Col = La cantidad de columnas con datos a mostrar (o sea se excluye el id)
    // Filas = El número de filas a imprimir (Altos capos los programadores)
    // Pg = Donde inicia la paginación
    // Palabra = Es la palabra a buscar en cada columna 
    // (Contexto = Al ser un string tan largo se usa otra variable para buscar la misma palabra y diferenciarla de otras)
    // Busca = Es la palabra a buscar y hace que se pueda diferenciar cuando hace la acción
    // Busqueda = Es el asterisco por defecto para buscar todas las columnas de la tabla, hasta que se diga lo contrario
    
    function consultar_multi($conection, $ordenar, $tabla, $col, $filas, $pg, $palabra = '', $busca = '', $busqueda = '*')
    {
        // ========== Variables =========== //
        $inicial = $pg * $filas;
        $terminal = ($pg + 1) * $filas;

        if (empty($palabra)) {
            $query = "SELECT $busqueda FROM $tabla ORDER BY $ordenar LIMIT $inicial, $filas";
            $contar = "SELECT $busqueda FROM $tabla ORDER BY $ordenar";
        } else {
            $query = "SELECT $busqueda FROM $tabla $palabra ORDER BY $ordenar LIMIT $inicial, $filas";
            $contar = "SELECT $busqueda FROM $tabla $palabra ORDER BY $ordenar";
        }
        $this->resultado = mysqli_query($conection, $query);

        // ========== Consulta para saber el total de filas =========== //
        $contar_query = mysqli_query($conection, $contar) or die('Error en el conteo de paginas' . mysqli_error($conection));
        $num_resultado = mysqli_num_rows($contar_query);

        // ========== Calcula el numero de paginas que se necesitan =========== //
        $total_resultado = $num_resultado - 1;
        $pagina = intval($total_resultado / $filas);

        // ========== Bucle que imprime las filas =========== //
        $a = 1;
        $this->multi_buscar = "";
        while ($this->buscar = mysqli_fetch_row($this->resultado)) {
            $num_fila = ($pg * $filas) + $a;

            $this->multi_buscar .= '<tr>';
            if (!empty($_SESSION['usuario'])) {
                $this->multi_buscar .= '<td><div class="form-check"> <input class="form-check-input checkbox" type="checkbox" value="' . $this->buscar[0] . '" name="fila[]"></div></td>';
            }
            $this->multi_buscar .= '<td>' . $num_fila . '</td>';

            for ($i = 1; $i <= $col; $i++) {
                
                //Elimina los acentos
                $buscar = $this->eliminar_acentos($this->buscar[$i]);
                $busca = $this->eliminar_acentos($busca);

                //Permite que las palabras buscadas sean siempre en minuscula
                $buscar = mb_convert_case($buscar, MB_CASE_UPPER, "UTF-8");
                $busca = mb_convert_case($busca, MB_CASE_UPPER, "UTF-8");
                
                //Resalta las palabras buscadas
                if (strripos($buscar, $busca) !== false) {
                    $buscar = str_replace($busca, "<strong class='text-primary'>$busca</strong>", $buscar);
                    $this->multi_buscar .= '<td>' . $buscar . '</td>';
                    // $this->multi_buscar .= '<td class="text-primary font-weight-bold">' . $this->buscar[$i] . '</td>';
                } else {
                    $this->multi_buscar .= '<td>' . $this->buscar[$i] . '</td>';
                }
            }
            $this->multi_buscar .= '</tr>';
            $a++;
        }

        if ($num_resultado == 0) {
            $col = $col + 2;
            $this->multi_buscar = "<tr><td colspan='$col' class='text-center'>No se encontraron resultados</td></tr>";
        }

        // ========== Resultados de paginas =========== //
        $a = $a - 1;
        $this->multi_buscar2 .= "
        <div class='col-4'>
            <p>
                Mostrando $a de $num_resultado registros
            </p>
        </div>
        ";


        // ========== Botones para cambiar de paginas =========== //

        # Boton de anterior
        if ($pg <> 0) {
            $new_pg = $pg - 1;
            $this->multi_buscar2 .= "
            <div class='col-4'>
            <nav>
            <ul class='pagination justify-content-center'>
            <li class='page-item'>
            <a class='page-link link-p' href='#' data='$new_pg' id='anterior'>«Anterior</a>
            </li>";
        } else {
            $this->multi_buscar2 .= "
            <div class='col-4'>
            <nav>
            <ul class='pagination justify-content-center'>
            <li class='page-item disabled'>
            <a class='page-link' href='#' id='anterior'>«Anterior</a>
            </li>";
        }

        # Boton actual y las otras paginas
        $limite = 10; #Limite de botones de la paginacion

        if ($limite < $pg) {
            $min = $pg - $limite;
        } else {
            $min = 0;
        }

        if ($limite < $pagina) {
            $max = $limite + $pg;
        } else {
            $max = $pagina + 1;
        }

        # Boton que avisa que hay mas resultados anteriores
        if ($min > 0) {
            $this->multi_buscar2 .= "
            <li class='page-item'>
            <p class='page-link'> ... </p>
            </li>";
        }

        #Bucle para imprimir botones
        for ($i = $min; $i < $max; $i++) {
            $num = $i + 1;

            if ($i == $pg) {
                $this->multi_buscar2 .= "
                <li class='page-item active'>
                <a class='page-link link-p pg-actual' href='#' data='$i' id='$i'> $num </a>
                </li>";
            } elseif ($i < $pagina + 1) {
                $this->multi_buscar2 .= "
                <li class='page-item'>
                <a class='page-link link-p' href='#' data='$i' id='$i'>" . $num . "</a> 
                </li>";
            }

            # Boton que avisa que hay mas resultados
            if ($i == $max - 1 && $i < $pagina) {
                $this->multi_buscar2 .= "
                <li class='page-item'>
                <p class='page-link'> ... </p>
                </li>";
            }
        }

        # Boton de siguiente
        if ($pg < $pagina) {
            $new_pg = $pg + 1;
            $this->multi_buscar2 .= "
            <li class='page-item'>
            <a class='page-link link-p' href='#' data='$new_pg' id='siguiente'>Siguiente»</a>
            </li>
            </ul>
            </nav>
            </div>";
        } else {
            $this->multi_buscar2 .= "
            <li class='page-item disabled'>
            <span class='page-link'>Siguiente»</span>
            </li>
            </ul>
            </nav>
            </div>";
        }
    }

    //Funcion para eliminar los acentos desde PHP
    function eliminar_acentos($cadena)
    {
        //Reemplazamos la A y a
        $cadena = str_replace(
            array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
            array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
            $cadena
        );

        //Reemplazamos la E y e
        $cadena = str_replace(
            array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
            array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
            $cadena
        );

        //Reemplazamos la I y i
        $cadena = str_replace(
            array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
            array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
            $cadena
        );

        //Reemplazamos la O y o
        $cadena = str_replace(
            array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
            array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
            $cadena
        );

        //Reemplazamos la U y u
        $cadena = str_replace(
            array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
            array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
            $cadena
        );

        return $cadena;
    }
}


