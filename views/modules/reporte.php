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
        
        <title> Inventario Coctelería "La Santísima" </title>
        <!-- ICON -->
        <link rel="icon" href="../../../inventario_santisima/views/assets/img/LogoCocteleria.ico">

        <!-- STYLES -->   
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../../../inventario_santisima/views/assets/css/styles.css" rel="stylesheet" />
        
        <!-- ICONS -->   
        <script src="https://kit.fontawesome.com/4afb0f7fd4.js" crossorigin="anonymous"></script>
        
        <!-- SCRIPTS -->   
        <script src="../../../inventario_santisima/views/assets/plugins/jquery/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

        <!-- Barra de Navegacion -->   
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <div class="row">
                <div class="col-5">
                    <img id="logoImg" src="../../../inventario_santisima/views/assets/img/LogoCocteleria.png" lefty="100px "alt="" width="40px" height="40px">
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

            <!-- BARRA DE NAVEGACION LATERAL -->   
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
                            <a class="nav-link" href="#">
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
                        <h1 class="mt-4">Reporte General</h1> <br>
                        
                        <!-- CARDS DE NAVEGACION -->
                        <div class="row">

                            <div class="container mt-3">
                                    <div class="card">
                                        <div class="card-header"> <h5 class="text-center"> Estadisticas Generales </h5> </div>
                                        <div class="card-body">
                                            <div class="row align-items-center justify-content-center text-center">

                                                <!-- Total Egresos -->
                                                <div   div class="col-xl-2 col-md-6 mb-4">
                                                <div class="card border-left-success shadow h-100 py-2 card bg-success text-black">
                                                    <div class="card-body">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col mr-2">
                                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-black text-center">
                                                                    Producto Mas Vendido </div>
                                                                <div class="h5 mb-0 font-weight-bold text-gray-800" class="text-center"><p id="productoMasVendido"></p></div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Total Egresos -->
                                            <div class="col-xl-2 col-md-6 mb-4">
                                                <div class="card border-left-success shadow h-100 py-2 card bg-warning text-black ">
                                                    <div class="card-body">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col mr-2">
                                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-black  text-center">
                                                                Producto Menos Vendido </div>
                                                                <div class="h5 mb-0 font-weight-bold text-gray-800" class="text-center"><p id="productoMenosVendido"></p></div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Total Egresos -->
                                            <div class="col-xl-2 col-md-6 mb-4">
                                                <div class="card border-left-success shadow h-100 py-2 card bg-danger text-black">
                                                    <div class="card-body">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col mr-2">
                                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-black  text-center">
                                                                    Total Egresos </div>
                                                                <div class="h5 mb-0 font-weight-bold text-gray-800" class="text-center"><p id="totalEgresos"></p></div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Total Ingresos -->
                                            <div class="col-xl-2 col-md-6 mb-4">
                                                <div class="card border-left-success shadow h-100 py-2 card bg-primary text-black">
                                                    <div class="card-body">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col mr-2">
                                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-black  text-center">
                                                                    Total Ingresos </div>
                                                                <div class="h5 mb-0 font-weight-bold text-gray-800"  class="text-center"><p id="totalIngresos"></p></div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Total Ingresos -->
                                            <div class="col-xl-2 col-md-6 mb-4">
                                                <div class="card border-left-success shadow h-100 py-2 card bg-info text-black">
                                                    <div class="card-body">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col mr-2">
                                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-black  text-center">
                                                                    Total </div>
                                                                <div class="h5 mb-0 font-weight-bold text-gray-800" class="text-center"><p id="total"></p></div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>

                            

                        </div>

                        <div class="row">
                            <div class="col-6">
                                
                                <div class="container mt-3">
                                    <div class="card">
                                        <div class="card-header"> <h4 class="text-center"> Productos Mas Vendidos </h4> </div>
                                        <div class="card-body">
                                            <canvas id="myChart" style="width:50%;max-width:900px;max-height:600px"></canvas>
                                        </div> 
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="container mt-3">
                                        <div class="card">
                                            <div class="card-header">  <h4 class="text-center"> Productos Menos Vendidos Vendidos </h4> </div>
                                            <div class="card-body">
                                                <canvas id="myChart_2" style="width:50%;max-width:900px;max-height:600px"></canvas>
                                            </div> 
                                        </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-6">
                                
                                <div class="container mt-3">
                                    <div class="card">
                                        <div class="card-header"> <h4 class="text-center"> Cantidad de Ventas Por Dia </h4> </div>
                                        <div class="card-body">
                                            <canvas id="myChart_3" style="width:50%;max-width:900px;max-height:600px"></canvas>
                                        </div> 
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="container mt-3">
                                        <div class="card">
                                            <div class="card-header">  <h4 class="text-center">  Valor de Ventas Por Dia </h4> </div>
                                            <div class="card-body">
                                                <canvas id="myChart_4" style="width:50%;max-width:900px;max-height:600px"></canvas>
                                            </div> 
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        
        <!-- Graficas -->
        <script>
            var barColors = ["#364F6B","#CCA8E9","#EA5455","#FED049","#6D9886","#404258","#B2B2B2","#1746A2","#8BBCCC","#7895B2","#C689C6"];
            new Chart("myChart", {
            type: "bar",
            data: {
                labels : [
                        <?php
                            $stmt = Connect::connectBd()-> prepare("SELECT s.cantidad,p.nombre, SUM(s.cantidad) AS totalCantidad FROM salida s INNER JOIN producto p ON p.id = s.producto_id GROUP BY s.producto_id ORDER BY s.cantidad DESC LIMIT 10"); 
                            $stmt->execute();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                            {?>
                                '<?php echo $row['nombre'] ?>' , 
                            <?php  } ?>
            ], 
            datasets: [{
                    backgroundColor: barColors,
                    data: 
                        <?php
                            $stmt = Connect::connectBd()-> prepare("SELECT s.cantidad,p.nombre, SUM(s.cantidad) AS totalCantidad FROM salida s INNER JOIN producto p ON p.id = s.producto_id GROUP BY s.producto_id ORDER BY s.cantidad DESC LIMIT 10"); 
                            $stmt->execute();
                        ?>
                            [<?php
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
                                { ?> 
                                <?php echo $row["totalCantidad"] ?> , <?php  
                                } 
                            ?>]
                }
            }
            );

            new Chart("myChart_2", {
            type: "bar",
            data: {
                labels : [
                        <?php
                            $stmt = Connect::connectBd()-> prepare("SELECT s.cantidad,p.nombre, SUM(s.cantidad) AS totalCantidad FROM salida s INNER JOIN producto p ON p.id = s.producto_id GROUP BY s.producto_id ORDER BY s.cantidad ASC LIMIT 10"); 
                            $stmt->execute();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                            {?>
                            '<?php echo $row['nombre'] ?>' , <?php  } ?>
            ], 
            datasets: [{
                    backgroundColor: barColors,
                    data:   
                        <?php
                            $stmt = Connect::connectBd()-> prepare("SELECT s.cantidad,p.nombre, SUM(s.cantidad) AS totalCantidad FROM salida s INNER JOIN producto p ON p.id = s.producto_id GROUP BY s.producto_id ORDER BY s.cantidad ASC LIMIT 10"); 
                            $stmt->execute();
                            ?>
                            [<?php
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
                                { ?> 
                                <?php echo $row["totalCantidad"] ?> , <?php  
                                } ?>]
                }
            }
            );
        </script>

        <script>
        
        new Chart("myChart_3", {
        type: "line",
        data: {
            labels : [
                    <?php
                        $stmt = Connect::connectBd()-> prepare("SELECT s.cantidad,s.fechaSalida, SUM(s.cantidad) AS totalCantidad FROM salida s  GROUP BY s.fechaSalida"); 
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                        {?>
                        '<?php echo $row['fechaSalida'] ?>' , <?php  } ?>
            ], 
            datasets: [{
            fill: false,
            lineTension: 0,
            backgroundColor: "rgba(0,0,255,1.0)",
            borderColor: "rgba(0,0,255,0.1)",
            data: <?php
                        $stmt = Connect::connectBd()-> prepare("SELECT s.cantidad,s.fechaSalida, SUM(s.cantidad) AS totalCantidad FROM salida s  GROUP BY s.fechaSalida"); 
                        $stmt->execute();
                        ?>
                        [<?php
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
                        { ?> 
                        <?php echo $row["totalCantidad"] ?> , <?php  
                        } 
                        ?>]
            }
        },
        );

        new Chart("myChart_4", {
        type: "line",
        data: {
            labels : [
                        <?php
                            $stmt = Connect::connectBd()-> prepare("SELECT s.cantidad,s.fechaSalida, SUM(s.cantidad) AS totalCantidad FROM salida s  GROUP BY s.fechaSalida"); 
                            $stmt->execute();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                            {?>
                            '<?php echo $row['fechaSalida'] ?>' , <?php  } ?>
            ], 
            datasets: [{
            fill: false,
            lineTension: 0,
            backgroundColor: "rgba(0,0,255,1.0)",
            borderColor: "rgba(0,0,255,0.1)",
            data: <?php
                        $stmt = Connect::connectBd()-> prepare("SELECT s.valorTotal,s.fechaSalida, SUM(s.valorTotal) AS totalValor FROM salida s  GROUP BY s.fechaSalida"); 
                        $stmt->execute();
                        ?>
                        [<?php
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
                            { ?> 
                            <?php echo $row["totalValor"] ?> , <?php  
                            } 
                        ?>]
            }
        },
        );

        </script>
                
        <!-- SCRIPTS FUNCIONALIDADES -->
        <script src="../../../inventario_santisima/views/assets/js/reporteScript.js"></script>
        
        <!-- FUNCION MOSTRAR TABLA INVENTARIO -->
        <script type="text/javascript">
            mostrarTotalIngresos();
            mostrarTotalEgresos();
            mostrarTotal();
            productomasVendido();
            productomenosVendido();
        </script>
        
    </body>
</html>