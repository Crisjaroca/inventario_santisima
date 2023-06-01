<?php

    require_once("connection.php");
    
    class SalidaModel {
        

        ## MOSTRAR LISTA DE SALIDAS
        static public function mostrarSalidaModel(){
            
            $stmt = Connect::connectBd()-> prepare("SELECT s.id, p.nombre, s.cantidad, s.fechaSalida, s.valorUnitario, s.valorTotal FROM producto p LEFT JOIN salida s ON s.producto_id = p.id");
            $stmt->execute();

            return $stmt->fetchAll();
            $stmt = null;
        }

        ## INSERTAR SALIDA
        static public function insertarSalidaModel($cantidad,$fechaSalida,$valorUnitario,$valorTotal,$producto_id){
        
            $pdo = Connect::connectBd();
            $stmt =$pdo->prepare("INSERT INTO salida (producto_id,cantidad,fechaSalida,valorUnitario,valorTotal) VALUE ( :producto_id, :cantidad, :fechaSalida, :valorUnitario, :valorTotal )");
            
            $stmt->bindParam(":producto_id", $producto_id, PDO::PARAM_INT);
            $stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
            $stmt->bindParam(":fechaSalida", $fechaSalida, PDO::PARAM_STR);
            $stmt->bindParam(":valorUnitario", $valorUnitario, PDO::PARAM_STR);
            $stmt->bindParam(":valorTotal", $valorTotal, PDO::PARAM_STR);
            
            return $stmt->execute();
            $stmt = null;
        }


        ## BUSCAR CANTIDAD INVENTARIO
        static public function buscarCantidadInventario ($producto_id){
            
            $stmt = Connect::connectBd()-> prepare("SELECT  i.cantidad from inventario i left join producto p ON i.producto_id = p.id WHERE i.producto_id = $producto_id");
            $stmt->execute();
            
            return $stmt->fetchAll();
            $stmt = null;
        }

        ## INSERTAR CANTIDAD SALIDA EN INVENTARIO
        static public function actualizarCantidadInventario($producto_id,$cantidad){
            
            $pdo = Connect::connectBd();
            $stmt = $pdo-> prepare("UPDATE inventario SET producto_id = :producto_id, cantidad = :cantidad WHERE producto_id = $producto_id");
            
            $stmt->bindParam(":producto_id", $producto_id, PDO::PARAM_INT);
            $stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
            
            $stmt->execute();

            return $stmt = null;
        }

        ## BUSCAR CANTIDAD PRODUCTO EN  INVENTARIO
        static public function buscarCantidadProductoSalidaActualizarModel($producto_id){
            
            //$stmt = Connect::connectBd()-> prepare("SELECT  pd.cantidad from producto p left join pedido pd ON pd.producto_id = p.id WHERE pd.producto_id = $producto_id");
            $stmt = Connect::connectBd()-> prepare("SELECT  s.cantidad from salida s  left join producto p ON s.producto_id = p.id WHERE s.producto_id = $producto_id");
            $stmt->execute();
            
            return $stmt->fetchAll();
            $stmt = null;
        }

        ## BUSCAR CANTIDAD SALIDA EN  INVENTARIO
        static public function buscarCantidadSalida($id,$producto_id){
            
            //$stmt = Connect::connectBd()-> prepare("SELECT  pd.cantidad from producto p left join pedido pd ON pd.producto_id = p.id WHERE pd.producto_id = $producto_id");
            $stmt = Connect::connectBd()-> prepare("SELECT  s.cantidad from salida s  left join producto p ON s.producto_id = p.id WHERE s.id = $id");
            $stmt->execute();
            
            return $stmt->fetchAll();
            $stmt = null;
        }

        ## ELIMINAR SALIDA
        static public function eliminarSalidaModel($id){
            
            $stmt =Connect::connectBd()-> prepare("DELETE FROM salida WHERE id=:id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            
            return $stmt->execute();
        }

        // Obtener Datos del Salida
        static public function obtenerDatosSalidaModel($id){
            
            $stmt = Connect::connectBd()-> prepare("SELECT id,producto_id,cantidad,fechaSalida,valorUnitario,valorTotal FROM salida WHERE id=:id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            
            $stmt->execute();
            return $stmt->fetch();
            $stmt = null;
        }
        
        // Actualizar Datos Salida
        static public function actualizarSalidaModel($id,$cantidad,$fechaSalida,$valorUnitario,$valorTotal){
            
            $stmt = Connect::connectBd()-> prepare("UPDATE salida SET cantidad = :cantidad, fechaSalida = :fechaSalida, valorUnitario = :valorUnitario, valorTotal = :valorTotal WHERE id = :id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":cantidad",  $cantidad, PDO::PARAM_INT);
            $stmt->bindParam(":fechaSalida", $fechaSalida, PDO::PARAM_STR);
            $stmt->bindParam(":valorUnitario", $valorUnitario, PDO::PARAM_STR);
            $stmt->bindParam(":valorTotal", $valorTotal, PDO::PARAM_STR);
            $stmt->execute();
            
            return $stmt->fetch();
            $stmt = null;
        }


        static public function ordenarMasRecienteSalidaModel(){
            
            $stmt = Connect::connectBd()-> prepare("SELECT s.id, p.nombre, s.cantidad, s.fechaSalida, s.valorUnitario, s.valorTotal FROM producto p LEFT JOIN salida s ON s.producto_id = p.id ORDER BY fechaSalida DESC");
            $stmt->execute();

            return $stmt->fetchAll();
            $stmt = null;
        }

        static public function ordenarMasAntiguoSalidaModel(){
            
            $stmt = Connect::connectBd()-> prepare("SELECT s.id, p.nombre, s.cantidad, s.fechaSalida, s.valorUnitario, s.valorTotal FROM producto p LEFT JOIN salida s ON s.producto_id = p.id ORDER BY fechaSalida ASC");
            $stmt->execute();

            return $stmt->fetchAll();
            $stmt = null;
        }

        static public function ordenarMaxCantidadSalidaModel(){
            
            $stmt = Connect::connectBd()-> prepare("SELECT s.id, p.nombre, s.cantidad, s.fechaSalida, s.valorUnitario, s.valorTotal FROM producto p LEFT JOIN salida s ON s.producto_id = p.id ORDER BY cantidad DESC");
            $stmt->execute();

            return $stmt->fetchAll();
            $stmt = null;
        }

        static public function ordenarMinCantidadSalidaModel(){
            
            $stmt = Connect::connectBd()-> prepare("SELECT s.id, p.nombre, s.cantidad, s.fechaSalida, s.valorUnitario, s.valorTotal FROM producto p LEFT JOIN salida s ON s.producto_id = p.id  ORDER BY cantidad ASC");
            $stmt->execute();

            return $stmt->fetchAll();
            $stmt = null;
        }

        static public function ordenarMaxValorUnidadSalidaModel(){
            
            $stmt = Connect::connectBd()-> prepare("SELECT s.id, p.nombre, s.cantidad, s.fechaSalida, s.valorUnitario, s.valorTotal FROM producto p LEFT JOIN salida s ON s.producto_id = p.id ORDER BY valorUnitario DESC");
            $stmt->execute();

            return $stmt->fetchAll();
            $stmt = null;
        }

        static public function ordenarMinValorUnidadSalidaModel(){
            
            $stmt = Connect::connectBd()-> prepare("SELECT s.id, p.nombre, s.cantidad, s.fechaSalida, s.valorUnitario, s.valorTotal FROM producto p LEFT JOIN salida s ON s.producto_id = p.id ORDER BY valorUnitario ASC");
            $stmt->execute();

            return $stmt->fetchAll();
            $stmt = null;
        }

        static public function ordenarMaxValorSalidaModel(){
            
            $stmt = Connect::connectBd()-> prepare("SELECT s.id, p.nombre, s.cantidad, s.fechaSalida, s.valorUnitario, s.valorTotal FROM producto p LEFT JOIN salida s ON s.producto_id = p.id ORDER BY valorTotal DESC");
            $stmt->execute();

            return $stmt->fetchAll();
            $stmt = null;
        }

        static public function ordenarMinValorSalidaModel(){
            
            $stmt = Connect::connectBd()-> prepare("SELECT s.id, p.nombre, s.cantidad, s.fechaSalida, s.valorUnitario, s.valorTotal FROM producto p LEFT JOIN salida s ON s.producto_id = p.id  ORDER BY valorTotal ASC");
            $stmt->execute();

            return $stmt->fetchAll();
            $stmt = null;
        }

        ## GENERAR REPORTE PEDIDO
        static public function generarReporteSalida($fechaInicio,$fechaFin){
            $stmt = Connect::connectBd()-> prepare("SELECT s.id,p.nombre, s.cantidad, s.fechaSalida, s.valorUnitario, s.valorTotal from producto p left join salida s ON s.producto_id = p.id  WHERE s.fechaSalida >= '$fechaInicio' AND s.fechaSalida <= '$fechaFin'");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt = null;
        }

        
    }
    
?>