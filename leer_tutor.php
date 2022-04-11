<?php
include("./funciones.php");
$id_empresa = $_GET["id_empresa"];
$empresa = leer_empresa($id_empresa)[0];
echo $empresa["tutor_empresa"];


?>