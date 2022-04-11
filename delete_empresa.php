<?php
include("./funciones.php");
$id = $_GET["id_empresa"];
$conexion = new conectar_db();
$consulta = "DELETE FROM empresas WHERE id_empresa = $id";
$resultado = $conexion->consultar($consulta);

echo "ok";

?>