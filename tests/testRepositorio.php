<?php
/**
 * Created by PhpStorm.
 * User: MarcosAlberto
 * Date: 15/01/2016
 * Time: 23:14
 */

//    echo phpinfo();
$username = "admin";
$password = "admin";

chdir($_SERVER['DOCUMENT_ROOT']);
// echo $_SERVER['DOCUMENT_ROOT'];
include_once($_SERVER['DOCUMENT_ROOT']."/repositorio/repositorioClientes.php");

$array = getClientes($username, $password);
foreach ($array as $clave => $valor)
    $valor->imprimeCliente();

$cliente = getClienteById($username, $password, 1);
$cliente->imprimeCliente();

$array = getClientesByNombre($username, $password, "Se");
foreach ($array as $clave => $valor)
    $valor->imprimeCliente();

$cliente = getClienteByDNI($username, $password, "11111111X");
$cliente->imprimeCliente();



?>