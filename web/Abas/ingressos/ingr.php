
<?php

session_start();
require '../../Geral/Obj.php';


$show = [];

function mstringr(){

    global $show;

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM shows";
    $result = $conn->query($sql);


    if ($result->num_rows > 0){

        while($row = $result->fetch_assoc()){

            $show[] = new Show($row["nome"], $row["preco"], $row["data"], $row["local"], $row["banner"], $row["lotação"], $row["chave"],"");

        }

    }

    $conn->close();

    ads();

}


function ads(){

    global $expo;
    $expo = explode(";",$_SESSION['ingressos']);
    $nexp = count($expo);
    #ok
                                
    global $show;
    $ns = count($show);    
    $n = 0;                     
    $g = 0;
    #ok

    global $f;

    echo '<script src="cods.js"></script>';

    for($g = 0; $g < $nexp; $g++){ #percorre os ingressos comprados

        for($n = 0; $n < $ns; $n++){ #percorre os shows
            
            if($expo[$g] == md5($show[$n]->chave)){
                    
                for($f = 0; $f < $show[$n]->lotacao; $f++){

                    if($expo[$g+1] == md5($f)){

                        echo '<script src="cods.js"></script>';

                        echo '<div class="show">';

                        echo $show[$n]->exibiring(); 
                        
                        #código de barra do ingresso na aba de ingressos

                        $qr= $expo[$g].";".$expo[$g+1];

                        #echo "<p>".$expo[$g].";".$expo[$g+1]."</p>";
                        
                        echo "<div style='text-align: center;'>";

                        echo "<br>";

                        echo "
                        
                        <form method='POST' action='grnd.php'>
                        
                        <button type='submit' name='QR' value='$qr'>Mostrar Ingresso</button>
                        
                        </form>
                        
                        ";
                        #echo "<img style='width:130px; height:130px;' src='https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=$qr' alt='QR Code' />";

                        echo "</div>";

                        echo '</div>'; 

                    }
                
                }

            }

        }

    }

}



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
        <p><?php echo"".$_SESSION['nome']?></p>
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

            <p>Seus Ingressos:</p>

            <?php mstringr(); ?>

            <div id="cnttt"></div>
    
        </div>

</div>


</body>

</html>