var base_url = "http://localhost/"
function mudarpagina() {
    window.location.href = "Alterar-Senha.html"
}

function enviarDados()
{
    var http = new XMLHttpRequest()
    var url = base_url + "PIT/php/Recuperar-Senha.php" 

    http.open("POST", url, true)

    http.onreadystatechange = function () {

        if (http.readyState == 4 && http.status == 200) {
              try {
                var response = JSON.parse(http.responseText)
                var mensagem = response
                alert(mensagem)
            }
            catch(error) {
                console.log('Tá dando erro na conversão do json', error, http.responseText);
            }
        }
        else if (http.status != 200) {
            alert("ERRO!")
        }
    }

    var data = new FormData()

    data.append('usuario', document.getElementById("usuario").value) 
    data.append('email', document.getElementById("email").value) 
    data.append('enviar', 'enviar')

    http.send(data)
}