<?php

    class class_responsable_inamujer extends class_datos
    {

        //========== Metodos ==========//
        function consultar_ina($conection, $busqueda, $tabla){


            $fila = $_POST['fila'];
            $a = 0;
                foreach ($fila as $key => $value) {
                    $this->consultar($conection, $busqueda, $tabla, "WHERE  id_inamujer='$value'");
                    $i = 1;
                    $a++;

                    $this->multi_buscar .=
                    '<div class="form-row">
                    <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl">
                        <label>Estado:
                            <input class="form-control" type="text" name="estados' . $a . '" value="' . $this->buscar[$i] . '">
                            <input class="form-control" type="hidden" name="id' . $a . '" value="' . $this->buscar[0] . '">
                        </label>
                    </div>';

                $i++;

                $this->multi_buscar .=
                    '
                    <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl">
                        <label>coordinadora:
                            <input class="form-control" type="text" name="coordinadora' . $a . '" value="' . $this->buscar[$i] . '">
                        </label>
                    </div>';

                $i++;

                $this->multi_buscar .=
                    '
                    <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl">
                        <label>Teléfono:
                            <input class="form-control" type="text" name="telefono_coord' . $a . '" value="' . $this->buscar[$i] . '">
                        </label>
                    </div>';

                $i++;

                $this->multi_buscar .=
                    '
                    <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl">
                        <label>Correo:
                            <input class="form-control" type="text" name="correo_coord' . $a . '" value="' . $this->buscar[$i] . '">
                        </label>
                    </div>';

                $i++;

                $this->multi_buscar .=
                    '
                    <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl">
                        <label>Defensora:
                            <input class="form-control" type="text" name="defensora' . $a . '" value="' . $this->buscar[$i] . '">
                        </label>
                    </div>';

                $i++;

                $this->multi_buscar .=
                    '
                    <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl">
                        <label>Teléfono:
                            <input class="form-control" type="text" name="telefono_defen' . $a . '" value="' . $this->buscar[$i] . '">
                        </label>
                    </div>';

                $i++;

                $this->multi_buscar .=
                    '
                    <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl">
                        <label>Correo:
                            <input class="form-control" type="text" name="correo_defen' . $a . '" value="' . $this->buscar[$i] . '">
                        </label>
                    </div>
                    </div><hr>';
            }
            $this->total_reg = $a;     
        }
    }
