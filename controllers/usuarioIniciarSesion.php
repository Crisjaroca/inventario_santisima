<?php
    
    require_once("../../Inventario_santisima/models/usuarioModel.php");
    
    class IniciarSesion {

        static public function iniciarSesionController() {

            session_start();

            $nombreUsuario = $_POST['nombreLogin'];
            $nombreUsuario = ucfirst(strtolower($nombreUsuario)); 

            $contraseña = $_POST['passwordLogin'];

            $respuestaExitsUsuario = UsuarioModel::verificarUsuarioInicioSesion($nombreUsuario);
            
            $password="";
            $idUser="";

            if($respuestaExitsUsuario){

                foreach ($respuestaExitsUsuario as $key => $value) {
                    $idUser = $value['id'];
                    $password = $value['passwordUser'];
                    $nombre = $value['nombreUsuario'];
                }

                if(password_verify($contraseña,$password)){
                    echo "1";
                    $_SESSION['user_id'] = $idUser;
                }else{
                    echo "2";
                }

            }elseif (!$respuestaExitsUsuario) {
                echo "2";
            }
        }
    }
    
    $iniciar = new IniciarSesion();
    $iniciar->iniciarSesionController();
?>