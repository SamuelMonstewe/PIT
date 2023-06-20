<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
require_once "pdo.php";
require_once "classes.php";

$usuario = new Usuario();

function PreencherDados()
{
    global $usuario;
    $usuario->Usuario = filter_input(INPUT_POST, 'usuario' );
    $usuario->Email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $usuario->Senha = filter_input(INPUT_POST, 'senha' );
}
function InserirDados()
{
    global $usuario;
    global $ConexaoBanco;

    try {


        $query = $ConexaoBanco->prepare("SELECT COUNT(*) FROM usuarios WHERE email = :email");
        $query->bindParam(':email', $usuario->Email);
        $query->execute();
        $result = $query->fetchColumn();

        if ($result > 0) {
            echo json_encode(array("erro" => "O email já está cadastrado."));
        } 
        else {
            $Insert = $ConexaoBanco->prepare("INSERT INTO usuarios VALUES (null,:Usuario ,:Email ,:Senha)");
            $Insert->bindParam(':Usuario', $usuario->Usuario);
            $Insert->bindParam(':Email', $usuario->Email);
            $Insert->bindParam(':Senha', $usuario->Senha);

            $Insert->execute();
            $linhasAfetadas = $Insert->rowCount();
            if ($linhasAfetadas > 0) {
                echo json_encode(array("mensagem" => "Inserção bem-sucedida!"));

            } else {
                throw new Exception("Erro ao inserir os dados.");
            }
        }

    } catch (PDOException $e) {
        echo json_encode(array("erro" => $e->getMessage()));
    } finally {
        $ConexaoBanco = null;
    }

}

if (isset($_POST['enviar'])) {
    PreencherDados();
    InserirDados();
}

?>