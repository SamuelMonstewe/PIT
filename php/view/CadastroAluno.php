<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
    <link rel='stylesheet' type='text/css' media='screen' href='../../HTML/CSS-Login/style.css'>
    <title>Cadastro Aluno</title>
</head>

<body>
    <div class="Count-DadosM container ">
        <form style="width: 800px;" id="formCadastroAluno"
            class="Firt-Form form-control shadow-lg rounded d-flex flex-column text-left p-4">
            <!--Título da página-->
            <h1>Cadastro Aluno</h1>

            <!--Inserir nome do usuário-->
            <label><b>Nome</b></label>
            <input class="form-control shadow rounded mb-3" type="text" id="Nome" name="Nome" required
                placeholder="EX: Fulano do Clano">
            <div class="invalid-feedback">
                Por favor coloque um nome de usuário valido!
            </div>

            <!--Inserir email do usuário-->
            <label><b>Idade</b></label>
            <input class="form-control shadow rounded mb-3" id="Idade" type="number" name="idade" required
                placeholder="EX: 12">
            <div class="invalid-feedback">
                Por favor coloque um email valido!
            </div>

            <!--Inserir senha do usuário-->
            <label><b>Escola</b></label>
            <select class="form-select form-select-lg mt-5 mb-5" id="Escola" aria-label="Large select example">
                <option selected>Escolha a Escola a Qual Fornece Serviço</option>
                <?php
                require_once "../pdo.php";
                header("Access-Control-Allow-Origin: *");
                header('Content-Type: application/json; charset=utf-8');
                header('Content-Type: text/html; charset=utf-8');
                $ConexaoBanco->exec("SET NAMES utf8");
                global $ConexaoBanco;

                $SELECT = $ConexaoBanco->prepare("SELECT nome FROM escolas ORDER BY nome");
                $SELECT->execute();

              
                while ($row = $SELECT->fetch(PDO::FETCH_ASSOC)) {
                    $nomeEscola = $row['nome'];
                    echo "<option>$nomeEscola</option>";
                }
                ?>
            </select>

            <!--Inserir sexo do usuário-->
            <div class="d-flex flex-column">
                <div class="form-control bg-withe shadow DivSexo">
                    <div>
                        <label class="text-center"><b>Sexo </b></label>
                    </div>
                    <div class="SeparS">
                        <label><b>Masculino </b></label>
                        <input class="shadow align-middle InputM" type="radio" name="sexo" value="M">
                        <label><b>Femínino </b></label>
                        <input class="shadow align-middle" type="radio" name="sexo" value="F">
                    </div>
                    <div></div>
                </div>
            </div>

            <!--Botão para cadastrar a conta do usuário-->
            <a style="width: 100%;" class="text-center mt-3">
                <button style="width: 50%;" onclick="EnviarDadosAluno()" type="button"
                    class="Button-SingIn btn btn-warning">Cadastrar
                    Aluno</button>
            </a>
        </form>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="../../js/cadastroAluno.js"></script>
</body>

</html>