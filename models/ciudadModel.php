<?php

    require_once("connection.php");
    
    class CiudadModel {
        
        ### Mostrar Listado Ciudades
        static public function mostrarCiudadModel(){
            
            $stmt = Connect::connectBd()-> prepare("SELECT id,nombre FROM ciudad");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt = null;
        }

        ### Seleccionar Ciudad (Validar Ingreso)
        static public function seleccionarCiudadModel($datosModel){
            
            $stmt = Connect::connectBd()-> prepare("SELECT id,nombre FROM ciudad WHERE nombre=:nombre"); 
            $stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt = null;
        }

        ### Insertar Ciudad
        static public function insertarCiudadModel($datosModel){
            
            $stmt =Connect::connectBd()-> prepare("INSERT INTO ciudad (nombre) VALUE (:nombre)");
            $stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
            return $stmt->execute();
            $stmt = null;
        }

        ### Eliminar Ciudad
        static public function eliminarCiudadModel($id){
            
            $stmt =Connect::connectBd()-> prepare("DELETE FROM ciudad WHERE id=:id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);   
            return $stmt->execute();
            $stmt = null;
        }

        ### Obtener Datos Ciudad 
        static public function obtenerDatosCiudadModel($id){
            
            $stmt = Connect::connectBd()-> prepare("SELECT id,nombre FROM ciudad WHERE id=:id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();           
            return $stmt->fetch();
            $stmt = null;
        }

        ### Modificar Datos Ciudad
        static public function actualizarDatosCiudadModel($id,$nombre){
            
            $stmt = Connect::connectBd()-> prepare("UPDATE ciudad SET nombre = :nombre WHERE id = :id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":nombre",  $nombre, PDO::PARAM_STR);      
            $stmt->execute();      
            return $stmt->fetch();
            $stmt = null;
        }

        ### Ordenar Ciudad A-Z
        static public function ordenarNombreCiudadAscModel(){
            $stmt = Connect::connectBd()-> prepare("SELECT * FROM ciudad ORDER BY nombre ASC");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt = null; 
        }

        ### Ordenar Ciudad Z-A
        static public function ordenarNombreCiudadDescModel(){
            $stmt = Connect::connectBd()-> prepare("SELECT * FROM ciudad ORDER BY nombre DESC");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt = null; 
        }

        ### Ordenar Ciudad Mas Antiguos
        static public function ordenarMasAntiguoCiudadModel(){
            $stmt = Connect::connectBd()-> prepare("SELECT * FROM ciudad ORDER BY id ASC");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt = null; 
        }

        ### Ordenar Ciudad Mas Recientes
        static public function ordenarMasRecienteCiudadModel(){
            $stmt = Connect::connectBd()-> prepare("SELECT * FROM ciudad ORDER BY id DESC");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt = null; 
        }
    } 
?>