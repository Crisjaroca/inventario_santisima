<?php

    require_once("../../Inventario_santisima/models/proveedorModel.php");
    $funcionExecute = "";

    class MostarProveedor {
        
        // Mostrar Proveedores 
        static public function mostrarProveedorController(){
            
            $obj = new ProveedorModel();
            $datos = $obj->mostrarProveedorModel();
            $datosTabla = "";

            $tabla ='<table id="tablaProveedor" class="table table-bordered border-dark table-hover">
                        <thead>
                            <tr class="table-dark"> 
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>Correo Electronico</th>
                                <th>Telefono</th>
                                <th>Ciudad</th>
                                <th>Operaciones</th>
                                
                            </tr>
                        </thead> 

                        <tbody>';

            foreach ($datos as $key => $value) {
                $datosTabla = $datosTabla.' <tr>
                                                <td>'.$value['id'].'</td>
                                                <td>'.$value['nombreProveedor'].'</td>
                                                <td>'.$value['direccion'].'</td>
                                                <td>'.$value['correoElectronico'].'</td>
                                                <td>'.$value['telefono'].'</td>
                                                <td>'.$value['nombre'].'</td>
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
            echo $tabla.$datosTabla.'</tbody> </table>';
        }
    }

    if(!empty($_POST['funcion'])) {
        
        $funcionExecute = $_POST['funcion'];
        
        switch ($funcionExecute) {
            
            case '1': 
                $mostrar = new MostarProveedor();
                $mostrar->mostrarProveedorController();
                break;
        }
    }
    
?>

