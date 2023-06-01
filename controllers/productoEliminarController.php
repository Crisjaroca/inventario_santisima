<?php

    require_once("../../Inventario_santisima/models/productoModel.php");

    class EliminarProducto {

        static public function eliminarProductoController(){

            $id=$_POST['id'];
    
            try {
                $respuestaEliminarProducto =  ProductoModel::eliminarProductoModel($id);
                echo "1";
            } catch (Throwable $e) {
                echo "2";
            } 
        }
    }

    ### Ejecuta Metodo Eliminar
    $eliminar = new EliminarProducto();
    $eliminar->eliminarProductoController();
?>