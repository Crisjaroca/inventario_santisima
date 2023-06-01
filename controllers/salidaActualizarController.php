<?php
    
    require_once("../../Inventario_santisima/models/salidaModel.php");

    class ActualizarSalida {

        public static function actualizarSalidaController(){

            $id = $_POST['idUp'];
            $producto_id=$_POST['productoSalidaUp'];
            $cantidad = $_POST['cantidadUp'];
            $fechaSalida = $_POST['fechaSalidaUp'];
            $valorUnitario = $_POST['valorUnitarioUp'];
            $valorTotal = ($_POST['cantidadUp'] *  $_POST['valorUnitarioUp'] );
            
            $cantidadOriginal = 0;
            $cantidadStock = 0;
            $cantidadUpdate = 0;
            $cantidadInventario=0;
            $cantidadUpdateFinal = 0;

            ## BUSCA LA CANTIDAD ANTIGUA
            $respuestaBuscarCantidadAnt=  SalidaModel::buscarCantidadSalida($id,$producto_id);
            foreach ($respuestaBuscarCantidadAnt as $key => $value) {
                $cantidadOriginal += intval($value['cantidad']);
            }

            ## ACTUALIZA  SALIDA 
            $respuestaActualizarSalida =  SalidaModel::actualizarSalidaModel($id,$cantidad,$fechaSalida,$valorUnitario,$valorTotal);
            

            #BUSCAR CANTIDAD INVENTARIO
            $respuestaCantidadInventatrio = SalidaModel::buscarCantidadInventario($producto_id);
            
            foreach ($respuestaCantidadInventatrio as $key => $value) {
                $cantidadInventario += intval($value['cantidad']);
            }

           // echo "Cantidad Original : $cantidadOriginal";
           // echo "Cantidad Inventario Actual : $cantidadInventario";

            if($cantidadOriginal > $cantidad){
              //  echo"Cantidad Original es Mayor";
                $cantidadUpdate = $cantidadOriginal-$cantidad;
                $cantidadUpdateFinal = $cantidadInventario + $cantidadUpdate;
               // echo " Cantidad Salida : $cantidadUpdateFinal" ;
                $respuestaActualizarCantidadInventario = SalidaModel::actualizarCantidadInventario($producto_id,$cantidadUpdateFinal);
            }else if ($cantidadOriginal < $cantidad) {
               // echo"Cantidad Original es Menor";
                $cantidadUpdate = $cantidad - $cantidadOriginal;
                $cantidadUpdateFinal = $cantidadInventario - $cantidadUpdate;
               // echo " Cantidad Salida : $cantidadUpdateFinal" ;
                $respuestaActualizarCantidadInventario = SalidaModel::actualizarCantidadInventario($producto_id,$cantidadUpdateFinal);
            }elseif ($cantidadOriginal == $cantidad) {
               // echo"Cantidad Original es Igual";
            }
            echo "1"; 
        }
        
    }

    // Ejecuta el metodo Insertar
    $actualizar = new ActualizarSalida();
    $actualizar->actualizarSalidaController();

?>