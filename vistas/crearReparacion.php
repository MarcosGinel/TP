<?php
session_start(); // Iniciar la sesion
$cliente_id = $_GET['id'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include_once($_SERVER['DOCUMENT_ROOT'] . "/vistas/header.php");
    ?>

</head>
<body>
<header class="cabecera">
    <?php
        include_once($_SERVER['DOCUMENT_ROOT'] . "/vistas/barraMenu.php");
    ?>
</header>
<div id="main">

<h2>Reparaciones</h2>

    <form action="insertaReparacion.php" method="post" enctype="multipart/form-data">
         <input type="hidden" id="cliente_id" name="cliente_id" value="<?php echo $cliente_id;?>">

        <div class="form-group col-md-6">
         <label class="control-label">Marca y Modelo :</label>
         <input class="form-control" id="marcamodelo" name="marcamodelo" placeholder="Introduzca la marca y elmodelo" type="text">
        </div>
        <div class="form-group col-md-6">
         <label class="control-label">Imei :</label>
         <input class="form-control" id="imei" name="imei" placeholder="Introduzca el imei" type="text">
        </div>
        <div class="form-group col-md-3">
         <label class="control-label">Sim? :</label>
         <input class="form-control" type="checkbox" name="sim" id="sim">
        </div>
        <div class="form-group col-md-3">
         <label class="control-label">Funda? :</label>
         <input class="form-control" type="checkbox" name="funda" id="funda">
        </div>
        <div class="form-group col-md-3">
         <label class="control-label">SD? :</label>
         <input class="form-control" type="checkbox" name="sd" id="sd">
        </div>
        <div class="form-group col-md-3 ">
         <label class="control-label">Cargador? :</label>
         <input class="form-control" type="checkbox" name="cargador" id="cargador">
        </div>
        <div class="form-group">
         <label class="control-label">Observaciones previas :</label>
         <textarea class="form-control" id="observaciones_previas" name="observaciones_previas"></textarea>
        </div>
        <div class="form-group col-md-3 presupuestado">
         <label class="control-label">Presupuestado? :</label>
         <input style="margin: 0px !important;" class="form-control" type="checkbox" name="estado_de_presupuesto" id="estado_de_presupuesto">
        </div>
        <div class="form-group col-md-9">
         <label class="control-label">Presupuesto :</label>
         <input class="form-control" type="number" id="presupuesto" name="presupuesto" step="any">
        </div>

        <div class="form-group col-md-6">
         <label class="control-label">Plazo de Entrega : </label>
         <select class="form-control" id="plazoentrega" name="plazoentrega">
            <option value="Urgente">Urgente</option>
            <option value="12 horas">12 horas</option>
            <option value="24 horas">24 horas</option>
             <option value="36 horas">36 horas</option>
             <option value="48 horas">48 horas</option>
             <option value="72 horas">72 horas</option>
             <option value="1 semana">1 semana</option>
         </select>
        </div>
        <div class="form-group col-md-6">
        <label class="control-label">Estado : </label>
        <select class="form-control" id="estado" name="estado">
            <option value="No reparado">No reparado</option>
            <option value="Reparado">Reparado</option>
            <option value="Faltan piezas">Faltan piezas</option>
            <option value="A reparar">A reparar</option>
        </select>
        </div>
        <div class="form-group col-md-6">
        <label class="control-label">Operaciones efectuadas :</label>
        <textarea class="form-control" id="operaciones_efectuadas" name="operaciones_efectuadas"></textarea>
        </div>
        <div class="form-group col-md-6">
        <label class="control-label">Piezas a comprar :</label>
        <textarea class="form-control" id="piezas_a_comprar" name="piezas_a_comprar"></textarea>
        </div>
        <div class="form-group col-md-6">
        <label class="control-label">Fecha fin de reparacion : </label>
        <input class="form-control" type="datetime-local" name="fecha_fin_de_reparacion" value="<?php echo date("Y-m-d\TH:i"); ?>"/>
        </div>
        <div class="form-group col-md-6">
            <label class="control-label">Observaciones y recomendaciones :</label>
            <textarea class="form-control" id="observaciones_y_recomendaciones" name="observaciones_y_recomendaciones"></textarea>
        </div>
        <?php
            if($username == "admin")
                $mensaje = '<div class="form-group col-md-12">';
            else
                $mensaje = '<div class="form-group col-md-12 noTecnicos">';
            echo $mensaje;
        ?>
            <label class="control-label">Tecnicos asociados :</label>
            <textarea class="form-control" id="tecnicos" name="tecnicos"></textarea>
        </div>
         <input class="btn btn-default btn-warning col-md-offset-11" name="submit" type="submit" value=" Guardar "><br/>
    </form>

</div>
<div class="container row"><p></p></div>
</body>
</html>
