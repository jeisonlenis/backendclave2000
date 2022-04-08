<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
require_once './conn.php';

$query = "SELECT * FROM departamentos ORDER BY id DESC";

$result = mysqli_query($conn, $query) or die("Query ha fallado");

$count = mysqli_num_rows($result);

if ($count > 0) {
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo json_encode($row);
} else {
    echo json_encode(array("mensaje" => "No se encuentran departamentos", "status" => false));
}

?>