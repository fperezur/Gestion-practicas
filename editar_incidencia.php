<?php session_start();

include("./funciones.php");
check_session();
$id_incidencia = $_GET["id_incidencia"];
$id_empresa = $_GET["id_empresa"];

$incidencia = leer_incidencia($id_incidencia)[0];



?>
<!DOCTYPE html>
<html lang="en">
    <?php include("./head.php");?>
<body>

    <?php include("./header.php");?>

    <section class="container">
    <?php 
    if($_POST){
        
        update_incidencia($id_incidencia,$id_empresa, $_POST);
    }
    else{
        ?>

    <form id="editar_alumno" action="" method="POST">
        <div class="row">
            <div class="col-3">
                <label for="nombre">Fecha de la incidencia</label>
                <input class="form-control" type="date" name="fecha_incidencia" required value='<?php echo $incidencia["fecha_incidencia"];?>'>

            </div>
        </div>
        <div class="row>">
            <div class="col">
                <label for="direccion_alumno">
                    Incidencia
                </label>
                <textarea rows=10 class="form-control"  name="texto_incidencia"><?php echo $incidencia["texto_incidencia"];?></textarea>
            </div>
        </div>

       


        

      


        <input type="submit" value="Editar" class="btn btn-primary">
        
    </form>

        <?php } ?>


    </section>


    <script src="./js/scripts.js"  crossorigin="anonymous"></script>
</body>
</html>