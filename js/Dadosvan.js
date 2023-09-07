var base_url = "http://localhost/"

function EnviarDadosVan()
{
    if (!document.getElementById("formDadosVan").checkValidity()) {
        document.getElementById("formDadosVan").classList.add('was-validated')
        return
    }

    var http = new XMLHttpRequest()
    var url = base_url + "PIT/php/dadosvan.php"
 
    http.open("POST", url, true)

    http.onreadystatechange = function () {
        //verifica retorno do back-end 
        if (http.readyState == 4 && http.status == 200) {
            console.log("deu")
            
        }
        else if (http.status != 200) {
            alert("ERRO!")
        }
    }

    var data = new FormData

    data.append('chassi', document.getElementById("Chassi").value)
    data.append('placaVeiculo',document.getElementById("PlacaVeiculo").value)
    data.append('marca', document.getElementById("Marca").value)
    data.append('modelo', document.getElementById("Modelo").value)
    data.append('capacidadeAlunos', document.getElementById("CapacidadeAlunos").value)
    data.append('laudo', document.getElementById("LaudoInspecao").files[0])
    data.append('fotoInterna', document.getElementById("FotoInterna").files[0])
    data.append('fotoExterna', document.getElementById("FotoExterna").files[0])
    data.append('enviar', "enviar")
    http.send(data)
}

function MascaraPlaca()
{
    //limitador de Caracteres
    var plac = document.getElementById("PlacaVeiculo").value
    plac = plac.slice(0, 8)
    document.getElementById("PlacaVeiculo").value = plac
    plac = document.getElementById("PlacaVeiculo").value.slice(0, 10)

    //Mascara
    var plac_format = document.getElementById("PlacaVeiculo").value
    if (plac_format[3] != "-") {
        if (plac_format[3] != undefined) {
            document.getElementById("PlacaVeiculo").value = plac_format.slice(0, 3) + "-" + plac_format[3]
        }
    }
}

function LimiterCA() {
    var capAluns = document.getElementById("CapacidadeAlunos").value
    capAluns = capAluns.slice(0, 2)
    document.getElementById("CapacidadeAlunos").value = capAluns
    capAluns = document.getElementById("CapacidadeAlunos").value.slice(0, 2)
}

function MascaraChassi()
{
    var chassi = document.getElementById("Chassi").value
    chassi = chassi.slice(0, 17)
    document.getElementById("Chassi").value = chassi
    chassi = document.getElementById("Chassi").value.slice(0, 17)
}

function CarregarFoto(input, idelemento) {
    var fileReader = new FileReader()

    fileReader.readAsDataURL(input.files[0])

    fileReader.onload = function (evt) {
        var imgBase64 = evt.target.result
        document.getElementById(idelemento).innerHTML = '<img src="' + imgBase64 + '" width=100px>'
    }
}