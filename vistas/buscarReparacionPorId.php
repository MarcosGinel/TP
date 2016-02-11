<?php
session_start(); // Iniciar la sesion
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$id = $_POST['id'];
include_once($_SERVER['DOCUMENT_ROOT'] . "/dominio/Cliente.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/repositorio/repositorioClientes.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/repositorio/repositorioReparaciones.php");
$reparacion = getReparacionById($username, $password, $id);
/*echo $reparacion->getId();
$f = fopen("miquery.txt", "w");
fwrite($f, $reparacion->getId());
fclose($f);*/
if (is_null($reparacion->getId()))
    header("location: idNoEncontrado.php");
else
    header("location: editarReparacion.php?id=".$reparacion->getId());
?>