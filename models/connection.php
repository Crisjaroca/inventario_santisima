<?php
    
    ### Conexion a la Base de Datos
    class Connect  {
        
            static public function connectBd() {   
            $conn = new PDO("mysql:host=localhost;dbname=inventario_santisima","root","");
            return $conn;
        }
    }
?>