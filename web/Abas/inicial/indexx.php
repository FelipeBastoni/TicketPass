
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

    <title>TicketPass</title>

    <link rel="stylesheet" href="../../Geral/style.css">
    <link rel="stylesheet" href="pagini.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../Geral/cods.js"></script>

        
</head>


<body>


<div class="top">

    <div class="cnt">

        <div class="logo" onclick="window.location.href='indexx.php';">

        
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

<div id="cnttt"></div>

<div class="pagini">
    
    <div class="carrossel">
        </div>


    <p style="color: white">Olá tudo bem?</p>

                            <input type="file" class="form-control" name="inputImagem" id="inputImagem" placeholder="Escolha uma imagem" />



</div>

</html>
