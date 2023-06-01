

// Funcion mostrar lista Pedidos
function mostrarPedido(){

    console.log("Mostar Pedido Js");

    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/pedidoMostrarController.php",
        data:{funcion: "1"},
        
        success:function(r){
            //console.log("Respuesta Mostrar Producto : " + respuesta); 
            $('#tablaPedido').html(r);
        }
    });
}


// Funcion Insertar Pedido
function insertarPedido(){

    console.log("Ingresar Pedido Js");

    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/pedidoInsertarController.php",
        data:$('#formInsertarPedido').serialize(),
        
        success:function(respuesta){
            console.log("Respuesta Insertar Pedido : " + respuesta);
            mostrarPedido();

            if(respuesta == 1) {
                
                // Limpia el formulario 
                $('#formInsertarPedido')[0].reset();
                Swal.fire({
                    title: "Pedido Registrado",
                    text: "El Pedido ha sido registrado con exito",
                    icon: "success",
                    confirmButtonText: "Aceptar",
                });

            } else if(respuesta == 2) {
                
                // Limpia el formulario 
                $('#formInsertarPedido')[0].reset();
                Swal.fire({
                    title: "Error al Registrar",
                    text: "El pedido que desea ingresar no he a podido Registrar",
                    icon: "error",
                    confirmButtonText: "Aceptar",
                });
            }
        }
    });
    return false;
}

// Funcion Eliminar Producto
function eliminarPedido(id){

    console.log("Eliminar Pedido Js");
    
    Swal.fire({
        title: " ¿ Desea eliminar este pedido del Inventario ? ",
        text : " Una vez eliminado el pedido no podra recuperarse ",
        icon:  "warning",
        showCancelButton: true,
        confirmButtonText: "Eliminar",
        cancelButtonText: "Cancelar",
    })

    .then(resultado  => {
        
        if(resultado.value){
            
            $.ajax({
                
                type: "POST",
                url: "../../../../inventario_santisima/controllers/pedidoEliminarController.php",
                data:"id=" + id,
                
                success:function(respuesta){
                    console.log("Respuesta Eliminar Producto : " + respuesta);
                    mostrarPedido();
    
                    if(respuesta == 1) {
                        
                        Swal.fire({
                            title: "Pedido Eliminado",
                            text: "El Pedido ha sido eliminado con exito",
                            icon: "success",
                            confirmButtonText: "Aceptar",
                        });
    
                    } else if(respuesta == 2) {
                        
                        Swal.fire({
                            title: "Error al Eliminar",
                            text: "No se ha podido Eliminar el Pedido del Inventario",
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


// Funcion Obtener Datos Pedido
function obtenerDatosPedido(id){
    
    console.log("Obtener Datos Pedido Js");

    $.ajax({
        
        type:"POST",
        data:"id="+id,
        url:"../../../../inventario_santisima/controllers/pedidoObtenerDatosController.php",
        
        success:function(respuesta){
            console.log("Respuesta Obtener Datos Pedido : " + respuesta);

            respuesta=jQuery.parseJSON(respuesta);
            $('#idUp').val(respuesta['id']);
            $('#productoSelectUp').val(respuesta['producto_id']);
            $('#proveedorSelectUp').val(respuesta['proveedor_id']);
            $('#cantidadUp').val(respuesta['cantidad']);
            $('#fechaIngresoUp').val(respuesta['fechaIngreso']);
            $('#valorUnitarioUp').val(respuesta['valorUnitario']);
        }
    });
}


// Funcion Actualizar Datos
function actualizarPedido(){
    
    console.log("Actualizar Datos Pedido Js");

    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/pedidoActualizarController.php",
        data:$('#formUpdatePedido').serialize(),
        
        success:function(respuesta){
            console.log("Respuesta Actualizar Datos Pedido : " + respuesta);
            mostrarPedido();

            if(respuesta == 1) {
                        
                Swal.fire({
                    title: "Pedido Actualizado",
                    text: "Se han actualizado los Datos del Pedido",
                    icon: "success",
                    confirmButtonText: "Aceptar",
                });

            } else if(respuesta == 2) {
                
                Swal.fire({
                    title: "Error al Actualizar",
                    text: "No se ha podido actualizar la informacion del Pedido",
                    icon: "error",
                    confirmButtonText: "Aceptar",
                });
            }

        }
    });
    return false;
}


// Funcion Ordenar Pedido Mas Recientes
function ordenarMasRecientesPedidos(){

    console.log("Ordenar Mas Recientes Pedido");

    $.ajax({
        type:"POST",
        url:"../../../../inventario_santisima/controllers/pedidoOrdenarController.php",
        data:{funcion: "1"},
        
        success:function(r){
            $('#tablaPedido').html(r);
        }
    });
}


// Funcion Ordenar Pedido Mas Antiugos
function ordenarMasAntiguosPedidos(){

    console.log("Ordenar Mas Antiugos Pedido");

    $.ajax({
        type:"POST",
        url:"../../../../inventario_santisima/controllers/pedidoOrdenarController.php",
        data:{funcion: "2"},
        
        success:function(r){
            $('#tablaPedido').html(r);
        }
    });
}


// Funcion Ordenar Pedido Max Cantidad
function ordenarMaxCantidadPedidos(){

    console.log("Ordenar Min Cantidad Pedido");

    $.ajax({
        type:"POST",
        url:"../../../../inventario_santisima/controllers/pedidoOrdenarController.php",
        data:{funcion: "3"},
        
        success:function(r){
            $('#tablaPedido').html(r);
        }
    });
}


// Funcion Ordenar Pedido Min Cantidad
function ordenarMinCantidadPedidos(){

    console.log("Ordenar Min Cantidad Pedido");

    $.ajax({       
        type:"POST",
        url:"../../../../inventario_santisima/controllers/pedidoOrdenarController.php",
        data:{funcion: "4"},
        
        success:function(r){
            $('#tablaPedido').html(r);
        }
    });
}

// Funcion Ordenar Pedido Max Valor Unitario
function ordenarMaxValorUnidadPedidos(){

    console.log("Ordenar Max Valor Unitario Pedido");

    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/pedidoOrdenarController.php",
        data:{funcion: "5"},
        
        success:function(r){
            $('#tablaPedido').html(r);
        }
    });
}


// Funcion Ordenar Pedido Min Valor Unitario
function ordenarMinValorUnidadPedidos(){
    
    console.log("Ordenar Min Valor Unitario Pedido");
    
    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/pedidoOrdenarController.php",
        data:{funcion: "6"},
        
        success:function(r){
            $('#tablaPedido').html(r);
        }
    });
}


// Funcion Ordenar Pedido Max Valor Total
function ordenarMaxValorPedidos(){
    
    console.log("Ordenar Max Valor Pedido");
    
    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/pedidoOrdenarController.php",
        data:{funcion: "7"},
        
        success:function(r){
            $('#tablaPedido').html(r);
        }
    });
}


// Funcion Ordenar Pedido Min Valor Total
function ordenarMinValorPedidos(){
    
    console.log("Ordenar Min Valor Pedido");
    
    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/pedidoOrdenarController.php",
        data:{funcion: "8"},
        
        success:function(r){
            $('#tablaPedido').html(r);
        }
    });
}

// Funcion Generar Reporte Fechas
function generarReportePedido(){
    
    console.log("Generar Reporte Pedidos");
    
    $.ajax({
        type:"GET",
        url:"../../../../inventario_santisima/controllers/pedidoReporte.php",
        data:$('#formGenerarPedido').serialize(),

        success:function(respuesta){
        
        }
    });

}