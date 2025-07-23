
<?php

session_start();

if(isset($_SESSION['on'])){

    $on = $_SESSION['on'];

}else{

    $on = "";

}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TicketPass - Calendário</title>

    <link rel="stylesheet" href="../../Geral/style.css">
    <link rel="stylesheet" href="stlcal.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../Geral/cods.js"></script>
    

</head>


<body>


<div class="top">

    <div class="cnt">


        <div class='btnhm' onclick= alternarPainel()>

            <p type='button' class='ptop'>...</p>

        </div>




        <div class="logo" onclick="window.location.href='../inicial/indexx.php';">

        
            <div class="logoi">

                <p class="plog" style="font-family: 'Russo One', sans-serif;">TicketPass</p>

            </div>

        </div>


        <div class="itms" onclick="window.location.href='../eventos/evnts.php';">
    
            <p class="ptop">Eventos</p>

        </div>


        <div class="itms" onclick="window.location.href='calnd.php';">
    
            <p class="ptop">Calendário</p>

        </div>


        <?php

        if($on != ""){

        echo "

        <script src='../../Geral/cods.js'></script>
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


<div id="cnttt" calss="cnttt"></div>


    <div class="mainc">

        <iframe src="https://calendar.google.com/calendar/embed?src=58cfa85bbef55fad7cfd17267cdbd67cb67f22acfd3b30e83f6490181e4b6428%40group.calendar.google.com&ctz=America%2FSao_Paulo" style="border: 0" width="1200" height="500" frameborder="0" scrolling="no"></iframe>

    </div>

        






  <div class="painel" id="painel">
    <h2>Olá!</h2>
  </div>




</body>

</html>