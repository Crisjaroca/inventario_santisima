<?php
    
    require_once("../../Inventario_santisima/models/productoModel.php");
    $funcionExecute = "";

    class MostrarProducto {
        
        ## FUNCION MOSTRAR LISTA DE PRODUCTOS
        static public function mostrarProductoController(){
            
            $object = new ProductoModel();
            $datos = $object->mostrarProductoModel();
            $datosTabla = "";

            $tabla = '<table id="tablaProducto" class="table table-bordered border-dark table-hover">
                        <thead>
                            <tr class="table-dark"> 
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Marca</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead>
                        
                        <tbody>';

            ## IMPRIME LA COLUMNA CON LOS VALORES
            foreach ($datos as $key => $value) {
                $datosTabla = $datosTabla.' <tr>
                                                <td>'.$value['id'].'</td>
                                                <td>'.$value['nombre'].'</td>
                                                <td>'.$value['descripcion'].'</td>
                                                <td>'.$value['marca'].'</td>
                                                <td>
                                                    <span class = "btn btn-dark  btn btn-outline-warning" onclick = "obtenerDatosProducto('.$value['id'].')" data-bs-toggle = "modal" data-bs-target = "#modalActualizarProducto">
                                                        <i class = "fa-solid fa-pen"></i>
                                                    </span>

                                                    <span class = "btn btn-dark btn-outline-danger" onclick = "eliminarProducto('.$value['id'].')">
                                                        <i class = "fa-solid fa-trash"></i>
                                                    </span>
											    </td>
                                            </tr>';
            }
            ## IMPRIME LA TABLA PRODUCTOS
            echo $tabla.$datosTabla.'</tbody> </table>';
        }
        
    }
    
    $mostrar = new MostrarProducto();
    $mostrar->mostrarProductoController();

?>

