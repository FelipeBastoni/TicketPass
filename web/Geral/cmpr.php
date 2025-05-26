<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if ($_POST['Comprar']){

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";

        $conn = new mysqli($servername, $username, $password, $dbname);

        $sqlshow = "UPDATE shows SET disponiveis = disponiveis - 1 WHERE chave = '".$_POST['Comprar']."'";
        $conn->query($sqlshow);


        $key = md5($_POST['Comprar']);


        $sql = "UPDATE usuarios SET ingressos = CONCAT('".$key."', disponiveis, ';',ingressos) WHERE ID = ".$_SESSION['id'];
        $conn->query($sql);     #faz a key do ingresso = hash da chave+ num ingresso disponivel (depois soma com os outros ingressos)
                                #DOIS PROBREMA, SÓ TÁ INDO AC PRA TABLE E O DISPONIVEIS N VAI SER HASH
        

        $conn->close(); 

        header("location: ../Abas/eventos/evnts.php");


    }

}

?>