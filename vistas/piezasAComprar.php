<?php
session_start(); // Iniciar la sesion
$username = $_SESSION['username'];
$password = $_SESSION['password'];

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
    <h2>Piezas a comprar: </h2>
    <?php
    include_once($_SERVER['DOCUMENT_ROOT'] . "/dominio/Cliente.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/repositorio/repositorioClientes.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/repositorio/repositorioReparaciones.php");
    echo "<table id=\"example\" class=\"display\" cellspacing=\"0\" width=\"100%\">";
    echo "<thead>
            <tr>
                <th>Cliente</th>
                <th>Modelo</th>
                <th>Plazo de Entrega</th>
                <th>Piezas a comprar</th>
                <th>Fecha de entrega reparación</th>
                <th>Reparacion creada en</th>
                <th></th>
            </tr>
        </thead>";
    echo "<tfoot>
            <tr>
                <th>Cliente</th>
                <th>Modelo</th>
                <th>Plazo de Entrega</th>
                <th>Piezas a comprar</th>
                <th>Fecha de entrega reparación</th>
                <th>Reparacion creada en</th>
                <th></th>
            </tr>
        </tfoot>";
    $array = getPiezas($username, $password);
    echo "<tbody>";
    foreach ($array as $clave => $valor) {
        $cliente_id_iterador = $valor->getClienteId();
        $cliente = getClienteById($username,$password,$cliente_id_iterador);
        $nombreCliente = $cliente->getNombre();

        if($username == 'admin') {
            echo "<tr>";
            echo "<td>".$nombreCliente."</td>";
            echo "<td>".$valor->getmarcamodelo()."</td>";
            echo "<td>".$valor->getplazoentrega()."</td>";
            echo "<td>".$valor->getpiezas_a_comprar()."</td>";
            echo "<td>".$valor->getfecha_fin_de_reparacion()."</td>";
            //echo "<td>".$valor->getobservaciones_y_recomendaciones()."</td>";
            echo "<td>".$valor->getcreado_por()."</td>";
            echo '<td><a href="editarReparacion.php?id='.$valor->getId().'"><img class="icono" src="../images/edit.png"/></a></td>';
            echo "</tr>";

        }else {
            if($valor->getcreado_por() == $username) {
                echo "<tr>";
                echo "<td>".$nombreCliente."</td>";
                echo "<td>".$valor->getmarcamodelo()."</td>";
                echo "<td>".$valor->getplazoentrega()."</td>";
                echo "<td>".$valor->getpiezas_a_comprar()."</td>";
                echo "<td>".$valor->getfecha_fin_de_reparacion()."</td>";
                //echo "<td>".$valor->getobservaciones_y_recomendaciones()."</td>";
                echo "<td>".$valor->getcreado_por()."</td>";
                echo "</tr>";
            }
        }
    }
    echo "</tbody></table>";
    ?>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        } );
    } );
</script>
</body>
</html>