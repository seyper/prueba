<?php

class class_directorio_atencion_ina extends class_datos
{

    //========== MÉTODOS ==========//

    function consultar_atencion_ina($conection, $busqueda, $tabla)
    {


        $fila = $_POST['fila'];
        $a = 0;
        foreach ($fila as $key => $value) {
            $this->consultar($conection, $busqueda, $tabla, "WHERE  id_atencion_ina='$value'");
            $i = 1;
            $a++;

            $this->multi_buscar .=
                '<div class="form-row">
                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl">
                    <label>Unidad:
                        <input class="form-control" type="text" name="unidad' . $a . '" value="' . $this->buscar[$i] . '">
                        <input class="form-control" type="hidden" name="id' . $a . '" value="' . $this->buscar[0] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl">
                    <label>Nombre:
                        <input class="form-control" type="text" name="nombre' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl">
                    <label>Fecha:
                        <input class="form-control" type="text" name="fecha' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl">
                    <label>Correo:
                        <input class="form-control" type="text" name="correo' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl">
                    <label>Cargo:
                        <input class="form-control" type="text" name="cargo' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>
                </div>
                <hr>';

            $i++;
        }
        $this->total_reg = $a;
    }
}
