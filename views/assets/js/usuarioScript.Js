
// Funcion Iniciar Sesion
function iniciarSesion(){

    console.log("Iniciar Sesion Js");

    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/usuarioIniciarSesion.php",
        data:$('#formInicioSesion').serialize(),

        success:function(respuesta){
            console.log("Respuesta Inciar Sesion : " + respuesta);

            if(respuesta == 1) {

                $('#formInicioSesion')[0].reset();
                window.location.assign("../../../../inventario_santisima/views/template.php");

            } else if(respuesta == 2) {
                
                $('#formInicioSesion')[0].reset();
                Swal.fire({
                    title: "Error",
                    text: "Las Credenciales del Nombre de Usuario y Contraseña son Incorrectas",
                    icon: "error",
                    confirmButtonText: "Aceptar",
                });
            }
        }
        
    });
    return false;
}


// Funcion Registrar Usuario
function registrarUsuario(){

    console.log("Registrar Usuario Js");

    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/usuarioRegistrar.php",
        data:$('#formRegistrarUsuario').serialize(),

        success:function(respuesta){

            console.log("Respuesta Insertar Usuario : " + respuesta);

            if(respuesta == 1) {
                
                // Limpia el formulario 
                $('#formRegistrarUsuario')[0].reset();
                Swal.fire({
                    title: "Usuario Registrado",
                    text: "El Usuario ha sido registrado con exito",
                    icon: "success",
                    confirmButtonText: "Aceptar",

                });
                //window.location.assign("../../../../Inventario_Ferreteria/views/modules/inicioSesion.php");
            } else if(respuesta == 2) {
                
                Swal.fire({
                    title: "Error",
                    text: "El Nombre de Usuario ya esta registrado",
                    icon: "error",
                    confirmButtonText: "Aceptar",
                });
            }
        }
    });
    return false;
}

