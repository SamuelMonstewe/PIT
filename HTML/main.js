function MudarPag1() {
    window.location.href = 'index.html';
}

function MudarPag2() {
    window.location.href = 'DadosVan.html';
}

function MudarPag3() {
    window.location.href = 'DadosMotorista.html';
}

function MasacaraTelefone() {
    //limitador de Caracteres
    var tel = document.getElementById("telefone").value
    tel = tel.slice(0, 13)
    document.getElementById("telefone").value = tel
    tel = document.getElementById("telefone").value.slice(0, 10)

    //Mascara
    var tel_formatado = document.getElementById("telefone").value
    if (tel_formatado[0] != "(") {
        if (tel_formatado[0] != undefined) {
            document.getElementById("telefone").value = "(" + tel_formatado[0];
        }
    }

    if (tel_formatado[3] != ")") {
        if (tel_formatado[3] != undefined) {
            document.getElementById("telefone").value = tel_formatado.slice(0, 3) + ")" + tel_formatado[3]
        }
    }
    if (tel_formatado[4] != " ") {
        if (tel_formatado[4] != undefined) {
            document.getElementById("telefone").value = tel_formatado.slice(0, 4) + " " + tel_formatado[4]
        }
    }

    if (tel_formatado[9] != "-") {
        if (tel_formatado[9] != undefined) {
            document.getElementById("telefone").value = tel_formatado.slice(0, 9) + "-" + tel_formatado[9]
        }
    }
}

function MascaraCPF()
{
    var cpfL = document.getElementById("Cpf").value
    cpfL = cpfL.slice(0, 13)
    document.getElementById("Cpf").value = cpfL
    cpfL = document.getElementById("Cpf").value.slice(0, 13)

    var cpf = document.getElementById("Cpf")
    if (cpf.value.length == 3)
    {
        cpf.value += ".";
    }
    if (cpf.value.length == 7)
    {
        cpf.value += ".";
    }
    if (cpf.value.length == 11)
    {
        cpf.value += "-";
    }
    
}

function LimiterI()
{
    var idadeL = document.getElementById("Idade").value
    idadeL = idadeL.slice(0,1)
    document.getElementById("Idade").value = idadeL
    idadeL = document.getElementById("Idade").value.slice(0,1);
}
