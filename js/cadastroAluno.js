var base_url = "http://localhost/"

function mudarpagina() {
    window.location.href = "../../HTML/index.html"
}

function EnviarDadosAluno(){
    if (!document.getElementById("formCadastroAluno").checkValidity()) {
        document.getElementById("formCadastroAluno").classList.add('was-validated')
        return
    }
    if (document.getElementById("Nome").value != null && document.getElementById("Escola").value != null) {
        var http = new XMLHttpRequest()
        var url = base_url + "PIT/php/cadastroAluno.php"

        http.open("POST", url, true)

        http.onreadystatechange = function () {
            //verifica retorno do back-end 
            if (http.readyState == 4 && http.status == 200) {
                try {
                    mudarpagina()
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
        data.append('cpf', document.getElementById("Cpf").value)
        data.append('nome', document.getElementById("Nome").value)
        data.append('idade', document.getElementById("Idade").value)
        data.append('regiao', document.getElementById("Regiao").value)
        data.append('escola', document.getElementById("Escola").value)
        data.append('sexo', document.querySelector('input[name="sexo"]:checked').value)

        console.log(document.getElementById("Cpf").value)
        console.log(document.getElementById("Nome").value)
        console.log(document.getElementById("Idade").value)
        console.log(document.getElementById("Regiao").value)
        console.log(document.getElementById("Escola").value)
        data.append('enviar', 'enviar')
        http.send(data)
    }
    else {
        alert("Preencha todos os campos!")
    }
}
function MascaraCPF() {
    var cpfL = document.getElementById("Cpf").value
    cpfL = cpfL.slice(0, 13)
    document.getElementById("Cpf").value = cpfL
    cpfL = document.getElementById("Cpf").value.slice(0, 13)

    var cpf = document.getElementById("Cpf")
    if (cpf.value.length == 3) {
        cpf.value += "."
    }
    if (cpf.value.length == 7) {
        cpf.value += "."
    }
    if (cpf.value.length == 11) {
        cpf.value += "-"
    }

}