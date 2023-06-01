<?php

    require_once("../../Inventario_santisima/models/salidaModel.php");


    class ObtenerDatosSalida {

        public static function obtenerDatosSalidaController(){

            $id = $_POST['id'];
            echo json_encode(SalidaModel::obtenerDatosSalidaModel($id));

        }
    }

    // Ejecuta el metodo Insertar
    $obtener = new ObtenerDatosSalida();
    $obtener->obtenerDatosSalidaController();

?>