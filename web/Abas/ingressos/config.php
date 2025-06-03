<?php

session_start();


function mdft(){

    $nvft = $_FILES['nvfoto']; //array da entrada da ft

    $pastaft = '../../ft_user/'; //caminho da pasta

    $nomeFinal = uniqid('img_', true) . '.' . pathinfo($nvft['name'], PATHINFO_EXTENSION); //criador de nome

    $caminhoCompleto = $pastaft . $nomeFinal; //endereço final (pasta+arquivo)

    move_uploaded_file($nvft["tmp_name"],$caminhoCompleto); //move o arquivo


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "UPDATE usuarios SET foto = '$caminhoCompleto' WHERE ID = ".$_SESSION['id'];
    
    $_SESSION['foto'] = $caminhoCompleto;

    $conn->query($sql);
    $conn->close(); 



    header("location: ingr.php");

}


function mdnm(){

    $nvnm = $_POST['nvnome'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "UPDATE usuarios SET nome = '$nvnm' WHERE ID = ".$_SESSION['id'];
    
    $_SESSION['nome'] = $nvnm;

    $conn->query($sql);
    $conn->close(); 
    
    header("location: ingr.php");

}


function mdem(){

    $nvem = $_POST['nvemail'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "UPDATE usuarios SET email = '' WHERE ID = ".$_SESSION['id'];
    
    $_SESSION['email'] = $nvem;

    $conn->query($sql);
    $conn->close(); 
    
    header("location: ingr.php");


}

function mdsnh(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "UPDATE usuarios SET senha = 'https://p2.trrsf.com/image/fget/cf/1200/1200/middle/images.terra.com/2018/07/17/1531863463846.jpg' WHERE ID = ".$_SESSION['id'];


    $conn->query($sql);
    $conn->close(); 
    
    header("location: ingr.php");


}



if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['mudarft'])){
        mdft();
    }

    if (isset($_POST['mudarnm'])){
        mdnm();
    }

    if (isset($_POST['mudarem'])){
        mdem();
    }

    if (isset($_POST['mudarsnh'])){
        mdsnh();
    }

}




?>

<body>

<div id="conf" class="conf">

    <p onclick="document.getElementById('conf').style.display='none'">X</p>


    <div class="ab">


        <div class="spcft">
            <!-- lado esquerdo -->

            <img class="prfl" id="preview" src="<?php echo $_SESSION['foto'];?>" width="300">

            <br>
            <br>    

            <form method="POST" name="mudarft" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
            
                <input type="file" id="inputimg" name="nvfoto" placeholder="Escolha uma imagem" />
                <br>
            
                <input type="submit" name="mudarft">

            </form>


        </div>



        <div class="creden">
            <!-- lado direito -->

            <p>Seu nome:</p>
            <br>
            <p><?php echo"".$_SESSION["nome"];?></p>

            <form method="POST" name="mudarnm" action="<?php echo $_SERVER['PHP_SELF']?>">
                <input type="text" name="nvnome" maxlength="52">
                <input type="submit" name="mudarnm">
            </form>

            <br>
            <br>


            <p>Seu email:</p>
            <br>
            <p><?php echo"".$_SESSION['email']?></p>
    
            <form method="POST" name="mudarem" action="<?php echo $_SERVER['PHP_SELF']?>">
                <input type="text" name="nvemail">
                <input type="submit" name="mudarem">
            </form>

            <br>
            <br>

            <p>Mudar sua senha</p>
    

        </div>

    </div>

</div>

<script>

imgpr();

</script>


</body>
