<?php

class class_directorio_defensoria extends class_datos
{

    //========== MÉTODOS ==========//

    function consultar_defensoria($conection, $busqueda, $tabla)
    {


        $fila = $_POST['fila'];
        $a = 0;
        foreach ($fila as $key => $value) {
            $this->consultar($conection, $busqueda, $tabla, "WHERE  id_defensoria='$value'");
            $i = 1;
            $a++;

            $this->multi_buscar .=
                '<div class="form-row">
                <div class="form-group col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <label>Estados:
                        <input class="form-control" type="text" name="estados' . $a . '" value="' . $this->buscar[$i] . '">
                        <input class="form-control" type="hidden" name="id' . $a . '" value="' . $this->buscar[0] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <label>Municipios:
                        <input class="form-control" type="text" name="municipios' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <label>Institución:
                        <input class="form-control" type="text" name="institucion' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <label>Oficina:
                        <input class="form-control" type="text" name="oficina' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>
                </div>';

            $i++;

            $this->multi_buscar .=
                '<div class="form-row">
                <div class="form-group col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <label>Dirección:
                        <input class="form-control" type="text" name="direccion' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <label>Responsable:
                        <input class="form-control" type="text" name="responsable' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <label>Teléfonos:
                        <input class="form-control" type="text" name="telefonos' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <label>Teléfonos Públicos:
                        <input class="form-control" type="text" name="telefonos_publi' . $a . '" value="' . $this->buscar[$i] . '">
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
