<?php
session_start(); // Iniciar la sesion
if(isset($_SESSION["errorCredenciales"]))
    $errorCredenciales = $_SESSION["errorCredenciales"];
$error=''; // Mensaje de error

if (empty($_POST['username']) || empty($_POST['password'])) {
    $error = "Los campos no pueden estar vacios";
}
else
{
    // Definimos las variables $username y $password
    $username=$_POST['username'];
    $password=$_POST['password'];
    // Conexion con la base de datos, tenemos que poner el nombre, usuario y contraseña
    include_once($_SERVER['DOCUMENT_ROOT'] . "/repositorio/preparaBD.php");
    $conn = preparaBD($username, $password);
    //$connection = mysql_connect("", "", ""); //Marcos rellena datos
    // Por tema de inyeccion en mysql hay que ser precavidos
    $username = stripslashes($username);
    $password = stripslashes($password);
    if ($conn != null) {
        $_SESSION['username']=$username; // iniciamos sesion
        $_SESSION['password']=$password;
        header("location: vistas/crearCliente.php"); // Hacia la otra pagina

    } else {
        $errorCredenciales = "Usuario o contraseña introducidos son incorrectos";
        $_SESSION["errorCredenciales"] = $errorCredenciales;
        header("location: index.php");
    }
    cerrarBD($conn);
}

?>
