<?php

class class_directorio_banmujer extends class_datos
{

    //========== MÉTODOS ==========//

    function consultar_banmujer($conection, $busqueda, $tabla)
    {


        $fila = $_POST['fila'];
        $a = 0;
        foreach ($fila as $key => $value) {
            $this->consultar($conection, $busqueda, $tabla, "WHERE  id_banmujer='$value'");
            $i = 1;
            $a++;

            $this->multi_buscar .=
                '<div class="form-row">
                <div class="form-group col-sm-12 col-md-12 col-lg-3">
                    <label>Estados:
                        <input class="form-control" type="text" name="estados' . $a . '" value="' . $this->buscar[$i] . '">
                        <input class="form-control" type="hidden" name="id' . $a . '" value="' . $this->buscar[0] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '<div class="form-group col-sm-12 col-md-12 col-lg-9">
                    <label>Ubicación:
                        <input class="form-control" type="text" name="ubicacion' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>
                </div><hr>';
        }
        $this->total_reg = $a;
    }
}
