<?php

session_start();


$email = $senha = "";
$erroemail = $errosenha = "";
    
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    
    if(empty($_POST["flogin"])){

        $erroemail = " is-invalid"; ##colocar dentro da classe do bootstrap/adicionar bootstrap

    } else {

            $email = test_input($_POST["flogin"]);

        }

        if(empty($_POST["fsn"])){

            $errosenha = " is-invalid"; ##colocar dentro da classe do bootstrap/adicionar bootstrap

        } else {    

            $senha = test_input($_POST["fsn"]);

        }



        if (empty($erroemail) && empty($errosenha)){

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "test";

            $conn = new mysqli($servername, $username, $password, $dbname);
            $senhahash = md5($senha);

            $sql = "SELECT * FROM usuarios WHERE email = '$email' AND '$senhahash';";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {

                //carregar variaveis de seesão

                $_SESSION["id_user"] = $row["ID"];
                $_SESSION["foto"] = $row["foto"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["nome"] = $row["nome"];
                $_SESSION["ingressos"] = $row["ingressos"];

                //redirecionar para pag de entrada segura


                header("location: ../Abas/inicial/indexx.php");

                $_SESSION['usuario'] = 'ppp';


              }

              
            } else {
            
                echo "tá errado otário";

            }


            $conn->close();

        }

    }


?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>



</head>
<body>
    



<div class="clog" id="mod">

    <div class="log" id="prnmd">
        <div>   

            <p class="fchlog" onclick="document.getElementById('mod').style.display='none'">X</p>
    
        </div>
    
    

    
        <div class="log1" id="prnmd">

            <br>
            <br>
            <p>Faça o Login!</p>
            <br>

            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">    

                <input type="text" name="flogin" placeholder="Login">
        
                <br>
        
                <input id="inptsenha" type="password" name="fsn" placeholder="Senha">
                <input type="submit" name="nemail" onclick = modaln()>

            </form>

        </div>

    </div>
</div>
    
</body>
</html>