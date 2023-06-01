<?php

    require_once("../../Inventario_santisima/models/salidaModel.php");
    $funcionExecute = "";

    class OrdenarSalidaController {
        
        static public function ordenarMasRecienteSalidaController(){
            
            $obj = new SalidaModel();
            $datos = $obj->ordenarMasRecienteSalidaModel();
            
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

            $datosTabla = "";

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

            echo $tabla.$datosTabla.' </tbody> </table>';
        }

        // Mostrar Salidas 
        static public function ordenarMasAntiguoSalidaController(){
            
            $obj = new SalidaModel();
            $datos = $obj->ordenarMasAntiguoSalidaModel();
            
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

            $datosTabla = "";

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

            echo $tabla.$datosTabla.' </tbody> </table>';
        }

        // Mostrar Salidas 
        static public function ordenarMaxCantidadSalidaController(){
            
            $obj = new SalidaModel();
            $datos = $obj->ordenarMaxCantidadSalidaModel();
            
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

            $datosTabla = "";

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

            echo $tabla.$datosTabla.' </tbody> </table>';
        }

        // Mostrar Salidas 
        static public function ordenarMinCantidadSalidaController(){
            
            $obj = new SalidaModel();
            $datos = $obj->ordenarMinCantidadSalidaModel();
            
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

            $datosTabla = "";

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

            echo $tabla.$datosTabla.' </tbody> </table>';
        }

        // Mostrar Salidas 
        static public function ordenarMaxValorUnidadSalidaController(){
            
            $obj = new SalidaModel();
            $datos = $obj->ordenarMaxValorUnidadSalidaModel();
            
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

            $datosTabla = "";

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

            echo $tabla.$datosTabla.' </tbody> </table>';
        }

        // Mostrar Salidas 
        static public function ordenarMinValorUnidadSalidaController(){
            
            $obj = new SalidaModel();
            $datos = $obj->ordenarMinValorUnidadSalidaModel();
            
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

            $datosTabla = "";

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

            echo $tabla.$datosTabla.' </tbody> </table>';
        }

        // Mostrar Salidas 
        static public function ordenarMaxValorSalidaController(){
            
            $obj = new SalidaModel();
            $datos = $obj->ordenarMaxValorSalidaModel();
            
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

            $datosTabla = "";

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

            echo $tabla.$datosTabla.' </tbody> </table>';
        }

        // Mostrar Salidas 
        static public function ordenarMinValorSalidaController(){
            
            $obj = new SalidaModel();
            $datos = $obj->ordenarMinValorSalidaModel();
            
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

            $datosTabla = "";

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

            echo $tabla.$datosTabla.' </tbody> </table>';
        }

    }


    if(!empty($_POST['funcion'])) {

        $funcionExecute = $_POST['funcion'];

        switch($funcionExecute) {

            case '1': 
                $mostrar = new OrdenarSalidaController();
                $mostrar->ordenarMasRecienteSalidaController();
                break;
            
            case '2': 
                $mostrar = new OrdenarSalidaController();
                $mostrar->ordenarMasAntiguoSalidaController();
                break;

            case '3': 
                $mostrar = new OrdenarSalidaController();
                $mostrar->ordenarMaxCantidadSalidaController();
                break;

            case '4': 
                $mostrar = new OrdenarSalidaController();
                $mostrar->ordenarMinCantidadSalidaController();
                break;

            case '5': 
                $mostrar = new OrdenarSalidaController();
                $mostrar->ordenarMaxValorUnidadSalidaController();
                break;
            
                case '6': 
                $mostrar = new OrdenarSalidaController();
                $mostrar->ordenarMinValorUnidadSalidaController();
                break;

            case '7': 
                $mostrar = new OrdenarSalidaController();
                $mostrar->ordenarMaxValorSalidaController();
                break;

            case '8': 
                $mostrar = new OrdenarSalidaController();
                $mostrar->ordenarMinValorSalidaController();
                break;

        }
    }

?>
