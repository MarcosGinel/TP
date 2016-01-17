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
            <h2>Clientes</h2>
            <form action="insertaCliente.php" method="post" enctype="multipart/form-data">
                <label>Nombre :</label>
                <input id="nombre" name="nombre" placeholder="Introduzca el nombre" type="text">
                <label>DNI :</label>
                <input id="dni" name="dni" placeholder="Introduzca el DNI" type="text">
                <label>Telefono :</label>
                <input id="telefono" name="telefono" placeholder="Introduzca el número de teléfono" type="text">
                <label>Email :</label>
                <input id="email" name="email" placeholder="Introduzca el mail" type="email">
                <input name="submit" type="submit" value=" Guardar ">
            </form>
        </div>
    </body>
</html>
