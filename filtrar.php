<?php
include("./funciones.php");

$filtro = $_GET["filtro"];

$conexion = new conectar_db();
$consulta = "SELECT * FROM empresas WHERE nombre_empresa LIKE '".$filtro."%'";
$resultado = $conexion->consultar($consulta);
$empresas = $resultado->fetch_all(MYSQLI_ASSOC);
foreach($empresas as $empresa){
   echo
    '<tr>
                    <td>'.$empresa["nombre_empresa"].'</td>
                    <td>'.$empresa["direccion_empresa"].'</td>
                    <td>'.$empresa["email_empresa"].'</td>
                    <td>'.$empresa["telefono_empresa"].'</td>
                    <td>'.$empresa["responsable_empresa"].'</td>
                    <td>
                        <a href="editar_empresa.php?id_empresa='.$empresa["id_empresa"].'">
                            <i class="bi bi-pencil-fill" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"></i>
                        </a>  
                        <a href=""><i class="bi bi-trash3-fill" data-bs-toggle="tooltip" data-bs-placement="top" title="Borrar"></i></a> 
                    </td>
                </tr>';
     } ?>

