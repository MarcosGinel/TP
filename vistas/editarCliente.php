<?php
/**
 * Created by PhpStorm.
 * User: MarcosAlberto
 * Date: 23/01/2016
 * Time: 18:31
 */
    session_start();
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $cliente_id = $_GET['id'];

    include_once($_SERVER['DOCUMENT_ROOT']."/dominio/Cliente.php");
    include_once($_SERVER['DOCUMENT_ROOT']."/repositorio/repositorioClientes.php");

    $cliente = getClienteById($username, $password, $cliente_id);
?>
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
        <h2>Clientes</h2>
        <form action="actualizarCliente.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="cliente_id" name="cliente_id" value="<?php echo $cliente_id?>"/>
            <label for="nombre">Nombre :</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $cliente->getNombre() ?>"/>
            <label for="dni">DNI :</label>
            <input type="text" id="dni" name="dni" value="<?php echo $cliente->getDNI()?>" />
            <label for="telefono">Telefono :</label>
            <input type="text" id="telefono" name="telefono" value="<?php echo $cliente->getTelefono()?>" />
            <label for="email">Email :</label>
            <input id="email" name="email" value="<?php echo $cliente->getEmail()?>" type="email"/>
            <input name="submit" type="submit" value=" Actualizar "/>
        </form>
    </div>
</body>
</html>
