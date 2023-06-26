<?php 
require_once "pdo.php";
function redefinirSenha(){
global $ConexaoBanco;
$email = $_POST['email'];
$senha = $_POST['senhanova'];
$senhaConfirmacao = $_POST['confirmacaosenha'];

if($senha != $senhaConfirmacao){
    $mensagem = "Digite senhas iguais!";
    echo json_encode($mensagem);
}
else{
    $UPDATE = $ConexaoBanco->prepare("UPDATE usuarios SET senha = :senha WHERE email = :email");
    $UPDATE->bindParam(':senha', $senha);
    $UPDATE->bindParam(':email', $email);
    if($UPDATE->execute()){
        $mensagem = "Senha redefinida com sucesso!";
        echo json_encode($mensagem);
    }
   
}
}

if(isset($_POST['enviar'])){
    redefinirSenha();
}