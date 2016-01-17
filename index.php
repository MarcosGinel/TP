
<?php
include('login.php'); // El script de login

if(isset($_SESSION['login_user'])){
header("location: nuestraPaginaSiguiente.php"); // Tenemos que establecer cual va a ser la siguiente
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
<form action="" method="post">
<label>Usuario :</label>
<input id="name" name="username" placeholder="username" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<input name="submit" type="submit" value=" Login ">
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>
