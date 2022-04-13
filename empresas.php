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
        <h1 class="title">Listado de empresas</h1>
        <!-- Contenido  -->
        <div class="filtro">
            <label for="filtro">Filtrar:</label>
            <input type="text" name="filtro" id="filtro" onkeyup="filtrar_empresas();">
            <button class="btn btn-primary" onclick="document.getElementById('filtro').value = ''; filtrar_empresas();">Borrar</button>
        </div>

        <div class="add_empresa">
            <a href="add_empresa.php" class="btn btn-success"><i class="bi bi-plus-circle"></i> Añadir empresa</a>
        </div>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                <th id="cabecera_nombre" data-order="ASC" onclick="reordenar_empresas();">
                    Nombre
                    <i class="bi bi-arrow-down-circle-fill" id="flecha_arriba"></i>
                    <i class="bi bi-arrow-up-circle-fill" id="flecha_abajo"></i>
                </th>
                <th>Dirección</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Persona de contacto</th>
                <th>Acciones</th>
                </tr>
            </thead>
            
            <tbody id="tbody_empresas">
                <?php 
                $empresas = leer_empresas();
               foreach($empresas as $empresa){
                ?>
                <tr>
                    <td><a href="editar_empresa.php?id_empresa=<?php echo $empresa["id_empresa"];?>"><?php echo $empresa["nombre_empresa"];?></a></td>
                    <td><?php echo $empresa["direccion_empresa"];?></td>
                    <td><?php echo $empresa["email_empresa"];?></td>
                    <td><?php echo $empresa["telefono_empresa"];?></td>
                    <td><?php echo $empresa["responsable_empresa"];?></td>
                    <td>
                        <!-- Editar empresa -->
                        <a href="editar_empresa.php?id_empresa=<?php echo $empresa["id_empresa"];?>"><i class="bi bi-pencil-fill" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"></i></a>  
                        <!-- Borrar empresa -->
                        <?php
                        $_GET["id_empresa"] = $empresa["id_empresa"];
                        include("./modal.php");?>
                        <a  data-toggle="modal" data-target="#delete_modal_<?php echo $empresa["id_empresa"];?>" data-id="<?php echo $empresa["id_empresa"];?>"><i class="bi bi-trash3-fill" data-bs-toggle="tooltip" data-bs-placement="top" title="Borrar"></i></a>
                         
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            <tfooter class="thead-dark">
                <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Persona de contacto</th>
                <th>Acciones</th>
                </tr>
            </tfooter>
        </table>

        <div class="paginador">
           <!--<a data-inicio="0" onclick="paginar('anterior');" id="anterior" class="btn btn-primary">Anterior </a>  <a  data-inicio="10" id="siguiente" onclick="paginar('siguiente');" class="btn btn-primary">Siguiente</a>-->
        </div>
    </section>



    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="./js/scripts.js"  crossorigin="anonymous"></script>
</body>
</html>