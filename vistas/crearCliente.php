<?php
    session_start(); // Iniciar la sesion

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
