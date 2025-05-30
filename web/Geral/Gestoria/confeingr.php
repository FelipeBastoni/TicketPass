<?php

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $ident = $_POST['showv'];
    $value = $_POST['value'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT lotação , chave FROM shows WHERE nome = '$ident';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()){

        $info[] = $row;

       }




    }
    
    $cnt = 1;    
    $ok = "não";

    while($cnt<=$info[0]['lotação']){
    
        $v1 = md5($info[0]['chave']);
        $v2 = md5($cnt);

        $verific = $v1.";".$v2;

            if($verific == $value){

                $ok = "ok";

            }

        $cnt++;

    }

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


<form name="check" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input type="text" name="showv">
    <input type="text" name="value">
    <input type="submit">

</form>

<p><?php echo $v2." " .$v1. " ". $ok ;?></p>



</div>





</body>

</html>