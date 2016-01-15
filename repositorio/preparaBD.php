<?php

function preparaBD($username, $password)
{
    $servername = "localhost";
    $dbname = "telefoneitor_db";
    try{
        /* Para el localhost */
        /*$dbh = new PDO("mysql:host=$hostname;dbname=mysql", $username, $password); */
        // Para la web
        $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $dbh;
    } catch (PDOException $PDOError) {
        echo "Error en la conexión: " .$PDOError->GetMessage();
    }
}

function cerrarBD($dbh)
{
    $dbh = null;
}

?>