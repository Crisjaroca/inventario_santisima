<?php

    require_once("../../Inventario_santisima/models/inventarioModel.php");
    $funcionExecute = "";

    class InventarioController {
        
        ## FUNCION MOSTRAR INVENTARIO GENERAL
        static public function mostrarInventarioController(){
            
            $object = new InventarioModel();
            $datos = $object->mostrarInventarioModel();
            
            $tabla ='<table id="tablaInventario" class="table table-bordered border-dark table-hover">
                        <thead>
                            <tr class="table-dark"> 
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Marca</th>
                                <th>Cantidad</th>
                                <th>Valor Venta</th>
                            </tr>
                        </thead>
                        
                        <tbody>';

            $datosTabla = "";
            
            foreach ($datos as $key => $value) {
                
                $cantidadStock = 0;
                $valorVentaStock = 0;

                ## TRAE CANTIDAD EN STOCK
                $respuestaBuscarCantidad = InventarioModel::buscarCantidadInventario($value['id']);
                
                ## BUSCAR LA ULTIMA CANTIDADSTOCK EN EL INVENTARIO
                foreach ($respuestaBuscarCantidad as $key => $cantidad) {
                    $cantidadStock = intval($cantidad['cantidad']);
                }

                ## TRAE VALOR DE VENTA EN STOCK
                $respuestaBuscarValorVenta = InventarioModel::buscarValorSalida($value['id']);
                
                ## BUSCAR EL ULTIMO VALOR DE VENTA EN EL INVENTARIO
                foreach ($respuestaBuscarValorVenta as $key => $valorVenta) {
                    $valorVentaStock = intval($valorVenta['valorUnitario']);
                }

                ## IMPRIME LAS COLUMNAS CON LOS VALORES
                $datosTabla = $datosTabla.'<tr>
                                                <td>'.$value['id'].'</td>
                                                <td>'.$value['nombre'].'</td>
                                                <td>'.$value['descripcion'].'</td>
                                                <td>'.$value['marca'].'</td>
                                                <td>'.$cantidadStock.'</td>
                                                <td>'.$valorVentaStock.'</td>
                                            </tr>';
            }

            ## IMPRIME LA TABLA
            echo $tabla.$datosTabla.'</tbody></table>';
        }
    }

    ## LLAMA LOS FUNCIONES 
    $mostrar = new InventarioController();
    $mostrar->mostrarInventarioController();

?>
