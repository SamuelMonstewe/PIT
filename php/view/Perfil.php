<?php
session_start();
require_once "../pdo.php";
require_once "../classes/Motorista.php";
$motorista = new Motorista();

if($_SESSION['situacao_login']){
    if(isset($_SESSION['id'])){
        global $ConexaoBanco;
        $id_motorista = $_SESSION['id'];
        $cpf_motorista = $_SESSION['cpf'];
        $SELECT_MOTORISTA = $ConexaoBanco->prepare("SELECT * FROM Motorista WHERE id = :id AND cpf = :cpf");
        $SELECT_MOTORISTA->bindParam(':id', $id_motorista);
        $SELECT_MOTORISTA->bindParam(':cpf', $cpf_motorista);

        $SELECT_USUARIO = $ConexaoBanco->prepare("SELECT * FROM usuarios WHERE cpf = :cpf");
        $SELECT_USUARIO->bindParam(':cpf', $cpf_motorista);
        
        if($SELECT_MOTORISTA->execute() && $SELECT_USUARIO->execute()){
            $dadosRetornadosMotorista = $SELECT_MOTORISTA->fetch(PDO::FETCH_ASSOC);
            $dadosRetornadosUsuario = $SELECT_USUARIO->fetch(PDO::FETCH_ASSOC);
            if($dadosRetornadosMotorista && $dadosRetornadosUsuario){
               
                $motorista->setNome($dadosRetornadosUsuario['Usuario']);
                $motorista->setCpf($dadosRetornadosMotorista['cpf']);
                $motorista->setIdade($dadosRetornadosMotorista['idade']);
                $motorista->setTelefone($dadosRetornadosMotorista['telefone']);
                $motorista->setRegiaoDeAtuacao($dadosRetornadosMotorista['regiao_atuacao']);
                $motorista->setSexo($dadosRetornadosMotorista['sexo']);
                $motorista->setTurnoManha($dadosRetornadosMotorista['turnoManha']);
                $motorista->setTurnoNoite($dadosRetornadosMotorista['turnoNoite']);
                $motorista->setTurnoTarde($dadosRetornadosMotorista['turnoTarde']);
               
            }
            else{
                $mensagem = "<div class='alert alert-danger' role='alert'> Você não possui cadastro de motorista no nosso site!.</div>";
            }
        }
        else{
            echo "<h1> Erro na execução da consulta </h1>";
        }

    }
    else{
        echo  "<h1> ID do motorista não definido na sessão </h1>";
    }
}
else{
    header("Location: ../../HTML/cadastro.html");
}
    
?>


<!-- <!DOCTYPE html>
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
    <link rel='stylesheet' type='text/css' media='screen' href='../../HTML/CSS-Perfil/style.css'>
    <title>Perfil De Usuário</title>
</head>

<body>

    <header class="container-fluid">
        <a id="Back-Button" class="btn btn-outline-warning" href="../../HTML/index.html">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>

        <h1>
            Meu Perfil
        </h1>
        <a id="Edit-Button" href="../../HTML/Perfil-Edit.html">
            Editar Perfil
        </a>
    </header>

    <main>
        <div class="Grid_Col1">
            <img width="100%" src="../../HTML/imagens/Foto-User.png">
        </div>
        <div class="Grid_Col2">
            <div width="100%" class="Info-P">
                <h3>
                    Informações Pessoais
                </h3>
            </div>
            <div class="List-Info">
                <p>
                    Nome:
                </p>
                <p>
                    <?php echo $motorista->getNome() ?>
                </p>
            </div>
            <div class="List-Info">
                <p>
                    Idade:
                </p>
                <p>
                    <?php  echo $motorista->getIdade();?>
                </p>
            </div>
           
            <div class="List-Info">
                <p>
                    CPF:
                </p>
                <p>
                    <?php echo $motorista->getCpf()?>
                </p>
            </div>
            <div class="List-Info">
                <p>
                    Telefone:
                </p>
                <p>
                    <?php echo $motorista->getTelefone() ?>
                </p>
            </div>
            <div class="List-Info">
                <p>
                    Se trabalha no turno da manhã:
                </p>
                <p>
                    <?php echo $motorista->getTurnoManha()?>
                </p>
            </div>
            <div class="List-Info">
                <p>
                    Se trabalha no turno da tarde:
                </p>
                <p>
                    <?php echo $motorista->getTurnoTarde()?>
                </p>
            </div>
            <div class="List-Info">
                <p>
                    Se trabalha no turno da tarde:
                </p>
                <p>
                    <?php echo $motorista->getTurnoNoite()?>
                </p>
            </div>
            <div class="List-Info">
                <p>
                    Regiao de atuacao:
                </p>
                <p>
                    <?php echo $motorista->getRegiaoDeAtuacao()?>
                </p>
            </div>
            <div class="List-Info">
                <p>
                    Sexo: 
                </p>
                <p>
                <?php echo $motorista->getSexo()?>
                </p>
            </div>
            <div class="List-Info">
                <p>
                    Placa:
                </p>
                <p>
                    
                </p>
            </div>
            <div class="List-Info">
                <p>
                    Marca:
                </p>
                <p>
                    
                </p>
            </div>
            <div class="List-Info">
                <p>
                    Modelo:
                </p>
                <p>
                    
                </p>
            </div>
            <div class="List-Info">
                <p>
                    Quantidade de Lugares:
                </p>
                <p>
                    
                </p>
            </div>
        </div>
      
    </main>
    <?php 
        if(!empty($mensagem)){
            echo $mensagem;
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html> -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        * {
            font-family: 'Merriweather', serif;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #F6A62E;
        }

        .profile-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
            padding: 30px;
            text-align: center;
            margin-top: 50px;
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-color: #333;
            background-image: url('sua-foto.jpg'); /* Substitua pelo URL da sua foto */
            background-size: cover;
            background-position: center;
            border: 5px solid #fff;
            margin: 0 auto 20px;
        }

        .profile-name {
            font-size: 36px;
            font-weight: bold;
            margin: 10px 0;
            color: #333;
        }

        .profile-info {
            font-size: 1.5em;
            color: #555;
            margin-top: 20px;
        }

        .profile-info p {
            margin: 10px 0;
        }

        .profile-info strong {
            font-weight: bold;
            color: #333;
        }

        .profile-info ul {
            list-style: none;
            padding: 0;
        }

        .profile-info ul li {
            margin-bottom: 5px;
        }

        .profile-links {
            margin-top: 30px;
        }

        .profile-links a {
            display: inline-block;
            margin: 0 10px;
            text-decoration: none;
            color: #333;
            font-size: 20px;
            transition: color 0.3s ease;
        }

        .profile-links a:last-child {
            margin-right: 0;
        }

        .profile-links a:hover {
            color: #e74c3c; 
        }
        
        .top-left {
            position: absolute;
            top: 10px;
            left: 10px;
        }
        
        .top-right {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .teste {
            overflow: hidden;
        }
    </style>
</head>
<body>
    <a href="../../HTML/index.html" class="btn btn-outline-light shadow-lg top-left">
        <i class="fas fa-arrow-left"></i> Voltar
    </a>
    <a href="../../HTML/Perfil-Edit.html" class="btn btn-outline-light shadow-lg top-right">
        <i class="fas fa-edit"></i> Editar Perfil
    </a>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="profile-container">
                    <div class="profile-picture teste">
                        <img src="" width="100%" alt="">
                    </div>
                    <h3 class="profile-name"><?php echo $motorista->getNome() ?></h3>
                    <div class="profile-info">
                        <p><strong>Email:</strong> capeta@gmail.com</p>
                        <p><strong>CPF:</strong> <?php echo $motorista->getCpf()?></p>
                        <p><strong>Idade:</strong> <?php  echo $motorista->getIdade();?></p>
                        <p><strong>Telefone:</strong> <?php echo $motorista->getTelefone() ?></p>
                        <p><strong>Sexo:</strong> <?php echo $motorista->getSexo()?></p>
                        <p><strong>Regiao de atuação:</strong> <?php echo $motorista->getRegiaoDeAtuacao()?></p>
                        <h4><strong>Turnos ao qual trabalha:</strong></h4>
                        <ul>
                            <li><strong>Manhã:</strong> <?php echo $motorista->getTurnoManha()?></li>
                            <li><strong>Tarde:</strong> <?php echo $motorista->getTurnoTarde()?></li>
                            <li><strong>Noite:</strong> <?php echo $motorista->getTurnoNoite()?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
        if(!empty($mensagem)){
            echo $mensagem;
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>
</html>
