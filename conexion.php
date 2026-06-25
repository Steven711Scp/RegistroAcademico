<?php
$host = 'localhost';
$user = 'root';
$pass = '72008';
$db = 'RegistroAcademico';

$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_error)
    die('Conexión fallida: ' . $conn->connect_error);

?>
