<?php
    
    require"../../inventario_santisima/models/connection.php";

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
        
        <title> Inventario Coctelería "La Santísima" </title>

        <!-- ICON -->
        <link rel="icon" href="../../inventario_santisima/views/assets/img/LogoCocteleria.ico">

        <!-- STYLES -->   
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../../inventario_santisima/views/assets/css/styles.css" rel="stylesheet" />
        
        <!-- ICONS -->   
        <script src="https://kit.fontawesome.com/4afb0f7fd4.js" crossorigin="anonymous"></script>
        
        <!-- SCRIPTS -->   
        <script src="../../inventario_santisima/views/assets/plugins/jquery/jquery.min.js"></script>

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

        <!-- Barra De Navegacion Superior -->   
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            
            <div class="row">
                <div class="col-5">
                    <img id="logoImg"src="../../inventario_santisima/views/assets/img/LogoCocteleria.png" lefty="100px "alt="" width="40px" height="40px">
                </div>
            </div>

            <!-- Navbar Brand-->
            <div class="row">
                <div class="col-2">
                    <a class="navbar-brand ps-3" href="#">Inventario Coctelería La Santísima</a>
                </div>
            </div>
        </nav>
            
        <div id="layoutSidenav">

            <!-- Barra de Navegacion Lateral -->   
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"> Modulos : </div>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-house-chimney"></i></div>
                                Inicio
                            </a>
                            <a class="nav-link" href="../../inventario_santisima/views/modules/producto.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-coins"></i></div>
                                Productos
                            </a>
                            <a class="nav-link" href="../../inventario_santisima/views/modules/pedido.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-truck-fast"></i></div>
                                Pedidos
                            </a>
                            <a class="nav-link" href="../../inventario_santisima/views/modules/salida.php">
                                <div class="sb-nav-link-icon"> <i class="fa-solid fa-cart-shopping"></i></div>
                                Salidas
                            </a>
                            <a class="nav-link" href="../../inventario_santisima/views/modules/proveedor.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-tie"></i></div>
                                Proveedores
                            </a>
                            <a class="nav-link" href="../../inventario_santisima/views/modules/ciudad.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-map-location-dot"></i></div>
                                Ciudades
                            </a>
                            <a class="nav-link" href="../../inventario_santisima/views/modules/reporte.php">
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
                                    <img id="profilePictureImg" src="../../inventario_santisima/views/assets/img/ProfilePicture.svg" alt="" width="60px" height="60px" class="">   
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
                        <h1 class="mt-4">Inventario</h1> <br>

                        <!-- CARD TABLA INVENTARIO -->
                        <div class="card mb-4">
                            
                            <!-- CARD TABLA INVENTARIO CABECERA -->
                            <div class="card-header">
                                <i class="fa-solid fa-clipboard-list"></i>
                                <span> Inventario General </span>
                            </div>
                            
                            <!-- CARD TABLA INVENTARIO CUERPO -->
                            <div class="card-body">
                                
                                <!-- TABLA INVENTARIO -->
                                <div class="row">
                                    <div id="tablaInventario"> </div>
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
        
        <!-- SCRIPTS FUNCIONALIDADES -->
        <script src="../../../inventario_santisima/views/assets/js/inventarioScript.js"></script>
        
        <!-- FUNCION MOSTRAR TABLA INVENTARIO -->
        <script type="text/javascript">
            mostrarInventario();
        </script>
        
    </body>
</html>