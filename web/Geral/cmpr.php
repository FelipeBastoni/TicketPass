<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if ($_POST['Comprar']){

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";

        $conn = new mysqli($servername, $username, $password, $dbname);

        $sql = "UPDATE usuarios SET ingressos = CONCAT('".$_POST['Comprar'].";', ingressos) WHERE ID = ".$_SESSION['id'];

        $conn->query($sql);
        $conn->close(); 

        header("location: ../Abas/eventos/evnts.php");


    }

}

?>