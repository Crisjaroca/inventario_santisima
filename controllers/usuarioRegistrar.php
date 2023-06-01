<?php

    require("../../Inventario_santisima/models/usuarioModel.php");

    class RegistrarUsuario{
        
        static public function registrarUsuario(){
            
            ### Valida que el primer caracter siempre sea Mayuscula
            $nombre =  $_POST['nombre'];
            $nombre = ucfirst(strtolower($nombre)); 

            $rol =  $_POST['rol'];
            $email =  $_POST['correoElectronico'];
            
            ### Encripta la contraseña 
            $password =  $_POST['password'];
            $password = password_hash($password,PASSWORD_BCRYPT);

            $telefono =  $_POST['telefono'];

            ### Verifica Existencia Ingresar Usuario
            $respuestaVerificarUsuario = UsuarioModel::verificarUsuarioRegistrar($nombre);

            ### Inserta Usuario
            if (!$respuestaVerificarUsuario) {
                $respuestaInsertarUsuario = UsuarioModel::registrarUsuario($nombre,$rol,$email,$password,$telefono);
                echo "1";
            }else{
                echo "2";
            }
        }
    }

    $registrar = new RegistrarUsuario();
    $registrar->registrarUsuario();
?>