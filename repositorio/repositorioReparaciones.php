<?php
/**
 * Created by PhpStorm.
 * User: MarcosAlberto
 * Date: 16/01/2016
 * Time: 1:54
 */

include_once($_SERVER['DOCUMENT_ROOT']."/dominio/Cliente.php");
include_once($_SERVER['DOCUMENT_ROOT']."/dominio/Reparacion.php");

function insertarObjetoCliente($username, $password, $reparacion) {
    try {
        include_once($_SERVER['DOCUMENT_ROOT'] . "/repositorio/preparaBD.php");
        $conn = preparaBD($username, $password);
        $cliente_id = $reparacion->cliente_id;
        $reparacion_id = $reparacion->reparacion_id;
        $this->marcamodelo = $marcamodelo;
        $this->imei = $imei;
        $this->sim = $sim;
        $this->funda = $funda;
        $this->sd = $sd;
        $this->cargador = $cargador;
        $this->observaciones_previas = $observaciones_previas;
        $this->presupuesto = $presupuesto;
        $this->estado_de_presupuesto = $estado_de_presupuesto;
        $this->plazoentrega = $plazoentrega;
        $this->estado = $estado;
        $this->operaciones_efectuadas = $operaciones_efectuadas;
        $this->piezas_a_comprar = $piezas_a_comprar;
        $this->fecha_fin_de_reparacion = $fecha_fin_de_reparacion;
        $this->observaciones_y_recomendaciones = $observaciones_y_recomendaciones;
        $this->creado_por = $creado_por;
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
?>