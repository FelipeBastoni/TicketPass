
<?php

session_start();
require '../../Geral/Obj.php';


$show = [];

function mstringr(){

$n = 0;

$expo = explode(";",$_SESSION['ingressos']);

$nexp = count($expo);

global $show;

while($nexp>$n){

    $chave = $expo[$n];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM shows WHERE chave = '$chave';";
    $result = $conn->query($sql);


    if ($result->num_rows > 0){

        while($row = $result->fetch_assoc()){

            $show[] = new Show($row["nome"], $row["preco"], $row["data"], $row["local"], $row["banner"], $row["lotação"], $row["chave"]);

        }


    }

    $n++;

}

$conn->close();


}


function ads(){

    global $show;

    $ns = count($show);

    $n = 0;

    while($ns>$n){

        echo '<script src="cods.js"></script>';

        echo '<div class="show">';

        $show[$n]->exibiring();

        echo '</div>';

        $n++;


    }

    // $kys = array_map(fn($show) => $show->chave, show);
    // $nrep = array_unique($kys);


}



mstringr();


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TicketPass - Meus Ingressos</title>

    <link rel="stylesheet" href="stlingrp.css">
    <link rel="stylesheet" href="stlingr.css">


    <script src="../../Geral/cods.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>    


</head>


<body>

<div class="top">

    <div class="cnt">

        <div class="logo" onclick="window.location.href='../inicial/indexx.php';">

        
            <div class="logoi">

                <p class="plog">TicketPass</p>

            </div>

        </div>


        <div class="itms" onclick="window.location.href='../eventos/evnts.php';">
    
            <p class="ptop">Eventos</p>

        </div>


        <div class="itms" onclick="window.location.href='../calendario/calnd.php';">
    
            <p class="ptop">Calendário</p>

        </div>


        <div class="itms" onclick="window.location.href='ingr.php';">
    
            <p class="ptop">Meus Ingressos</p>

        </div>


        <div class="itmlg" onclick= logon()>

            <p type="button" class="ptop">Log-up</p>

        </div>

        
    </div>

</div>

    

    <div class="centr">

        <div class="maining">

            <br>
            <img class="img" src="<?php echo $_SESSION['foto'];?>">
            <br>
            <br>
            <br>
            <p><?php echo"".$_SESSION['email']?></p>
            <br>
            <p>Nivel: </p>
            <br>
            <br>
            <p>Dar ingresso</p>
            <br>
            <br>
            <br>
            <br>
            <p onclick= config()>Configurações</p>

        </div>

            <div class="ingress">

            <p>seus ingressos</p>

            <div id="cnttt"></div>

                <?php ads(); ?>

            </div>

    </div>



</body>

</html>