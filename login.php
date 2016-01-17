<?php
session_start(); // Iniciar la sesion
$error=''; // Mensaje de error
if (isset($_POST['submit'])) {
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
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// Seleccionamos la base de datos, ponemos la database y la conexion definida antes
//$db = mysql_select_db("", $connection);
// LA jquery para seleccionar los usuarios 
//$query = mysql_query("select * from login where password='$password' AND username='$username'", $connection); // modificala
//$rows = mysql_num_rows($query);
if ($conn != "") {
$_SESSION['login_user']=$username; // iniciamos sesion
header("location: Loquesea.php"); // Hacia la otra pagina
} else {
$error = "Usuario o contraseña introducidos son incorrectos";
}
mysql_close($conn); // Cerramos
}
}
?>
