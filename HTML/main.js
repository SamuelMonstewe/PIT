var base_url = "http://localhost/";



document.addEventListener('DOMContentLoaded', (event) => {
    //the event occurred
    BuscarEscolas();
})

function mudarpagina() {
    window.location.href = "DadosVan.html"
}

function enviarDados() {
    var http = new XMLHttpRequest();
    var url = base_url + "PIT/php/index.php"
 
    http.open("POST", url, true);

    http.onreadystatechange = function () {
        //verifica retorno do back-end 
        if (http.readyState == 4 && http.status == 200) {
            mudarpagina();
        }
        else if (http.status != 200) {
            alert("ERRO!");
        }
    }

    var data = new FormData()
    data.append('cpf', document.getElementById("Cpf").value)
    data.append('nome', document.getElementById("Nome").value)
    data.append('idade', document.getElementById("Idade").value)
    data.append('turno', document.getElementById("Turno").value)
    data.append('escolas', document.getElementById("Escolas").value)
    data.append('idescola', document.getElementById('3scolas').value)
    data.append('sexo', document.querySelector('input[name="sexo"]:checked').value)
    data.append('rota', document.getElementById("Rotas").value)
    data.append('telefone', document.getElementById("Telefone").value)

    data.append('fotomotorista', document.getElementById("FOTOmotorista").files[0])
    data.append('fotocarteira', document.getElementById("FOTOCarteira").files[0])
    data.append('fotocrlv', document.getElementById("FOTOCRLV").files[0])

    data.append('enviar', 'enviar')


    http.send(data)
}
function BuscarEscolas() {
    var http = new XMLHttpRequest();
    var url = base_url + "PIT/php/escola.php"
    http.open("GET", url, true);

    http.onreadystatechange = function () {
        //verifica retorno do back-end 
        if (http.readyState == 4 && http.status == 200) {

            var response = Array.from(JSON.parse(http.response));
            document.getElementById("3scolas").innerHTML = "";


            var newOption = document.createElement("option");
            newOption.text = "Selecione uma escola"

            document.getElementById("3scolas").appendChild(newOption);



            response.forEach((escola) => {
                var newOption = document.createElement("option");
                newOption.text = escola['nome'];
                newOption.value = escola['id'];

                document.getElementById("3scolas").appendChild(newOption);

            });


        }
        else if (http.status != 200) {
            alert("ERRO!");
        }
    }
    http.send();
}

function AdicionarEscola() {
    var NomeEscola = document.getElementById("Escolas").value

    var http = new XMLHttpRequest();
    var url = base_url + "PIT/php/adicionarEscola.php"
    http.open("POST", url, true);

    http.onreadystatechange = function () {
        //verifica retorno do back-end 
        if (http.readyState == 4 && http.status == 200) {
            BuscarEscolas();
        }
        else if (http.status != 200) {
            alert("ERRO!");
        }
    }

    var data = new FormData()

    data.append('addEscola', NomeEscola)
    http.send(data);
}

function MasacaraTelefone() {
    //limitador de Caracteres
    var tel = document.getElementById("Telefone").value
    tel = tel.slice(0, 13)
    document.getElementById("Telefone").value = tel
    tel = document.getElementById("Telefone").value.slice(0, 10)

    //Mascara
    var tel_formatado = document.getElementById("Telefone").value
    if (tel_formatado[0] != "(") {
        if (tel_formatado[0] != undefined) {
            document.getElementById("Telefone").value = "(" + tel_formatado[0];
        }
    }

    if (tel_formatado[3] != ")") {
        if (tel_formatado[3] != undefined) {
            document.getElementById("Telefone").value = tel_formatado.slice(0, 3) + ")" + tel_formatado[3]
        }
    }

    if (tel_formatado[8] != "-") {
        if (tel_formatado[8] != undefined) {
            document.getElementById("Telefone").value = tel_formatado.slice(0, 8) + "-" + tel_formatado[8]
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
        cpf.value += ".";
    }
    if (cpf.value.length == 7) {
        cpf.value += ".";
    }
    if (cpf.value.length == 11) {
        cpf.value += "-";
    }

}

function LimiterI() {
    var idadeL = document.getElementById("Idade").value
    idadeL = idadeL.slice(0, 1)
    document.getElementById("Idade").value = idadeL
    idadeL = document.getElementById("Idade").value.slice(0, 1);
}

function CarregarFotoMotorista(input, idelemento) {
    var fileReader = new FileReader();

    fileReader.readAsDataURL(input.files[0])

    fileReader.onload = function (evt) {
        var imgBase64 = evt.target.result;
        document.getElementById(idelemento).innerHTML = '<img src="' + imgBase64 + '" width=100px>'
    }
}
