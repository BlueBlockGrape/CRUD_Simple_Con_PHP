<?php

    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM tareas WHERE id = $id";
        $resultado = mysqli_query($conexion, $query);
        if(!$resultado){
            die("Fallo el query");
        }
        $_SESSION['mensaje'] = 'La tarea se ha eliminado';
        $_SESSION['tipo_mensaje'] = 'danger';
        header("Location: index.php");
    }

?>