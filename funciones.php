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

function leer_empresa($id_empresa){

    $conexion = new conectar_db();
    $consulta = "SELECT * FROM empresas WHERE id_empresa=" . $id_empresa;
    $resultado = $conexion->consultar($consulta);
    return $resultado->fetch_all(MYSQLI_ASSOC);
}

function update_empresa($id, $datos){

    $conexion = new conectar_db();
    $nombre_empresa = $datos["nombre_empresa"];
    $direccion_empresa = $datos["direccion_empresa"];
    $email_empresa = $datos["email_empresa"];
    $telefono_empresa = $datos["telefono_empresa"];
    $url_empresa = $datos["url_empresa"];
    $responsable_empresa = $datos["responsable_empresa"];
    $tutor_empresa = $datos["tutor_empresa"];
    $convenio_estado = $datos["convenio_estado"];
    $anexo_1_estado = $datos["anexo_1_estado"];
    $anexo_8_estado = $datos["anexo_8_estado"];
    $rlt_estado = $datos["rlt_estado"];

    $consulta = "UPDATE empresas
    SET nombre_empresa= '$nombre_empresa',
    email_empresa = '$email_empresa',
    direccion_empresa = '$direccion_empresa',
    telefono_empresa = $telefono_empresa,
    url_empresa = '$url_empresa',
    responsable_empresa = '$responsable_empresa',
    tutor_empresa = '$tutor_empresa',
    convenio_estado = '$convenio_estado',
    anexo_1_estado = '$anexo_1_estado',
    anexo_8_estado = '$anexo_8_estado',
    rlt_estado = '$rlt_estado' 
    WHERE id_empresa = $id";

    echo $consulta;
    $resultado = $conexion->consultar($consulta);

    header('Location: empresas.php');

}
?>