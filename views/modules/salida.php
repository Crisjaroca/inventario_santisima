<?php
    
    require"../../../inventario_santisima/models/connection.php";

    ### Inicia Sesion
    session_start();
    
    ### Busca los valores de la Sesion
    if(isset($_SESSION['user_id'])){
        
        $stmt = Connect::connectBd()-> prepare("SELECT u.id,u.nombreUsuario,r.nombreRol,u.correoElectronico,u.passwordUser,u.telefono FROM usuario u LEFT JOIN rol r ON u.rol_id = r.id WHERE u.id = :id"); 
        
        $stmt->bindParam(":id",$_SESSION['user_id'], PDO::PARAM_STR);
        $stmt->execute();
        $resultado =  $stmt->fetch(PDO::FETCH_ASSOC);

        $user = null;

        if(count($resultado) > 0 ) {
            $user = $resultado;
        }
    }
?>

<!DOCTYPE html>

<html lang="es">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        
        <title> Inventario - Salidas </title>
        
        <!-- ICON -->   
        <link rel="icon" href="../../../inventario_santisima/views/assets/img/LogoCocteleria.ico">
        
        <!-- STYLES -->   
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="../../../inventario_santisima/views/assets/css/styles.css" rel="stylesheet" />

        <!-- ICONS --> 
        <script src="https://kit.fontawesome.com/4afb0f7fd4.js" crossorigin="anonymous"></script>
        
        <!-- SCRIPTS -->  
        <script src="../../../inventario_santisima/views/assets/plugins/jquery/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Style -->
        <style type="text/css">
                #profilePictureImg { 
                    margin-left:60px;
                    margin-bottom:10px;
                }

                #logoImg { 
                    margin-left:20px;
                }
        </style>
    </head>

    <body class="sb-nav-fixed">

        <!-- BARRA DE NAVEGACION SUPERIOR -->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <div class="row">
                <div class="col-5">
                    <img id="logoImg" src="../../../inventario_santisima/views/assets/img/LogoCocteleria.png" lefty="100px "alt="" width="40px" height="40px">
                </div>
            </div>

            <!-- Navbar Brand-->
            <div class="row">
                <div class="col-2">
                    <a class="navbar-brand ps-3" href="#">Inventario Coctelería	La Santísima</a>
                </div>
            </div>
        </nav>

        <div id="layoutSidenav">
            
            <!-- BARRA DE NAVEGACION LATERAL--> 
            <div id="layoutSidenav_nav">
                
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"> Modulos : </div>
                            <a class="nav-link" href="../../../inventario_santisima/views/template.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-house-chimney"></i></div>
                                Inicio
                            </a>
                            <a class="nav-link" href="producto.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-coins"></i></div>
                                Productos
                            </a>
                            <a class="nav-link" href="pedido.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-truck-fast"></i></div>
                                Pedidos
                            </a>
                            <a class="nav-link" href="salida.php">
                                <div class="sb-nav-link-icon"> <i class="fa-solid fa-cart-shopping"></i></div>
                                Salidas
                            </a>
                            <a class="nav-link" href="proveedor.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-tie"></i></div>
                                Proveedores
                            </a>
                            <a class="nav-link" href="ciudad.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-map-location-dot"></i></div>
                                Ciudades
                            </a>
                            <a class="nav-link" href="reporte.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-square-poll-vertical"></i></i></div>
                                Reportes
                            </a>
                        </div>

                    </div>
                    <!-- Informacion del Usuario -->
                    <div class="sb-sidenav-footer">
                        <div class="row">
                            <div class="col">
                                <?php if(!empty($user)) : ?> 
                                    <img id="profilePictureImg" src="../../../inventario_santisima/views/assets/img/ProfilePicture.svg" alt="" width="60px" height="60px" class="">   
                                    <p class="text-center"> <strong> Usuario  :  </strong> <?= $user['nombreUsuario']?>  </p>
                                    <p class="text-center"> <strong> Cargo :  </strong> <?= $user['nombreRol']?> </p>
                                    <a class="btn btn-primary container-fluid" href="../../../inventario_santisima/controllers/cerrarSesion.php"> Cerrar Sesion </a>
                                <?php else: ?>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <!-- CONTENIDO -->
            <div id="layoutSidenav_content">
                <main>

                    <div class="container-fluid px-4">
                        <h1 class="mt-4"> Salidas </h1>
                        
                        <!-- CARD TABLA INVENTARIO SALIDA-->
                        <div class="card mb-4">

                            <!-- CARD TABLA INVENTARIO SALIDA ENCABEZADO -->
                            <div class="card-header">
                                <i class="fa-solid fa-clipboard-list"></i>
                                <span> Listado de Salidas : </span>
                            </div>

                            <!-- FORMULARIO INGRESO -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        
                                        <div class="row">
                                            
                                            <!-- INGRESO SALIDA -->
                                            <div class="col-2">
                                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalInsertarSalida"> Ingresar Salida </button>
                                            </div>

                                            <!-- LISTAR SALIDA -->
                                            <div class="col-2">
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"> Listar Por </button>
                                                    
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" onclick="ordenarMasRecientesSalida()">Listar Mas Recientes</a></li>
                                                        <li><a class="dropdown-item" onclick="ordenarMasAntiguosSalida()">Listar Mas Antiguos</a></li>
                                                        <li><a class="dropdown-item" onclick="ordenarMaxCantidadSalida()">Listar Mayor Cantidad</a></li>
                                                        <li><a class="dropdown-item" onclick="ordenarMinCantidadSalida()">Listar Menor Cantidad</a></li>
                                                        <li><a class="dropdown-item" onclick="ordenarMaxValorUnidadSalida()">Listar Mayor Valor Unitario</a></li>
                                                        <li><a class="dropdown-item" onclick="ordenarMinValorUnidadSalida()">Listar Menor Valor Unitario</a></li>
                                                        <li><a class="dropdown-item" onclick="ordenarMaxValorSalida()">Listar Mayor Valor </a></li>
                                                        <li><a class="dropdown-item" onclick="ordenarMinValorSalida()">Listar Menor Valor </a></li>
                                                    </ul>
                                                    </ul>
                                                    </ul>

                                                </div>
                                            </div>                                            
                                            
                                            <!-- MODAL INSERTAR SALIDA -->
                                            <div class="col">
                                                <div class="modal fade" id="modalInsertarSalida" data-bs-backdrop="static">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <!-- CABECERA MODAL -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"> Ingresar Producto : </h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>

                                                            <!-- CUERPO MODAL -->
                                                            <div class="modal-body">
                                                            
                                                                <!-- FORMULARIO INSERTAR SALIDA -->
                                                                <form form id="formInsertarSalida" onsubmit="return insertarSalida()" method="POST"> 

                                                                    <label>Producto : </label>
                                                                    <select name="productoSalida" id="" required="">
                                                                        
                                                                        <option value="0"> Seleccione el producto </option> 
                                                                        <?php 
                                                                        
                                                                         
                                                                            $stmt = Connect::connectBd()-> prepare("SELECT * FROM producto");
                                                                            $stmt->execute();
                                                                            $datos = $stmt->fetchAll();
                                                                            
                                                                            foreach ($datos as $valores) {
                                                                                echo  ('<option value="'.$valores['id'].'">'.$valores['nombre'].'</>') ;
                                                                            }
                                                                        ?>
                                                                    </select>

                                                                    <br> <br>
                                                                    
                                                                    <label>Cantidad : </label>
                                                                    <input type="text" id="cantidad" name="cantidad" class="form-control form-control-sm" placeholder="Ej. 3" required="" onkeypress='return validaNumericos(event)'>
                                                                    
                                                                    <label>Fecha Salida : </label>
                                                                    <input type="date" id="fechaSalida" name="fechaSalida" class="form-control form-control-sm" required="">
                                                                        
                                                                    <label>Valor Unitario : </label>
                                                                    <input type="text" id="valorUnitario" name="valorUnitario" class="form-control form-control-sm" placeholder="Ej. 3000"  required="" onkeypress='return validaNumericos(event)'>
                                                                        
                                                                    <br>
                                                                    
                                                                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar Salida </button>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- ACTUALIZAR SALIDA-->
                                            <div class="col">
                                                <div class="modal fade" id="modalActualizarSalida" data-bs-backdrop="static">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <!-- CABECERA MODAL -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"> Actualizar Salida : </h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>

                                                            <!-- CUERPO MODAL -->
                                                            <div class="modal-body">
                                                            
                                                                <!-- FORMULARIO ACTUALIZAR SALIDA -->
                                                                <form form id="formUpdateSalida" onsubmit="return actualizarSalida()" method="POST">
                                                                
                                                                    <label>Id : </label>
                                                                    <input type="text" id="idUp" name="idUp" class="form-control form-control-sm " readonly="readonly">

                                                                    <label> Salida : </label>
                                                                    <select name="productoSalidaUp" id="productoSalidaUp" required="">
                                                                        
                                                                        <option value="0"> Seleccione el producto </option> 
                                                                        <?php 
                                                                        
                                                                            $stmt = Connect::connectBd()-> prepare("SELECT * FROM producto");
                                                                            $stmt->execute();
                                                                            $datos = $stmt->fetchAll();
                                                                            
                                                                            foreach ($datos as $valores) {
                                                                                echo  ('<option value="'.$valores['id'].'">'.$valores['nombre'].'</>') ;
                                                                            }
                                                                        ?>
                                                                    </select>

                                                                    <br> <br>
                                                                    
                                                                    <label>Cantidad : </label>
                                                                    <input type="text" id="cantidadUp" name="cantidadUp" class="form-control form-control-sm" placeholder="Ej. 3" required="" onkeypress='return validaNumericos(event)'>
                                                                    
                                                                    <label>Fecha Salida : </label>
                                                                    <input type="date" id="fechaSalidaUp" name="fechaSalidaUp" class="form-control form-control-sm" required="">
                                                                        
                                                                    <label>Valor Unitario : </label>
                                                                    <input type="text" id="valorUnitarioUp" name="valorUnitarioUp" class="form-control form-control-sm" placeholder="Ej. 3000"  required="" onkeypress='return validaNumericos(event)'>
                                                                        
                                                                    <br>
                                                                    
                                                                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Actualizar Datos </button>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- MODAL GENERAR REPORTE -->
                                            <div class="col">
                                                <div class="modal fade" id="modalFechaReporteSalida" data-bs-backdrop="static">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <!-- CABECERA MODAL -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"> Generar Reporte : </h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>

                                                            <!-- CUERPO MODAL -->
                                                            <div class="modal-body">
                                                                
                                                                <form form id="formGenerarSalida"  method="POST"> 

                                                                    <label> Fecha Inicio: </label>
                                                                    <input type="date" id="fechaIncio" name="fechaIncio" class="form-control form-control-sm" placeholder="Ej. 09/05/2022" required="">
                                                                    
                                                                    <label> Fecha Final: </label>
                                                                    <input type="date" id="fechaFinal" name="fechaFinal" class="form-control form-control-sm" placeholder="Ej. 09/05/2022" required="">
                                                                    
                                                                    <br>

                                                                    <input type="submit" formaction="../../../inventario_santisima/controllers/salidaReporte.php" formtarget="_blank" value="Generar Reporte">
                                                                    
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            
                                
                                <!-- INTERESPACIO -->
                                <div class="row">
                                    <div class="col mb-4"></div>
                                </div>

                                <!-- TABLA INVENTARIO SALIDA-->
                                <div class="row">
                                    <div id="tablaSalida"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        
        <!-- SCRIPTS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        
        <!-- SRIPTS FUNCIONALIDADES -->
        <script src="../../../inventario_santisima/views/assets/js/salidaScript.js"></script>
        <script src="../../../inventario_santisima/views/assets/js/validaciones.js"></script>
        
        <!-- FUNCION MOSTRAR TABLA SALIDA -->
        <script type="text/javascript">
            mostrarSalida();
        </script>
        
    </body>
</html>