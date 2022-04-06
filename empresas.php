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
        <!-- Contenido  -->
        <div class="filtro">
            <label for="filtro">Filtrar:</label>
            <input type="text" name="filtro" id="filtro" onkeyup="filtrar();">
            <button class="btn btn-primary" onclick="document.getElementById('filtro').value = ''; filtrar();">Borrar</button>
</div>
        <table class="table table-hover table-sm">
            <thead class="thead-dark">
                <tr>
                <th id="cabecera_nombre" data-order="ASC" onclick="reordenar();">
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
                    <td><?php echo $empresa["nombre_empresa"];?></td>
                    <td><?php echo $empresa["direccion_empresa"];?></td>
                    <td><?php echo $empresa["email_empresa"];?></td>
                    <td><?php echo $empresa["telefono_empresa"];?></td>
                    <td><?php echo $empresa["responsable_empresa"];?></td>
                    <td>
                        <a href=""><i class="bi bi-pencil-fill" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"></i></a>  
                        <a href=""><i class="bi bi-trash3-fill" data-bs-toggle="tooltip" data-bs-placement="top" title="Borrar"></i></a> 
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

    </section>

        <script src="./js/scripts.js"  crossorigin="anonymous"></script>
</body>
</html>