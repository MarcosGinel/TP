<?php
/**
 * Created by PhpStorm.
 * User: MarcosAlberto
 * Date: 25/01/2016
 * Time: 17:28
 */
session_start(); // Iniciar la sesion

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

    <h2>Buscar por estado:</h2>

    <form action="buscarReparacionesPorEstado.php" method="post" enctype="multipart/form-data">
        <div class="form-group col-md-6">
            <label class="control-label">Estado : </label>
            <select class="form-control" id="estado" name="estado">
                <option value="No reparado">No reparado</option>
                <option value="Reparado">Reparado</option>
                <option value="Faltan piezas">Faltan piezas</option>
                <option value="A reparar">A reparar</option>
            </select>
        </div>
        <input class="btn btn-default btn-warning col-md-offset-11" name="submit" type="submit" value=" Guardar ">
    </form>

</div>
<div class="container row"><p></p></div>
</body>
</html>