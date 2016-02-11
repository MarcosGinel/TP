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

        <h2>Clientes</h2>
        <form action="actualizarCliente.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="cliente_id" name="cliente_id" value="<?php echo $cliente_id?>"/>
            <div class="form-group">
                <label for="nombre">Nombre :</label>
                <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $cliente->getNombre() ?>"/>
            </div>
            <div class="form-group">
                <label for="dni">DNI :</label>
                <input class="form-control" type="text" id="dni" name="dni" value="<?php echo $cliente->getDNI()?>" />
            </div>
            <div class="form-group">
                <label for="telefono">Telefono :</label>
                <input class="form-control" type="text" id="telefono" name="telefono" value="<?php echo $cliente->getTelefono()?>" />
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input class="form-control" id="email" name="email" value="<?php echo $cliente->getEmail()?>" type="email"/>
            </div>
            <input class="btn btn-default btn-warning" name="submit" type="submit" value=" Actualizar "/>
        </form>
    </div>
</body>
</html>
