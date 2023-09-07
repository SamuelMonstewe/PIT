var base_url = "http://localhost/"

function mudarPagina() {
    window.location.href = "index.html"
}

function enviarDados() {
    if (!document.getElementById("formLogin").checkValidity()) {
        document.getElementById("formLogin").classList.add('was-validated')
        return
    }
    var http = new XMLHttpRequest()
    var url = base_url + "PIT/php/login.php"

    http.open("POST", url, true)

    http.onreadystatechange = function () {
        //verifica retorno do back-end 
        if (http.readyState == 4 && http.status == 200) {
         
            var verificacao = confirm("login realizado com sucesso!")
            if(verificacao == true)
            {
                mudarPagina()
            }
            else{
                return
            }
        }
        else if (http.readyState == 4 && http.status == 401)
        {   alert("Senha inválida ou não confirmou o email no cadastro")
            return
        }
        else if (http.readyState == 4 && http.status != 200) {
            alert("ERRO!")
        }
    }

    var data = new FormData()

    data.append('usuario', document.getElementById("Usuario").value)
    data.append('senha', document.getElementById("Senha").value)
    data.append('enviar', 'enviar')
    http.send(data)

}