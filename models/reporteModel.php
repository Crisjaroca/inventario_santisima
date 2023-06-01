<?php

    require_once("connection.php");
    
    class ReporteModel {
        

        ## MOSTRAR LISTA DE SALIDAS
        static public function totalIngresos(){
            
            $stmt = Connect::connectBd()-> prepare("SELECT valorTotal FROM salida");
            $stmt->execute();

            return $stmt->fetchAll();
            $stmt = null;
        }

         ## MOSTRAR LISTA DE SALIDAS
         static public function totalEgresos(){
            
            $stmt = Connect::connectBd()-> prepare("SELECT valorTotal FROM pedido");
            $stmt->execute();

            return $stmt->fetchAll();
            $stmt = null;
        }
        
        static public function productoMasVendidoNombre(){
            
            $stmt = Connect::connectBd()-> prepare("SELECT nombre from producto");
            $stmt->execute();

            return $stmt->fetchAll();
            $stmt = null;
        }
        
        static public function productoMasVendido(){
            $stmt = Connect::connectBd()-> prepare(" SELECT s.cantidad,p.nombre, SUM(s.cantidad) AS totalCantidad FROM salida s INNER JOIN producto p ON p.id = s.producto_id GROUP BY s.producto_id ORDER BY s.cantidad DESC LIMIT 1");
            $stmt->execute();

            return $stmt->fetchAll();
            $stmt = null;
        }

        static public function productoMenosVendido(){
            $stmt = Connect::connectBd()-> prepare(" SELECT s.cantidad,p.nombre, SUM(s.cantidad) AS totalCantidad FROM salida s INNER JOIN producto p ON p.id = s.producto_id GROUP BY s.producto_id ORDER BY s.cantidad ASC LIMIT 1");
            $stmt->execute();

            return $stmt->fetchAll();
            $stmt = null;
        }

        static public function graficaProductoMasVendido(){
            $stmt = Connect::connectBd()-> prepare(" SELECT s.cantidad,p.nombre, SUM(s.cantidad) AS totalCantidad FROM salida s INNER JOIN producto p ON p.id = s.producto_id GROUP BY s.producto_id ORDER BY s.cantidad DESC LIMIT 10");
            $stmt->execute();

            return $stmt->fetchAll();
            $stmt = null;
        }

    }