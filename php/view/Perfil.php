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
    <link rel='stylesheet' type='text/css' media='screen' href='../../HTML/CSS-Perfil/style.css'>
    <title>Perfil De Usuário</title>
</head>

<body>

    <header class="container-fluid">
        <a id="Back-Button" href="../../HTML/index.html">
            Voltar
        </a>
        <h1>
            Meu Perfil
        </h1>
        <a id="Edit-Button" href="Perfil-Edit.html">
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
                    Nome: <?php echo $motorista->getNome() ?>
                </p>
                <p>
                    
                </p>
            </div>
            <div class="List-Info">
                <p>
                    Idade: <?php  echo $motorista->getIdade();?>
                </p>
                <p>
                    
                </p>
            </div>
           
            <div class="List-Info">
                <p>
                    CPF: <?php echo $motorista->getCpf()?>
                </p>
                <p>
                    
                </p>
            </div>
            <div class="List-Info">
                <p>
                    Telefone: <?php echo $motorista->getTelefone() ?>
                </p>
                <p>
                    
                </p>
            </div>
            <div class="List-Info">
                <p>
                    Se trabalha no turno da manhã: <?php echo $motorista->getTurnoManha()?>
                </p>
                <p>
                    
                </p>
            </div>
            <div class="List-Info">
                <p>
                    Se trabalha no turno da tarde: <?php echo $motorista->getTurnoTarde()?>
                </p>
                <p>
                    
                </p>
            </div>
            <div class="List-Info">
                <p>
                    Se trabalha no turno da tarde: <?php echo $motorista->getTurnoNoite()?>
                </p>
                <p>
                    
                </p>
            </div>
            <div class="List-Info">
                <p>
                    Regiao de atuacao: <?php echo $motorista->getRegiaoDeAtuacao()?>
                </p>
                <p>
                    
                </p>
            </div>
            <div class="List-Info">
                <p>
                    Sexo: <?php echo $motorista->getSexo()?>
                </p>
                <p>
                    
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

</html>