<?php

require_once 'conexion.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nie = $_POST['nie'];
    $apellidos = $_POST['apellidos'];
    $nombres = $_POST['nombres'];
    $genero = $_POST['genero'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = $_POST['direccion'];
    $estado = $_POST['estado'];
    $id_seccion = $_POST['id_seccion'];
    $process = $_POST['process'];
    $id = $_POST['id'];

    $anio_actual = date('Y');
    $anio_nacimiento = date('Y', strtotime($fecha_nacimiento));
    $edad = $anio_actual - $anio_nacimiento;

    if($process == 'new'){

        $stmt = $conn->prepare("INSERT INTO estudiantes(nie, apellidos, nombres, genero, fecha_nacimiento, edad, direccion, estado, id_seccion) VALUES(?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param('ssssssssi', $nie, $apellidos, $nombres, $genero, $fecha_nacimiento, $edad, $direccion, $estado, $id_seccion);

    }else{

        $stmt = $conn->prepare("UPDATE estudiantes SET nie=?, apellidos=?, nombres=?, genero=?, fecha_nacimiento=?, edad=?, direccion=?, estado=?, id_seccion=? WHERE correlativo=?");
        $stmt->bind_param('ssssssssii', $nie, $apellidos, $nombres, $genero, $fecha_nacimiento, $edad, $direccion, $estado, $id_seccion, $id);

    }

    if($stmt->execute())
        echo json_encode(['res' => true]);
    else
        echo json_encode(['res' => false]);

}

?>
