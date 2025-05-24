<?php


if ($_SERVER['REQUEST_METHOD'] == "POST") {

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "INSERT INTO shows (nome, preco, data, local, banner, lotação, chave) VALUES ('{$_POST['titulo']}','{$_POST['preco']}','{$_POST['data']}','{$_POST['local']}','{$_POST['banner']}','{$_POST['lotacao']}','{$_POST['chave']}')";

$conn->query($sql);
$conn->close(); 

}

?>

<!DOCTYPE html>
<html lang="pt-br">


<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TicketPass - Aba do Gestor</title>

    <link rel="stylesheet" href="styleg.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../Geral/cods.js"></script>

        

</head>

<body>


<div class="top">

    <div class="cnt">

        <div class="logo">

        
            <div class="logoi">

                <p class="plog">TicketPass</p>

            </div>

        </div>


        <div class="itms" onclick="window.location.href='gestor.php'">

            <p class="ptop">Criar Evento</p>        

        </div>

        
        <div class="itms" onclick="window.location.href='confeingr.php'">

            <p class="ptop">Conferir Ingresso</p>        

        </div>


        <div class="itmlg" onclick="window.location.href='../logout.php'">

            <p type="button" class="ptop">Sair</p>

        </div>


</div>





<div class="main">

</div>





</body>

</html>