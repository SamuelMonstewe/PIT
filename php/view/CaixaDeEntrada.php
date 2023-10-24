<?php
session_start();
require_once "../pdo.php";

$id_motorista_fk = $_SESSION['id_motorista_fk'];
$SELECT_NOTIFICACOES = $ConexaoBanco->prepare("SELECT * FROM notificacoes WHERE id_motorista_fk = :id_motorista_fk");
$SELECT_NOTIFICACOES->bindParam(':id_motorista_fk', $id_motorista_fk);

if ($SELECT_NOTIFICACOES->execute()) {
    $dadosRetornados = $SELECT_NOTIFICACOES->fetchAll(PDO::FETCH_ASSOC);
}
if(isset($_POST['btn-aceitar-cliente'])){
    $id_usuario_fk = $_POST['id_usuario'];
    $INSERT_CLIENTE_MOTORISTA = $ConexaoBanco->prepare("INSERT INTO cliente_motorista VALUES (null, :id_cliente_fk, :id_motorista_fk)");
    $INSERT_CLIENTE_MOTORISTA->bindParam(':id_cliente_fk', $id_usuario_fk);
    $INSERT_CLIENTE_MOTORISTA->bindParam(':id_motorista_fk', $id_motorista_fk);

    if($INSERT_CLIENTE_MOTORISTA->execute()){
        $esconderBotao = true;
        $_POST = array();
        header("Location: {$_SERVER['REQUEST_URI']}");
        exit;
    }
    else{
        $esconderBotao = false;
    }
}

if ($dadosRetornados == false) {
    $checar = true;
} else {
    $checar = false;
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Caixa de entrada</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


</head>

<body>
    <header>
        <a href="../../HTML/index.html" style="text-decoration:none; color:black;">
            <div class="d-flex align-items-center">
                <img src="../../HTML/imagens/logo.png" width="35%" alt="">
                <h1>InfoVan</h1>
            </div>
        </a>
    </header>
    <main>
        <div class="table-responsive mt-5">
            <div class="container">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">Descrição</th>
                            <th scope="col">Dados do cliente</th>
                            <th scope="col">Aceitar Cliente</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($checar) {
                            echo "Não há notificações";
                        } else {

                            foreach ($dadosRetornados as $index => $dados):
                                $modalId = 'modalId' . $index; 
                                $modalId2 = 'modalId_' . $index;?>

                                <tr>
                                    <td scope="row">
                                        <?php echo $dados['descricao']; ?>
                                    </td>
                                    <td scope="row">
                                        <!-- Modal trigger button -->
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#<?php echo $modalId ?>">
                                            Dados Cliente
                                        </button>

                                        <div class="modal fade" id="<?php echo $modalId ?>" tabindex="-1"
                                            data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                            aria-labelledby="modalTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <?php
                                                        $SELECT_USUARIOS = $ConexaoBanco->prepare("SELECT * FROM usuarios WHERE id = :id");
                                                        $SELECT_USUARIOS->bindParam(':id', $dados['id_usuario_fk']);


                                                        if ($SELECT_USUARIOS->execute()) {
                                                            $dadosRetornadosUsuario = $SELECT_USUARIOS->fetch(PDO::FETCH_ASSOC);

                                                            $SELECT_ALUNO = $ConexaoBanco->prepare("SELECT * FROM aluno WHERE id_responsavel_fk = :id");
                                                            $SELECT_ALUNO->bindParam(':id', $dados['id_usuario_fk']);


                                                            if ($SELECT_ALUNO->execute()) {
                                                                $dadosRetornadosAluno = $SELECT_ALUNO->fetch(PDO::FETCH_ASSOC);
                                                            }
                                                        }
                                                        ?>


                                                        <h5 class="modal-title" id="modalTitleId">
                                                            <?php echo $dadosRetornadosUsuario['Usuario'] ?>
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Email:
                                                            <?php echo $dadosRetornadosUsuario['email'] ?>
                                                        </p>
                                                        <p>Dados do filho(a):
                                                            <?php echo $dadosRetornadosAluno['nome'] ?>
                                                        </p>
                                                        <p>Escola:
                                                            <?php echo $dadosRetornadosAluno['escola'] ?>
                                                        </p>
                                                        <p>Regiao onde mora:
                                                            <?php echo $dadosRetornadosAluno['regiao_onde_mora'] ?>
                                                        </p>
                                                        <p>Sexo:
                                                            <?php echo $dadosRetornadosAluno['sexo'] ?>
                                                        </p>



                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    
                                    </td>

                                    <td>
                               
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#<?php echo $modalId2 ?>">
                                      Aceitar
                                    </button>
                                 
                                    
                                  
                                    <div class="modal fade" id="<?php echo $modalId2 ?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitleId">IMPORTANTE</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Esse cliente vai agora fazer parte do seu escolar, deseja continuar?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="id_usuario" value="<?php echo $dadosRetornadosUsuario['id']?>">
                                                        <input type="hidden" name="id_motorista" value="<?php echo $id_motorista_fk?>">
                                                        <button type="submit" id="btn-aceitar-cliente" class="btn btn-warning" name="btn-aceitar-cliente">Sim</button>
                                                    </form>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <!-- Optional: Place to the bottom of scripts -->
                                    <script>
                                        const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
                                    
                                    </script></td>
                                </tr>

                            <?php endforeach;
                        } ?>
                    </tbody>
                </table>
            </div>

        </div>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
</body>

<style>
    header {
        background-color: #F6A62E;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
    }
</style>

</html>