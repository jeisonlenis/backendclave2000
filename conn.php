<?php
    $DB_HOST = 'localhost';
    $DB_USERNAME = 'root';
    $DB_PASSWORD = '123456789';
    $DB_NAME = 'clave2000';

    $conn = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

    if(!$conn) {
        die("Could not connect". mysqli_connect_error());
    }


?>