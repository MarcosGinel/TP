<?php
/**
 * Created by PhpStorm.
 * User: MarcosAlberto
 * Date: 17/01/2016
 * Time: 17:03
 */
session_start();
session_destroy();
header("location: index.php");
?>