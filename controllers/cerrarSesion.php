<?php

    session_start();
    session_unset();
    session_destroy();

    header('location:../../../../inventario_santisima/views/modules/inicioSesion.php');
    
?>