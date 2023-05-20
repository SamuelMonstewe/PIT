<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
require_once "pdo.php";
require_once "classes.php";
$objMotorista = new Motorista();
//$Insert;


function GetFotos()
{

    $DiretorioDeUpload = 'C:\wamp64\www\PIT\imagens\\';
    $FotoMotorista = $DiretorioDeUpload . basename($_FILES['foto']['name']);
    $CarteiraMotorista = $DiretorioDeUpload . basename($_FILES['carteira']['name']);
    $Crlv = $DiretorioDeUpload . basename($_FILES['crlv']['name']);

    if (
        move_uploaded_file($_FILES['foto']['tmp_name'], $FotoMotorista) &&
        move_uploaded_file($_FILES['carteira']['tmp_name'], $CarteiraMotorista) && move_uploaded_file($_FILES['crlv']['tmp_name'], $Crlv)
    ) {
        print_r($_FILES);
    }
}

function pegarDadosDoFormulario()
{
    global $objMotorista;
    $objMotorista->set("Cpf", $_POST['cpf']);
    $objMotorista->set("Nome", $_POST['nome']);
    $objMotorista->set("Idade", $_POST['idade']);
    $objMotorista->set("Telefone", $_POST['telefone']);
    $objMotorista->set("Turno", $_POST['turno']);
    $objMotorista->set("Escolas", $_POST['idescola']);
    $objMotorista->set("Rota", $_POST['rota']);
    $objMotorista->set("Sexo", $_POST['sexo']);
    $objMotorista->set("fotoMotorista", base64_encode(file_get_contents($_FILES['fotomotorista']['tmp_name'])));
    $objMotorista->set("fotoCarteira", base64_encode(file_get_contents($_FILES['fotocarteira']['tmp_name'])));
    $objMotorista->set("fotoCRLV", base64_encode(file_get_contents($_FILES['fotocrlv']['tmp_name'])));
}
function inserirDadosNoBanco()
{
    global $objMotorista;
    global $ConexaoBanco;
    $Insert = $ConexaoBanco->prepare("INSERT INTO motorista VALUES(null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $Insert->execute([
        $objMotorista->get("Cpf"), $objMotorista->get("Nome"), $objMotorista->get("Idade"),
        $objMotorista->get("Telefone"),  $objMotorista->get("Turno"), $objMotorista->get("Rota"),
        $objMotorista->get("Sexo"), $objMotorista->get("fotoMotorista"), $objMotorista->get("fotoCarteira"),
        $objMotorista->get("fotoCRLV")
    ]);
    $idMotorista = $ConexaoBanco->lastInsertId();
    $Insert2 = $ConexaoBanco->prepare("INSERT INTO escola_motorista VALUES (null,?,?)");
    $Insert2->execute([
        $objMotorista->get("Escolas"), $idMotorista
    ]);
}

if (isset($_POST['enviar'])) {

    pegarDadosDoFormulario();
    inserirDadosNoBanco();
}
else{
    http_response_code(400);
    echo("dados incompletos");
}

?>