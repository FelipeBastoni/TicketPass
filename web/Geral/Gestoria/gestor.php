<?php


if ($_SERVER['REQUEST_METHOD'] == "POST") {

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);


$nvft = $_FILES['banner']; //array da entrada da ft
$pastaft = '../../banners/'; //caminho da pasta
$nomeFinal = uniqid('img_', true) . '.' . pathinfo($nvft['name'], PATHINFO_EXTENSION); //criador de nome
$caminhoCompleto = $pastaft . $nomeFinal; //endereço final (pasta+arquivo)
move_uploaded_file($nvft["tmp_name"],$caminhoCompleto); //move o arquivo



$sql = "INSERT INTO shows (nome, preco, data, local, banner, lotação, chave) VALUES ('{$_POST['titulo']}','{$_POST['preco']}','{$_POST['data']}','{$_POST['local']}','{$caminhoCompleto}','{$_POST['lotacao']}','{$_POST['chave']}')";

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

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">

<p>Coloque o Título de seu evento</p>
<input name="titulo">
<br>
<br>

<p>Coloque o preço de seu ingresso</p>
<input name="preco">
<br>
<br>

<p>Coloque a data de seu evento</p>
<input name="data">
<br>
<br>

<p>Coloque o local que será o seu evento</p>
<input name="local">
<br>
<br>

<p>Coloque o banner do seu evento</p>
<input type="file" name="banner">
<br>
<br>

<p>Coloque a Lotação Máxima de seu evento</p>
<input name="lotacao">
<br>
<br>

<p>Coloque a chave para seu ingresso</p>
<input name="chave">
<br>
<br>

<br>
<input type="submit">

</form>

</div>

</body>

</html>