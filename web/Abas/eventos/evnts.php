
<?php

require '../../Geral/Obj.php';
session_start();

if(isset($_SESSION['on'])){

    $on = $_SESSION['on'];

}else{

    $on = "";

}



$show = [];

function puxarshows(){

    global $show;

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM shows"; #os que estão esgotados só somem... melhorar dps?
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {

            $show[] = new Show($row["nome"], $row["preco"], $row["data"], $row["local"], $row["banner"], $row["lotação"], $row["chave"], $row["disponiveis"]);

        }  
    }

    $conn->close();
    
}


function ads(){

    global $show;

    $ns = count($show);

    $n = 0;

    echo '<script src="cods.js"></script>';

    while($ns>$n){

        echo '<div class="show">';

        $show[$n]->exibir();
        
        echo '<form method="POST" action="../../Geral/cmpr.php">
                    <button name="Comprar" value="'.$show[$n]->chave.'" type="submit">Comprar Ingresso</button>
                </form>';
                
        echo '</div>';

        $n++;

    }


}



puxarshows();

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


<body>


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

        ";}else{}

        ?>

        <div class="itmlg" onclick= logon()>

            <p type="button" class="ptop">Log-up</p>

        </div>

        
    </div>

</div>    

    
    <div class="main">

        <div class="filtr">

            <br>
            <p calss="ptxt">Filtros:</p>

        </div>

        <div class="main2">


            <div class="bann">
            
                <p>Eventos</p>

            </div>


            <div id="cnttt"></div>

                <?php ads();?>
       
            </div>

        </div>

</div>


</body>


</html>