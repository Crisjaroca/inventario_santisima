<?php
    
    require_once("../../Inventario_santisima/models/ciudadModel.php");
    
    class InsertarCiudad {

        public static function insertarCiudadController(){
            
            $respuestaInsertar = "";

            // Validar Entrada Mayusculas y Minusculas (Nombre)
            $nombre = strtolower($_POST['nombre']);
            $nombre = ucwords($nombre);
        
            // Array a enviar los Datos
            $datosController = array (
                'nombre'=> $nombre
            );
        
            // Busca si el producto existe
            $respuestaSeleccionar = CiudadModel::seleccionarCiudadModel($datosController);
        
            // Inserta el producto
            if (!$respuestaSeleccionar) {
                $respuestaInsertar = CiudadModel::insertarCiudadModel($datosController);
                echo "1";
            }else{
                echo "2";
        
            }
        }
    }

    // Ejecuta el metodo Insertar
    $insertar = new InsertarCiudad();
    $insertar->insertarCiudadController();

?>
