<?php

    session_start();

    $conexion = mysqli_connect(
        'localhost:3307',
        'root',
        '',
        'crud_php'
    );

    /*if(isset($conexion)){
        echo 'Conexión correcta';
    }*/
?>