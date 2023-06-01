<?php

    require_once("../../Inventario_santisima/models/pedidoModel.php");
    $funcionExecute = "";

    class MostrarPedido {
        
        // Mostrar Lista de Pedidos 
        static public function mostrarPedidoController(){
            
            $object = new PedidoModel();
            $datos = $object->mostrarPedidoModel();
            $datosTabla = "";

            $tabla ='<table id="tablaPedido " class="table table-bordered border-dark table-hover">
                        <thead>
                            <tr class="table-dark"> 
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Proveedor</th>
                                <th>Cantidad</th>
                                <th>Fecha Ingreso</th>
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
                                                <td>'.$value['nombreProveedor'].'</td>
                                                <td>'.$value['cantidad'].'</td>
                                                <td>'.$value['fechaIngreso'].'</td>
                                                <td>'.$value['valorUnitario'].'</td>
                                                <td>'.$value['valorTotal'].'</td>
                                                <td>
                                                    <span class = "btn btn-dark  btn btn-outline-warning" onclick = "obtenerDatosPedido('.$value['id'].')" data-bs-toggle = "modal" data-bs-target = "#modalActualizarPedido">
                                                        <i class = "fa-solid fa-pen"></i>
                                                    </span>
                                                    <span class = "btn btn-dark btn-outline-danger" onclick = "eliminarPedido('.$value['id'].')">
                                                        <i class = "fa-solid fa-trash"></i>
                                                    </span>
											    </td>
                                            </tr>';
            }
            echo $tabla.$datosTabla.'</tbody> </table>';
        }
    }

    if(!empty($_POST['funcion'])) {
        
        $funcionExecute = $_POST['funcion'];
        
        switch($funcionExecute) {

            case '1': 
                $mostrar = new MostrarPedido();
                $mostrar->mostrarPedidoController();
                break;
            
        }
    }

?>

