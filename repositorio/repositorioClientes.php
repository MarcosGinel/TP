<?php
/**
 * Created by PhpStorm.
 * User: MarcosAlberto
 * Date: 15/01/2016
 * Time: 23:16
 */
include_once($_SERVER['DOCUMENT_ROOT']."/dominio/Cliente.php");
function getClientes($username, $password) {
    try {
        include_once($_SERVER['DOCUMENT_ROOT']."/repositorio/preparaBD.php");
        $conn = preparaBD($username, $password);
        $stmt = $conn->prepare("SELECT * FROM Clientes");
        $stmt->execute();
        $array = Array();
        $contador = 0;
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $fila = $stmt->fetch();
        if(isset($fila))
        {
            while($fila) {
                $clienteNuevo = new Cliente($fila["cliente_id"],$fila["nombre"],$fila["cliente_id"],$fila["dni"],$fila["email"],$fila["telefono"],$fila["fechaDeRegistro"]);
                //$clienteNuevo->imprimeCliente();
                $array[$contador] = $clienteNuevo;
                $contador++;
                $fila = $stmt->fetch();
            }
        }
        cerrarBD($conn);
        return $array;
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function getClienteById($username, $password, $id)
{
    try {
        include_once($_SERVER['DOCUMENT_ROOT'] . "/repositorio/preparaBD.php");
        $conn = preparaBD($username, $password);
        $stmt = $conn->prepare("SELECT * FROM Clientes c WHERE c.cliente_id=$id");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $fila = $stmt->fetch();
        if (isset($fila)) {
            $cliente = new Cliente($fila["cliente_id"], $fila["nombre"], $fila["cliente_id"], $fila["dni"], $fila["email"], $fila["telefono"], $fila["fechaDeRegistro"]);
        }
        cerrarBD($conn);
        return $cliente;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function getClientesByNombre($username, $password, $name)
{
    try {
        include_once($_SERVER['DOCUMENT_ROOT'] . "/repositorio/preparaBD.php");
        $conn = preparaBD($username, $password);
        $query = "SELECT * FROM Clientes c WHERE c.nombre LIKE '".$name."%'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $array = Array();
        $contador = 0;
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $fila = $stmt->fetch();
        while($fila) {
            $clienteNuevo = new Cliente($fila["cliente_id"],$fila["nombre"],$fila["cliente_id"],$fila["dni"],$fila["email"],$fila["telefono"],$fila["fechaDeRegistro"]);
            //$clienteNuevo->imprimeCliente();
            $array[$contador] = $clienteNuevo;
            $contador++;
            $fila = $stmt->fetch();
        }
        cerrarBD($conn);
        return $array;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function getClienteByDNI($username, $password, $dniABuscar)
{
    try {
        include_once($_SERVER['DOCUMENT_ROOT'] . "/repositorio/preparaBD.php");
        $conn = preparaBD($username, $password);
        $query = "SELECT * FROM Clientes c WHERE c.dni LIKE '".$dniABuscar."'";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $fila = $stmt->fetch();
        while($fila) {
            $clienteNuevo = new Cliente($fila["cliente_id"],$fila["nombre"],$fila["cliente_id"],$fila["dni"],$fila["email"],$fila["telefono"],$fila["fechaDeRegistro"]);
            $fila = $stmt->fetch();
        }
        cerrarBD($conn);
        return $clienteNuevo;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function getClienteByTelefono($username, $password, $telf)
{
    try {
        include_once($_SERVER['DOCUMENT_ROOT'] . "/repositorio/preparaBD.php");
        $conn = preparaBD($username, $password);
        $query = "SELECT * FROM Clientes c WHERE c.telefono LIKE '".$telf."'";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $fila = $stmt->fetch();
        while($fila) {
            $clienteNuevo = new Cliente($fila["cliente_id"],$fila["nombre"],$fila["cliente_id"],$fila["dni"],$fila["email"],$fila["telefono"],$fila["fechaDeRegistro"]);
            $fila = $stmt->fetch();
        }
        cerrarBD($conn);
        return $clienteNuevo;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>