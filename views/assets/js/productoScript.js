

// Funcion Mostrar Lista Productos
function mostrarProducto(){
    
    console.log("Mostrar Productos Js");

    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/productoMostrarController.php",
        
        success:function(respuesta){
            //console.log("Respuesta Mostrar Producto : " + respuesta); 
            $('#tablaProducto').html(respuesta);
        }
    });
}


// Funcion Insertar Producto
function insertarProducto(){

    console.log("Ingresar Producto Js");

    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/productoInsertarController.php",
        data:$('#formInsertarProducto').serialize(),
        
        success:function(respuesta){
            console.log("Respuesta Insertar Producto : " + respuesta);
            mostrarProducto();

            if(respuesta == 1) {
                
                // Limpia el formulario 
                $('#formInsertarProducto')[0].reset();
                Swal.fire({
                    title: "Producto Registrado",
                    text: "El Producto ha sido registrado con exito",
                    icon: "success",
                    confirmButtonText: "Aceptar",
                });

            } else if(respuesta == 2) {
                
                // Limpia el formulario 
                $('#formInsertarProducto')[0].reset();
                Swal.fire({
                    title: "Error al Registrar",
                    text: "El producto que desea ingresar ya existe en el Inventario",
                    icon: "error",
                    confirmButtonText: "Aceptar",
                });
            }
        }
    });
    return false;
}


// Funcion Eliminar Producto
function eliminarProducto(id){
    
    console.log("Eliminar Producto Js");

    Swal.fire({
        title: " ¿ Desea eliminar este producto del Inventario ? ",
        text : " Una vez eliminado el producto no podra recuperarse ",
        icon:  "warning",
        showCancelButton: true,
        confirmButtonText: "Eliminar",
        cancelButtonText: "Cancelar",
    })

    .then(resultado  => {
        
        if(resultado.value){
            
            $.ajax({
                
                type: "POST",
                url: "../../../../inventario_santisima/controllers/productoEliminarController.php",
                data:"id=" + id,
                
                success:function(respuesta){
                    console.log("Respuesta Eliminar Producto : " + respuesta);
                    mostrarProducto();
    
                    if(respuesta == 1) {
                        
                        Swal.fire({
                            title: "Producto Eliminado",
                            text: "El Producto ha sido eliminado con exito",
                            icon: "success",
                            confirmButtonText: "Aceptar",
                        });
    
                    } else if(respuesta == 2) {
                        
                        Swal.fire({
                            title: "Error al Eliminar",
                            text: "No se puede eliminar un Producto que posee Pedidos o Salidas",
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


// Funcion Obtener Datos Producto
function obtenerDatosProducto(id){
    
    console.log("Obtener Datos Producto Js");

    $.ajax({
        
        type:"POST",
        data:"id="+id,
        url:"../../../../inventario_santisima/controllers/productoObtenerDatosController.php",
        
        success:function(respuesta){
            console.log("Respuesta Obtener Datos Producto : " + respuesta);

            respuesta=jQuery.parseJSON(respuesta);
            $('#id').val(respuesta['id']);
            $('#nombreUp').val(respuesta['nombre']);
            $('#descripcionUp').val(respuesta['descripcion']);
            $('#marcaUp').val(respuesta['marca']);
        }
    });
}


// Funcion Actualizar Producto
function actualizarProducto(){
    
    console.log("Actualizar Datos Producto Js");

    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/productoActualizarController.php",
        data:$('#formUptadeProducto').serialize(),
        
        success:function(respuesta){
            console.log("Respuesta Actualizar Datos Producto : " + respuesta);
            mostrarProducto();

            if(respuesta == 1) {
                
                Swal.fire({
                    title: "Producto Actualizado",
                    text: "Se han actualizdo los Datos del Producto",
                    icon: "success",
                    confirmButtonText: "Aceptar",
                });

            } else if(respuesta == 2) {
                
                
                Swal.fire({
                    title: "Error al Actualizar",
                    text: "El producto ya existe en el inventario",
                    icon: "error",
                    confirmButtonText: "Aceptar",
                });
            }

        }
    });
    return false;
}


// Funcion Ordenar  Producto A-Z
function ordenarNombreProductoAsc(){
    
    console.log("Ordenar Producto Asc Js");
    
    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/productoOrdenarController.php",
        data:{funcion: "1"},
        
        success:function(r){
            $('#tablaProducto').html(r);
        }
    });
}


// Funcion Ordenar  Producto Z-A
function ordenarNombreProductoDesc(){
    
    console.log("Ordenar Producto Desc Js");
    
    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/productoOrdenarController.php",
        data:{funcion: "2"},
        
        success:function(r){
            $('#tablaProducto').html(r);
        }
    });
}


// Funcion Ordenar  Producto Mas Recientes
function ordenarMasRecientesProducto(){
    
    console.log("Ordenar Producto Mas Recientes Js");
    
    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/productoOrdenarController.php",
        data:{funcion: "3"},
        
        success:function(r){
            $('#tablaProducto').html(r);
        }
    });
}


// Funcion Ordenar  Producto Mas Antiguos
function ordenarMasAntiguosProducto(){
    
    console.log("Ordenar Producto Mas Antiguos Js");
    
    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/productoOrdenarController.php",
        data:{funcion: "4"},
        
        success:function(r){
            $('#tablaProducto').html(r);
        }
    });
}
