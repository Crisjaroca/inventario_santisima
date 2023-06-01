<?php
    
    require_once("../../Inventario_santisima/models/proveedorModel.php");

    class InsertarProveedor{

        public static function insertarProveedorController(){

            // Validar Entrada Mayusculas y Minusculas (Nombre)
            $nombre = strtolower($_POST['nombre']);
            $nombre = ucwords($nombre);

            // Validar Entrada Mayusculas y Minusculas (Direccion)
            $direccion = strtolower($_POST['direccion']);
            $direccion = ucwords($direccion);

            $datosController = array (
                'nombre'=> $nombre,
                'direccion'=> $direccion,
                'correoElectronico'=> $_POST['correoElectronico'],
                'telefono'=> $_POST['telefono'],
                'ciudad_id'=> $_POST['ciudadProveedor']
            );

            $respuestaSeleccionar = ProveedorModel::seleccionarProveedorModel($datosController);

            if (!$respuestaSeleccionar) {
                $respuestaInsertar = ProveedorModel::insertarProveedorModel($datosController);
                echo "1";
            }else{
                echo "2";
            }

        }
    }
    
    // Ejecuta el metodo Insertar
    $insertar = new InsertarProveedor();
    $insertar->insertarProveedorController();
?>