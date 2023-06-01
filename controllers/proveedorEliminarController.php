<?php

    require_once("../../Inventario_santisima/models/proveedorModel.php");

    class EliminarProveedor {

        static public function eliminarProveedorController(){

            $id=$_POST['id'];

            try {
                $respuestaEliminar =  ProveedorModel::eliminarProveedorModel($id);
                echo "1";
            } catch (Throwable $e) {
                echo "2";
            } 
        }
    }

    // Ejecuta el metodo Insertar
    $eliminar = new EliminarProveedor();
    $eliminar->eliminarProveedorController();
?>