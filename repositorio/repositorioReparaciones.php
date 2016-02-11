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
        $tecnicos = $reparacion->tecnicos;
        $clienteEnBD = getClienteById($username, $password, $cliente_id);
        $exito = false;
        if($clienteEnBD != null) {
            $query = 'INSERT INTO Reparaciones (cliente_id, marcamodelo, imei, sim, funda, sd, cargador, observaciones_previas, presupuesto, estado_de_presupuesto, plazoentrega, estado, operaciones_efectuadas, piezas_a_comprar, fecha_fin_de_reparacion, observaciones_y_recomendaciones, creado_por, tecnicos)
                      VALUES ("'.$cliente_id.'", "'.$marcamodelo.'", "'.$imei.'", '.$sim.', '.$funda.', '.$sd.', '.$cargador.', "'.$observaciones_previas.'", '.$presupuesto.', '.$estado_de_presupuesto.', "'.$plazoentrega.'", "'.$estado.'", "'.$operaciones_efectuadas.'", "'.$piezas_a_comprar.'", "'.$fecha_fin_de_reparacion.'", "'.$observaciones_y_recomendaciones.'", "'.$username.'", "'.$tecnicos.'") ';
            //echo $query;
            //$myfile = fopen("testfile.txt", "w");
            //fwrite($myfile, $query);
            $stmt = $conn->prepare($query);
            $exito = $stmt->execute();
            cerrarBD($conn);
        }

        return $exito;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function getReparaciones($username, $password) {
    try {
        include_once($_SERVER['DOCUMENT_ROOT']."/repositorio/preparaBD.php");
        $conn = preparaBD($username, $password);
        $stmt = $conn->prepare("SELECT * FROM Reparaciones");
        $stmt->execute();
        $array = Array();
        $contador = 0;
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $fila = $stmt->fetch();
        if(isset($fila))
        {
            while($fila) {

                $reparacionNueva = new Reparacion($fila["reparacion_id"],$fila["cliente_id"],$fila["marcamodelo"],$fila["imei"],
                                                  $fila["sim"],$fila["funda"],$fila["sd"],$fila["cargador"],$fila["observaciones_previas"],
                                                  $fila["presupuesto"],$fila["estado_de_presupuesto"],$fila["plazoentrega"],$fila["estado"],
                                                  $fila["operaciones_efectuadas"],$fila["piezas_a_comprar"],$fila["fecha_fin_de_reparacion"],
                                                  $fila["observaciones_y_recomendaciones"],$fila["creado_por"], $fila['tecnicos']);
                $array[$contador] = $reparacionNueva;
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

function getReparacionById($username, $password, $id)
{
    try {
        include_once($_SERVER['DOCUMENT_ROOT'] . "/repositorio/preparaBD.php");
        $conn = preparaBD($username, $password);
        $query = "SELECT * FROM Reparaciones r WHERE r.reparacion_id=".intval($id);
        $stmt = $conn->prepare($query);

        $stmt->execute();
        $array = Array();
        $contador = 0;
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $fila = $stmt->fetch();
        $reparacionNueva = null;
        if (isset($fila)) {
            $reparacionNueva = new Reparacion($fila["reparacion_id"], $fila["cliente_id"], $fila["marcamodelo"], $fila["imei"],
                    $fila["sim"], $fila["funda"], $fila["sd"], $fila["cargador"], $fila["observaciones_previas"],
                    $fila["presupuesto"], $fila["estado_de_presupuesto"], $fila["plazoentrega"], $fila["estado"],
                    $fila["operaciones_efectuadas"], $fila["piezas_a_comprar"], $fila["fecha_fin_de_reparacion"],
                    $fila["observaciones_y_recomendaciones"], $fila["creado_por"], $fila['tecnicos']);
            /*$f = fopen("miquery.txt", "w");
            fwrite($f, $query);
            fclose($f);*/
        }
        cerrarBD($conn);
        return $reparacionNueva;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function getReparacionesPorFecha($username, $password, $fecha_inicial, $fecha_final) {
    try {
        include_once($_SERVER['DOCUMENT_ROOT']."/repositorio/preparaBD.php");
        $conn = preparaBD($username, $password);

        $fecha_final = str_replace("T", " ", $fecha_final);
        $fecha_inicial = str_replace("T", " ", $fecha_inicial);
        $fecha_final .= ":00";
        $fecha_inicial .= ":00";
        $query = "SELECT * FROM Reparaciones r WHERE r.fecha_fin_de_reparacion BETWEEN '".$fecha_inicial."'  AND '".$fecha_final."' and r.estado NOT LIKE 'Reparado'";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        $array = Array();
        $contador = 0;
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $fila = $stmt->fetch();
        if(isset($fila))
        {
            while($fila) {

                $reparacionNueva = new Reparacion($fila["reparacion_id"],$fila["cliente_id"],$fila["marcamodelo"],$fila["imei"],
                    $fila["sim"],$fila["funda"],$fila["sd"],$fila["cargador"],$fila["observaciones_previas"],
                    $fila["presupuesto"],$fila["estado_de_presupuesto"],$fila["plazoentrega"],$fila["estado"],
                    $fila["operaciones_efectuadas"],$fila["piezas_a_comprar"],$fila["fecha_fin_de_reparacion"],
                    $fila["observaciones_y_recomendaciones"],$fila["creado_por"], $fila['tecnicos']);
                $array[$contador] = $reparacionNueva;
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

function getPiezas($username, $password) {
    try {
        include_once($_SERVER['DOCUMENT_ROOT']."/repositorio/preparaBD.php");
        $conn = preparaBD($username, $password);
        $stmt = $conn->prepare("SELECT * FROM Reparaciones r WHERE r.estado LIKE 'Faltan piezas'");
        $stmt->execute();
        $array = Array();
        $contador = 0;
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $fila = $stmt->fetch();
        if(isset($fila))
        {
            while($fila) {

                $reparacionNueva = new Reparacion($fila["reparacion_id"],$fila["cliente_id"],$fila["marcamodelo"],$fila["imei"],
                    $fila["sim"],$fila["funda"],$fila["sd"],$fila["cargador"],$fila["observaciones_previas"],
                    $fila["presupuesto"],$fila["estado_de_presupuesto"],$fila["plazoentrega"],$fila["estado"],
                    $fila["operaciones_efectuadas"],$fila["piezas_a_comprar"],$fila["fecha_fin_de_reparacion"],
                    $fila["observaciones_y_recomendaciones"],$fila["creado_por"], $fila['tecnicos']);
                $array[$contador] = $reparacionNueva;
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

function getReparacionesPorEstado($username, $password, $estado) {
    try {
        include_once($_SERVER['DOCUMENT_ROOT']."/repositorio/preparaBD.php");
        $conn = preparaBD($username, $password);

        $query = "SELECT * FROM Reparaciones r WHERE r.estado='".$estado."'";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        $array = Array();
        $contador = 0;
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $fila = $stmt->fetch();
        if(isset($fila))
        {
            while($fila) {

                $reparacionNueva = new Reparacion($fila["reparacion_id"],$fila["cliente_id"],$fila["marcamodelo"],$fila["imei"],
                    $fila["sim"],$fila["funda"],$fila["sd"],$fila["cargador"],$fila["observaciones_previas"],
                    $fila["presupuesto"],$fila["estado_de_presupuesto"],$fila["plazoentrega"],$fila["estado"],
                    $fila["operaciones_efectuadas"],$fila["piezas_a_comprar"],$fila["fecha_fin_de_reparacion"],
                    $fila["observaciones_y_recomendaciones"],$fila["creado_por"], $fila['tecnicos']);
                $array[$contador] = $reparacionNueva;
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

function actualizaReparacion($username, $password, $reparacion) {
    try {
        include_once($_SERVER['DOCUMENT_ROOT'] . "/repositorio/preparaBD.php");
        $conn = preparaBD($username, $password);
        //echo $query;
        $query = 'UPDATE Reparaciones SET marcamodelo="'.$reparacion->getmarcamodelo().'", imei="'.$reparacion->getimei().'", sim="'.$reparacion->getsim().'", funda="'.$reparacion->getfunda().'", sd="'.$reparacion->getsd().'", cargador="'.$reparacion->getcargador().'", observaciones_previas="'.$reparacion->getobservaciones_previas().'", presupuesto="'.$reparacion->getpresupuesto().'", estado_de_presupuesto="'.$reparacion->getestado_de_presupuesto().'", plazoentrega="'.$reparacion->getplazoentrega().'", estado="'.$reparacion->getestado().'", operaciones_efectuadas="'.$reparacion->getoperaciones_efectuadas().'", piezas_a_comprar="'.$reparacion->getpiezas_a_comprar().'", fecha_fin_de_reparacion="'.$reparacion->getfecha_fin_de_reparacion().'", observaciones_y_recomendaciones="'.$reparacion->getobservaciones_y_recomendaciones().'", tecnicos="'.$reparacion->gettecnicos().'"  WHERE reparacion_id='.$reparacion->getId();
        /*$f = fopen("mifichero", "w");
        fwrite($f, $query);
        fclose($f);*/
        $stmt = $conn->prepare($query);
        $exito = $stmt->execute();

        cerrarBD($conn);
        return $exito;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>