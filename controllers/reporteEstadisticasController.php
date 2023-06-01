<?php

    require_once("../../Inventario_santisima/models/reporteModel.php");
    $funcionExecute = "";

    class ReporteEstadisticas {

        static public function totalIngresos(){


            $respuestaTotalIngresos =  ReporteModel::totalIngresos();
            $totalIngresos = 0;

            foreach ($respuestaTotalIngresos as $key => $value) {
                $totalIngresos += intval($value['valorTotal']);
            }
            
            echo $totalIngresos;
        }

        static public function totalEgresos(){


            $respuestaTotalEgresos =  ReporteModel::totalEgresos();
            $totalEgresos = 0;

            foreach ($respuestaTotalEgresos as $key => $value) {
                $totalEgresos += intval($value['valorTotal']);
            }
            
            echo $totalEgresos;
        }

        static public function total(){

            $respuestaTotalIngresos =  ReporteModel::totalIngresos();
            $respuestaTotalEgresos =  ReporteModel::totalEgresos();
            $totalEgresos = 0;
            $totalIngresos = 0;
            $total = 0;

            foreach ($respuestaTotalIngresos as $key => $value) {
                $totalIngresos += intval($value['valorTotal']);
            }
            
            foreach ($respuestaTotalEgresos as $key => $value) {
                $totalEgresos += intval($value['valorTotal']);
            }
            $total = $totalIngresos - $totalEgresos;

            echo $total;
        }

        static public function productoMasVendido(){

            $respuestaMasVendido =  ReporteModel::productoMasVendido();
            $cantidad = 0;
            $nombre = "";
           
            foreach ($respuestaMasVendido as $key => $value) {
                $cantidad = intval($value['totalCantidad']);
                $nombre = $value['nombre'];
            }
            echo "$nombre : $cantidad";
        }

        static public function productoMenosVendido(){
            $respuestaMenosVendido =  ReporteModel::productoMenosVendido();
            $cantidadMenos = 0;
            $nombreMenos = "";
           
            foreach ($respuestaMenosVendido as $key => $value) {
                $cantidadMenos = intval($value['totalCantidad']);
                $nombreMenos = $value['nombre'];
            }
            echo "$nombreMenos : $cantidadMenos";
        }

        static public function graficaproductoMasVendido(){
            $respuestaMenosVendido =  ReporteModel::graficaProductoMasVendido();
            $cantidad = 0;

        }
    }

    if(!empty($_POST['funcion'])) {
        
        $funcionExecute = $_POST['funcion'];
        
        switch($funcionExecute) {
            
            case '1': 
                $reporte = new ReporteEstadisticas();
                $reporte->totalIngresos();
                break;
            case '2': 
                $reporte = new ReporteEstadisticas();
                $reporte->totalEgresos();
                break;
            case '3': 
                $reporte = new ReporteEstadisticas();
                $reporte->total();
                break;
            case '4': 
                $mostrar = new ReporteEstadisticas();
                $mostrar->productoMasVendido();
                break;

            case '5': 
                $mostrar = new ReporteEstadisticas();
                $mostrar->productoMenosVendido();
                break;

            case '6': 
                $mostrar = new ReporteEstadisticas();
                $mostrar->graficaproductoMasVendido();
                break;
        }
    }
?>