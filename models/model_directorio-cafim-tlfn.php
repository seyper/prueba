<?php

class class_directorio_cafim_tlfn extends class_datos
{

    //========== MÉTODOS ==========//

    function consultar_cafim_tlfn($conection, $busqueda, $tabla)
    {

        $fila = $_POST['fila'];
        $a = 0;
        foreach ($fila as $key => $value) {
            $this->consultar($conection, $busqueda, $tabla, "WHERE  id_cafim_telefono='$value'");
            $i = 1;
            $a++;

            $this->multi_buscar .=
                '<div class="form-row">
                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <label>Estados:
                        <input class="form-control" type="text" name="estados' . $a . '" value="' . $this->buscar[$i] . '">
                        <input class="form-control" type="hidden" name="id' . $a . '" value="' . $this->buscar[0] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <label>Coordinadoras:
                        <input class="form-control" type="text" name="coordinadoras' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <label>Cédula:
                        <input class="form-control" type="text" name="cedula' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>
                </div>';

            $i++;

            $this->multi_buscar .=
                '<div class="form-row">
                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <label>Teléfonos:
                        <input class="form-control" type="text" name="telefonos' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <label>Correo:
                        <input class="form-control" type="text" name="correo' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>
                </div>';

            $i++;
        }
        $this->total_reg = $a;
    }
}
