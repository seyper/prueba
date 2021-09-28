<?php

class class_directorio_cpnna extends class_datos
{

    //========== MÉTODOS ==========//

    function consultar_cpnna($conection, $busqueda, $tabla)
    {


        $fila = $_POST['fila'];
        $a = 0;
        foreach ($fila as $key => $value) {
            $this->consultar($conection, $busqueda, $tabla, "WHERE  id_cpnna='$value'");
            $i = 1;
            $a++;

            $this->multi_buscar .=
                '<div class="form-row">
                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <label>Estados:
                        <input class="form-control" type="text" name="estados' . $a . '" value="' . $this->buscar[$i] . '">
                        <input class="form-control" type="hidden" name="id' . $a . '" value="' . $this->buscar[0] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <label>Municipios:
                        <input class="form-control" type="text" name="municipios' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>
                </div>';

            $i++;

            $this->multi_buscar .=
                '<div class="form-row">
                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <label>Dirección:
                        <input class="form-control" type="text" name="direccion' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <label>Teléfonos Públicos:
                        <input class="form-control" type="text" name="telefonos_publi' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <label>Responsable:
                        <input class="form-control" type="text" name="responsable' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>
                </div>';

            $i++;

            $this->multi_buscar .=
                '<div class="form-row">
                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <label>Observación:
                        <input class="form-control" type="text" name="observacion' . $a . '" value="' . $this->buscar[$i] . '">
                        </label>
                </div>
                </div>
                <hr>';

            $i++;
        }
        $this->total_reg = $a;
    }
}
