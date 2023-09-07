<?php
session_start();
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
require_once "pdo.php";
require_once "classes/Usuario.php";
require_once "verificarUsuarioExistente.php";
require_once "emailDeConfirmacao.php";
require_once "gerarChave.php";

require '../lib/vendor/autoload.php';

function InserirDadosMotorista()
{
    global $usuario;
    global $ConexaoBanco;
    $usuario = new Usuario();
    $usuario->setNomeUsuario(filter_input(INPUT_POST, 'usuario'));
    $usuario->setEmail(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)); 
    $usuario->setSenha(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));

    try {

        if (VerificarSeUsuarioExiste($usuario->getNomeUsuario(), $usuario->getEmail())) {
            $mensagem = "O email já está cadastrado!";
            echo json_encode($mensagem);
            exit;
        } 
        else {
            $Insert = $ConexaoBanco->prepare("INSERT INTO usuarios VALUES (null,:Usuario ,:Email ,:Senha ,:Chave, 3)");
            $Insert->bindParam(':Usuario', $usuario->getNomeUsuario());
            $Insert->bindParam(':Email', $usuario->getEmail());
            $Insert->bindParam(':Senha', $usuario->getSenha());
            $usuario->setChave(password_hash($usuario->Email . date("Y-m-d H:i:s"), PASSWORD_DEFAULT));
            $Insert->bindParam(':Chave', $usuario->getChave());
            $Insert->execute();
            $linhasAfetadas = $Insert->rowCount();

            if ($linhasAfetadas > 0) {
                $mensagem = "Enviamos um email para confirmação!";
                echo json_encode($mensagem);
                EnviarEmailDeConfirmacao();
                exit;
            } 
            else {
                throw new Exception("Erro ao inserir os dados.");
            }
        }

    } 
    catch (PDOException $e) {
        $mensagem = $e->getMessage();
        echo json_encode($mensagem);
        exit;
    } 
    catch (Exception $e) {
        $mensagem = "Erro ao inserir os dados.";
        echo json_encode($mensagem);
        exit;
    }
    finally {
        $ConexaoBanco = null;
    }
}
if (isset($_SESSION['mensagem'])) {
    echo $_SESSION['mensagem'];
    unset($_SESSION['mensagem']);
}
if (isset($_POST['enviar'])) {
 
     InserirDadosMotorista();
}

?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>

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

</html>