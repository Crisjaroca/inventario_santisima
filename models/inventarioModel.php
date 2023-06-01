<?php

    require_once("connection.php");
    
    class InventarioModel {
        
        ### Mostrar Tabla Inventario
        static public function mostrarInventarioModel(){
            
            $stmt = Connect::connectBd()-> prepare("SELECT p.id, p.nombre, p.descripcion, p.marca FROM producto p");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt = null;
        }

        ### Buscar Cantidad Stock
        static public function buscarCantidadInventario($producto_id){
                
            $stmt = Connect::connectBd()-> prepare("SELECT  i.cantidad from inventario i left join producto p ON i.producto_id = p.id WHERE i.producto_id = $producto_id");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt = null;
        }

        ### Buscar Valor Salida Stock
        static public function buscarValorSalida($producto_id){
                
            $stmt = Connect::connectBd()-> prepare("SELECT  s.valorUnitario from salida s left join producto p ON s.producto_id = p.id WHERE s.producto_id = $producto_id");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt = null;
        }
    }
?>