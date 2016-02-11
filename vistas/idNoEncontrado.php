<?php
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

    <h2>Reparaciones para las fechas: </h2>
    <p>No se encuentra la reparación con dicho ID</p>
    <p><a href="reparacionPorId.php">Buscador por id</a></p>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
</body>
</html>