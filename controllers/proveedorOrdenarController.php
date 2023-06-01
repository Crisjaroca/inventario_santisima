<?php

    require_once("../../Inventario_santisima/models/proveedorModel.php");
    $funcionExecute = "";

    class OrdenarProveedorController {
        
        // Mostrar Proveedores 
        static public function ordenarNombreProveedorAsc(){
            
            $obj = new ProveedorModel();
            $datos = $obj->ordenarNombreProveedorAscModel();

            $tabla ='<table id="tablaProveedor" class="table table-bordered border-dark table-hover">
                        <thead>
                        <tr class="table-dark"> 
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>Correo Electronico</th>
                                <th>Telefono</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead> 
                        <tbody>';

            $datosTabla = "";

            foreach ($datos as $key => $value) {
                $datosTabla = $datosTabla.' <tr>
                                                <td>'.$value['id'].'</td>
                                                <td>'.$value['nombreProveedor'].'</td>
                                                <td>'.$value['direccion'].'</td>
                                                <td>'.$value['correoElectronico'].'</td>
                                                <td>'.$value['telefono'].'</td>
                                                <td>
                                                    <span class="btn btn-dark  btn btn-outline-warning" onclick="obtenerDatosProveedor('.$value['id'].')" data-bs-toggle="modal" data-bs-target="#modalActualizarProveedor">
                                                        <i class="fas fa-edit"></i>
                                                    </span>

                                                    <span class="btn btn-dark btn-outline-danger" onclick="eliminarProveedor('.$value['id'].')">
                                                        <li class="fas fa-trash-alt"></li>
                                                    </span>
											    </td>
                                            </tr>';
            }

            echo $tabla.$datosTabla.' </tbody> </table>';
        }

        static public function ordenarNombreProveedorDesc(){
            
            $obj = new ProveedorModel();
            $datos = $obj->ordenarNombreProveedorDescModel();

            $tabla ='<table id="tablaProveedor" class="table table-bordered border-dark table-hover">
                        <thead>
                        <tr class="table-dark"> 
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>Correo Electronico</th>
                                <th>Telefono</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead> 
                        <tbody>';

            $datosTabla = "";

            foreach ($datos as $key => $value) {
                $datosTabla = $datosTabla.' <tr>
                                                <td>'.$value['id'].'</td>
                                                <td>'.$value['nombreProveedor'].'</td>
                                                <td>'.$value['direccion'].'</td>
                                                <td>'.$value['correoElectronico'].'</td>
                                                <td>'.$value['telefono'].'</td>
                                                <td>
                                                    <span class="btn btn-dark  btn btn-outline-warning" onclick="obtenerDatosProveedor('.$value['id'].')" data-bs-toggle="modal" data-bs-target="#modalActualizarProveedor">
                                                        <i class="fas fa-edit"></i>
                                                    </span>

                                                    <span class="btn btn-dark btn-outline-danger" onclick="eliminarProveedor('.$value['id'].')">
                                                        <li class="fas fa-trash-alt"></li>
                                                    </span>
											    </td>
                                            </tr>';
            }

            echo $tabla.$datosTabla.' </tbody> </table>';
        }

        static public function ordenarMasRecienteProveedor(){
            
            $obj = new ProveedorModel();
            $datos = $obj->ordenarMasRecientesProveedoresModel();
           
            $tabla ='<table id="tablaProveedor" class="table table-bordered border-dark table-hover">
                        <thead>
                        <tr class="table-dark"> 
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>Correo Electronico</th>
                                <th>Telefono</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead> 
                        <tbody>';

            $datosTabla = "";

            foreach ($datos as $key => $value) {
                $datosTabla = $datosTabla.' <tr>
                                                <td>'.$value['id'].'</td>
                                                <td>'.$value['nombreProveedor'].'</td>
                                                <td>'.$value['direccion'].'</td>
                                                <td>'.$value['correoElectronico'].'</td>
                                                <td>'.$value['telefono'].'</td>
                                                <td>
                                                    <span class="btn btn-dark  btn btn-outline-warning" onclick="obtenerDatosProveedor('.$value['id'].')" data-bs-toggle="modal" data-bs-target="#modalActualizarProveedor">
                                                        <i class="fas fa-edit"></i>
                                                    </span>

                                                    <span class="btn btn-dark btn-outline-danger" onclick="eliminarProveedor('.$value['id'].')">
                                                        <li class="fas fa-trash-alt"></li>
                                                    </span>
											    </td>
                                            </tr>';
            }

            echo $tabla.$datosTabla.' </tbody> </table>';
        }

        static public function ordenarMasAntiguoProveedor(){
            
            $obj = new ProveedorModel();
            $datos = $obj->ordenarMasAntiguosProveedoresModel();
           
            $tabla ='<table id="tablaProveedor" class="table table-bordered border-dark table-hover">
                        <thead>
                        <tr class="table-dark"> 
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>Correo Electronico</th>
                                <th>Telefono</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead> 
                        <tbody>';

            $datosTabla = "";

            foreach ($datos as $key => $value) {
                $datosTabla = $datosTabla.' <tr>
                                                <td>'.$value['id'].'</td>
                                                <td>'.$value['nombreProveedor'].'</td>
                                                <td>'.$value['direccion'].'</td>
                                                <td>'.$value['correoElectronico'].'</td>
                                                <td>'.$value['telefono'].'</td>
                                                <td>
                                                <span class="btn btn-dark  btn btn-outline-warning" onclick="obtenerDatosProveedor('.$value['id'].')" data-bs-toggle="modal" data-bs-target="#modalActualizarProveedor">
                                                    <i class="fas fa-edit"></i>
                                                </span>

                                                <span class="btn btn-dark btn-outline-danger" onclick="eliminarProveedor('.$value['id'].')">
                                                    <li class="fas fa-trash-alt"></li>
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
                $mostrar = new OrdenarProveedorController();
                $mostrar->ordenarNombreProveedorAsc();
                break;
            case '2': 
                $mostrar = new OrdenarProveedorController();
                $mostrar->ordenarNombreProveedorDesc();
                break;
            case '3': 
                $mostrar = new OrdenarProveedorController();
                $mostrar->ordenarMasRecienteProveedor();
                break;
            case '4': 
                $mostrar = new OrdenarProveedorController();
                $mostrar->ordenarMasAntiguoProveedor();
                break;
        }
    }
    
?>

