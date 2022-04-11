<?php
include("./funciones.php");
$id = $_GET["id_alumno"];
$conexion = new conectar_db();
$consulta = "DELETE FROM alumnos WHERE id_alumno = $id";
$resultado = $conexion->consultar($consulta);

echo "ok";

?>