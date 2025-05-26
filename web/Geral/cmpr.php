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


        $result = $conn->query("SELECT disponiveis FROM shows WHERE chave = '$chave'");
        $row = $result->fetch_assoc();
        $disp = $row['disponiveis'];



        $key = md5($_POST['Comprar'].$disp);


        $sql = "UPDATE usuarios SET ingressos = CONCAT('$key;',ingressos) WHERE ID = ".$_SESSION['id'];
        $conn->query($sql);     #faz a key do ingresso = hash da chave+ num ingresso disponivel (depois soma com os outros ingressos)
                            
        

        $conn->close(); 

        header("location: ../Abas/eventos/evnts.php");


    }

}

?>