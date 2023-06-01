<?php

    require_once("../../Inventario_santisima/models/pedidoModel.php");
    
    class InsertarPedido{

        static public function insertarPedidoController(){
            
            $cantidad = $_POST['cantidad'];
            $fechaIngreso = $_POST['fechaIngreso'];
            $valorUnitario = $_POST['valorUnitario'];
            $producto_id =$_POST['productoSelect'];
            $proveedor_id = $_POST['proveedorSelect'];
            $valorTotal = ($_POST['cantidad'] *  $_POST['valorUnitario'] );
           // echo "$fechaIngreso";
            $cantidadStock = 0;

            ## BUSCA SI EL PRODUCTO EXITE EN EL INVENTARIO
            $respuestaSeleccionar = PedidoModel::validarExistProductoInventario($producto_id);

            $respuestaInsertarPedido =  PedidoModel::insertarPedidoModel($cantidad,$fechaIngreso,$valorUnitario,$producto_id,$proveedor_id,$valorTotal);

            if (!$respuestaSeleccionar) {
                //echo"No hay en inventario";

                $respuestaInsertarCantidadInventario = PedidoModel::insertarCantidadInventario($producto_id,$cantidad);

                echo "1";
                
            }else{
                //echo"Si hay en inventario";
                $respuestaBuscarCantidad = PedidoModel::buscarCantidadProductoPedidoModel($producto_id);
                
                foreach ($respuestaBuscarCantidad as $key => $value) {
                    $cantidadStock = intval($value['cantidad']);
                    //echo " FOR : $cantidadStock";
                }
                $cantidadUpdate = $cantidadStock+$cantidad;
                $respuestaActualizarCantidadInventario = PedidoModel::actualizarCantidadInventario($producto_id,$cantidadUpdate);

                echo "1";
            }
        }
    }

    ## Ejecuta Metodo Insertar
    $insertar = new InsertarPedido();
    $insertar->insertarPedidoController();

?>