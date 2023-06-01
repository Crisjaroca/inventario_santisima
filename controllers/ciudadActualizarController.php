<?php
    
    require_once("../../Inventario_santisima/models/ciudadModel.php");
    
    class ActualizarCiudad {

        static public function actualizarDatosCiudadController(){
            
            $id = $_POST['idUp'];
    
            // Validar Entrada Mayusculas y Minusculas (Nombre)
            $nombre = strtolower($_POST['nombreUp']);
            $nombre = ucwords($nombre);
            
            $datosController = array (
                'nombre'=> $nombre
            );

            ### Valida de que la ciudad no exista en el Inventario
            $respuestaSeleccionar = CiudadModel::seleccionarCiudadModel($datosController);

            
            
            // Inserta el producto
            if (!$respuestaSeleccionar) {
                $respuestaActualizarDatosCiudad =  CiudadModel::actualizarDatosCiudadModel($id, $nombre);
                echo "1";
            }else{
                echo "2";
        
            }
        }
    }

    // Ejecuta el metodo Insertar
    $actualizar = new ActualizarCiudad();
    $actualizar->actualizarDatosCiudadController();

?>