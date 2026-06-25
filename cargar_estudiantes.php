<?php

require_once 'conexion.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

 $id_seccion = $_POST['id_seccion'];

$stmt = $conn->prepare('SELECT * FROM estudiantes WHERE id_seccion=? ORDER BY correlativo ASC');
$stmt->bind_param('i', $id_seccion);
 $stmt->execute();
$results = $stmt->get_result();

    $estudiantes = [];
foreach($results as $row)
        $estudiantes[] = $row;

    echo json_encode($estudiantes);

}else
    echo json_encode([]);

?>
