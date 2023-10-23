<?php
session_start();
require_once "../pdo.php";
$id_motorista_fk = $_SESSION['id_motorista_fk'];
$SELECT_NOTIFICACOES = $ConexaoBanco->prepare("SELECT * FROM notificacoes WHERE id_motorista_fk = :id_motorista_fk");
$SELECT_NOTIFICACOES->bindParam(':id_motorista_fk', $id_motorista_fk);

if($SELECT_NOTIFICACOES->execute()){
    $dadosRetornados = $SELECT_NOTIFICACOES->fetchAll(PDO::FETCH_ASSOC);
    $dadosRetornadosUsuarios = [];
    foreach($dadosRetornados as $dado){
        $id = $dado["id_usuario_fk"];
        $SELECT_USUARIOS = $ConexaoBanco->prepare("SELECT Usuario FROM usuarios WHERE id = :id");
        $SELECT_USUARIOS->bindParam(':id', $id);

        if($SELECT_USUARIOS->execute()){
            $dadosRetornadosUsuarios = $SELECT_USUARIOS->fetchAll(PDO::FETCH_ASSOC);
        }

    }
    if($dadosRetornados == false){
        $checar = true;
    }
    else{
        $checar = false;
    }
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
        <a href="../../HTML/index.html"  style="text-decoration:none; color:black;">
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
                    <th scope="col">Nome do cliente</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if($checar){
                echo "Não há notificações";
            }
            else{
                foreach($dadosRetornados as $index => $dados): ?>
                    <tr>
                        <td scope="row"><?php echo $dados['descricao']; ?></td>
                        <td scope="row"><?php echo $dadosRetornadosUsuarios[$index]['Usuario']; ?></td>
                    </tr>
                    
                <?php endforeach;} ?>
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