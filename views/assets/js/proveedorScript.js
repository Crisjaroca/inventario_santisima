

// Funcion mostrar lista de productos
function mostrarProveedor(){

    console.log("Mostrar Proveedores Js");

    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/proveedorMostrarController.php",
        data:{funcion: "1"},
        
        success:function(respuesta){
            //console.log("Respuesta Mostrar Proveedor : " + respuesta);
            $('#tablaProveedor').html(respuesta);
        }
    });
}


// Funcion Insertar Producto
function insertarProveedor(){

    console.log("Insertar Proveedores Js");

    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/proveedorInsertarController.php",
        data:$('#formInsertarProveedor').serialize(),
        
        success:function(respuesta){
            
            console.log("Respuesta Insertar Proveedor : " + respuesta);
            mostrarProveedor();
            
            if(respuesta == 1) {
                
                // Limpia el formulario 
                $('#formInsertarProveedor')[0].reset();
                Swal.fire({
                    title: "Proveedor Registrado",
                    text: "El Proveedor ha sido registrado con exito",
                    icon: "success",
                    confirmButtonText: "Aceptar",
                });

            } else if(respuesta == 2) {
                
                // Limpia el formulario 
                $('#formInsertarProveedor')[0].reset();
                Swal.fire({
                    title: "Error al Registrar",
                    text: "El proveedor que desea ingresar ya existe en el Inventario",
                    icon: "error",
                    confirmButtonText: "Aceptar",
                });
            }
        }
    });
    return false;
}


// Funcion Eliminar Producto
function eliminarProveedor(id){

    console.log("Eliminar Proveedor Js");

    Swal.fire({
        title: "¿ Desea eliminar este Proveedor del Inventario ?",
        text : "Una vez eliminado el Proveedor no podra recuperarse",
        icon:  "warning",
        showCancelButton: true,
        confirmButtonText: "Eliminar",
        cancelButtonText: "Cancelar",
    })

    .then(resultado  => {
        
        if(resultado.value){
            
            $.ajax({
                
                type: "POST",
                url: "../../../../inventario_santisima/controllers/proveedorEliminarController.php",
                data:"id=" + id,
                
                success:function(respuesta){
                    console.log("Respuesta Eliminar Proveedor : " + respuesta);
                    mostrarProveedor()
    
                    if(respuesta == 1) {
                        
                        Swal.fire({
                            title: "Proveedor Eliminado",
                            text: "El Proveedor ha sido eliminado con exito",
                            icon: "success",
                            confirmButtonText: "Aceptar",
                        });
    
                    } else if(respuesta == 2) {
                        
                        Swal.fire({
                            title: "Error al Eliminar",
                            text: "No se puede eliminar un Proveedor que este asociada a un Pedido",
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


// Funcion Obtener  Proveedor
function obtenerDatosProveedor(id){

    console.log("Obtener Datos Proveedor Js");

    $.ajax({

        type:"POST",
        data:"id="+id,
        url:"../../../../inventario_santisima/controllers/proveedorObtenerDatosController.php",
        
        success:function(respuesta){

            respuesta=jQuery.parseJSON(respuesta);
            $('#idUp').val(respuesta['id']);
            $('#nombreUp').val(respuesta['nombreProveedor']);
            $('#direccionUp').val(respuesta['direccion']);
            $('#correoElectronicoUp').val(respuesta['correoElectronico']);
            $('#telefonoUp').val(respuesta['telefono']);
            $('#ciudadSelectUp').val(respuesta['ciudad_id']);
        }
    });
}


// Funcion Actualizar Proveedor
function actualizarProveedor(){
    
    console.log("Actualizar Datos Proveedor Js");

    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/proveedorActualizarController.php",
        data:$('#formUpdateProveedor').serialize(),
        
        success:function(respuesta){
            console.log("Respuesta Actualizar Datos Proveedor : " + respuesta);
            mostrarProveedor();

            if(respuesta == 1) {
                        
                Swal.fire({
                    title: "Proveedor Actualizado",
                    text: "Se han actualizdo los Datos del Proveedor",
                    icon: "success",
                    confirmButtonText: "Aceptar",
                });

            } else if(respuesta == 2) {
                
                Swal.fire({
                    title: "Error al Actualizar",
                    text: "El Proveedor ya existe en el inventario",
                    icon: "error",
                    confirmButtonText: "Aceptar",
                });
            }

        }
    });
    return false;
}


// Funcion Ordenar Proveedor Nombre A-Z
function ordenarNombreProveedorAsc(){

    console.log("Ordenar Proveedor Nombre A-Z");

    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/proveedorOrdenarController.php",
        data:{funcion: "1"},
        
        success:function(r){
            $('#tablaProveedor').html(r);
        }
    });
}


// Funcion Ordenar Proveedor Nombre Z-A
function ordenarNombreProveedorDesc(){

    console.log("Ordenar Proveedor Nombre Z-A");

    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/proveedorOrdenarController.php",
        data:{funcion: "2"},
        
        success:function(r){
            $('#tablaProveedor').html(r);
        }
    });
}


// Funcion Ordenar Proveedor Mas Recientes
function ordenarMasRecienteProveedor(){

    console.log("Ordenar Proveedor Mas Recientes");

    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/proveedorOrdenarController.php",
        data:{funcion: "3"},
        
        success:function(r){
            $('#tablaProveedor').html(r);
        }
    });
}


// Funcion Ordenar Proveedor Mas Antiguos
function ordenarMasAntiguoProveedor(){
    
    console.log("Ordenar Proveedor Mas Antiguos");
    
    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/proveedorOrdenarController.php",
        data:{funcion: "4"},
        
        success:function(r){
            $('#tablaProveedor').html(r);
        }
    });
}
