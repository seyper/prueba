<?php

class class_directorio_atencion_vic extends class_datos
{

    //========== MÉTODOS ==========//

    function consultar_atencion_vic($conection, $busqueda, $tabla)
    {


        $fila = $_POST['fila'];
        $a = 0;
        foreach ($fila as $key => $value) {
            $this->consultar($conection, $busqueda, $tabla, "WHERE  id_victima='$value'");
            $i = 1;
            $a++;

            $this->multi_buscar .=
                '<div class="form-row">
                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <label>Estado:
                        <input class="form-control" type="text" name="estado' . $a . '" value="' . $this->buscar[$i] . '">
                        <input class="form-control" type="hidden" name="id' . $a . '" value="' . $this->buscar[0] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <label>Municipio:
                        <input class="form-control" type="text" name="municipio' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <label>Institución:
                        <input class="form-control" type="text" name="institucion' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <label>Oficina:
                        <input class="form-control" type="text" name="oficina' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>
                </div>';

            $i++;

            $this->multi_buscar .=
                '<div class="form-row">
                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <label>Dirección:
                        <input class="form-control" type="text" name="direccion' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <label>Responsable:
                        <input class="form-control" type="text" name="responsable' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <label>Teléfonos:
                        <input class="form-control" type="text" name="telefonos' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <label>Teléfonos Públicos:
                        <input class="form-control" type="text" name="telefonos_publi' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>
                </div>
                ';

            $i++;

            $this->multi_buscar .=
                '<div class="form-row">
                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-6">
                    <label>Observación:</label>
                        <input class="form-control" type="text" name="observacion' . $a . '" value="' . $this->buscar[$i] . '">
                </div>';

            $i++;

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-6">
                    <label >Observaciones: </label>
                    <input class="form-control" type="text" name="observaciones' . $a . '" value="' . $this->buscar[$i] . '">
                </div>
                </div>
                <hr>';

            $i++;
        }
        $this->total_reg = $a;
    }
}
