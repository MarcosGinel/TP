<?php
session_start(); // Iniciar la sesion
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
<h2>Lista de Clientes:</h2>
<?php
    include_once($_SERVER['DOCUMENT_ROOT'] . "/dominio/Cliente.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/repositorio/repositorioClientes.php");
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $array = getClientes($username, $password);
    foreach ($array as $clave => $valor)
       $valor->imprimeCliente();
?>
</div>
</body>
</html>
