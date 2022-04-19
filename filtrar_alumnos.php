<?php
include("./funciones.php");

$filtro = $_GET["filtro"];

$conexion = new conectar_db();
$consulta = "SELECT * FROM alumnos WHERE nombre LIKE '".$filtro."%'";
$resultado = $conexion->consultar($consulta);
$alumnos = $resultado->fetch_all(MYSQLI_ASSOC);
foreach($alumnos as $alumno){
    // Checkeamos si tiene empresa asociada
    $id_alumno = $alumno["id_alumno"];
    if(count(leer_empresa_alumno($id_alumno)) > 0){
        $empresa_asociada = leer_empresa_alumno($id_alumno)[0]["nombre_empresa"];
        $tr_class = "success";
        }
        else{
            $empresa_asociada = "No asociado";
            $tr_class = "dark";
        }

    $_GET["id_alumno"] = $alumno["id_alumno"];
    include("./modal_alumno.php");
   echo
    '<tr class="table-'.$tr_class.'">
                    <td><a href="editar_alumno.php?id_alumno='.$alumno["id_alumno"].'">'.$alumno["nombre"].'</a></td>
                    <td>'.$alumno["apellidos"].'</td>
                    <td>'.$alumno["dni"].'</td>
                    <td>'.$alumno["telefono"].'</td>
                    <td>'.$empresa_asociada.'</td>
                    <td>
                        <a href="editar_alumno.php?id_alumno='.$alumno["id_alumno"].'"><i class="bi bi-pencil-fill" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"></i></a>  
                        <a  data-toggle="modal" data-target="#delete_modal_'.$alumno["id_alumno"].'" data-id="'.$alumno["id_alumno"].'"><i class="bi bi-trash3-fill" data-bs-toggle="tooltip" data-bs-placement="top" title="Borrar"></i></a>
                    </td>
                </tr>';
     } ?>

