
function logon() {

    $("#cnttt").load("../../Geral/log.php"); // Carrega o conteúdo PHP na div
}   


function login() {

    $("#cnttt").load("../../Geral/session.php"); // Carrega o conteúdo PHP na div
}   


function logout(){

    window.location.href="../../Geral/logout.php";

}


function config() {

    $("#cnttt").load("../../Abas/ingressos/config.php"); 

}   


function gestor(){

    window.location.href="../../Geral/Gestoria/gestor.php"

}

function verSenha(){


    camposenha = document.getElementById("inptsenha");
    
        if (camposenha.type == "password"){
            camposenha.type = "text";
    

        } else {
    
            camposenha.type = "password"
    
        }
    
    
    }
    
    
function anun(){

    let div1 = document.createElement('div');
    div1.classList.add('show');
    document.querySelector('#cnttt').appendChild(div1);

}

