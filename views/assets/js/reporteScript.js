
function mostrarTotalIngresos(){
    
    console.log("Mostrar Total Ingreso Js");

    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/reporteEstadisticasController.php",
        data:{funcion: "1"},

        success:function(respuesta){
            //console.log("Respuesta Mostrar Producto : " + respuesta); 
            $('#totalIngresos').html(respuesta);
        }
    });
}

function mostrarTotalEgresos(){
    
    console.log("Mostrar Total Egreso Js");

    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/reporteEstadisticasController.php",
        data:{funcion: "2"},

        success:function(respuesta){
            //console.log("Respuesta Mostrar Producto : " + respuesta); 
            $('#totalEgresos').html(respuesta);
        }
    });
}


function mostrarTotal(){
    
    console.log("Mostrar Total Egreso Js");

    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/reporteEstadisticasController.php",
        data:{funcion: "3"},

        success:function(respuesta){
            //console.log("Respuesta Mostrar Producto : " + respuesta); 
            $('#total').html(respuesta);
        }
    });
}



function productomasVendido(){
    
    console.log("Mostrar Total Egreso Js");

    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/reporteEstadisticasController.php",
        data:{funcion: "4"},

        success:function(respuesta){
            //console.log("Respuesta Mostrar Producto : " + respuesta); 
            $('#productoMasVendido').html(respuesta);
        }
    });
}



function productomenosVendido(){
    
    console.log("Mostrar Total Egreso Js");

    $.ajax({
        
        type:"POST",
        url:"../../../../inventario_santisima/controllers/reporteEstadisticasController.php",
        data:{funcion: "5"},

        success:function(respuesta){
            //console.log("Respuesta Mostrar Producto : " + respuesta); 
            $('#productoMenosVendido').html(respuesta);
        }
    });
}