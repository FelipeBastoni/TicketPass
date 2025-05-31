<?php

session_start();

if(isset($_SESSION['on'])){

    $on = $_SESSION['on'];

}else{

    $on = "";

}


function docmp(){

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if ($_POST['Comprar']){

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "test";

            $conn = new mysqli($servername, $username, $password, $dbname);
            $sqlshow = "UPDATE shows SET disponiveis = disponiveis - 1 WHERE chave = '".$_POST['Comprar']."'"; #diminui 1 ingresso
            $conn->query($sqlshow);


            $result = $conn->query("SELECT disponiveis FROM shows WHERE chave = '".$_POST['Comprar']."'");  #pega o numero de ingressos disponiveis
            $row = $result->fetch_assoc();
            $disp = $row['disponiveis'];


            
            $k1 = md5($_POST['Comprar']);
            $k2 = md5($disp);

            $key = $k1.";".$k2;


                                                                        #envia o ingresso comprado em hash
            $sql = "UPDATE usuarios SET ingressos = CONCAT('$key;',ingressos) WHERE ID = ".$_SESSION['id'];
            $conn->query($sql);     #faz a key do ingresso = hash da chave+ num ingresso disponivel (depois soma com os outros ingressos)
                                
            $conn->close(); 

            
            header("location: evnts.php");

        }

    }

}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TicketPass - Eventos</title>

    <link rel="stylesheet" href="../../Geral/style.css">
    <link rel="stylesheet" href="stlevn.css">

    <script src="../../Geral/cods.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
</head>


<div class="top">

    <div class="cnt">

        <div class="logo" onclick="window.location.href='../inicial/indexx.php';">

        
            <div class="logoi">

                <p class="plog">TicketPass</p>

            </div>

        </div>


        <div class="itms" onclick="window.location.href='evnts.php';">
    
            <p class="ptop">Eventos</p>

        </div>


        <div class="itms" onclick="window.location.href='../calendario/calnd.php';">
    
            <p class="ptop">Calendário</p>

        </div>


        <?php

        if($on != ""){

        echo "

        <div class='itms' onclick=\"window.location.href='../ingressos/ingr.php';\">
    
            <p class='ptop'>Meus Ingressos</p>

        </div>

        ";}

        ?>

        <div class="itmlg" onclick= logon()>

            <p type="button" class="ptop">Log-up</p>

        </div>

        
    </div>

</div>    



<body>


<p>q nada haver</p> 
<?php

docmp();

?>