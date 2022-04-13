<?php session_start();

include("./funciones.php");
check_session();
$id_empresa = $_GET["id_empresa"];
$empresa = leer_empresa($id_empresa)[0];

?>
<!DOCTYPE html>
<html lang="en">
    <?php include("./head.php");?>
<body>

    <?php include("./header.php");?>

    <section class="container">

    <h1>Editar empresa</h1>
    <?php 
    if($_POST){
        
        update_empresa($id_empresa, $_POST);
    }
    else{
        ?>

    <form id="editar_empresa" action="" method="POST">
        <div class="row">
            <div class="col">
                <label for="nombre_empresa">Nombre de la empresa</label>
                <input class="form-control" type="text" name="nombre_empresa" required value='<?php echo $empresa["nombre_empresa"];?>'>

            </div>
            <div class="col">
                <label for="direccion_empresa">Dirección de la empresa</label>
                <input class="form-control" type="text" name="direccion_empresa" value='<?php echo $empresa["direccion_empresa"];?>'>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="email_empresa">Email de la empresa</label>
                <input class="form-control" type="text" name="email_empresa" required value='<?php echo $empresa["email_empresa"];?>'>
            </div>

            <div class="col">
                <label for="telefono_empresa">Teléfono de la empresa</label>
                <input class="form-control" type="text" name="telefono_empresa" required value='<?php echo $empresa["telefono_empresa"];?>'>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="url_empresa">Url de la empresa</label>
                <input class="form-control" type="text" name="url_empresa" value='<?php echo $empresa["url_empresa"];?>'>
            </div>
            <div class="col">
                <label for="responsable_empresa">Responsable de la empresa</label>
                <input class="form-control" type="text" name="responsable_empresa" value='<?php echo $empresa["responsable_empresa"];?>'>
            </div>
        </div>  

        <div class="row">
            <div class="col">
                <label for="tutor_empresa">Tutor de la empresa</label>
                <input class="form-control" type="text" name="tutor_empresa" value='<?php echo $empresa["tutor_empresa"];?>'>
            </div>
            <div class="col">
                
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="convenio_estado">Estado del documento Convenio</label>
                <select class="form-select" name="convenio_estado">
                    <option 
                        value="Por enviar" 
                        <?php if($empresa["convenio_estado"] == "Por enviar") { echo "selected";} ?>>
                        Por enviar
                    </option>
                    <option 
                        value="Enviado"
                        <?php if($empresa["convenio_estado"] == "Enviado") { echo "selected";} ?>>
                    Enviado
                    </option>
                    <option 
                        value="Firmado"
                        <?php if($empresa["convenio_estado"] == "Firmado") { echo "selected";} ?>
                        >
                        Firmado
                    </option>
                </select>
            </div>
            <div class="col">
                <label for="anexo_1_estado">Estado del documento Anexo1</label>
                <select class="form-select" name="anexo_1_estado">
                    <option 
                        value="Por enviar" 
                        <?php if($empresa["anexo_1_estado"] == "Por enviar") { echo "selected";} ?>>
                        Por enviar
                    </option>
                    <option 
                        value="Enviado"
                        <?php if($empresa["anexo_1_estado"] == "Enviado") { echo "selected";} ?>>
                    Enviado
                    </option>
                    <option 
                        value="Firmado"
                        <?php if($empresa["anexo_1_estado"] == "Firmado") { echo "selected";} ?>
                        >
                        Firmado
                    </option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="anexo_8_estado">Estado del documento Anexo8</label>
                <select class="form-select" name="anexo_8_estado">
                    <option 
                        value="Por enviar" 
                        <?php if($empresa["anexo_8_estado"] == "Por enviar") { echo "selected";} ?>>
                        Por enviar
                    </option>
                    <option 
                        value="Enviado"
                        <?php if($empresa["anexo_8_estado"] == "Enviado") { echo "selected";} ?>>
                    Enviado
                    </option>
                    <option 
                        value="Firmado"
                        <?php if($empresa["anexo_8_estado"] == "Firmado") { echo "selected";} ?>
                        >
                        Firmado
                    </option>
                </select>
            </div>
            <div class="col">  
                <label for="rlt_estado">Estado del documento RLT</label>
                <select class="form-select" name="rlt_estado">
                    <option 
                        value="Por enviar" 
                        <?php if($empresa["rlt_estado"] == "Por enviar") { echo "selected";} ?>>
                        Por enviar
                    </option>
                    <option 
                        value="Enviado"
                        <?php if($empresa["rlt_estado"] == "Enviado") { echo "selected";} ?>>
                    Enviado
                    </option>
                    <option 
                        value="Firmado"
                        <?php if($empresa["rlt_estado"] == "Firmado") { echo "selected";} ?>
                        >
                        Firmado
                    </option>
                </select>
            </div>
        </div>
        <input type="submit" value="Editar" class="btn btn-primary">
        
    </form>

        <?php } ?>

        <!-- Alumnos asociados -->
        <div class="row">
            <div class="col">
                <h1 class="incidencia_title">Alumnos asociados</h1>
                
            </div>
        </div>

        <div class="row">
            <div class="col">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Fecha de inicio</th>
                        <th scope="col">Fecha de fin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                $alumnos_asociados = leer_alumno_empresa($id_empresa);
               foreach($alumnos_asociados as $alumno){
                   ?>
                   <tr>
                   <td><a href='editar_alumno.php?id_alumno=<?php echo $alumno['id_alumno'];?>'><?php echo $alumno["nombre"];?></a></td>
                   <td><?php echo $alumno["apellidos"];?></td>
                   <td><?php echo $alumno["fecha_inicio"];?></td>
                   <td><?php echo $alumno["fecha_fin"];?></td>
                   <td></td>
               </tr>
               <?php } ?>
                </tbody>
                <footer>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Fecha de inicio</th>
                        <th scope="col">Fecha de fin</th>
                    </tr>
                </thead>
            </table>
                
            </div>

        <!-- Incidencias -->
        <div class="row">
            <div class="col">
                <h1 class="incidencia_title">Incidencias</h1>
                <a href="add_incidencia.php" class="btn btn-success add_incidencia"><i class="bi bi-plus-circle"></i> Añadir incidencia</a>
      
            </div>
        </div>

        <div class="row">
            <div class="col">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                $incidencias = leer_incidencias($id_empresa);
               foreach($incidencias as $incidencia){
                   ?>
                   <tr>
                   <td><?php echo date("d-m-Y",(strtotime($incidencia["fecha_incidencia"])));?></td>
                   <td><?php echo substr($incidencia["texto_incidencia"],0,100) . "...";?></td>
                   <td></td>
               </tr>
               <?php } ?>
                </tbody>
                <footer>
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
            </table>
                
            </div>


    </section>


    <script src="./js/scripts.js"  crossorigin="anonymous"></script>
</body>
</html>