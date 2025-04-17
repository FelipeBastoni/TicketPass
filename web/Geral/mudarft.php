<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);
$senhahash = md5($senha);




$sql = "UPDATE usuarios SET foto = 'https://p2.trrsf.com/image/fget/cf/1200/1200/middle/images.terra.com/2018/07/17/1531863463846.jpg' WHERE ID = ".$_SESSION['id_user'];

$conn->query($sql);

$conn->close(); 

header("location: ../Abas/eventos/evnts.php");



?>