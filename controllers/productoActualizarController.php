<?php
    
    require_once("../../Inventario_santisima/models/productoModel.php");

    class ActualizarProducto {

        public static function actualizarProductoController(){
            
            $id = $_POST['id'];
    
            ## VALIDAR ENTRADA MAYUSCULAS Y MINISCULAS (NOMBRE)
            $nombre = strtolower($_POST['nombreUp']);
            $nombre = ucwords($nombre);
        
            ## VALIDAR ENTRADA MAYUSCULAS Y MINISCULAS (DESCRIPCION)
            $descripcion = strtolower($_POST['descripcionUp']);
            $descripcion = ucfirst($descripcion);
        
            ## VALIDAR ENTRADA MAYUSCULAS Y MINISCULAS (MARCA)
            $marca = strtolower($_POST['marcaUp']);
            $marca = ucwords($marca);

            $datosController = array (
                'id' => $id,
                'nombre'=> $nombre,
                'descripcion'=> $descripcion,
                'marca'=> $marca
            );
            
            ### Valida de que el producto no exista en el Inventario
            $respuestaSeleccionar = ProductoModel::seleccionarProductoModel($datosController);

            ### Actualiza los Datos de Producto
            if (!$respuestaSeleccionar) {
                $respuestaActualizaDatos =  ProductoModel::actualizarProductoModel($datosController);
                echo "1";
            }else{
                echo "2";
            }
        }
    }

    ## EJECUTA METODO ACTUALIZAR
    $actualizar = new ActualizarProducto();
    $actualizar->actualizarProductoController();

?>