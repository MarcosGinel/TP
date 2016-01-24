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
</head>
<body>
<header>
    <?php
        include_once($_SERVER['DOCUMENT_ROOT'] . "/vistas/barraMenu.php");
    ?>
</header>
<div id="main">
    <h1>Telefoneitor</h1>
    <h2>Reparaciones</h2>

    <form action="actualizarReparacion.php" method="post" enctype="multipart/form-data">
        <input type="hidden" id="cliente_id" name="cliente_id" value="<?php echo $reparacion->getClienteId();?>">

        <label>Marca y Modelo :</label>
        <input id="marcamodelo" name="marcamodelo" value="<?php echo $reparacion->getmarcamodelo();?>" type="text">
        <label>Imei :</label>
        <input id="imei" name="imei" value="<?php echo $reparacion->getimei();?>" type="text">
        <label>Sim? :</label>
        <input type="checkbox" name="sim" id="sim" value="<?php echo $reparacion->getsim();?>">
        <label>Funda? :</label>
        <input type="checkbox" name="funda" id="funda" value="<?php echo $reparacion->getfunda();?>">
        <label>SD? :</label>
        <input type="checkbox" name="sd" id="sd" value="<?php echo $reparacion->getsd();?>">
        <label>Cargador? :</label>
        <input type="checkbox" name="cargador" id="cargador" value="<?php echo $reparacion->getcargador();?>">
        <label>Observaciones previas :</label>
        <textarea id="observaciones_previas" name="observaciones_previas"><?php echo $reparacion->getobservaciones_previas();?></textarea>
        <label>Presupuestado? :</label>
        <input type="checkbox" name="estado_de_presupuesto" id="estado_de_presupuesto" value="<?php echo $reparacion->getestado_de_presupuesto();?>">
        <label>Presupuesto :</label>
        <input type="number" id="presupuesto" name="presupuesto" step="any" value="<?php echo $reparacion->getpresupuesto();?>">
        <label>Plazo de Entrega : </label>
        <select id="plazoentrega" name="plazoentrega">
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
        <label>Estado : </label>
        <select id="estado" name="estado">
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
        <label>Operaciones efectuadas :</label>
        <textarea id="operaciones_efectuadas" name="operaciones_efectuadas"><?php $reparacion->getoperaciones_efectuadas()?></textarea>
        <label>Piezas a comprar :</label>
        <textarea id="piezas_a_comprar" name="piezas_a_comprar"><?php $reparacion->getpiezas_a_comprar()?></textarea>
        <label>Fecha fin de reparacion : </label>
        <input type="datetime" name="fecha_fin_de_reparacion" value="<?php echo date($reparacion->getfecha_fin_de_reparacion()) ?>"/>
        <label>Observaciones y recomendaciones :</label>
        <textarea id="observaciones_y_recomendaciones" name="observaciones_y_recomendaciones"><?php echo $reparacion->getobservaciones_y_recomendaciones()?></textarea>
        <input name="submit" type="submit" value=" Guardar ">
    </form>
</div>
</body>
</html>

