<?php

    require_once("../../Inventario_santisima/models/proveedorModel.php");

    class ObtenerDatosProveedor {

        public static function obtenerDatosProveedorController(){

            $id = $_POST['id'];
            echo json_encode(ProveedorModel::obtenerDatosProveedorModel($id));

        }
    }

    // Ejecuta el metodo Insertar
    $obtener = new ObtenerDatosProveedor();
    $obtener->obtenerDatosProveedorController();

?>