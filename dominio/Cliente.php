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
        $this->nombre = $nombre;
        $this->dni = $dni;
        $this->email = $email;
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
}
?>