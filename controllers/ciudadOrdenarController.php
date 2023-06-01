<?php

    require_once("../../Inventario_santisima/models/ciudadModel.php");
    $funcionExecute = "";

    class OrdenarCiudadController {
        
        // Funcion Ordenar Ciudad Asc
        static public function ordenarNombreCiudadAsc(){
            
            $object = new CiudadModel();
            $datos = $object->ordenarNombreCiudadAscModel();
            
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


        // Funcion Ordenar Ciudad Desc
        static public function ordenarNombreCiudadDesc(){
            
            $object = new CiudadModel();
            $datos = $object->ordenarNombreCiudadDescModel();
            
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


        // Funcion Ordenar Mas Recientes
        static public function ordenarMasRecientesCiudad(){
            
            $object = new CiudadModel();
            $datos = $object->ordenarMasRecienteCiudadModel();
            
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

        static public function ordenarMasAntiguoCiudad(){
            
            $object = new CiudadModel();
            $datos = $object->ordenarMasAntiguoCiudadModel();
            
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
                $mostrar = new OrdenarCiudadController();
                $mostrar->ordenarNombreCiudadAsc();
                break;

            case '2': 
                $mostrar = new OrdenarCiudadController();
                $mostrar->ordenarNombreCiudadDesc();
                break;
        
            case '3': 
                $mostrar = new OrdenarCiudadController();
                $mostrar->ordenarMasRecientesCiudad();
                break;

            case '4': 
                $mostrar = new OrdenarCiudadController();
                $mostrar->ordenarMasAntiguoCiudad();
                break;
        }
    } 
?>
