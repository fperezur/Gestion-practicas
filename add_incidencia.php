<?php session_start();

include("./funciones.php");
check_session();
$id_empresa = $_GET["id_empresa"];

?>
<!DOCTYPE html>
<html lang="en">
    <?php include("./head.php");?>
<body>

    <?php include("./header.php");?>

    <section class="container">
    <?php 
    if($_POST){
        
        add_incidencia($id_empresa, $_POST);
    }
    else{
        ?>

    <form id="editar_alumno" action="" method="POST">
        <div class="row">
            <div class="col-3">
                <label for="nombre">Fecha de la incidencia</label>
                <input class="form-control" type="date" name="fecha_incidencia" required>

            </div>
        </div>
        <div class="row>">
            <div class="col">
                <label for="texto_incidencia">
                    Incidencia
                </label>
                <textarea rows=10 class="form-control"  name="texto_incidencia"></textarea>
            </div>
        </div>

       


        

      


        <input type="submit" value="Añadir" class="btn btn-primary">
        
    </form>

        <?php } ?>


    </section>


    <script src="./js/scripts.js"  crossorigin="anonymous"></script>
</body>
</html>