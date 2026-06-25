<?php

require_once 'conexion.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = $_POST['id'];

    $stmt = $conn->prepare("SELECT * FROM estudiantes WHERE correlativo=?");
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $estudiante = $result->fetch_assoc();

    echo json_encode($estudiante);

}else{
    echo json_encode(null);
}

?>
