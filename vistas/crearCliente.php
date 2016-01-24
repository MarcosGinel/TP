<?php
    session_start(); // Iniciar la sesion

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
            <h2>Clientes</h2>
            <form action="insertaCliente.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                        <label>Nombre :</label>
                        <input class="form-control" id="nombre" name="nombre" placeholder="Introduzca el nombre" type="text">
                </div>
                <div class="form-group">
                    <label>DNI :</label>
                    <input class="form-control" id="dni" name="dni" placeholder="Introduzca el DNI" type="text">
                </div>
                <div class="form-group">
                    <label>Telefono :</label>
                    <input class="form-control" id="telefono" name="telefono" placeholder="Introduzca el número de teléfono" type="text">
                </div>
                <div class="form-group">
                    <label>Email :</label>
                    <input class="form-control" id="email" name="email" placeholder="Introduzca el mail" type="email">
                </div>
                <input class="btn btn-default btn-warning" name="submit" type="submit" value=" Guardar ">
            </form>
        </div>
    </body>
</html>
