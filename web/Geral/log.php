<?php

    $email = $senha ="";
    $erroemail = $errosenha = "";


    function logout(){

        session_destroy();
    
    }


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

            ##se os erros estão vazios tudo deve estar certo, então vamos colocar na db
    
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "test";


            $conn = new mysqli($servername, $username, $password, $dbname);
            $senhahash = md5($senha);  #transformando senha em hash


            if ($conn->connect_error) {
        
                die("Connection failed: " . $conn->connect_error);
        
            }
            
            $sql = "INSERT INTO usuarios (email, senha)
            VALUES ('$email', '$senhahash')";
        
            if ($conn->query($sql) === TRUE) {

                echo "New record created successfully";

            } else {
          
                echo "Error: " . $sql . "<br>" . $conn->error;
        
            }

            header("location: ../Abas/inicial/indexx.php");

            $conn->close();

        }
    }


?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <p>Faça seu Cadastro</p>
            <br>
    
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">    
    
                <input type="text" name="flogin" placeholder="Login">
        
                <br>
        
                <input id="inptsenha" type="password" name="fsn" placeholder="Senha">
                <p class="oi" onclick= verSenha()>X</p>
        
                <br>
        
                <input type="submit">
        
            </form>


            <br>
            <br>
            <p>Já tem conta?</p>
            <br>
            <p onclick= login()>Faça seu Log-in</p>
            <br>
            <p onclick= logout()>Sair da sessão</p>

        </div>

    </div>
    </div>
    
</body>
</html>