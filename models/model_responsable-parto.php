<?php

class class_responsable_parto extends class_datos{

    //========== MÉTODOS ==========//

    function consultar_parto($conection, $busqueda, $tabla)
    {

        $fila = $_POST['fila'];

        $a = 0;
        foreach ($fila as $key => $value) {

            $this->consultar($conection, $busqueda, $tabla, "WHERE  id_parto='$value'");
            $i = 1;
            $a++;

            $this->multi_buscar .=
                '<div class="form-row">
                <div class="form-group col-sm-6 col-md-6 col-lg-3">
                    <label>Estado:
                    <input class="form-control" type="text" name="estado' . $a . '" value="' . $this->buscar[$i] . '">
                    <input class="form-control" type="hidden" name="id' . $a . '" value="' . $this->buscar[0] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '<div class="form-group col-sm-6 col-md-6 col-lg-3">
                    <label>Responsable:
                        <input class="form-control" type="text" name="responsable' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '<div class="form-group col-sm-6 col-md-6 col-lg-3">
                    <label>Teléfono:
                        <input class="form-control" type="text" name="telefono' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '<div class="form-group col-sm-6 col-md-6 col-lg-3">
                    <label>Observación:
                        <input class="form-control" type="text" name="observacion' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>
                </div><hr>';
        }
        $this->total_reg = $a;
    }
}