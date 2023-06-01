

// Funcion Mostrar Listado Ciudad
function mostrarCiudad(){

    console.log("Mostrar Ciudad Js");

    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/ciudadMostrarController.php",
        data:{funcion: "1"},
        
        success:function(respuesta){
            //console.log("Respuesta Mostrar Ciudad : " + respuesta); 
            $('#tablaCiudad').html(respuesta);
        }
    });
}


// Funcion Insertar Ciudad
function insertarCiudad(){

    console.log("Insertar Ciudad Js");

    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/ciudadInsertarController.php",
        data:$('#formInsertarCiudad').serialize(),
        
        success:function(respuesta){
            mostrarCiudad();
            console.log("Respuesta Insertar Ciudad : " + respuesta);
            
            if(respuesta == 1) {
                
                // Limpia el formulario 
                $('#formInsertarCiudad')[0].reset();
                Swal.fire({
                    title: "Ciudad Registrada",
                    text: "La ciudad ha sido registrada con exito",
                    icon: "success",
                    confirmButtonText: "Aceptar",
                });

            } else if(respuesta == 2) {
                
                // Limpia el formulario 
                $('#formInsertarCiudad')[0].reset();
                Swal.fire({
                    title: "Error al Registrar",
                    text: "La ciudad que desea ingresar ya existe en el Inventario",
                    icon: "error",
                    confirmButtonText: "Aceptar",
                });
            }
        }
    });
    return false;
}


// Funcion Eliminar Producto
function eliminarCiudad(id){

    console.log("Eliminar Datos Ciudad Js");
    
    Swal.fire({
        title: " ¿ Desea eliminar esta ciudad del Inventario ? ",
        text : " Una vez eliminado la ciudad no podra recuperarse ",
        icon:  "warning",
        showCancelButton: true,
        confirmButtonText: "Eliminar",
        cancelButtonText: "Cancelar",
    })

    .then(resultado  => {
        
        if(resultado.value){
            
            $.ajax({
                
                type: "POST",
                url: "../../../../inventario_santisima/controllers/ciudadEliminarController.php",
                data:"id=" + id,
                
                success:function(respuesta){
                    console.log("Respuesta Eliminar Ciudad : " + respuesta);
                    mostrarCiudad();
    
                    if(respuesta == 1) {
                        
                        Swal.fire({
                            title: "Ciudad Eliminada",
                            text: "La ciudad ha sido eliminada con exito",
                            icon: "success",
                            confirmButtonText: "Aceptar",
                        });
    
                    } else if(respuesta == 2) {
                        
                        Swal.fire({
                            title: "Error al Eliminar",
                            text: "No se puede eliminar una Ciudad que este asociada a un Proveedor",
                            icon: "error",
                            confirmButtonText: "Aceptar",
                        });
                    }
                }
            });
    
        } else {

        }
    });
}


// Funcion Obtener Datos  Ciudad
function obtenerDatosCiudad(id){
    
    console.log("Obtener Datos Ciudad Js");

    $.ajax({

        type:"POST",
        data:"id="+id,
        url:"../../../../inventario_santisima/controllers/ciudadObtenerDatosController.php",
        
        success:function(respuesta){
            console.log("Respuesta Obtener Datos Ciudad : " + respuesta);

            respuesta=jQuery.parseJSON(respuesta);
            $('#idUp').val(respuesta['id']);
            $('#nombreUp').val(respuesta['nombre']);
        }
    });
}


// Funcion Actualizar Datos Ciudad
function actualizarCiudad(){
    
    console.log("Actualizar Datos Ciudad Js");

    $.ajax({

        type:"POST",
        url:"../../../../inventario_santisima/controllers/ciudadActualizarController.php",
        data:$('#formUptadeCiudad').serialize(),
        
        success:function(respuesta){
            console.log("Respuesta Actualizar Datos Ciudad : " + respuesta);
            mostrarCiudad();

            if(respuesta == 1) {
                        
                Swal.fire({
                    title: "Ciudad Actualizada",
                    text: "Se han actualizado los Datos de Ciudad",
                    icon: "success",
                    confirmButtonText: "Aceptar",
                });

            } else if(respuesta == 2) {
                
                Swal.fire({
                    title: "Error al Actualizar",
                    text: "La ciudad ya existe en el inventario",
                    icon: "error",
                    confirmButtonText: "Aceptar",
                });
            }
        }
    });
    return false;
}



// Funcion Ordenar Nombre Ciudad A-Z
function ordenarNombreCiudadAsc(){
    
    console.log("Ordenar Ciudad Asc Js");
    
    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/ciudadOrdenarController.php",
        data:{funcion: "1"},
        
        success:function(r){
            $('#tablaCiudad').html(r);
        }
    });
}


// Funcion Ordenar Ciudad Producto Z-A
function ordenarNombreCiudadDesc(){
    
    console.log("Ordenar Ciudad Desc Js");
    
    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/ciudadOrdenarController.php",
        data:{funcion: "2"},
        
        success:function(r){
            $('#tablaCiudad').html(r);
        }
    });
}


// Funcion Ordenar Ciudad Mas Recientes
function ordenarMasRecientesCiudad(){
    
    console.log("Ordenar Ciudad Mas Recientes Js");
    
    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/ciudadOrdenarController.php",
        data:{funcion: "3"},
        
        success:function(r){
            $('#tablaCiudad').html(r);
        }
    });
}


// Funcion Ordenar Ciudad Mas Antiguos
function ordenarMasAntiguosCiudad(){
    
    console.log("Ordenar Ciudad Mas Antiguos Js");
    
    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/ciudadOrdenarController.php",
        data:{funcion: "4"},
        
        success:function(r){
            $('#tablaCiudad').html(r);
        }
    });
}
