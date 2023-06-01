<?php
    
    require_once("../../Inventario_santisima/models/productoModel.php");

    class InsertarProducto {

        static public function insertarProductoController(){

            $respuestaInsertar = "";

            ## VALIDAR ENTRADA MAYUSCULAS Y MINISCULAS (NOMBRE)
            $nombre = strtolower($_POST['nombre']);
            $nombre = ucwords($nombre);

            ## VALIDAR ENTRADA MAYUSCULAS Y MINISCULAS (DESCRIPCION)
            $descripcion = strtolower($_POST['descripcion']);
            $descripcion = ucfirst($descripcion);

            ## VALIDAR ENTRADA MAYUSCULAS Y MINISCULAS (MARCA)
            $marca = strtolower($_POST['marca']);
            $marca = ucwords($marca);

            // ARRAY A ENVIAR LOS DATOS
            $datosController = array (
                'nombre'=> $nombre,
                'descripcion'=> $descripcion,
                'marca'=> $marca
            );

             // BUSCA SI EL PRODUCTO EXITE
            $respuestaSeleccionar = ProductoModel::seleccionarProductoModel($datosController);

            // INSERTA EL PRODUCTO
            if (!$respuestaSeleccionar) {
                $respuestaInsertar = ProductoModel::insertarProductoModel($datosController);
                echo "1";
            }else{
                echo "2";
            }
        }
    }

    // EJECUTA EL METODO INSERTAR
    $insertar = new InsertarProducto();
    $insertar->insertarProductoController();

?>

