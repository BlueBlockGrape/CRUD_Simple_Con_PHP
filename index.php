<?php
    include("db.php")
?>
<?php
    include("includes/header.php")
?>
<?php
    include("includes/nav.php")
?>


    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                <?php if(isset($_SESSION['mensaje'])){ ?>
                    <div class="alert alert-<?= $_SESSION['tipo_mensaje']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['mensaje'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php session_unset(); } ?>
                <div class="card card-body">
                    <form action="guardar_tareas.php" method="POST">
                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input type="text" name="title" class="form-control"
                            placeholder="Titulo Tarea" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea name="description" rows="3" class="form-control"
                            placeholder="Descripcion tarea"></textarea>
                        </div>
                        <input type="submit" class="btn btn-success btn-block"
                        name="save_task" value="Guardar">
                    </form>
                </div>
            </div>
            <div class"col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripción</th>
                            <th>Fecha de Creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM tareas";
                            $todaInformacion = mysqli_query($conexion, $query);
                            while($row = mysqli_fetch_array($todaInformacion)){ ?>

                                <tr>
                                    <td><?php echo $row['titulo'] ?></td>
                                    <td><?php echo $row['descripcion'] ?></td>
                                    <td><?php echo $row['fecha_creacion'] ?></td>
                                    <td>
                                        <a href="editar_tareas.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary"> <i class="fas fa-marker"></i> </a>
                                        <a href="eliminar_tareas.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"> <i class="far fa-trash-alt"></i> </a>
                                    </td>
                                </tr>

                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


<?php
    include("includes/footer.php")
?> 