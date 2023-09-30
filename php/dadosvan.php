<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
require_once "pdo.php";
require_once "classes/Van.php";
require_once "classes/Motorista.php";

$van = new Van();

function PegarDadosVan()
{
    global $van;
 
    $van->setCpfMotoristaDaVan($_POST['cpf']);
    $van->setChassi(strtoupper($_POST['chassi']));
    $van->setPlaca(strtoupper($_POST['placaVeiculo']));
    $van->setMarca(strtoupper($_POST['marca']));
    $van->setModelo(strtoupper($_POST['modelo']));
    $van->setQuantLugar($_POST['capacidadeAlunos']);
    $van->setLaudoInspecaoVeicular(base64_encode(file_get_contents($_FILES['laudo']['tmp_name'])));
    $van->setFotoInterna(base64_encode(file_get_contents($_FILES['fotoInterna']['tmp_name'])));
    $van->setFotoExterna(base64_encode(file_get_contents($_FILES['fotoExterna']['tmp_name'])));
}

function InserirDados()
{
    try {
        global $ConexaoBanco;
        global $van;
        $insert = $ConexaoBanco->prepare("INSERT INTO van (chassi, placa, marca, modelo, qtd_lugares, motorista_id_fk,laudo_inspecao_veicular, foto_interna, foto_externa) 
                                          VALUES (:chassi, :placa, :marca, :modelo, :qtd_lugares, :motorista_id_fk, :laudo_inspecao_veicular, :foto_interna, :foto_externa)");

        $SELECT_MOTORISTA = $ConexaoBanco->prepare("SELECT id FROM motorista WHERE cpf = :cpf");
        $cpf = $van->getCpfMotoristaDaVan();
        $SELECT_MOTORISTA->bindParam(':cpf', $cpf);
        $SELECT_MOTORISTA->execute();
        $dados_retornados = $SELECT_MOTORISTA->fetch(PDO::FETCH_ASSOC);
        $idMotorista_fk = $dados_retornados['id'];

        $chassi = $van->getChassi();
        $placa  =  $van->getPlaca();
        $marca = $van->getMarca();
        $modelo = $van->getModelo();
        $quantidadeDeLugar =  $van->getQuantlugar();
        $laudoInspecaoVeicular = $van->getLaudoInspecaoVeicular();
        $fotoInterna = $van->getFotoInterna();
        $fotoExterna = $van->getFotoExterna();
        
        $insert->bindParam(':chassi',  $chassi);
        $insert->bindParam(':placa', $placa);
        $insert->bindParam(':marca',  $marca);
        $insert->bindParam(':modelo',  $modelo);
        $insert->bindParam(':qtd_lugares', $quantidadeDeLugar);
        $insert->bindParam(':motorista_id_fk', $idMotorista_fk);
        $insert->bindParam(':laudo_inspecao_veicular', $laudoInspecaoVeicular);
        $insert->bindParam(':foto_interna', $fotoInterna);
        $insert->bindParam(':foto_externa', $fotoExterna);
        $insert->execute();

    } catch (PDOException $e) {
        echo ($e->getMessage());
    }
}

if (isset($_POST['enviar'])) {
    PegarDadosVan();
    InserirDados();
} else {

    echo ("dados incompletos");
}
