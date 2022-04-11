<?php
include("./funciones.php");

$order = $_GET["order"];

$conexion = new conectar_db();
$consulta = "SELECT * FROM alumnos ORDER BY nombre " . $order;
$resultado = $conexion->consultar($consulta);
$alumnos = $resultado->fetch_all(MYSQLI_ASSOC);
foreach($alumnos as $alumno){
    $_GET["id_alumno"] = $alumno["id_alumno"];
    include("./modal_alumno.php");
    echo
    '<tr>
                    <td><a href="editar_alumno.php?id_alumno='.$alumno["id_alumno"].'">'.$alumno["nombre"].'</a></td>
                    <td>'.$alumno["apellidos"].'</td>
                    <td>'.$alumno["dni"].'</td>
                    <td>'.$alumno["telefono"].'</td>
                    <td>
                        <a href="editar_alumno.php?id_alumno='.$alumno["id_alumno"].'"><i class="bi bi-pencil-fill" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"></i></a>  
                        <a  data-toggle="modal" data-target="#delete_modal_'.$alumno["id_alumno"].'" data-id="'.$alumno["id_alumno"].'"><i class="bi bi-trash3-fill" data-bs-toggle="tooltip" data-bs-placement="top" title="Borrar"></i></a> 
                    </td>
                </tr>';
     } ?>

