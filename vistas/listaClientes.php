<?php
session_start(); // Iniciar la sesion
?>
<!DOCTYPE html>
<html>
<head>
<title>Telefoneitor</title>
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <link href="../css/jquery.dataTables.css" rel="stylesheet" type="text/css">
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery.dataTables.js"></script>
    <meta charset="UTF-8">
</head>

<body>
<header>
    <?php
        include_once($_SERVER['DOCUMENT_ROOT'] . "/vistas/barraMenu.php");
    ?>
</header>
<div id="main">
<h1>Telefoneitor</h1>
<h2>Lista de Clientes:</h2>
<?php
    include_once($_SERVER['DOCUMENT_ROOT'] . "/dominio/Cliente.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/repositorio/repositorioClientes.php");
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    echo "<table id=\"example\" class=\"display\" cellspacing=\"0\" width=\"100%\">";
    echo "<thead>
            <tr>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>";
    echo "<tfoot>
            <tr>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th></th>
            </tr>
        </tfoot>";
    $array = getClientes($username, $password);
    echo "<tbody>";
    foreach ($array as $clave => $valor) {
        echo "<tr>";
        echo "<td>".$valor->getNombre()."</td>";
        echo "<td>".$valor->getDNI()."</td>";
        echo "<td>".$valor->getTelefono()."</td>";
        echo "<td>".$valor->getEmail()."</td>";
        echo '<td><a href="crearReparacion.php?id='.$valor->getId().'"><img class="icono" src="../images/tools.ico"/></a><a href="editarCliente.php?id='.$valor->getId().'"><img class="icono" src="../images/edit.png"/></a></td>';
        echo "</tr>";
    }
    echo "</tbody></table>";
?>
</div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
</body>
</html>
