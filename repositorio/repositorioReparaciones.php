<?php
/**
 * Created by PhpStorm.
 * User: MarcosAlberto
 * Date: 16/01/2016
 * Time: 1:54
 */

include_once($_SERVER['DOCUMENT_ROOT']."/dominio/Cliente.php");
include_once($_SERVER['DOCUMENT_ROOT']."/dominio/Reparacion.php");

function insertarObjetoReparacion($username, $password, $reparacion) {
    try {
        include_once($_SERVER['DOCUMENT_ROOT'] . "/repositorio/preparaBD.php");
        include_once($_SERVER['DOCUMENT_ROOT'] . "/dominio/Cliente.php");
        include_once($_SERVER['DOCUMENT_ROOT'] . "/repositorio/repositorioClientes.php");

        $conn = preparaBD($username, $password);
        $cliente_id = $reparacion->cliente_id;
        $reparacion_id = $reparacion->reparacion_id;
        $marcamodelo = $reparacion->marcamodelo;
        $imei = $reparacion->imei;
        $sim = $reparacion->sim;
        $funda = $reparacion->funda;
        $sd = $reparacion->sd;
        $cargador = $reparacion->cargador;
        $observaciones_previas = $reparacion->observaciones_previas;
        $presupuesto = $reparacion->presupuesto;
        $estado_de_presupuesto = $reparacion->estado_de_presupuesto;
        $plazoentrega = $reparacion->plazoentrega;
        $estado = $reparacion->estado;
        $operaciones_efectuadas = $reparacion->operaciones_efectuadas;
        $piezas_a_comprar = $reparacion->piezas_a_comprar;
        $fecha_fin_de_reparacion = $reparacion->fecha_fin_de_reparacion;
        $observaciones_y_recomendaciones = $reparacion->observaciones_y_recomendaciones;
        $clienteEnBD = getClienteById($username, $password, $cliente_id);
        $exito = false;
        if($clienteEnBD != null) {
            $query = 'INSERT INTO Reparaciones (cliente_id, marcamodelo, imei, sim, funda, sd, cargador, observaciones_previas, presupuesto, estado_de_presupuesto, plazoentrega, estado, operaciones_efectuadas, piezas_a_comprar, fecha_fin_de_reparacion, observaciones_y_recomendaciones, creado_por)
                      VALUES ("'.$cliente_id.'", "'.$marcamodelo.'", "'.$imei.'", "'.$sim.'", "
                              '.$funda.'", "'.$sd.'", "'.$cargador.'", "'.$observaciones_previas.'", "'.$presupuesto.'", "'.$estado_de_presupuesto.'", "'.$plazoentrega.'", "
                              '.$estado.'", "'.$operaciones_efectuadas.'", "'.$piezas_a_comprar.'", "'.$fecha_fin_de_reparacion.'", "
                              '.$observaciones_y_recomendaciones.'", "'.$username.'") ';
            echo $query;
            $stmt = $conn->prepare($query);
            $exito = $stmt->execute();
            cerrarBD($conn);
        }

        return $exito;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>