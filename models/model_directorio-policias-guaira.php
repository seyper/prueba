<?php

class class_policias_guaira extends class_datos
{

    //========== MÉTODOS ==========//

    function consultar_policias_guaira($conection, $busqueda, $tabla)
    {

        $fila = $_POST['fila'];

        $a = 0;
        foreach ($fila as $key => $value) {
            $this->consultar($conection, $busqueda, $tabla, "WHERE  id_guaira='$value'");
            $i = 1;
            $a++;
            $this->multi_buscar .=
                '<div class="form-row">
                <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <label>Policias:
                        <input class="form-control" type="text" name="policias' . $a . '" value="' . $this->buscar[$i] . '">
                        <input class="form-control" type="hidden" name="id' . $a . '" value="' . $this->buscar[0] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <label>Red:
                        <input class="form-control" type="text" name="red' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>';

            $i++;

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <label>¿Hay cuadrante de paz?:
                        <input class="form-control" type="text" name="cuadrante' . $a . '" value="' . $this->buscar[$i] . '">
                    </label>
                </div>
                </div>
                <hr>';
        }
        $this->total_reg = $a;
    }

    function policias_guaira_miranda($conection, $busqueda, $tabla)
    {
        $fila = $_POST['fila'];

        $a = 0;
        foreach ($fila as $key => $value) {
            $this->consultar($conection, $busqueda, $tabla, "WHERE  id_policias_guaira='$value'");
            $i = 1;
            $a++;
            $this->multi_buscar .=
                '<div class="form-row">
                <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <label>Red Miranda General:</label>
                </div>';

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <input class="form-control" type="text" name="miranda' . $a . '" value="' . $this->buscar[$i] . '">
                    <input class="form-control" type="hidden" name="id' . $a . '" value="' . $this->buscar[0] . '">
                </div>
                </div>
                <hr>';
        }
        $this->total_reg = $a;
    }
}
