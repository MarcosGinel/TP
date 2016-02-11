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
    <h1>Telefoneitor</h1>
    <h2>Lista de Reparaciones:</h2>
    <?php
    include_once($_SERVER['DOCUMENT_ROOT'] . "/dominio/Cliente.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/dominio/Reparacion.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/repositorio/repositorioClientes.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/repositorio/repositorioReparaciones.php");
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    echo "<table id=\"example\" class=\"display\" cellspacing=\"0\" width=\"100%\">";
    echo "<thead>
            <tr>
                <th>Cliente</th>
                <th>Modelo</th>
                <th>Imei</th>
                <th>Complementos</th>
                <th>Observaciones</th>
                <th>Presupuesto</th>
                <th>Ok?</th>
                <th>Plazo de Entrega</th>
                <th>Estado</th>
                <th>Operaciones hechas</th>
                <th>Piezas a comprar</th>
                <th>Fecha de entrega reparación</th>
                <!--<th>Recomendaciones</th>-->
                <th>Zona</th>
                <th></th>
            </tr>
        </thead>";
    echo "<tfoot>
            <tr>
                <th>Cliente</th>
                <th>Modelo</th>
                <th>Imei</th>
                <th>Complementos</th>
                <th>Observaciones</th>
                <th>Presupuesto</th>
                <th>Valorado?</th>
                <th>Plazo de Entrega</th>
                <th>Estado</th>
                <th>Operaciones hechas</th>
                <th>Piezas a comprar</th>
                <th>Fecha de entrega reparación</th>
                <!--<th>Recomendaciones</th>-->
                <th>Zona</th>
                <th></th>
            </tr>
        </tfoot>";
    $array = getReparaciones($username, $password);
    echo "<tbody>";
    foreach ($array as $clave => $valor) {
        $cliente_id_iterador = $valor->getClienteId();
        $cliente = getClienteById($username,$password,$cliente_id_iterador);
        $nombreCliente = $cliente->getNombre();
        $funda = $valor->getfunda();
        $sd = $valor->getsd();
        $sim = $valor->getsim();
        $cargador = $valor->getcargador();
        $iconoFunda = '<img class="iconoFunda" src="../images/funda.png"/>';
        $iconoSd = '<img class="iconoComplemento" src="../images/sd.png"/>';
        $iconoSim = '<img class="iconoSd" src="../images/sim.png"/>';
        $iconoCargador = '<img class="iconoComplemento" src="../images/cargador.png"/>';
        $iconos = "";
        if($funda)
            $iconos = $iconos.$iconoFunda;
        if($sim)
            $iconos = $iconos.$iconoSim;
        if($sd)
            $iconos = $iconos.$iconoSd;
        if($cargador)
            $iconos = $iconos.$iconoCargador;

        $presupuestado = $valor->getestado_de_presupuesto();
        if($presupuestado)
            $yesorno = '<img class="iconoComplemento" src="../images/yes.png"/>';
        else
            $yesorno = '<img class="iconoComplemento" src="../images/no.png"/>';

        if($username == 'empleado') {
            if($valor->getcreado_por() == 'empleado') {
                echo "<tr>";
                echo "<td>".$nombreCliente."</td>";
                echo "<td>".$valor->getmarcamodelo()."</td>";
                echo "<td>".$valor->getimei()."</td>";
                echo "<td>".$iconos."</td>";
                echo "<td>".$valor->getobservaciones_previas()."</td>";
                echo "<td>".$valor->getpresupuesto()."</td>";
                echo "<td>".$yesorno."</td>";
                echo "<td>".$valor->getplazoentrega()."</td>";
                echo "<td>".$valor->getestado()."</td>";
                echo "<td>".$valor->getoperaciones_efectuadas()."</td>";
                echo "<td>".$valor->getpiezas_a_comprar()."</td>";
                echo "<td>".$valor->getfecha_fin_de_reparacion()."</td>";
                //echo "<td>".$valor->getobservaciones_y_recomendaciones()."</td>";
                echo "<td>".$valor->getcreado_por()."</td>";
                echo '<td><a href="editarReparacion.php?id='.$valor->getId().'"><img class="icono" src="../images/edit.png"/></a></td>';
                echo "</tr>";
            }
        }else {
            echo "<tr>";
            echo "<td>".$nombreCliente."</td>";
            echo "<td>".$valor->getmarcamodelo()."</td>";
            echo "<td>".$valor->getimei()."</td>";
            echo "<td>".$iconos."</td>";
            echo "<td>".$valor->getobservaciones_previas()."</td>";
            echo "<td>".$valor->getpresupuesto()."</td>";
            echo "<td>".$yesorno."</td>";
            echo "<td>".$valor->getplazoentrega()."</td>";
            echo "<td>".$valor->getestado()."</td>";
            echo "<td>".$valor->getoperaciones_efectuadas()."</td>";
            echo "<td>".$valor->getpiezas_a_comprar()."</td>";
            echo "<td>".$valor->getfecha_fin_de_reparacion()."</td>";
            //echo "<td>".$valor->getobservaciones_y_recomendaciones()."</td>";
            echo "<td>".$valor->getcreado_por()."</td>";
            echo '<td><a href="editarReparacion.php?id='.$valor->getId().'"><img class="icono" src="../images/edit.png"/></a></td>';
            echo "</tr>";
        }
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
