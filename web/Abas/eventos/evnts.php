
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
    $sql = "SELECT * FROM shows"; 
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {

            $show[] = new Show($row["nome"], $row["preco"], $row["data"], $row["local"], $row["banner"], $row["lotação"], $row["chave"], $row["disponiveis"]);

        }  
    }

    $conn->close();
    

    
    $url = $_SERVER['REQUEST_URI'];
    
    if(strpos($url, 'var=alfa')){

        usort($show, function($a, $b) {
    return strcmp($a->show, $b->show);
    });

    }

    if(strpos($url, 'var=cost1')){

        usort($show, function($a, $b) {
    return $a->preço <=> $b->preço;
    });

    }

    if(strpos($url, 'var=cost2')){

        usort($show, function($a, $b) {
    return $b->preço <=> $a->preço;
    });

    }

    if(strpos($url, 'var=date1')){

        usort($show, function($a, $b) {
            $dateA = DateTime::createFromFormat('d/m/Y', $a->data);
            $dateB = DateTime::createFromFormat('d/m/Y', $b->data);

    return $dateA <=> $dateB;
    });

    }

    if(strpos($url, 'var=date2')){

        usort($show, function($a, $b) {
            $dateA = DateTime::createFromFormat('d/m/Y', $a->data);
            $dateB = DateTime::createFromFormat('d/m/Y', $b->data);

    return $dateB <=> $dateA;
    });

    }

    if(strpos($url, 'var=ingr1')){

        usort($show, function($a, $b) {
    return $b->disponiveis <=> $a->disponiveis;
    });

    }

    if(strpos($url, 'var=ingr2')){

        usort($show, function($a, $b) {
    return $a->disponiveis <=> $b->disponiveis;
    });

    }



}


function ads(){

    global $show;

    $ns = count($show);

    $n = 0;

    echo '<script src="cods.js"></script>';

    while($ns>$n){

        echo '<div class="show">';

            $show[$n]->exibir();
                        
        echo '</div>';

        $n++;

    }

}


puxarshows();



if(isset($_POST['Ordalf'])){

    $var = "alfa";
        header("Location: evnts.php?var=$var");
        exit;

}


if(isset($_POST['Ordcus'])){

    $var = "cost1";
        header("Location: evnts.php?var=$var");
        exit;

}

if(isset($_POST['Ordcusma'])){

    $var = "cost2";
        header("Location: evnts.php?var=$var");
        exit;

}

if(isset($_POST['Orddate1'])){

    $var = "date1";
        header("Location: evnts.php?var=$var");
        exit;

}

if(isset($_POST['Orddate2'])){

    $var = "date2";
        header("Location: evnts.php?var=$var");
        exit;

}

if(isset($_POST['Orddisp1'])){

    $var = "ingr1";
        header("Location: evnts.php?var=$var");
        exit;

}

if(isset($_POST['Orddisp2'])){

    $var = "ingr2";
        header("Location: evnts.php?var=$var");
        exit;

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

        ";}

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
            <br>
            <p>Alfabeticamente:</p>
            <form method="POST" name="Ordalf" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <input type="submit" name="Ordalf">
            </form>
            <br>

            <p>Menor Preço:</p>
            <form method="POST" name="Ordcus" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <input type="submit" name="Ordcus">
            </form>
            <br>

            <p>Maior Preço:</p>
            <form method="POST" name="Ordcusma" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <input type="submit" name="Ordcusma">
            </form>
            <br>

            <p>Data Mais Próxima:</p>
            <form method="POST" name="Orddate1" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <input type="submit" name="Orddate1">
            </form>
            <br>

            <p>Data Mais Distante:</p>
            <form method="POST" name="Orddate2" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <input type="submit" name="Orddate2">
            </form>
            <br>

            <p>Mais Disponíveis:</p>
            <form method="POST" name="Orddisp1" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <input type="submit" name="Orddisp1">
            </form>
            <br>

            <p>Menos Disponíveis:</p>
            <form method="POST" name="Orddisp2" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <input type="submit" name="Orddisp2">
            </form>
            <br>




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