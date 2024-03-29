<?php session_start();

include("./funciones.php");
check_session();
$id_alumno = $_GET["id_alumno"];
$alumno = leer_alumno($id_alumno)[0];
$empresas = leer_empresas();
$empresa_asociada = leer_empresa_alumno($id_alumno)[0];
if(isset($empresa_asociada["id_empresa"])){
    $id_empresa_asociada = $empresa_asociada["id_empresa"];
    $tutor = $empresa_asociada["tutor_empresa"];
    $fecha_inicio = $empresa_asociada["fecha_inicio"];
    $fecha_fin = $empresa_asociada["fecha_fin"];
    
}
else{
    $id_empresa_asociada = "";
    $tutor = "";
}

?>
<!DOCTYPE html>
<html lang="en">
    <?php include("./head.php");?>
<body>

    <?php include("./header.php");?>

    <section class="container">
    <?php 
    if($_POST){
        
        update_alumno($id_alumno, $_POST);
    }
    else{
        ?>

    <form id="editar_alumno" action="" method="POST">
        <div class="row">
            <div class="col">
                <label for="nombre">Nombre</label>
                <input class="form-control" type="text" name="nombre" required value='<?php echo $alumno["nombre"];?>'>

            </div>
            <div class="col">
                <label for="direccion_alumno">
                    Apellidos
                </label>
                <input class="form-control" type="text" name="apellidos" value='<?php echo $alumno["apellidos"];?>'>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="dni">DNI</label>
                <input class="form-control" type="text" name="dni" required value='<?php echo $alumno["dni"];?>'>
            </div>

            <div class="col">
                <label for="telefono">Teléfono de la alumno</label>
                <input class="form-control" type="text" name="telefono" required value='<?php echo $alumno["telefono"];?>'>
            </div>
        </div>


        <div class="row">

        <div class="col">
        <label for="Empresa asociada">Empresa Asociada</label>
                <select class="form-select" name="empresa_asociada" id="empresa_asociada" onchange="leer_tutor();">
                    <option value="">Selecciona una empresa</option>
                    <?php foreach($empresas as $empresa){?>
                    <option 
                        value="<?php echo $empresa["id_empresa"];?>"
                        <?php if($empresa["id_empresa"] == $id_empresa_asociada){?>
                            selected
                            <?php }?>
                        > 
                        <?php echo $empresa["nombre_empresa"];?>
                    </option>
                    <?php }?> 
                </select>
            </div>
            <div class="col">
                <label for="tutor_empresa">Tutor de la empresa</label>
                <input class="form-control" type="text" name="tutor_empresa" id="tutor_empresa" value='<?php echo $tutor;?>' disabled>
            </div>
            
        </div>

        <div class="row" id="fechas_practicas" style="display:<?php if($tutor != ''){ echo 'flex'; } else {echo 'none';}?>;">
            <div class="col">
                <label for="fecha_inicio">Fecha de inicio</label>
                <input class="form-control" type="date" name="fecha_inicio" id="fecha_inicio" value='<?php echo $fecha_inicio;?>'>
            </div>

            <div class="col">
                <label for="fecha_fin">Fecha de fin</label>
                <input class="form-control" type="date" name="fecha_fin" id="fecha_fin" value='<?php echo $fecha_fin;?>'>
            </div>
        </div>


        <input type="submit" value="Editar" class="btn btn-primary">
        
    </form>

        <?php } ?>


    </section>


    <script src="./js/scripts.js"  crossorigin="anonymous"></script>
</body>
</html>