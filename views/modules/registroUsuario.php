<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        
        <title> Inventario -Registrar Usuario </title>
        
        <!-- Styles -->
        <link href="../../../inventario_santisima/views/assets/css/styles.css" rel="stylesheet" />
        
        <!-- Icon -->
        <link rel="icon" href="../../../inventario_santisima/views/assets/img/Logosantisima.ico">
        
        <!-- Scripts -->
        <script src="../../../inventario_santisima/views/assets/plugins/jquery/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <!-- Style -->
        <style type="text/css">
                body { 
                    background-image: url('../../../inventario_santisima/views/assets/img/Background.jpg');
                    height : 100%;
                }
        </style>
    </head>

    <body class="bg-primary">

        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                
                <main>

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4"> Crear Cuenta </h3>
                                    </div>
                                    
                                    <div class="card-body">
                                        
                                        <form id="formRegistrarUsuario" onsubmit="return registrarUsuario()" method="POST">
                                            
                                            <label for="nombre">Nombre de Usuario</label>
                                            <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Ej . alguien" />
                                            
                                            <label for="telefono">Telefono</label>   
                                            <input class="form-control" id="telefono" name="telefono" type="text" placeholder="Ej. 3*********" maxlength="10" onkeypress='return validaNumericos(event)'/>
                                            
                                            <label for="correoElectronico">Correo Electronico</label>   
                                            <input class="form-control" id="correoElectronico" name="correoElectronico" type="email" placeholder="Ej. alguien@gmail.com" />
                                            
                                            <label for="password">Contraseña</label>  
                                            <input class="form-control" id="password" name="password"  type="password" placeholder="Ej. Asdf1234" />

                                            <br>

                                            <label> Cargo : </label>
                                                <select name="rol" id="">                    
                                                    <option value="0"> Seleccione el cargo </option>                     
                                                        <?php 
                                                            include("../../../inventario_santisima/models/connection.php");

                                                            $stmt = Connect::connectBd()-> prepare("SELECT * FROM rol");
                                                            $stmt->execute();
                                                            $datos = $stmt->fetchAll();
                                                                foreach ($datos as $valores) {
                                                                    echo  ('<option value="'.$valores['id'].'">'.$valores['nombreRol'].'</>') ;
                                                                }
                                                        ?>
                                                </select>
                                            <br>
                                            <br>

                                            <input class="container-fluid" type="submit" value="Registrar Usuario">

                                        </form>
                                    </div>

                                    <div class="card-footer text-center py-3">
                                        <div class="small"> <a class="btn btn-primary" href="../../../inventario_santisima/views/modules/inicioSesion.php"> ¿Tienes una cuenta? Inicia Sesion</a></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../../inventario_santisima/views/assets/js/usuarioScript.js"></script>
        <script src="../../../inventario_santisima/views/assets/js/validaciones.js"></script>

    </body>
</html>
