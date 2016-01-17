<?php
/**
 * Created by PhpStorm.
 * User: MarcosAlberto
 * Date: 18/01/2016
 * Time: 0:00
 */
    session_start();
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    include_once($_SERVER['DOCUMENT_ROOT'] . "/dominio/Cliente.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/repositorio/repositorioClientes.php");
    // Faltaría hacer las comprobaciones
    insertarCliente($username, $password, $_POST['nombre'], $_POST['dni'], $_POST['email'], $_POST['telefono']);
    header("location: /vistas/listaClientes.php");
?>