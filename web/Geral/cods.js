
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
    


function cmp(){

    console.log("hello");
    let div1 = document.createElement('div');
    div1.classList.add('clog')
    let p1 = document.createElement('p');
    p1.textContent = document.getElementById('show').value; 
    div1.appendChild(p1);
    document.querySelector('#cnttt').appendChild(div1);

}