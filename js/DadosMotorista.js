var base_url = "http://localhost/"

function mudarpagina() {
    window.location.href = "DadosVan.html"
}

function enviarDados() {
    if (!document.getElementById("formDados").checkValidity()) {
        document.getElementById("formDados").classList.add('was-validated')
        return
    }

    var http = new XMLHttpRequest()
    var url = base_url + "PIT/php/dadosmotorista.php"
 
    http.open("POST", url, true)

    http.onreadystatechange = function () {
        //verifica retorno do back-end 
        if (http.readyState == 4 && http.status == 200) {
            // mudarpagina()
        }
        else if (http.status != 200) {
            alert("ERRO!")
        }
    }

    var data = new FormData()
    const checkboxManha = document.getElementById("Manha");
    const turnoManha = checkboxManha.checked;
    const checkboxTarde = document.getElementById("Tarde");
    const turnoTarde = checkboxTarde.checked;
    const checkboxNoite = document.getElementById("Noite");
    const turnoNoite = checkboxNoite.checked;

    if(turnoManha){
        data.append('manha','sim');
        console.log(document.getElementById("Manha").value);
    }
    else{
        data.append('manha', 'nao')
    }
    if(turnoTarde){
        data.append('tarde', 'sim')
        console.log(document.getElementById("Tarde").value);
    }
    else{
        data.append('tarde', 'nao')
    }
    if(turnoNoite){
        data.append('noite', 'sim')
        console.log(document.getElementById("Noite").value);
    }
    else{
        data.append('noite', 'nao')
    }
    
    data.append('cpf', document.getElementById("Cpf").value)
    data.append('nome', document.getElementById("Nome").value)
    data.append('idade', document.getElementById("Idade").value)
    data.append('escola', document.getElementById('Escolas').value)
    data.append('sexo', document.querySelector('input[name="sexo"]:checked').value)
    data.append('regiaoAtuacao', document.getElementById("RegiaoAtuacao").value)
    data.append('telefone', document.getElementById("Telefone").value)
    data.append('fotomotorista', document.getElementById("FOTOmotorista").files[0])
    data.append('fotocarteira', document.getElementById("FOTOCarteira").files[0])
    data.append('fotocrlv', document.getElementById("FOTOCRLV").files[0])

    data.append('enviar', 'enviar')

    console.log(document.getElementById("Cpf").value)
    console.log(document.getElementById("Nome").value)
    console.log(document.getElementById("Idade").value)
    console.log(document.getElementById("RegiaoAtuacao").value)
    console.log(document.getElementById("Telefone").value)
    console.log(document.getElementById("FOTOmotorista").value)
    console.log(document.getElementById("FOTOCarteira").value)
    console.log(document.getElementById("FOTOCRLV").value)
    console.log(document.querySelector('input[name="sexo"]:checked').value)

    http.send(data)
}



function MasacaraTelefone() {
    //limitador de Caracteres
    var tel = document.getElementById("Telefone").value
    tel = tel.slice(0, 14)
    document.getElementById("Telefone").value = tel
    tel = document.getElementById("Telefone").value.slice(0, 14)

    //Mascara
    var tel_formatado = document.getElementById("Telefone").value
    if (tel_formatado[0] != "(") {
        if (tel_formatado[0] != undefined) {
            document.getElementById("Telefone").value = "(" + tel_formatado[0]
        }
    }

    if (tel_formatado[3] != ")") {
        if (tel_formatado[3] != undefined) {
            document.getElementById("Telefone").value = tel_formatado.slice(0, 3) + ")" + tel_formatado[3]
        }
    }

    if (tel_formatado[9] != "-") {
        if (tel_formatado[9] != undefined) {
            document.getElementById("Telefone").value = tel_formatado.slice(0, 9) + "-" + tel_formatado[9]
        }
    }
}

function MascaraCPF() {
    var cpfL = document.getElementById("Cpf").value
    cpfL = cpfL.slice(0, 13)
    document.getElementById("Cpf").value = cpfL
    cpfL = document.getElementById("Cpf").value.slice(0, 13)

    var cpf = document.getElementById("Cpf")
    if (cpf.value.length == 3) {
        cpf.value += "."
    }
    if (cpf.value.length == 7) {
        cpf.value += "."
    }
    if (cpf.value.length == 11) {
        cpf.value += "-"
    }

}

function LimiterI() {
    var idadeL = document.getElementById("Idade").value
    idadeL = idadeL.slice(0, 1)
    document.getElementById("Idade").value = idadeL
    idadeL = document.getElementById("Idade").value.slice(0, 1)
}

function CarregarFotoMotorista(input, idelemento) {
    var fileReader = new FileReader()

    fileReader.readAsDataURL(input.files[0])

    fileReader.onload = function (evt) {
        var imgBase64 = evt.target.result
        document.getElementById(idelemento).innerHTML = '<img src="' + imgBase64 + '" width=100px>'
    }
}
