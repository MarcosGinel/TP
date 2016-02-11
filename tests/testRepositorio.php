<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>


        <?php
        /**
         * Created by PhpStorm.
         * User: MarcosAlberto
         * Date: 15/01/2016
         * Time: 23:14
         */

        //    echo phpinfo();
        $username = "admin";
        $password = "admin";

        chdir($_SERVER['DOCUMENT_ROOT']);
        // echo $_SERVER['DOCUMENT_ROOT'];
        include_once($_SERVER['DOCUMENT_ROOT']."/repositorio/repositorioClientes.php");
        include_once($_SERVER['DOCUMENT_ROOT']."/dominio/Cliente.php");
        include_once($_SERVER['DOCUMENT_ROOT']."/repositorio/repositorioReparaciones.php");
        include_once($_SERVER['DOCUMENT_ROOT']."/dominio/Reparacion.php");
        $array = getClientes($username, $password);
        foreach ($array as $clave => $valor)
            $valor->imprimeCliente();

        $cliente = getClienteById($username, $password, 1);
        $cliente->imprimeCliente();

        $array = getClientesByNombre($username, $password, "Se");
        foreach ($array as $clave => $valor)
            $valor->imprimeCliente();

        $cliente = getClienteByDNI($username, $password, "61111111X");
        $cliente->imprimeCliente();

        $cliente = getClienteByTelefono($username, $password, "666666666");
        $cliente->imprimeCliente();

        insertarCliente("admin", "admin","Marcos","12345679N","lala@lala.com","954666222");
        $array = getClientes($username, $password);
        foreach ($array as $clave => $valor)
            $valor->imprimeCliente();

        $cliente = new Cliente(0, "Marcos 2", "87654321N", "lalal@lala.com", "999999999", "");
        insertarObjetoCliente("admin", "admin", $cliente);
        $array = getClientes($username, $password);
        foreach ($array as $clave => $valor)
            $valor->imprimeCliente();

        actualizaCliente("admin", "admin", 1, "MiNombre", "99999999N", "prueba@prueba.com", "555555555");
        $array = getClientes($username, $password);
        foreach ($array as $clave => $valor)
            $valor->imprimeCliente();

        $reparacion = new Reparacion(0, 1, "Galaxy Spoyas", "imeilalala@lala.com", True,True,True,True,"Mi prima de observación previa", 56.05, True, 'Urgente', 'No reparado', "lalalala", "mispiezas", null ,"observaciones", $username);
        $exito = insertarObjetoReparacion($username, $password, $reparacion);
        echo "Exito = " + $exito;
        $reparacion = getReparacionById($username, $password, 2);
        if($reparacion == null)
            echo "Encontrado";
        else
            echo "No encontrado";
        ?>
    </body>
</html>
