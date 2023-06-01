<?php

    require_once("../../Inventario_santisima/models/salidaModel.php");
    $funcionExecute = "";

    class MostarSalida {
        
        // Mostrar Salidas 
        static public function mostrarSalidaController(){
            
            $object = new SalidaModel();
            $datos = $object->mostrarSalidaModel();
            $datosTabla = "";
            
            $tabla ='<table id="tablaProducto" class="table table-bordered border-dark table-hover">
                        <thead>
                            <tr class="table-dark"> 
                                <th>Id</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Fecha Salida</th>
                                <th>Valor Unitario</th>
                                <th>Valor Total</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead> 

                        <tbody>';

            foreach ($datos as $key => $value) {
                $datosTabla = $datosTabla.' <tr>
                                                <td>'.$value['id'].'</td>
                                                <td>'.$value['nombre'].'</td>
                                                <td>'.$value['cantidad'].'</td>
                                                <td>'.$value['fechaSalida'].'</td>
                                                <td>'.$value['valorUnitario'].'</td>
                                                <td>'.$value['valorTotal'].'</td>
                                                <td>
                                                    <span class = "btn btn-dark  btn btn-outline-warning" onclick = "obtenerDatosSalida('.$value['id'].')" data-bs-toggle = "modal" data-bs-target = "#modalActualizarSalida">
                                                        <i class = "fa-solid fa-pen"></i>
                                                    </span>
                                                    
                                                    <span class = "btn btn-dark btn-outline-danger" onclick = "eliminarSalida('.$value['id'].')">
                                                        <li class = "fas fa-trash-alt"></li>
                                                    </span>
											    </td>
                                            </tr>';
            }
            echo $tabla.$datosTabla.'</tbody> </table>';
        }
    }


    if(!empty($_POST['funcion'])) {

        $funcionExecute = $_POST['funcion'];

        switch ($funcionExecute) {

            case '1': 
                $mostrar = new MostarSalida();
                $mostrar->mostrarSalidaController();
                break;
        }
    }

?>
