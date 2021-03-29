<?php

    include("db.php");

    if (isset($_POST['save_task'])){
            $titulo = $_POST['title'];
            $descripcion = $_POST['description'];

           $query = "INSERT INTO tareas(titulo, descripcion) VALUES ('$titulo', '$descripcion')"; 
           $resultado = mysqli_query($conexion, $query);
           if(!$resultado){
               die("Falló el Query");
           }
            $_SESSION['mensaje'] = 'Tarea Guardada';
            $_SESSION['tipo_mensaje'] = 'info';

            header("Location: index.php");
           
    }

?>