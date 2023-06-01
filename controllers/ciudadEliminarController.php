<?php

    require_once("../../Inventario_santisima/models/ciudadModel.php");

    class EliminarCiudad {

        static public function eliminarCiudadController(){

            $id=$_POST['id'];

            try {
                $respuestaEliminarCiudad =  CiudadModel::eliminarCiudadModel($id);
                echo "1";
            } catch (Throwable $e) {
                echo "2";
            } 
        }
    }

    // Ejecuta el metodo Insertar
    $eliminar = new EliminarCiudad();
    $eliminar->eliminarCiudadController();
?>