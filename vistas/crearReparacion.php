<?php
session_start(); // Iniciar la sesion
$cliente_id = $_GET['id'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Telefoneitor</title>
<link href="style.css" rel="stylesheet" type="text/css">
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
<?php
    echo $cliente_id;

?>
    <form action="insertaReparacion.php" method="post" enctype="multipart/form-data">
         <input type="hidden" id="cliente_id" name="cliente_id" value="<?php echo $cliente_id;?>">

         <label>Marca y Modelo :</label>
         <input id="marcamodelo" name="marcamodelo" placeholder="Introduzca la marca y elmodelo" type="text">
         <label>Imei :</label>
         <input id="imei" name="imei" placeholder="Introduzca el imei" type="text">
         <label>Sim? :</label>
         <input type="checkbox" name="sim" id="sim">
         <label>Funda? :</label>
         <input type="checkbox" name="funda" id="funda">
         <label>SD? :</label>
         <input type="checkbox" name="sd" id="sd">
         <label>Cargador? :</label>
         <input type="checkbox" name="cargador" id="cargador">
         <label>Observaciones previas :</label>
         <textarea id="observaciones_previas" name="observaciones_previas">...</textarea>
         <label>Presupuestado? :</label>
         <input type="checkbox" name="estado_de_presupuesto" id="estado_de_presupuesto">
         <label>Presupuesto :</label>
         <input type="number" id="presupuesto" name="presupuesto" step="any">
         <label>Plazo de Entrega : </label>
         <select id="plazoentrega" name="plazoentrega">
            <option value="Urgente">Urgente</option>
            <option value="12 horas">12 horas</option>
            <option value="24 horas">24 horas</option>
             <option value="36 horas">36 horas</option>
             <option value="48 horas">48 horas</option>
             <option value="72 horas">72 horas</option>
             <option value="1 semana">1 semana</option>
         </select>
        <label>Estado : </label>
        <select id="estado" name="estado">
            <option value="No reparado">No reparado</option>
            <option value="Reparado">Reparado</option>
            <option value="Faltan piezas">Faltan piezas</option>
            <option value="A reparar">A reparar</option>
        </select>
        <label>Operaciones efectuadas :</label>
        <textarea id="operaciones_efectuadas" name="operaciones_efectuadas">...</textarea>
        <label>Piezas a comprar :</label>
        <textarea id="piezas_a_comprar" name="piezas_a_comprar"></textarea>
        <label>Fecha fin de reparacion : </label>
        <input type="datetime-local" name="fecha_fin_de_reparacion" value="<?php echo date("Y-m-d\TH:i"); ?>"/>
        <label>Observaciones y recomendaciones :</label>
        <textarea id="observaciones_y_recomendaciones" name="observaciones_y_recomendaciones">...</textarea>
         <input name="submit" type="submit" value=" Guardar ">
    </form>
?>
</div>
</body>
</html>
