<?php
include("./funciones.php");

$order = $_GET["order"];

$conexion = new conectar_db();
$consulta = "SELECT * FROM empresas ORDER BY nombre_empresa " . $order;
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
                        <a href=""><i class="bi bi-pencil-fill" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"></i></a>  
                        <a href=""><i class="bi bi-trash3-fill" data-bs-toggle="tooltip" data-bs-placement="top" title="Borrar"></i></a> 
                    </td>
                </tr>';
     } ?>

