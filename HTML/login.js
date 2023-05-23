var base_url = "http://localhost/";

function mudarpagina() {
    window.location.href = "index.html"
}

function enviarDados() {
    if (!document.getElementById("formLogin").checkValidity()) {
        document.getElementById("formLogin").classList.add('was-validated')
        return
    }
    var http = new XMLHttpRequest();
    var url = base_url + "PIT/php/login.php"

    http.open("POST", url, true);

    http.onreadystatechange = function () {
        //verifica retorno do back-end 
        if (http.readyState == 4 && http.status == 200) {
            var login = JSON.parse(http.response);
            mudarpagina()
        }
        else if (http.readyState == 4 && http.status == 401)
        {
            alert(http.response);
        }
        else if (http.readyState == 4 && http.status != 200) {
            alert("ERRO!");
        }
    }

    var data = new FormData()

    data.append('usuario', document.getElementById("Usuario").value);
    data.append('senha', document.getElementById("Senha").value);
    data.append('enviar', 'enviar')
    http.send(data)

}