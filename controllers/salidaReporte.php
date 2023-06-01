<?php

    require('../../Inventario_santisima/views/assets/plugins/fpdf/fpdf.php');
    require('../../Inventario_santisima/models/salidaModel.php');
    $inicio = "";
    $final = "";

    if(strlen($_POST['fechaIncio'])>0 and strlen($_POST['fechaFinal'])>0){
        $fechaInicio = $_POST['fechaIncio'];
        $fechaFin = $_POST['fechaFinal'];
    
        $verDesde = date('d/m/Y', strtotime($inicio));
        $verHasta = date('d/m/Y', strtotime($final));
    }else{
        $inicio = '1111-01-01';
        $final = '9999-12-30';
    
        $verDesde = '__/__/____';
        $verHasta = '__/__/____';
    }
    
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Helvetica','B',10);
    $pdf->Image('../../Inventario_santisima/views/assets/img/Logosantisima.png',7,15,20);
    $pdf->Cell(80);
    $pdf->Cell(30,25,'Reporte Salidas cocteleria "La santisima"',0,0,'C');
    $pdf->Cell(100, 10, 'Fecha Expedicion: '.date('d-m-Y').'', 0);
    $pdf->Ln(30);

    $pdf->Cell(36, 6,'Fecha Inicio Reporte : ',0,0,'C',0);
    $pdf->Cell(20, 6, $fechaInicio,0,0,'C',0);
    $pdf->Cell(35, 6,'Fecha Fin Reporte : ',0,0,'C',0);
    $pdf->Cell(20, 6, $fechaFin,0,1,'C',0);
    $pdf->Ln(5);

    $pdf-> Cell(35,6,'Producto',1,0,'C',0); 
    $pdf-> Cell(25,6,'Cantidad',1,0,'C',0); 
    $pdf->Cell(32,6,'Fecha de Salida',1,0,'C',0); 
    $pdf-> Cell(30,6,'Valor Unitario',1,0,'C',0); 
    $pdf->Cell(30,6,'Valor Total',1,1,'C',0);

    $object = new SalidaModel();
    $datos = $object->generarReporteSalida($fechaInicio,$fechaFin);
    $valorTotal = 0;
    $cantidadTotal = 0;

    foreach ($datos as $key => $value) {
        $pdf->Cell(35, 6, $value['nombre'],1,0,'C',0);
        $pdf->Cell(25, 6, $value['cantidad'],1,0,'C',0);
        $pdf->Cell(32, 6, $value['fechaSalida'],1,0,'C',0);
        $pdf->Cell(30, 6, $value['valorUnitario'],1,0,'C',0);
        $pdf->Cell(30, 6, $value['valorTotal'],1,1,'C',0);

        $cantidadTotal += intval($value['cantidad']);
        $valorTotal += intval($value['valorTotal']);
    }
    $pdf->Ln(5);
    $pdf->Cell(35, 6,'Valor Total Pedidos = ',0,0,'C',0);
    $pdf->Cell(35, 6, $valorTotal,0,1,'C',0);

    $pdf->Cell(26, 6,'Cantidad Total = ',0,0,'C',0);
    $pdf->Cell(35, 6, $cantidadTotal,0,0,'C',0);
    $pdf->Output();  
?>