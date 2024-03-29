<?php
header('Content-Type: text/html; charset=utf-8');
require_once "../pdo.php";
session_start();


if ($_SESSION['situacao_login']) {

    if (isset($_POST['btn-filtrar'])) {
        $SELECT_USUARIO_ALUNO = $ConexaoBanco->prepare("SELECT usuarios.id, aluno.escola, aluno.regiao_onde_mora FROM usuarios 
        INNER JOIN aluno 
        ON usuarios.id = aluno.id_responsavel_fk 
        WHERE usuarios.cpf = :cpf");

        $cpf = $_SESSION['cpf'];
        $SELECT_USUARIO_ALUNO->bindParam(':cpf', $cpf);

        if ($SELECT_USUARIO_ALUNO->execute()) {
            
            $dadosRetornadosAluno = $SELECT_USUARIO_ALUNO->fetch(PDO::FETCH_ASSOC);
            $escolaAluno = $dadosRetornadosAluno['escola'];
            $regiaoDoAluno = $dadosRetornadosAluno['regiao_onde_mora'];
            $SELECT_MOTORISTA = $ConexaoBanco->prepare("SELECT cpf, regiao_atuacao, telefone, idade, sexo FROM motorista WHERE regiao_atuacao = :regiao_aluno");
            $SELECT_MOTORISTA->bindParam(':regiao_aluno', $regiaoDoAluno);

            if ($SELECT_MOTORISTA->execute()) {

                $dadosRetornadosUsuarios = array();

                $dadosRetornadosMotorista = $SELECT_MOTORISTA->fetchAll(PDO::FETCH_ASSOC);

                foreach ($dadosRetornadosMotorista as $motorista) {
                    $cpf = $motorista['cpf'];
                    $SELECT_USUARIOS = $ConexaoBanco->prepare("SELECT Usuario FROM usuarios WHERE cpf = :cpf");
                    $SELECT_USUARIOS->bindParam(':cpf', $cpf);

                    if ($SELECT_USUARIOS->execute()) {
                        $dadosRetornadosUsuarios[] = $SELECT_USUARIOS->fetchAll(PDO::FETCH_ASSOC);
                    }
                }
            }
        }
    } else  {
        $SELECT_MOTORISTA = $ConexaoBanco->prepare("SELECT cpf, regiao_atuacao, telefone, idade, sexo FROM motorista");
        if ($SELECT_MOTORISTA->execute()) {
            $dadosRetornadosUsuarios = array();

            $dadosRetornadosMotorista = $SELECT_MOTORISTA->fetchAll(PDO::FETCH_ASSOC);

            foreach ($dadosRetornadosMotorista as $motorista) {
                $cpf = $motorista['cpf'];
                $SELECT_USUARIOS = $ConexaoBanco->prepare("SELECT  Usuario FROM usuarios WHERE cpf = :cpf");
                $SELECT_USUARIOS->bindParam(':cpf', $cpf);

                if ($SELECT_USUARIOS->execute()) {
                    $dadosRetornadosUsuarios[] = $SELECT_USUARIOS->fetchAll(PDO::FETCH_ASSOC);
                }
            }
        } else {
            header("Location: ../../HTML/login.html");
        }
    }
}
else{
    header("Location: ../../HTML/login.html");
}


if(isset($_POST['enviar-mensagem'])){
    
    if(!empty($_POST['descricao'])){
 
        $descricaoDaMensagem = $_POST['descricao'];
        $cpfMotorista = $_POST['cpf']; 
  
        $PEGAR_ID_MOTORISTA = $ConexaoBanco->prepare("SELECT id FROM motorista WHERE cpf = :cpf");
        $PEGAR_ID_MOTORISTA->bindParam(':cpf', $cpfMotorista);

        if($PEGAR_ID_MOTORISTA->execute()){
            
            $idMotorista = $PEGAR_ID_MOTORISTA->fetch(PDO::FETCH_ASSOC);
            $idUsuario = $_SESSION['id'];
            $tipoNotificacao = -1;
           
            $INSERT_NOTIFICACOES = $ConexaoBanco->prepare("INSERT INTO notificacoes VALUES (null, :descricao, :id_motorista_fk, :id_usuario_fk, :tipo_notificacao)");
            $INSERT_NOTIFICACOES->bindParam(':descricao', $descricaoDaMensagem);
            $INSERT_NOTIFICACOES->bindParam(':id_motorista_fk', $idMotorista['id']);
            $INSERT_NOTIFICACOES->bindParam(':id_usuario_fk', $idUsuario);
            $INSERT_NOTIFICACOES->bindParam(':tipo_notificacao', $tipoNotificacao);
            $INSERT_NOTIFICACOES->execute();
            
            $_POST = array();
            // Redirecionar de volta para a página atual
            header("Location: {$_SERVER['REQUEST_URI']}");
            exit;
        }

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../HTML/CSS-MostrarM/style.css">

    <title>Visualizar Motoristas</title>
</head>

<body>
    <header>
        <a href="../../HTML/index.html"  style="text-decoration:none; color:black;">
        <div class="d-flex align-items-center">
            <img src="../../HTML/imagens/logo.png" width="35%" alt="">
            <h1>InfoVan</h1>
        </div>
        </a>
        
      
        <?php if(!($_SESSION['tipo_usuario'] == 1)): ?>
            <button class="btn btn-secondary" style="font-family:sans-serif" type="button" data-bs-toggle="offcanvas" data-bs-target="#Id2" aria-controls="Id2">
                Filtrar escolares?
            </button>
        <?php endif; ?>


        <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="Id2" aria-labelledby="staticBackdropLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" style="font-family:sans-serif" id="staticBackdropLabel">Filtro de escolares</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form action="" method="post">
                    <h4>Clique aqui para filtrarmos de acordo com perfil do seu filho</h4>
                    <button type="submit" class="btn btn-warning" name="btn-filtrar">Filtrar</button>
                    <h4>Clique aqui para ver todos</h4>
                    <button type="submit" class="btn btn-warning" name="btn-todos">Ver todos</button>
                </form>

            </div>
        </div>
    </header>
    <main>

        <div class="CardMotoristas d-flex justify-content-around mt-4">
            <?php foreach ($dadosRetornadosUsuarios as $index => $usuarios) :
                foreach ($usuarios as $usuario) :
                    $modalId = 'modalId' . $index;
                    $modalId2 = 'modalId_' . $index;  ?>
                    <div class="card" style="width: 18rem; ">
                        <div class="profile-picture">
                            <img class="" src="..." alt="">
                        </div>
                        <div class="card-body">
                            <h2 class="card-title" style="font-size: 0.9em;"><?php echo $usuario['Usuario'] ?></h2>
                            <!-- Modal trigger button -->
                            <button type="button" class="btn btn-warning btn-lg" data-bs-toggle="modal" data-bs-target="#<?php echo $modalId ?>">
                                Ver dados
                            </button>
                            <!-- Modal trigger button -->
                            <?php if(!($_SESSION['tipo_usuario'] == 1)): ?>
                            <button type="button" class="btn btn-warning btn-lg mt-3" data-bs-toggle="modal" data-bs-target="#<?php echo $modalId2 ?>">
                              Se interessou?
                            </button>
                            <?php endif; ?>
                            
                           
                            <div class="modal fade" id="<?php echo $modalId2 ?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">Mensagem</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                           <div class="mb-3">
                                            <p>Clique no botão para notificar o motorista que você se interessou!</p>
                                           
                                             <form action="" method="post">
                                                <input type="hidden" class="form-control" name="cpf" value="<?php echo $dadosRetornadosMotorista[$index]['cpf'] ?>">
                                                <input type="hidden" class="form-control" name="descricao" value="Olá, gostaria de colocar meu filho no seu transporte" id="" aria-describedby="helpId" placeholder="">
                                            
                                                <button type="submit" class="btn btn-warning mt-3 notificar-motorista" name="enviar-mensagem" id="enviar-mensagem">Notificar</button>
                                            </form>
                                           </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                                            
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        
                            <div class="modal fade" id="<?php echo $modalId ?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId"><?php echo $usuario['Usuario'] ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Idade: <?php echo $dadosRetornadosMotorista[$index]['idade'] ?></p>
                                            <p>Região de Atuação: <?php echo $dadosRetornadosMotorista[$index]['regiao_atuacao'] ?></p>
                                            <p>Sexo: <?php echo $dadosRetornadosMotorista[$index]['sexo'] ?></p>
                                            <p>Telefone: <?php echo $dadosRetornadosMotorista[$index]['telefone'] ?></p>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Optional: Place to the bottom of scripts -->
                            <script>
                                const myModal = new bootstrap.Modal(document.getElementById('modalId'))
                            </script>
                        </div>
                    </div>
            <?php endforeach;
            endforeach;
            ?>
        </div>
        <div id="mensagem"></div>
    </main>
</body>
<style>
*{
    font-family: sans-serif;
}
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="../../js/MostrarMotoristas.js"></script>
<script>
    $(document).ready(function () {
        $(".notificar-motorista").on("click", function () {
            alert("mensagem enviada com sucesso!");
        });
    });
</script>
</html>