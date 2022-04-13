<?php session_start();

include("./funciones.php");
check_session();
?>
<!DOCTYPE html>
<html lang="en">
    <?php include("./head.php");?>
<body>

    <?php include("./header.php");?>

    <section class="container">
    <?php 
    if($_POST){
        
        add_empresa($_POST);
    }
    else{
        ?>

    <form id="add_empresa" action="" method="POST">
        <div class="row">
            <div class="col">
                <label for="nombre_empresa">Nombre de la empresa</label>
                <input class="form-control" type="text" name="nombre_empresa" required>

            </div>
            <div class="col">
                <label for="direccion_empresa">Dirección de la empresa</label>
                <input class="form-control" type="text" name="direccion_empresa" >
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="email_empresa">Email de la empresa</label>
                <input class="form-control" type="text" name="email_empresa" required>
            </div>

            <div class="col">
                <label for="telefono_empresa">Teléfono de la empresa</label>
                <input class="form-control" type="text" name="telefono_empresa" required>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="url_empresa">Url de la empresa</label>
                <input class="form-control" type="text" name="url_empresa">
            </div>
            <div class="col">
                <label for="responsable_empresa">Responsable de la empresa</label>
                <input class="form-control" type="text" name="responsable_empresa">
            </div>
        </div>  

        <div class="row">
            <div class="col">
                <label for="tutor_empresa">Tutor de la empresa</label>
                <input class="form-control" type="text" name="tutor_empresa">
            </div>
            <div class="col">
                
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="convenio_estado">Estado del documento Convenio</label>
                <select class="form-select" name="convenio_estado">
                    <option  value="Por enviar">
                        Por enviar
                    </option>
                    <option value="Enviado">
                        Enviado
                    </option>
                    <option value="Firmado">
                        Firmado
                    </option>
                </select>
            </div>
            <div class="col">
                <label for="anexo_1_estado">Estado del documento Anexo1</label>
                <select class="form-select" name="anexo_1_estado">
                <option  value="Por enviar">
                        Por enviar
                    </option>
                    <option value="Enviado">
                        Enviado
                    </option>
                    <option value="Firmado">
                        Firmado
                    </option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="anexo_8_estado">Estado del documento Anexo8</label>
                <select class="form-select" name="anexo_8_estado">
                <option  value="Por enviar">
                        Por enviar
                    </option>
                    <option value="Enviado">
                        Enviado
                    </option>
                    <option value="Firmado">
                        Firmado
                    </option>
                </select>
            </div>
            <div class="col">  
                <label for="rlt_estado">Estado del documento RLT</label>
                <select class="form-select" name="rlt_estado">
                <option  value="Por enviar">
                        Por enviar
                    </option>
                    <option value="Enviado">
                        Enviado
                    </option>
                    <option value="Firmado">
                        Firmado
                    </option>
                </select>
            </div>
        </div>
        <input type="submit" value="Añadir" class="btn btn-primary">
        
    </form>

        <?php } ?>


    </section>


    <script src="./js/scripts.js"  crossorigin="anonymous"></script>
</body>
</html>