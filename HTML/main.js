const CaixaText = document.getElementsByTagName("input")

if (CaixaText.value == "") {
    alert("Preencha todos os campos para realizar a ação!")
    console.log("não registrado");
}
else {

    function MudarPag1() {
        window.location.href = 'index.html';
    }

    function MudarPag2() {
        window.location.href = 'DadosVan.html';
    }

    function MudarPag3() {
        window.location.href = 'DadosMotorista.html';
    }
}