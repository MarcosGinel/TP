<?php
/**
 * Created by PhpStorm.
 * User: MarcosAlberto
 * Date: 19/01/2016
 * Time: 20:13
 */
    session_start();
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    include_once($_SERVER['DOCUMENT_ROOT'] . "/dominio/Cliente.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/dominio/Reparacion.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/repositorio/repositorioClientes.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/repositorio/repositorioReparaciones.php");
    // Faltaría hacer las comprobaciones

    if(isset($_POST['sim']))
        $sim = 1;
    else
        $sim = 0;
    if(isset($_POST['funda']))
        $funda = 1;
    else
        $funda = 0;
    if(isset($_POST['sd']))
        $sd = 1;
    else
        $sd = 0;
    if(isset($_POST['cargador']))
        $cargador = 1;
    else
        $cargador = 0;
    if(isset($_POST['estado_de_presupuesto']))
        $estado_de_presupuesto = 1;
    else
        $estado_de_presupuesto = 0;

    if(isset($_POST['estado']))
        $estado =  $_POST['estado'];
    else
        $estado = "No reparado";
    $reparacion = new Reparacion(0, $_POST['cliente_id'], $_POST['marcamodelo'], $_POST['imei'],
                            $sim, $funda, $sd, $cargador,
                            $_POST['observaciones_previas'], $_POST['presupuesto'],  $estado_de_presupuesto,
                            $_POST['plazoentrega'], $estado, $_POST['operaciones_efectuadas'],
                            $_POST['piezas_a_comprar'], $_POST['fecha_fin_de_reparacion'],
                            $_POST['observaciones_y_recomendaciones'], $username);

    insertarObjetoReparacion($username, $password, $reparacion);
    header("location: /vistas/listaClientes.php");
?>