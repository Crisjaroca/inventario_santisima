<?php

    require_once("connection.php");
    
    class ProveedorModel {
        
        // Mostar Lista de Proveedores
        static public function mostrarProveedorModel(){
            
            $stmt = Connect::connectBd()-> prepare("SELECT p.id,p.nombreProveedor,p.direccion,p.correoElectronico,p.telefono,c.nombre FROM proveedor p left join ciudad c ON p.ciudad_id = c.id ");
            $stmt->execute();
            
            return $stmt->fetchAll();
            $stmt = null;
        }
        

        // Seleccionar Proveedor
        static public function seleccionarProveedorModel($datosModel){
            
            $stmt = Connect::connectBd()-> prepare("SELECT id,nombreProveedor,direccion,correoElectronico,telefono FROM proveedor WHERE nombreProveedor=:nombreProveedor"); 
            $stmt->bindParam(":nombreProveedor", $datosModel["nombre"], PDO::PARAM_STR);
            $stmt->execute();
            
            return $stmt->fetchAll();
            $stmt = null;
        }

        // Insertar Proveedor
        static public function insertarProveedorModel($datosModel){
            
            $stmt =Connect::connectBd()-> prepare("INSERT INTO proveedor (nombreProveedor,direccion,correoElectronico,telefono,ciudad_id) VALUE (:nombreProveedor, :direccion, :correoElectronico, :telefono, :ciudad_id)");
            
            $stmt->bindParam(":nombreProveedor", $datosModel["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $datosModel["direccion"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datosModel["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":correoElectronico", $datosModel["correoElectronico"], PDO::PARAM_STR);
            $stmt->bindParam(":ciudad_id", $datosModel["ciudad_id"], PDO::PARAM_INT);
            
            return $stmt->execute();
            $stmt = null;
        }

        // Eliminar Proveedor
        static public function eliminarProveedorModel($id){
            
            $stmt =Connect::connectBd()-> prepare("DELETE FROM proveedor WHERE id=:id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            
            return $stmt->execute();
        }

        // Obtener Datos Proveedor
        static public function obtenerDatosProveedorModel($id){
            
            $stmt = Connect::connectBd()-> prepare("SELECT id,nombreProveedor,direccion,correoElectronico,telefono,ciudad_id FROM proveedor WHERE id=:id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetch();
            $stmt = null;
        }

        // Actualizar Proveedor
        static public function actualizarProveedorModel($id,$nombre,$direccion,$correoElectronico,$telefono){
            
            $stmt = Connect::connectBd()-> prepare("UPDATE proveedor SET nombreProveedor = :nombreProveedor, direccion = :direccion, correoElectronico = :correoElectronico, telefono = :telefono WHERE id = :id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":nombreProveedor",  $nombre, PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $direccion, PDO::PARAM_STR);
            $stmt->bindParam(":correoElectronico", $correoElectronico, PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
            $stmt->execute();
            
            return $stmt->fetch();
            $stmt = null;
        }

        static public function ordenarNombreProveedorAscModel(){
            $stmt = Connect::connectBd()-> prepare("SELECT * FROM proveedor ORDER BY nombreProveedor ASC");
            $stmt->execute();
            
            return $stmt->fetchAll();
            $stmt = null;
        }

        static public function ordenarNombreProveedorDescModel(){
            $stmt = Connect::connectBd()-> prepare("SELECT * FROM proveedor ORDER BY nombreProveedor DESC");
            $stmt->execute();
            
            return $stmt->fetchAll();
            $stmt = null;
        }

        static public function ordenarMasRecientesProveedoresModel(){
            $stmt = Connect::connectBd()-> prepare("SELECT * FROM proveedor ORDER BY id DESC");
            $stmt->execute();
            
            return $stmt->fetchAll();
            $stmt = null;
        }

        static public function ordenarMasAntiguosProveedoresModel(){
            $stmt = Connect::connectBd()-> prepare("SELECT * FROM proveedor ORDER BY id ASC");
            $stmt->execute();
            
            return $stmt->fetchAll();
            $stmt = null;
        }
    }

?>