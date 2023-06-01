<?php
    
    require_once("../../Inventario_santisima/models/pedidoModel.php");

    class ActualizarPedido {

        public static function actualizarPedidoController(){

            $id = $_POST['idUp'];
            $producto_id =$_POST['productoSelectUp'];
            $cantidad = $_POST['cantidadUp'];
            $fechaIngreso = $_POST['fechaIngresoUp'];
            $valorUnitario = $_POST['valorUnitarioUp'];
            $valorTotal = ($_POST['cantidadUp'] *  $_POST['valorUnitarioUp'] );
            
            $cantidadStock = 0;
            
            ## ACTUALIZA INFORMACION EN PEDIDO
            $respuestaActualizarPedido =  PedidoModel::actualizarPedidoModel($id,$cantidad,$fechaIngreso,$valorUnitario,$valorTotal);
            echo "1";

            ## BUSCAR LAS CANTIDADES EN PEDIDO
            $respuestaBuscarCantidadPedido =  PedidoModel::buscarCantidadProductoPedidoActualizarModel($producto_id);

            foreach ($respuestaBuscarCantidadPedido as $key => $value) {
                $cantidadStock += intval($value['cantidad']);
            }

            $respuestaActualizarCantidadInventario = PedidoModel::actualizarCantidadInventario($producto_id,$cantidadStock);
        }
    }

    ## EJECUTA EL METODO ACTUALIZAR
    $actualizar = new ActualizarPedido();
    $actualizar->actualizarPedidoController();

?>