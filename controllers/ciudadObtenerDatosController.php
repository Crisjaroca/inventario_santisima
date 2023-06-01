<?php

    require_once("../../Inventario_santisima/models/ciudadModel.php");

    class ObtenerDatosCiudad {

        public static function obtenerDatosCiudadController(){

            $id = $_POST['id'];
            echo json_encode(CiudadModel::obtenerDatosCiudadModel($id));

        }
    }

    // Ejecuta el metodo Insertar
    $obtener = new ObtenerDatosCiudad();
    $obtener->obtenerDatosCiudadController();

    
?>