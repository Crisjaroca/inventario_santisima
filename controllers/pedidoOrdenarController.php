<?php

    require_once("../../Inventario_santisima/models/pedidoModel.php");
    $funcionExecute = "";

    class OrdenarPedidoController {
        
        // Mostrar Productos 
        static public function ordenarMasRecientePedidoController(){
            
            $obj = new PedidoModel();
            $datos = $obj->ordenarMasRecientePedidoModel();
           
            $tabla ='<table id="tablaPedido " class="table table-bordered border-dark table-hover">
                        <thead>
                            <tr class="table-dark"> 
                                <th>Id</th>
                                <th>Id</th>
                                <th>Cantidad</th>
                                <th>Fecha Ingreso</th>
                                <th>Valor Unitario</th>
                                <th>Valor Total</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead> 
                        <tbody>';

            $datosTabla = "";

            foreach ($datos as $key => $value) {
                $datosTabla = $datosTabla.' <tr>
                                                <td>'.$value['id'].'</td>
                                                <td>'.$value['nombre'].'</td>
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

            echo $tabla.$datosTabla.' </tbody> </table>';
        }

        static public function ordenarMasAntiguoPedidoController(){
            
            $obj = new PedidoModel();
            $datos = $obj->ordenarMasAntiguoPedidoModel();
           
            $tabla ='<table id="tablaPedido " class="table table-bordered border-dark table-hover">
                        <thead>
                            <tr class="table-dark"> 
                                <th>Id</th>
                                <th>Id</th>
                                <th>Cantidad</th>
                                <th>Fecha Ingreso</th>
                                <th>Valor Unitario</th>
                                <th>Valor Total</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead> 
                        <tbody>';

            $datosTabla = "";

            foreach ($datos as $key => $value) {
                $datosTabla = $datosTabla.' <tr>
                                                <td>'.$value['id'].'</td>
                                                <td>'.$value['nombre'].'</td>
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

            echo $tabla.$datosTabla.' </tbody> </table>';
        }


        // Funcion Mostrar Productos 
        static public function ordenarMaxCantidadPedidoController(){
            
            $obj = new PedidoModel();
            $datos = $obj->ordenarCantidadPedidoAscModel();
           
            $tabla ='<table id="tablaPedido " class="table table-bordered border-dark table-hover">
                        <thead>
                            <tr class="table-dark"> 
                                <th>Id</th>
                                <th>Id</th>
                                <th>Cantidad</th>
                                <th>Fecha Ingreso</th>
                                <th>Valor Unitario</th>
                                <th>Valor Total</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead> 
                        <tbody>';

            $datosTabla = "";

            foreach ($datos as $key => $value) {
                $datosTabla = $datosTabla.' <tr>
                                                <td>'.$value['id'].'</td>
                                                <td>'.$value['nombre'].'</td>
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

            echo $tabla.$datosTabla.' </tbody> </table>';
        }

        static public function ordenarMinCantidadPedidoController(){
            
            $obj = new PedidoModel();
            $datos = $obj->ordenarCantidadPedidoDescModel();
           
            $tabla ='<table id="tablaPedido " class="table table-bordered border-dark table-hover">
                        <thead>
                            <tr class="table-dark"> 
                                <th>Id</th>
                                <th>Id</th>
                                <th>Cantidad</th>
                                <th>Fecha Ingreso</th>
                                <th>Valor Unitario</th>
                                <th>Valor Total</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead> 
                        <tbody>';

            $datosTabla = "";

            foreach ($datos as $key => $value) {
                $datosTabla = $datosTabla.' <tr>
                                                <td>'.$value['id'].'</td>
                                                <td>'.$value['nombre'].'</td>
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

            echo $tabla.$datosTabla.' </tbody> </table>';
        }

        static public function ordenarMaxValorUnidadPedidoController(){
            
            $obj = new PedidoModel();
            $datos = $obj->ordenarValorUnidadPedidoAscModel();
           
            $tabla ='<table id="tablaPedido " class="table table-bordered border-dark table-hover">
                        <thead>
                            <tr class="table-dark"> 
                                <th>Id</th>
                                <th>Id</th>
                                <th>Cantidad</th>
                                <th>Fecha Ingreso</th>
                                <th>Valor Unitario</th>
                                <th>Valor Total</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead> 
                        <tbody>';

            $datosTabla = "";

            foreach ($datos as $key => $value) {
                $datosTabla = $datosTabla.' <tr>
                                                <td>'.$value['id'].'</td>
                                                <td>'.$value['nombre'].'</td>
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

            echo $tabla.$datosTabla.' </tbody> </table>';
        }

        static public function ordenarMinValorUnidadPedidoController(){
            
            $obj = new PedidoModel();
            $datos = $obj->ordenarValorUnidadPedidoDescModel();
           
            $tabla ='<table id="tablaPedido " class="table table-bordered border-dark table-hover">
                        <thead>
                            <tr class="table-dark"> 
                                <th>Id</th>
                                <th>Id</th>
                                <th>Cantidad</th>
                                <th>Fecha Ingreso</th>
                                <th>Valor Unitario</th>
                                <th>Valor Total</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead> 
                        <tbody>';

            $datosTabla = "";

            foreach ($datos as $key => $value) {
                $datosTabla = $datosTabla.' <tr>
                                                <td>'.$value['id'].'</td>
                                                <td>'.$value['nombre'].'</td>
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

            echo $tabla.$datosTabla.' </tbody> </table>';
        }

        static public function ordenarMaxValorPedidoController(){
            
            $obj = new PedidoModel();
            $datos = $obj->ordenarValorPedidoAscModel();
           
            $tabla ='<table id="tablaPedido " class="table table-bordered border-dark table-hover">
                        <thead>
                            <tr class="table-dark"> 
                                <th>Id</th>
                                <th>Id</th>
                                <th>Cantidad</th>
                                <th>Fecha Ingreso</th>
                                <th>Valor Unitario</th>
                                <th>Valor Total</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead> 
                        <tbody>';

            $datosTabla = "";

            foreach ($datos as $key => $value) {
                $datosTabla = $datosTabla.' <tr>
                                                <td>'.$value['id'].'</td>
                                                <td>'.$value['nombre'].'</td>
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

            echo $tabla.$datosTabla.' </tbody> </table>';
        }

        static public function ordenarMinValorPedidoController(){
            
            $obj = new PedidoModel();
            $datos = $obj->ordenarValorPedidoDescModel();
           
            $tabla ='<table id="tablaPedido " class="table table-bordered border-dark table-hover">
                        <thead>
                            <tr class="table-dark"> 
                                <th>Id</th>
                                <th>Id</th>
                                <th>Cantidad</th>
                                <th>Fecha Ingreso</th>
                                <th>Valor Unitario</th>
                                <th>Valor Total</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead> 
                        <tbody>';

            $datosTabla = "";

            foreach ($datos as $key => $value) {
                $datosTabla = $datosTabla.' <tr>
                                                <td>'.$value['id'].'</td>
                                                <td>'.$value['nombre'].'</td>
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
            
            echo $tabla.$datosTabla.' </tbody> </table>';
        }


    }
    
    if(!empty($_POST['funcion'])) {
        
        $funcionExecute = $_POST['funcion'];
        
        switch($funcionExecute) {
            
            case '1': 
                $mostrar = new OrdenarPedidoController();
                $mostrar->ordenarMasRecientePedidoController();
                break;

            case '2': 
                $mostrar = new OrdenarPedidoController();
                $mostrar->ordenarMasAntiguoPedidoController();
                break;
        
            case '3': 
                $mostrar = new OrdenarPedidoController();
                $mostrar->ordenarMaxCantidadPedidoController();
                break;

            case '4': 
                $mostrar = new OrdenarPedidoController();
                $mostrar->ordenarMinCantidadPedidoController();
                break;

            case '5': 
                $mostrar = new OrdenarPedidoController();
                $mostrar->ordenarMaxValorUnidadPedidoController();
                break;

                case '6': 
                    $mostrar = new OrdenarPedidoController();
                    $mostrar->ordenarMinValorUnidadPedidoController();
                    break;

                case '7': 
                    $mostrar = new OrdenarPedidoController();
                    $mostrar->ordenarMaxValorPedidoController();
                    break;
        
                case '8': 
                    $mostrar = new OrdenarPedidoController();
                    $mostrar->ordenarMinValorPedidoController();
                    break;
        }
    } 
?>
