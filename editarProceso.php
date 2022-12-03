<?php
    print_r($_POST);
    if(!isset($_POST['id'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $id = $_POST['id'];
    $nombre = $_POST['txtNombre'];
    $precio = $_POST['txtPrecio'];

    $sentencia = $bd->prepare("UPDATE productos SET nombre = ?, precio = ? where id = ?;");
    $resultado = $sentencia->execute([$nombre, $precio, $id]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>