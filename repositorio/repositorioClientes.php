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
        $clienteNuevo = null;
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

function insertarObjetoCliente($username, $password, $cliente) {
    try {
        include_once($_SERVER['DOCUMENT_ROOT'] . "/repositorio/preparaBD.php");
        $conn = preparaBD($username, $password);
        $nombre = $cliente->getNombre();
        $dni = $cliente->getDNI();
        $email = $cliente->getEmail();
        $telefono = $cliente->getTelefono();
        $fechaDeRegistro = $cliente->getFechaDeRegistro();
        $query = 'INSERT INTO Clientes (nombre, dni, email, telefono, fechaDeRegistro) VALUES ("'.$nombre.'", "'.$dni.'", "'.$email.'", "'.$telefono.'", now()) ';
        echo $query;
        $stmt = $conn->prepare($query);
        $exito = $stmt->execute();

        cerrarBD($conn);
        return $exito;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function insertarCliente($username, $password, $nombre, $dni, $email, $telefono) {
    try {
        include_once($_SERVER['DOCUMENT_ROOT'] . "/repositorio/preparaBD.php");
        $conn = preparaBD($username, $password);
        $query = 'INSERT INTO Clientes (nombre, dni, email, telefono, fechaDeRegistro) VALUES ("'.$nombre.'", "'.$dni.'", "'.$email.'", "'.$telefono.'", now()) ';
        //echo $query;
        $stmt = $conn->prepare($query);
        $exito = $stmt->execute();

        cerrarBD($conn);
        return $exito;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function actualizaCliente($username, $password, $cliente_id, $nombre, $dni, $email, $telefono) {
    try {
        include_once($_SERVER['DOCUMENT_ROOT'] . "/repositorio/preparaBD.php");
        $conn = preparaBD($username, $password);
        $query = 'UPDATE Clientes SET nombre="'.$nombre.'", dni="'.$dni.'", email="'.$email.'", telefono="'.$telefono.'" WHERE cliente_id='.$cliente_id;
        //echo $query;
        $stmt = $conn->prepare($query);
        $exito = $stmt->execute();

        cerrarBD($conn);
        return $exito;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>