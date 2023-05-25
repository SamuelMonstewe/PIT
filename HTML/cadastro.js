var base_url = "http://localhost/";

function mudarpagina() {
    window.location.href = "login.html"
}

function EnviarDados() {
    if(!document.getElementById("formCadastro").checkValidity())
    {
        document.getElementById("formCadastro").classList.add('was-validated')
        return
    }
    if (document.getElementById("Senha").value == document.getElementById("Confirmar").value) {
        var http = new XMLHttpRequest();
        var url = base_url + "PIT/php/cadastro.php"

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
        data.append('usuario', document.getElementById("Usuario").value);
        data.append('email', document.getElementById("Email").value);
        data.append('senha', document.getElementById("Senha").value);
        data.append('enviar', 'enviar')

        http.send(data)
    }
    else
    {
        alert("Insira senhas iguais!")
    }
}
