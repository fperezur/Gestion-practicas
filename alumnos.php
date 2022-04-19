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
    <h1 class="title">Listado de alumnos</h1>
        <!-- Contenido  -->
        <div class="filtro">
            <label for="filtro">Filtrar:</label>
            <input type="text" name="filtro" id="filtro" onkeyup="filtrar_alumnos();">
            <button class="btn btn-primary" onclick="document.getElementById('filtro').value = ''; filtrar_alumnos();">Borrar</button>
        </div>

        <div class="add_alumno">
            <a href="add_alumno.php" class="btn btn-success"><i class="bi bi-plus-circle"></i> Añadir alumno</a>
        </div>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                <th id="cabecera_nombre" data-order="ASC" onclick="reordenar_alumnos();">
                    Nombre
                    <i class="bi bi-arrow-down-circle-fill" id="flecha_arriba"></i>
                    <i class="bi bi-arrow-up-circle-fill" id="flecha_abajo"></i>
                </th>
                <th>Apellidos</th>
                <th>DNI</th>
                <th>Teléfono</th>
                <th>Empresa asociada</th>
                <th>Acciones</th>
                </tr>
            </thead>
            
            <tbody id="tbody_empresas">
                <?php 
                $alumnos = leer_alumnos();
               foreach($alumnos as $alumno){

                $id_alumno = $alumno["id_alumno"];


                // Checkeamos si tiene empresa asociada
                if(count(leer_empresa_alumno($id_alumno)) > 0){
                $empresa_asociada = leer_empresa_alumno($id_alumno)[0]["nombre_empresa"];
                $id_empresa_asociada = leer_empresa_alumno($id_alumno)[0]["id_empresa"];
                }
                else{
                    $empresa_asociada = "No asociado";
                    $id_empresa_asociada = "";
                }
                
                

                ?>
                <tr>
                    <td><a href="editar_alumno.php?id_alumno=<?php echo $alumno["id_alumno"];?>"><?php echo $alumno["nombre"];?></a></td>
                    <td><?php echo $alumno["apellidos"];?></td>
                    <td><?php echo $alumno["dni"];?></td>
                    <td><?php echo $alumno["telefono"];?></td>
                    <?php if($id_empresa_asociada == ""){ ?>
                    <td><?php echo $empresa_asociada;?></td>
                    <?php }else{ ?>
                    <td><a href="editar_empresa.php?id_empresa=<?php echo $id_empresa_asociada;?>"><?php echo $empresa_asociada;?></a></td>
                    <?php }?>
                    <td>
                        <!-- Editar empresa -->
                        <a href="editar_alumno.php?id_alumno=<?php echo $alumno["id_alumno"];?>"><i class="bi bi-pencil-fill" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"></i></a>  
                        <!-- Borrar alumno -->
                        <?php
                        $_GET["id_alumno"] = $alumno["id_alumno"];
                        include("./modal_alumno.php");?>
                        <a  data-toggle="modal" data-target="#delete_modal_<?php echo $alumno["id_alumno"];?>" data-id="<?php echo $alumno["id_alumno"];?>"><i class="bi bi-trash3-fill" data-bs-toggle="tooltip" data-bs-placement="top" title="Borrar"></i></a>
                         
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            <tfooter class="thead-dark">
                <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>DNI</th>
                <th>Teléfono</th>
                <th>Empresa asociada</th>
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