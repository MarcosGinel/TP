
<?php
include('login.php'); // El script de login
if(isset($_SESSION["errorCredenciales"]))
    $errorCredenciales = $_SESSION["errorCredenciales"];
else
    $errorCredenciales = "";
if(isset($_SESSION['login_user'])){
    header("location: vistas/crearCliente.php"); // Tenemos que establecer cual va a ser la siguiente
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Telefoneitor</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h1>Telefoneitor</h1>
<div id="login">
<h2>Inicie sesion:</h2>
<form action="login.php" method="post" enctype="multipart/form-data">
<label>Usuario :</label>
<input id="username" name="username" placeholder="username" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<input name="submit" type="submit" value=" Login ">
<br/><span><?php echo $error; ?></span>
<br/><span><?php echo $errorCredenciales; ?></span>
</form>
</div>
</div>
</body>
</html>
