var base_url = "http://localhost/"

function mudarpagina() {
    window.location.href = "Alterar-Senha.html"
}

function enviarDados ()
{
    var http = new XMLHttpRequest()
    var url = base_url + "PIT/php/Recuperar-Senha.php"
 
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

    data.append('usuario', document.getElementById("Usuario").value)
    data.append('email', document.getElementById("Email").value)

    http.send(data)
}