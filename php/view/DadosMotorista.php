<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
    <link rel='stylesheet' type='text/css' media='screen' href='../../HTML/motorista-dados/'>
    <title>Dados do Motorista</title>
</head>

<body>

    <header class="position-relative top-0 container-fluid bg-warning text-center mb-5 p-3">
        <!--Título da página-->
        <h1>Dados do Motorista</h1>
    </header>

    <div class="Count-DadosM container ">
        <form method="post" id="formDados" class="Firt-Form form-control shadow-lg rounded d-flex flex-column text-left p-4 needs-validation" enctype="multipart/form-data">
            <!--Inserir nome do usuário-->
            <!--Inserir o telefone do usuário-->
            <label><b>Telefone</b></label>
            <input class="form-control shadow rounded mb-3" type="tel" name="telefone" oninput="MasacaraTelefone()" id="Telefone" placeholder="EX:(00) 00000-0000" required="">
            <div class="invalid-feedback">
                Por favor coloque um telefone valido!
            </div>
            <div class="valid-feedback">
            </div>

            <!--Inserir o CPF do usuário-->
            <label><b>CPF </b></label>
            <input class="form-control shadow rounded mb-3" type="text" name="cpf" id="Cpf" onkeypress="MascaraCPF()" placeholder="EX: 000.000.000-00" required="campo obrigatorio">
            <div class="invalid-feedback">
                Por favor coloque um CPF valido!
            </div>
            <div class="valid-feedback">
            </div>

            <!--Inserir o Sexo do usuário-->
            <div class="d-flex justify-content-around align-itens-center mt-3">
                <div class="d-flex flex-column">
                    <label class="text-center"><b>Sexo </b></label>
                    <div class="form-control bg-withe shadow">
                        <label><b>Masculino </b></label>
                        <input class="shadow align-middle" type="radio" name="sexo" value="M">
                        <label><b>Femínino </b></label>
                        <input class="shadow align-middle" type="radio" name="sexo" value="F">
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <!--Inserir a idade do usuário-->
                    <label class="text-center"><b>Idade </b></label>
                    <input type="number" class="form-control shadow rounded text-center" name="idade" id="Idade" onkeypress="LimiterI()" placeholder="EX: 99" required>
                    <div class="invalid-feedback">
                        Por favor coloque uma idade valida!
                    </div>
                    <div class="valid-feedback">
                    </div>
                </div>
            </div>

            <select class="form-select form-select-lg mt-5 mb-5" name="regiaoAtuacao" id="RegiaoAtuacao" aria-label="Large select example">
                <option selected>Regiao de atuacao</option>
                <?php
                require_once "../pdo.php";
                header("Access-Control-Allow-Origin: *");
                header('Content-Type: application/json; charset=utf-8');
                header('Content-Type: text/html; charset=utf-8');
                $ConexaoBanco->exec("SET NAMES utf8");
                global $ConexaoBanco;

                $SELECT = $ConexaoBanco->prepare("SELECT * FROM regioes ORDER BY nome_regiao");
                $SELECT->execute();

                while ($row = $SELECT->fetch(PDO::FETCH_ASSOC)) {
                    $nomeRegiao = $row['nome_regiao'];
                    echo "<option>$nomeRegiao</option>";
                }
                ?>
            </select>

            <!--Inserir o turno do usuário-->
            <div class="container Turnos shadow rounded-4 border border-dark">
                <label class="mt-3 text-center mb-3"><b>Turno</b></label>
                <hr class="LinhaTurno">
                <div class="TurnosCheck mb-3 d-flex justify-content-sm-around flex-wrap">

                    <div class="">
                        <label for="">Manhã</label>
                        <input class="form-check-input" type="checkbox" value="Manha" name="Manha" value="Manha" id="Manha">
                    </div>
                    <div>
                        <label for="">Tarde</label>
                        <input class="form-check-input" type="checkbox" value="Tarde" name="Tarde" value="Tarde" id="Tarde">
                    </div>
                    <div>
                        <label for="">Noite</label>
                        <input class="form-check-input" type="checkbox" value="Tarde" name="Tarde" value="Tarde" id="Noite">
                    </div>
                </div>
            </div>
            <div class="invalid-feedback">
                Por favor coloque um turno valido!
            </div>
            <div class="valid-feedback">
            </div>

            <select class="form-select form-select-lg mt-5 mb-5" id="Escolas" aria-label="Large select example">
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
            
            <!--Inserir a foto do motorista do usuário-->
            <label><b>Foto do Motorista </b></label>
            <div id="fotoMotorista"></div>
            <input class="form-control shadow rounded mb-3" onchange="CarregarFotoMotorista(this, 'fotoMotorista')" id="FOTOmotorista" type="file" name="foto" required="campo obrigatorio">
            <div class="invalid-feedback">
                Por favor coloque uma imagem valida!
            </div>
            <div class="valid-feedback">
            </div>

            <!--Inserir a carteira de motorista do usuário-->
            <label><b>Carteira </b></label>
            <div id="fotoCarteira"></div>
            <input class="form-control shadow rounded mb-3" type="file" onchange="CarregarFotoMotorista(this, 'fotoCarteira')" id="FOTOCarteira" name="carteira" placeholder="EX:" required="campo obrigatorio">
            <div class="invalid-feedback">
                Por favor coloque uma imagem valida!
            </div>
            <div class="valid-feedback">
            </div>

            <!--Inserir o Certificado de Registro e Licenciamento de Veículo do motorista do usuário-->
            <label><b>CRLV </b>
                <p class="fs-10">(Certificado de Registro e Licenciamento de Veículo do motorista)</p>
            </label>
            <div id="fotoCRLV"></div>
            <input class="form-control shadow rounded mb-3" type="file" onchange="CarregarFotoMotorista(this, 'fotoCRLV')" id="FOTOCRLV" name="crlv" placeholder="EX:" required="campo obrigatorio">
            <div class="invalid-feedback">
                Por favor coloque uma imagem valida!
            </div>
            <div class="valid-feedback">
            </div>

            <!--Botão cadastrar as informações adicionadas e continuar o cadastro-->
            <input type="button" class="Button-SingIn form-control shadow bg-warning" name="enviar" id="confirmar" onclick="enviarDados()" value="Cadastrar Dados do Motorista">
        </form>
    </div>
    <script src="../../js/DadosMotorista.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            //convertendo a string em código e mandando para o php
            BuscarEscolas();
        })
    </script> -->


</body>

</html>