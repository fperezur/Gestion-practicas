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

// function that reads all the companies from the database
function leer_empresas(){

    $conexion = new conectar_db();
    $consulta = "SELECT * FROM empresas";
    $resultado = $conexion->consultar($consulta);
    return $resultado->fetch_all(MYSQLI_ASSOC);
}

// function that reads the company with the id passed as parameter
function leer_empresa($id_empresa){

    $conexion = new conectar_db();
    $consulta = "SELECT * FROM empresas WHERE id_empresa=" . $id_empresa;
    $resultado = $conexion->consultar($consulta);
    return $resultado->fetch_all(MYSQLI_ASSOC);
}

//function that updates the company data in the database
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



//function that add the company data in the database
function add_empresa($datos){

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

    $consulta = "INSERT INTO empresas
    (nombre_empresa, email_empresa,direccion_empresa,
    telefono_empresa,url_empresa,responsable_empresa,
    tutor_empresa,convenio_estado,anexo_1_estado,
    anexo_8_estado,rlt_estado)
    VALUES ('$nombre_empresa', '$email_empresa',
    '$direccion_empresa',$telefono_empresa,
    '$url_empresa','$responsable_empresa',
    '$tutor_empresa','$convenio_estado',
    '$anexo_1_estado','$anexo_8_estado','$rlt_estado')";

    echo $consulta;
   
    $resultado = $conexion->consultar($consulta);

    header('Location: empresas.php');

}

// function that reads all the alumns from the database
function leer_alumnos(){

    $conexion = new conectar_db();
    $consulta = "SELECT * FROM alumnos";
    $resultado = $conexion->consultar($consulta);
    return $resultado->fetch_all(MYSQLI_ASSOC);
}

// function that reads the company with the id passed as parameter
function leer_alumno($id_alumno){

    $conexion = new conectar_db();
    $consulta = "SELECT * FROM alumnos WHERE id_alumno=" . $id_alumno;
    $resultado = $conexion->consultar($consulta);
    return $resultado->fetch_all(MYSQLI_ASSOC);
}

function update_alumno($id, $datos){

    $conexion = new conectar_db();
    $nombre = $datos["nombre"];
    $apellidos = $datos["apellidos"];
    $dni = $datos["dni"];
    $telefono = $datos["telefono"];
    $empresa_asociada = $datos["empresa_asociada"];
    
    $consulta = "UPDATE alumnos
    SET nombre= '$nombre',
    apellidos = '$apellidos',
    dni = '$dni',
    telefono = $telefono
    WHERE id_alumno = $id";

    $resultado = $conexion->consultar($consulta);

    // Miramos si el alumno tiene empresa asociada o no
    if($empresa_asociada != ""){

        $consulta2 = "SELECT * FROM alumno_asignado_empresa WHERE id_alumno = $id";
        $resultado2 = $conexion->consultar($consulta2)->fetch_all(MYSQLI_ASSOC);
        // Si no la tiene la añadimos
        if( count( $resultado2 ) == 0 ){
            $consulta3 = "INSERT INTO alumno_asignado_empresa (id_alumno, id_empresa) VALUES ($id, $empresa_asociada)";
            $resultado3 = $conexion->consultar($consulta3);
        }
        else{
            // Si la tiene la actualizamos
            $consulta4 = "UPDATE alumno_asignado_empresa SET id_empresa = $empresa_asociada WHERE id_alumno = $id";
            $resultado4 = $conexion->consultar($consulta4);
        }
    }
    else{
        // Si no tiene empresa asociada la borramos
        $consulta5 = "DELETE FROM alumno_asignado_empresa WHERE id_alumno = $id";
        $resultado5 = $conexion->consultar($consulta5);
    }
    

    header('Location: alumnos.php');

}

function leer_empresa_alumno($id_alumno){
        $conexion = new conectar_db();
        $consulta = "SELECT * FROM alumno_asignado_empresa, empresas 
        WHERE id_alumno=" . $id_alumno . " AND alumno_asignado_empresa.id_empresa = empresas.id_empresa";
        $resultado = $conexion->consultar($consulta);
        return $resultado->fetch_all(MYSQLI_ASSOC);
}

//function that add the company data in the database
function add_alumno($datos){

    $conexion = new conectar_db();
    $nombre = $datos["nombre"];
    $apellidos = $datos["apellidos"];
    $dni = $datos["dni"];
    $telefono = $datos["telefono"];
    $empresa_asociada = $datos["empresa_asociada"];
    
    $consulta = "INSERT INTO alumnos
    (nombre, apellidos,dni,
    telefono)
    VALUES ('$nombre', '$apellidos',
    '$dni',$telefono)";

   
   
    $resultado = $conexion->consultar($consulta);

    //$last_id = mysqli_insert_id($conexion);

    print_r($resultado);

    // Miramos si el alumno tiene empresa asociada o no
    if($empresa_asociada != ""){

        
            $consulta3 = "INSERT INTO alumno_asignado_empresa (id_alumno, id_empresa) VALUES ($last_id, $empresa_asociada)";
            $resultado3 = $conexion->consultar($consulta3);
        
    }
    

    //header('Location: empresas.php');

}
?>