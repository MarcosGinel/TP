<?php
/**
 * Created by PhpStorm.
 * User: MarcosAlberto
 * Date: 15/01/2016
 * Time: 23:44
 */

class Cliente {
    var $cliente_id;
    var $nombre;
    var $dni;
    var $email;
    var $telefono;
    var $fechaDeRegistro;

    /**
     * Cliente constructor.
     * @param $cliente_id
     * @param $nombre
     * @param $dni
     * @param $email
     * @param $telefono
     * @param $fechaDeRegistro
     */
    function Cliente($cliente_id, $nombre, $dni, $email, $telefono, $fechaDeRegistro)
    {
        $this->cliente_id = $cliente_id;
        $this->nombre = utf8_encode($nombre);
        $this->dni = $dni;
        $this->email = utf8_encode($email);
        $this->telefono = $telefono;
        $this->fechaDeRegistro = $fechaDeRegistro;
    }

    /**
     *
     */
    function imprimeCliente() {
        echo $this->nombre.'<br/>';
        echo $this->dni.'<br/>';
        echo $this->email.'<br/>';
        echo $this->telefono.'<br/>';
        echo $this->fechaDeRegistro.'<br/>';
    }

    function getId() {
        return $this->cliente_id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDNI() {
        return $this->dni;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getFechaDeRegistro() {
        return $this->fechaDeRegistro;
    }

    function setId($id) {
        $this->cliente_id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDNI($dni) {
        $this->dni = $dni;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setFechaDeRegistro($fechaDeRegistro) {
        $this->fechaDeRegistro = $fechaDeRegistro;
    }

}
?>