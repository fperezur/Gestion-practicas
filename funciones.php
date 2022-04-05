<?php
class conectar_db{    
    private $host   ="localhost";
    private $usuario="root";
    private $clave  ="";
    private $db     ="gestion_practicas";
    public $conexion;
    public function __construct(){
       // El constructor lleva la conexión
        $this->conexion = new mysqli($this->host, $this->usuario, $this->clave,$this->db)
        or die($this->conexion->connect_error);
        $this->conexion->set_charset("utf8");
    }
    
    //CONSULTAR
    public function consultar($consulta){
        $resultado = $this->conexion->query($consulta) or die($this->conexion->error);
        if($resultado)
            return $resultado;
            //return $resultado->fetch_all(MYSQLI_ASSOC);
        return false;
    } 

    //Contar resultados
    public function contar_resultados(){
        $resultado = $this->conexion->affected_rows;
        return $resultado;
    }

    // CERRAR
    public function cerrar(){
      $this->conexion->close();
    }
}

function check_session(){
    if(!$_SESSION["usuario"]){
        header('Location: index.php');
    }
}

function leer_empresas(){

    $conexion = new conectar_db();
    $consulta = "SELECT * FROM empresas";
    $resultado = $conexion->consultar($consulta);
    return $resultado->fetch_all(MYSQLI_ASSOC);
}
?>