
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
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
<title>Telefoneitor</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
    <h1>Telefoneitor</h1>
    <div id="login">
        <div class="row">
        <h3 class="col-md-offset-2">Inicie sesion:</h3>
        </div>
        <div class="container">
        <form action="login.php" method="post" enctype="multipart/form-data">
            <div class="row">
            <div class="form-group col-md-3 col-md-offset-3">
                <label>Usuario :</label>
                <input class="form-control" id="username" name="username" placeholder="username" type="text">
            </div>
            <div class="form-group col-md-3 ">
                <label>Password :</label>
                <input class="form-control" id="password" name="password" placeholder="**********" type="password">
            </div>
            </div>
            <div class="row">
                <input class="btn btn-primary col-md-4 col-md-offset-4" name="submit" type="submit" value=" Login ">
            </div>

            <div class="container col-md-12 col-md-offset-4">
            <br/><span><?php echo $error; ?></span>
            <br/><span><?php echo $errorCredenciales; ?></span>
            </div>
        </form>
        </div>
    </div>
</div>
</body>
</html>
