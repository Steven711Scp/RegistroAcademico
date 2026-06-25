<?php

require_once 'conexion.php';

$stmt = $conn->prepare('SELECT * FROM secciones');
$stmt->execute();
$results = $stmt->get_result();

$secciones = [];
foreach($results as $row)
    $secciones[] = $row;

echo json_encode($secciones);

?>
