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
                <input type="text" name="nombre_empresa" required value='<?php echo $empresa["nombre_empresa"];?>'>

            </div>
            <div class="col">
                <label for="direccion_empresa">Dirección de la empresa</label>
                <input type="text" name="direccion_empresa" value='<?php echo $empresa["direccion_empresa"];?>'>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="email_empresa">Email de la empresa</label>
                <input type="text" name="email_empresa" required value='<?php echo $empresa["email_empresa"];?>'>
            </div>

            <div class="col">
                <label for="telefono_empresa">Teléfono de la empresa</label>
                <input type="text" name="telefono_empresa" required value='<?php echo $empresa["telefono_empresa"];?>'>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="url_empresa">Url de la empresa</label>
                <input type="text" name="url_empresa" value='<?php echo $empresa["url_empresa"];?>'>
            </div>
            <div class="col">
                <label for="responsable_empresa">Responsable de la empresa</label>
                <input type="text" name="responsable_empresa" value='<?php echo $empresa["responsable_empresa"];?>'>
            </div>
        </div>  

        <div class="row">
            <div class="col">
                <label for="tutor_empresa">Tutor de la empresa</label>
                <input type="text" name="tutor_empresa" value='<?php echo $empresa["tutor_empresa"];?>'>
            </div>
            <div class="col">
                
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="convenio_estado">Estado del documento Convenio</label>
                <select name="convenio_estado">
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
                <select name="anexo_1_estado">
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
                <select name="anexo_8_estado">
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
                <select name="rlt_estado">
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


    </section>


    <script src="./js/scripts.js"  crossorigin="anonymous"></script>
</body>
</html>