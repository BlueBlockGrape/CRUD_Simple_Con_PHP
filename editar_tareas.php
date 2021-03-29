<?php

    include("db.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM tareas WHERE id = $id";
        $resultado = mysqli_query($conexion, $query);
        if (mysqli_num_rows($resultado) == 1){
            $row = mysqli_fetch_array($resultado);
            $titulo = $row['titulo'];
            $descripcion = $row['descripcion'];
        }
    }


    if(isset($_POST['editar'])){
        $id = $_GET['id'];
        $titulo = $_POST['title'];
        $descripcion = $_POST['description'];

        $query = "UPDATE tareas set titulo = '$titulo', descripcion='$descripcion' WHERE id = $id";

        mysqli_query($conexion, $query);

        $_SESSION['mensaje'] = 'Tarea actualizada';
        $_SESSION['tipo_mensaje'] = 'secondary';

        header("Location: index.php");
    }

?>

<?php include("includes/header.php"); ?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="editar_tareas.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input type="text" name="title" value="<?php echo $titulo ?>" 
                            class="form-control" placeholder="Actualizar titulo">
                        </div>
                        <div class="form-group">
                            <textarea name="description"  rows="3" class="form-control" placeholder="Pon una descripción"><?php echo $descripcion ?></textarea>
                        </div>
                        <button class="btn btn-success" name="editar">
                            editar
                        </button>
                    </form>
                </div>
            </div>
    </div>

<?php include("includes/footer.php"); ?>