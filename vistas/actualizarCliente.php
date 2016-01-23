<?php
/**
 * Created by PhpStorm.
 * User: MarcosAlberto
 * Date: 23/01/2016
 * Time: 19:24
 */

    session_start();
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $cliente_id = $_POST['cliente_id'];
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    include_once($_SERVER['DOCUMENT_ROOT']."/dominio/Cliente.php");
    include_once($_SERVER['DOCUMENT_ROOT']."/repositorio/repositorioClientes.php");

    $exito = actualizaCliente($username, $password, $cliente_id, $nombre, $dni, $email, $telefono);
    if($exito)
        header("location: listaClientes.php");

?>