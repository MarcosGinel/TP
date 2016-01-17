<?php
/**
 * Created by PhpStorm.
 * User: MarcosAlberto
 * Date: 17/01/2016
 * Time: 14:57
 */

class Cliente
{
    var $reparacion_id;
    var $cliente_id;
    var $marcamodelo;
    var $imei;
    var $sim;
    var $funda;
    var $sd;
    var $cargador;
    var $observaciones_previas;
    var $presupuesto;
    var $estado_de_presupuesto;
    var $plazoentrega;
    var $estado;
    var $operaciones_efectuadas;
    var $piezas_a_comprar;
    var $fecha_fin_de_reparacion;
    var $observaciones_y_recomendaciones;
    var $creado_por;

    function Reparacion($reparacion_id, $cliente_id, $marcamodelo, $imei, $sim, $funda, $sd, $cargador, $observaciones_previas, $presupuesto, $estado_de_presupuesto, $plazoentrega, $estado, $operaciones_efectuadas, $piezas_a_comprar, $fecha_fin_de_reparacion, $observaciones_y_recomendaciones, $creado_por)
    {
        $this->cliente_id = $cliente_id;
        $this->reparacion_id = $reparacion_id;
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
    }

    /**
     *
     */
    function imprimeCliente()
    {
        echo $this->cliente_id;
        echo $this->reparacion_id;
        echo $this->marcamodelo;
        echo $this->imei;
        echo $this->sim;
        echo $this->funda;
        echo $this->sd;
        echo $this->cargador;
        echo $this->observaciones_previas;
        echo $this->presupuesto;
        echo $this->estado_de_presupuesto;
        echo $this->plazoentrega;
        echo $this->estado;
        echo $this->operaciones_efectuadas;
        echo $this->piezas_a_comprar;
        echo $this->fecha_fin_de_reparacion;
        echo $this->observaciones_y_recomendaciones;
        echo $this->creado_por;
    }

    function setClienteId($cliente)
    {
        $this->cliente_id = $cliente;
    }

    function getClienteId()
    {
        return $this->cliente_id;
    }

    function setId($id)
    {
        $this->reparacion_id = $id;
    }

    function getId()
    {
        return $this->reparacion_id;
    }

    function setmarcamodelo($marcamodelo)
    {
        $this->marcamodelo = $marcamodelo;
    }

    function getmarcamodelo()
    {
        return $this->marcamodelo;
    }

    function setimei($imei)
    {
        $this->imei = $imei;
    }

    function getimei()
    {
        return $this->imei;
    }

    function setsim($sim)
    {
        $this->sim = $sim;
    }

    function getsim()
    {
        return $this->sim;
    }
    function setfunda($funda)
    {
        $this->funda = $funda;
    }

    function getfunda()
    {
        return $this->funda;
    }
    function setsd($sd)
    {
        $this->sd = $sd;
    }

    function getsd()
    {
        return $this->sd;
    }
    function setcargador($cargador)
    {
        $this->cargador = $cargador;
    }

    function getcargador()
    {
        return $this->cargador;
    }
    function setobservaciones_previas($observaciones_previas)
    {
        $this->observaciones_previas = $observaciones_previas;
    }

    function getobservaciones_previas()
    {
        return $this->observaciones_previas;
    }
    function setpresupuesto($presupuesto)
    {
        $this->presupuesto = $presupuesto;
    }

    function getpresupuesto()
    {
        return $this->presupuesto;
    }
    function setestado_de_presupuesto($estado_de_presupuesto)
    {
        $this->estado_de_presupuesto = $estado_de_presupuesto;
    }

    function getestado_de_presupuesto()
    {
        return $this->estado_de_presupuesto;
    }
    function setplazoentrega($plazoentrega)
    {
        $this->plazoentrega = $plazoentrega;
    }

    function getplazoentrega()
    {
        return $this->plazoentrega;
    }
    function setestado($estado)
    {
        $this->estado = $estado;
    }

    function getestado()
    {
        return $this->estado;
    }
    function setoperaciones_efectuadas($operaciones_efectuadas)
    {
        $this->operaciones_efectuadas = $operaciones_efectuadas;
    }

    function getoperaciones_efectuadas()
    {
        return $this->operaciones_efectuadas;
    }
    function setpiezas_a_comprar($piezas_a_comprar)
    {
        $this->piezas_a_comprar = $piezas_a_comprar;
    }

    function getpiezas_a_comprar()
    {
        return $this->piezas_a_comprar;
    }
    function setfecha_fin_de_reparacion($fecha_fin_de_reparacion)
    {
        $this->fecha_fin_de_reparacion = $fecha_fin_de_reparacion;
    }

    function getfecha_fin_de_reparacion()
    {
        return $this->fecha_fin_de_reparacion;
    }
    function setobservaciones_y_recomendaciones($observaciones_y_recomendaciones)
    {
        $this->observaciones_y_recomendaciones = $observaciones_y_recomendaciones;
    }

    function getobservaciones_y_recomendaciones()
    {
        return $this->observaciones_y_recomendaciones;
    }
    function setcreado_por($creado_por)
    {
        $this->creado_por = $creado_por;
    }

    function getcreado_por()
    {
        return $this->creado_por;
    }
}

?>
