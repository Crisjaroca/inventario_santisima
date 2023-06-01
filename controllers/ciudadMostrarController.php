<?php

    require_once("../../Inventario_santisima/models/ciudadModel.php");
    $funcionExecute = "";

    class MostrarCiudad {
        
        // Funcion Mostrar Ciudad 
        static public function mostrarCiudadController(){
            
            $obj = new CiudadModel();
            $datos = $obj->mostrarCiudadModel();
            
            $tabla = '<table id="tablaCiudad" class="table table-bordered border-dark table-hover">
                        <thead>
                            <tr class="table-dark"> 
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Operaciones</th>
                                
                            </tr>
                        </thead> 
                        <tbody>';

            $datosTabla = "";

            foreach ($datos as $key => $value) {
                $datosTabla = $datosTabla.' <tr>
                                                <td>'.$value['id'].'</td>
                                                <td>'.$value['nombre'].'</td>
                                                <td>
                                                <span class = "btn btn-dark  btn btn-outline-warning" onclick = "obtenerDatosCiudad('.$value['id'].')"  data-bs-toggle = "modal" data-bs-target = "#modalActualizarCiudad">
                                                    <i class="fa-solid fa-pen"></i>
                                                </span>
                                                <span class = "btn btn-dark btn-outline-danger" onclick = "eliminarCiudad('.$value['id'].')">
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
                $mostrar = new MostrarCiudad();
                $mostrar->mostrarCiudadController();
                break;
        }
    } 
?>
