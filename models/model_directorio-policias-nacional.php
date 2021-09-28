<?php

class class_policias_nacional extends class_datos
{

    //========== MÉTODOS ==========//

    function consultar_policias_nacional($conection, $busqueda, $tabla)
    {

        $fila = $_POST['fila'];

        $a = 0;
        foreach ($fila as $key => $value) {
            $this->consultar($conection, $busqueda, $tabla, "WHERE  id_nacional='$value'");
            $i = 1;
            $a++;
            $this->multi_buscar .=
                '<div class="form-row">
                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <label>VEN 911:</label>
                </div>';

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <input class="form-control" type="text" name="ven_911' . $a . '" value="' . $this->buscar[$i] . '">
                    <input class="form-control" type="hidden" name="id' . $a . '" value="' . $this->buscar[0] . '">
                </div>
                </div>
                <hr>';
        }
        $this->total_reg = $a;
    }

    function policias_nacional_general($conection, $busqueda, $tabla)
    {
        $fila = $_POST['fila'];

        $a = 0;
        foreach ($fila as $key => $value) {
            $this->consultar($conection, $busqueda, $tabla, "WHERE  id_policias_nacional_general='$value'");
            $i = 1;
            $a++;
            $this->multi_buscar .=
                '<div class="form-row">
                <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <label>Red Nacional General:</label>
                </div>';

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <input class="form-control" type="text" name="general' . $a . '" value="' . $this->buscar[$i] . '">
                    <input class="form-control" type="hidden" name="id' . $a . '" value="' . $this->buscar[0] . '">
                </div>
                </div>
                <hr>';
        }
        $this->total_reg = $a;
    }

    function policias_nacional_hospitalaria($conection, $busqueda, $tabla)
    {
        $fila = $_POST['fila'];

        $a = 0;
        foreach ($fila as $key => $value) {
            $this->consultar($conection, $busqueda, $tabla, "WHERE  id_policias_nacional_hospitalaria='$value'");
            $i = 1;
            $a++;
            $this->multi_buscar .=
                '<div class="form-row">
                <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <label>Red Nacional Hospitalaria:</label>
                </div>';

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <input class="form-control" type="text" name="hospitalaria' . $a . '" value="' . $this->buscar[$i] . '">
                    <input class="form-control" type="hidden" name="id' . $a . '" value="' . $this->buscar[0] . '">
                </div>
                </div>
                <hr>';
        }
        $this->total_reg = $a;
    }

    function policias_nacional_militar($conection, $busqueda, $tabla)
    {
        $fila = $_POST['fila'];

        $a = 0;
        foreach ($fila as $key => $value) {
            $this->consultar($conection, $busqueda, $tabla, "WHERE  id_policias_nacional_militar='$value'");
            $i = 1;
            $a++;
            $this->multi_buscar .=
                '<div class="form-row">
                <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <label>Red Nacional Militar:</label>
                </div>';

            $this->multi_buscar .=
                '
                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <input class="form-control" type="text" name="militar' . $a . '" value="' . $this->buscar[$i] . '">
                    <input class="form-control" type="hidden" name="id' . $a . '" value="' . $this->buscar[0] . '">
                </div>
                </div>
                <hr>';
        }
        $this->total_reg = $a;
    }
}
