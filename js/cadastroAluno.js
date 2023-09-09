function EnviarDadosAluno(){
    if (!document.getElementById("formCadastroAluno").checkValidity()) {
        document.getElementById("formCadastroAluno").classList.add('was-validated')
        return
    }
    if (document.getElementById("Nome").value != null && document.getElementById("Idade").value != null && document.getElementById("Escola").value != null) {
        var http = new XMLHttpRequest()
        var url = base_url + "PIT/php/cadastroAluno.php"

        http.open("POST", url, true)

        http.onreadystatechange = function () {
            //verifica retorno do back-end 
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
        data.append('nome', document.getElementById("Nome").value)
        data.append('idade', document.getElementById("Idade").value)
        data.append('escola', document.getElementById("Escola").value)
        data.append('enviar', 'enviar')
        http.send(data)
    }
    else {
        alert("Preencha todos os campos!")
    }
}