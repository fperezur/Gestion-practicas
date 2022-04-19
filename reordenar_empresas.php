<?php
include("./funciones.php");

$order = $_GET["order"];

$conexion = new conectar_db();
$consulta = "SELECT * FROM empresas ORDER BY nombre_empresa " . $order;
$resultado = $conexion->consultar($consulta);
$empresas = $resultado->fetch_all(MYSQLI_ASSOC);
foreach($empresas as $empresa){
    $estado_empresa = $empresa["estado_empresa"];
    switch($estado_empresa){
        case "Por contactar":
            $tr_class = "dark";
            break;
        case "Contactado":
            $tr_class = "warning";
            break;
        case "No interesado":
            $tr_class = "danger";
            break;
        case "Interesado":
            $tr_class = "success";
            break;
    }
    $_GET["id_empresa"] = $empresa["id_empresa"];
    include("./modal.php");
    echo
    '<tr class="table-'.$tr_class.'">
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

