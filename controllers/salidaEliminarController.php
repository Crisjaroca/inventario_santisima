<?php

    require_once("../../Inventario_santisima/models/salidaModel.php");

    class EliminarSalida {

        static public function eliminarSalidaController(){

            $id=$_POST['id'];

            foreach ($respuestaBuscarCantidadAnt as $key => $value) {
                $cantidadOriginal += intval($value['cantidad']);
            }

            $respuesta =  SalidaModel::eliminarSalidaModel($id);
            echo "1";
        }
    }

    // Ejecuta el metodo Insertar
    $eliminar = new EliminarSalida();
    $eliminar->eliminarSalidaController();
?>