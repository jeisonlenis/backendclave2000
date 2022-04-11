<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

$data = json_decode(file_get_contents("php://input"), true);

$modelo = $data["modelo"];
$nombre_completo = $data["nombre_completo"];
$numero_celular = $data["numero_celular"];
$email = $data["email"];
$departamento = $data["departamento"];
$ciudad = $data["ciudad"];
$fechacreacion = $data["fechacreacion"];
$horacreacion = $data["horacreacion"];

require_once "conn.php";
$query2 = "SELECT fechacreacion FROM formulario WHERE email='".$email."' AND numero_celular='".$numero_celular."' ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $query2);
$result = $result->fetch_assoc();

if (isset($result['fechacreacion']) == $fechacreacion) {
    echo json_encode(array("message" => "Solicitud repetida", "status" => true));
} else {
    
    $query = "INSERT INTO formulario(modelo, nombre_completo, numero_celular, email, departamento, ciudad, fechacreacion, horacreacion) " .
        " VALUES ('".$modelo."', '".$nombre_completo."','".$numero_celular."','".$email."','".$departamento."','".$ciudad."','".$fechacreacion."','".$horacreacion."')";

    if(mysqli_query($conn, $query) or die("Query de insercion fallido")) {
        echo json_encode(array("message" => "Solicitud realizada", "status" => true));
    }
    else {
        echo json_encode(array("message" => "Formulario fallido", "status" => false)); 
    }
}

?>