
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
    

function imgpr(){

    document.getElementById('inputimg').addEventListener('change', function(event) {
    const arquivo = event.target.files[0];

    if (arquivo) {
        const leitor = new FileReader();

        leitor.onload = function(e) {
        const preview = document.getElementById('preview');
        preview.src = e.target.result;
    }

    leitor.readAsDataURL(arquivo);
    
    }
});

}
