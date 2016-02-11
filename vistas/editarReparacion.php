<?php
/**
 * Created by PhpStorm.
 * User: MarcosAlberto
 * Date: 23/01/2016
 * Time: 19:44
 */

session_start();
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$reparacion_id = $_GET['id'];

include_once($_SERVER['DOCUMENT_ROOT']."/dominio/Reparacion.php");
include_once($_SERVER['DOCUMENT_ROOT']."/repositorio/repositorioReparaciones.php");

$reparacion = getReparacionById($username, $password, $reparacion_id);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Telefoneitor</title>
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header class="cabecera">
    <?php
        include_once($_SERVER['DOCUMENT_ROOT'] . "/vistas/barraMenu.php");
    ?>
</header>
<div id="main">
    <h1>Telefoneitor</h1>
    <h2>Reparaciones</h2>

    <form action="actualizarReparacion.php" method="post" enctype="multipart/form-data">
        <input type="hidden" id="cliente_id" name="cliente_id" value="<?php echo $reparacion->getClienteId();?>">

        <div class="form-group col-md-6">
            <label class="control-label">Marca y Modelo :</label>
            <input class="form-control" id="marcamodelo" name="marcamodelo" value="<?php echo $reparacion->getmarcamodelo();?>" type="text">
        </div>
        <div class="form-group col-md-6">
            <label class="control-label">Imei :</label>
            <input class="form-control" id="imei" name="imei" value="<?php echo $reparacion->getimei();?>" type="text">
        </div>
        <div class="form-group col-md-3">
            <label class="control-label">Sim? :</label>
            <input class="form-control" type="checkbox" name="sim" id="sim" value="<?php echo $reparacion->getsim();?>">
        </div>
        <div class="form-group col-md-3 ">
            <label class="control-label">Funda? :</label>
            <input class="form-control" type="checkbox" name="funda" id="funda" value="<?php echo $reparacion->getfunda();?>">
        </div>
        <div class="form-group col-md-3 ">
            <label class="control-label">SD? :</label>
            <input class="form-control" type="checkbox" name="sd" id="sd" value="<?php echo $reparacion->getsd();?>">
        </div>
        <div class="form-group col-md-3 ">
            <label class="control-label">Cargador? :</label>
            <input class="form-control" type="checkbox" name="cargador" id="cargador" value="<?php echo $reparacion->getcargador();?>">
        </div>
        <div class="form-group">
            <label class="control-label">Observaciones previas :</label>
            <textarea class="form-control" id="observaciones_previas" name="observaciones_previas"><?php echo $reparacion->getobservaciones_previas();?></textarea>
        </div>
        <div class="form-group col-md-3 presupuestado">
            <label class="control-label">Presupuestado? :</label>
            <input class="form-control" type="checkbox" name="estado_de_presupuesto" id="estado_de_presupuesto" value="<?php echo $reparacion->getestado_de_presupuesto();?>">
        </div>
        <div class="form-group col-md-9">
            <label class="control-label">Presupuesto :</label>
            <input class="form-control" type="number" id="presupuesto" name="presupuesto" step="any" value="<?php echo $reparacion->getpresupuesto();?>">
        </div>

        <div class="form-group col-md-6">
            <label class="control-label">Plazo de Entrega : </label>
            <select class="form-control" id="plazoentrega" name="plazoentrega">
                <?php
                    if($reparacion->getplazoentrega() == "Urgente")
                        echo '<option value="Urgente" selected>Urgente</option>';
                    else
                        echo '<option value="Urgente">Urgente</option>';
                    if($reparacion->getplazoentrega() == "12 horas")
                        echo '<option value="12 horas" selected>12 horas</option>';
                    else
                        echo '<option value="12 horas">12 horas</option>';
                    if($reparacion->getplazoentrega() == "24 horas")
                        echo '<option value="24 horas" selected>24 horas</option>';
                    else
                        echo '<option value="24 horas">24 horas</option>';
                    if($reparacion->getplazoentrega() == "48 horas")
                        echo '<option value="48 horas" selected>48 horas</option>';
                    else
                        echo '<option value="48 horas">48 horas</option>';
                    if($reparacion->getplazoentrega() == "72 horas")
                        echo '<option value="72 horas" selected>72 horas</option>';
                    else
                        echo '<option value="72 horas">72 horas</option>';
                    if($reparacion->getplazoentrega() == "1 semana")
                        echo '<option value="1 semana" selected>1 semana</option>';
                    else
                        echo '<option value="1 semana">1 semana</option>';
                ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label class="control-label">Estado : </label>
            <select class="form-control" id="estado" name="estado">
                    <?php
                    if($reparacion->getestado()=="No reparado")
                        echo '<option value="No reparado" selected>No reparado</option>';
                    else
                        echo '<option value="No reparado">No reparado</option>';
                    if($reparacion->getestado()=="Reparado")
                        echo '<option value="Reparado" selected>Reparado</option>';
                    else
                        echo '<option value="Reparado">Reparado</option>';
                    if($reparacion->getestado()=="Reparado")
                        echo '<option value="Reparado" selected>Reparado</option>';
                    else
                        echo '<option value="Reparado">Reparado</option>';
                    if($reparacion->getestado()=="Faltan piezas")
                        echo '<option value="Faltan piezas" selected>Faltan piezas</option>';
                    else
                        echo '<option value="Faltan piezas">Faltan piezas</option>';
                    if($reparacion->getestado()=="A reparar")
                        echo '<option value="A reparar" selected>A reparar</option>';
                    else
                        echo '<option value="A reparar">A reparar</option>';
                    ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label class="control-label">Operaciones efectuadas :</label>
            <textarea class="form-control" id="operaciones_efectuadas" name="operaciones_efectuadas"><?php $reparacion->getoperaciones_efectuadas()?></textarea>
        </div>
        <div class="form-group col-md-6">
            <label class="control-label">Piezas a comprar :</label>
            <textarea class="form-control" id="piezas_a_comprar" name="piezas_a_comprar"><?php $reparacion->getpiezas_a_comprar()?></textarea>
        </div>
        <div class="form-group col-md-6">
            <label class="control-label">Fecha fin de reparacion : </label>
            <input  class="form-control" type="datetime" name="fecha_fin_de_reparacion" value="<?php echo date($reparacion->getfecha_fin_de_reparacion()) ?>"/>
        </div>
        <div class="form-group col-md-6">
            <label class="control-label">Observaciones y recomendaciones :</label>
            <textarea class="form-control" id="observaciones_y_recomendaciones" name="observaciones_y_recomendaciones"><?php echo $reparacion->getobservaciones_y_recomendaciones()?></textarea>
        </div>
        <input class="btn btn-default btn-warning col-md-offset-11" name="submit" type="submit" value=" Guardar ">
    </form>
</div>
</body>
</html>

