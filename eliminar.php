<?php

require_once 'conexion.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM estudiantes WHERE correlativo=?");
    $stmt->bind_param('i', $id);
    $stmt->execute();

    echo json_encode(['res' => true]);

}else{
    echo json_encode(['res' => false]);
}

?>
