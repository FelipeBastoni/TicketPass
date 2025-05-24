
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

        ";}else{}

        ?>


        <div class="itmlg" onclick= logon()>

            <p type="button" class="ptop">Log-up</p>

        </div>

        
    </div>

</div>



<div id="cnttt" calss="cnttt"></div>



<div class="mainc">


        <br>
        <br>
        <br>
        <br>
        
        <p>oiiiiiiiiiiiiiii</p>


</div>






</body>

</html>