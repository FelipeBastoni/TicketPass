<?php

    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $senhahash = md5($senha);


    $sql = "UPDATE usuarios SET ingressos = 'fff' WHERE ID = ".$_SESSION['id_user'];

    $conn->query($sql);

    $conn->close(); 

    header("location: ../Abas/eventos/evnts.php");


    
?>