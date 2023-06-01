<?php

    require_once("../../Inventario_santisima/models/salidaModel.php");
     
    class InsertarSalida {

        public static function insertarSalidaController(){
            
            $cantidad = $_POST['cantidad'];
            $fechaSalida = $_POST['fechaSalida'];
            $valorUnitario = $_POST['valorUnitario'];
            $producto_id =$_POST['productoSalida'];
            $valorTotal = ($_POST['cantidad'] *  $_POST['valorUnitario'] );
            
            $cantidadStock = 0;

            ## TRAE CANTIDAD PARA VERIFICAR DE QUE HAYA LA CANTIDAD SUFICIENTE PARA LA SALIDA
            $respuestaBuscarCantidad = SalidaModel::buscarCantidadInventario($producto_id);
            
            ## RECORRE LA CANTIDAD
            foreach ($respuestaBuscarCantidad as $key => $value) {
                $cantidadStock = intval($value['cantidad']);
            }
            
            ## SI LA CANTIDAD ES MAYOR
            if($cantidadStock >= $cantidad){

                ## INSERTAR SALIDA EN SALIDA
                $respuestaInsertarSalida =  SalidaModel::insertarSalidaModel($cantidad,$fechaSalida,$valorUnitario,$valorTotal,$producto_id);

                $cantidadUpdate = $cantidadStock-$cantidad;

                $respuestaActualizarCantidadInventario = SalidaModel::actualizarCantidadInventario($producto_id,$cantidadUpdate);
                
                echo "1";
            }elseif ($cantidadStock < $cantidad) {
                echo "2";
            }
        }
    }

    // Ejecuta el metodo Insertar
    $insertar = new InsertarSalida();
    $insertar->insertarSalidaController();

?>