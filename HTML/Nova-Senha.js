var base_url = "http://localhost/"

function mudarpagina() {
    window.location.href = "login.html"
}

function enviarDados()
{
    var http = new XMLHttpRequest()
    var url = base_url + "PIT/php/redefinir-senha.php"
 
    http.open("POST", url, true)

    http.onreadystatechange = function () {
        //verifica retorno do back-end 
        if (http.readyState == 4 && http.status == 200) {
            var response = JSON.parse(http.responseText)
            var mensagem = response;
            alert(mensagem)
        }
        else if (http.status != 200) {
            alert("ERRO!")
        }
    }

    var data = new FormData()

    data.append('senhanova', document.getElementById("Nova-Senha").value)
    data.append('email', document.getElementById("email").value)
    data.append('confirmacaosenha', document.getElementById("Confirmar-Senha").value)
    data.append('enviar', 'enviar')
    http.send(data)
}