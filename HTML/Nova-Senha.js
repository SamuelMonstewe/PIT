var base_url = "http://localhost/"

function mudarpagina() {
    window.location.href = "login.html"
}

function enviarDados ()
{
    var http = new XMLHttpRequest()
    var url = base_url + "PIT/php/Nova-Senha.php"
 
    http.open("POST", url, true)

    http.onreadystatechange = function () {
        //verifica retorno do back-end 
        if (http.readyState == 4 && http.status == 200) {
            mudarpagina()
        }
        else if (http.status != 200) {
            alert("ERRO!")
        }
    }

    var data = new FormData()

    data.append('novaSenha', document.getElementById("Nova-Senha").value)
    data.append('confirmarSenha', document.getElementById("Confirmar-Senha").value)

    http.send(data)
}