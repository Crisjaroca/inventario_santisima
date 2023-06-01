<?php
    
    require_once("../../Inventario_santisima/models/proveedorModel.php");

    class ActualizarPedido {

        public static function actualizarProveedorController(){
            
            $id = $_POST['idUp'];
    
            // Validar Entrada Mayusculas y Minusculas (Nombre)
            $nombre = strtolower($_POST['nombreUp']);
            $nombre = ucwords($nombre);
        
            // Validar Entrada Mayusculas y Minusculas (Descripcion)
            $direccion = strtolower($_POST['direccionUp']);
            $direccion = ucwords($direccion);

            $correoElectronico =$_POST['correoElectronicoUp'];

            $telefono =$_POST['telefonoUp'];
            
            $datosController = array (
                'nombre'=> $nombre,
                'direccion'=> $direccion,
                'correoElectronico'=> $correoElectronico,
                'telefono'=>  $telefono
            );

            $respuestaSeleccionar = ProveedorModel::seleccionarProveedorModel($datosController);

            if (!$respuestaSeleccionar) {
                $respuestaActualizaDatos =  ProveedorModel::actualizarProveedorModel($id,$nombre,$direccion,$correoElectronico,$telefono);
                echo "1";
            }else{
                echo "2";
            }
        }
    }

    // Ejecuta el metodo Insertar
    $actualizar = new ActualizarPedido();
    $actualizar->actualizarProveedorController();

?>