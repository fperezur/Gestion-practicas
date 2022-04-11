<?php
include("./funciones.php");

$filtro = $_GET["filtro"];

$conexion = new conectar_db();
$consulta = "SELECT * FROM empresas WHERE nombre_empresa LIKE '".$filtro."%'";
$resultado = $conexion->consultar($consulta);
$empresas = $resultado->fetch_all(MYSQLI_ASSOC);
foreach($empresas as $empresa){
    $_GET["id_empresa"] = $empresa["id_empresa"];
    include("./modal.php");
   echo
    '<tr>
                    <td><a href="editar_empresa.php?id_empresa='.$empresa["id_empresa"].'">'.$empresa["nombre_empresa"].'</a></td>
                    <td>'.$empresa["direccion_empresa"].'</td>
                    <td>'.$empresa["email_empresa"].'</td>
                    <td>'.$empresa["telefono_empresa"].'</td>
                    <td>'.$empresa["responsable_empresa"].'</td>
                    <td>
                        <a href="editar_empresa.php?id_empresa='.$empresa["id_empresa"].'"><i class="bi bi-pencil-fill" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"></i></a>  
                        <a  data-toggle="modal" data-target="#delete_modal_'.$empresa["id_empresa"].'" data-id="'.$empresa["id_empresa"].'"><i class="bi bi-trash3-fill" data-bs-toggle="tooltip" data-bs-placement="top" title="Borrar"></i></a>
                    </td>
                </tr>';
     } ?>

