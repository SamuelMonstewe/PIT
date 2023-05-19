
var CaixaText = document.getElementsByTagName("input")
function verificarCamposNulos() {

    if (CaixaText.value == "") {
        alert("Preencha todos os campos para realizar a ação!")
        console.log("não registrado");
    }
    else {
        function MudarPag2() {
             window.location.href = 'DadosVan.html';
        } 
    }

}


