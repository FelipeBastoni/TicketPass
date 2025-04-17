
function logon() {

    $("#cnttt").load("../../Geral/log.php"); // Carrega o conteúdo PHP na div
    console.log("uau");
}   


function login() {

    $("#cnttt").load("../../Geral/session.php"); // Carrega o conteúdo PHP na div
    console.log("uau");
}   


function logout(){

    window.location.href="../../Geral/logout.php";

}


function verSenha(){


    camposenha = document.getElementById("inptsenha");
    
        if (camposenha.type == "password"){
            camposenha.type = "text";
    
    
        } else {
    
            camposenha.type = "password"
    
        }
    
    
    }
    



function config() {

    $("#cnttt").load("../../Geral/config.php"); // Carrega o conteúdo PHP na div
    console.log("uau");

}   
    





function anun(){



    ab = document.getElementById('ct'); 
    let divclog = document.createElement('div');
    let divlog = document.createElement('div');
    let div1 = document.createElement('div');
    let ppp = document.createElement('p');
    ppp.textContent="AAAAAAAMEMATA";

    ab.appendChild(divclog);
    divclog.appendChild(divlog);
    divlog.appendChild(div1);
    div1.appendChild(ppp);

}

