<?php
require_once "../pdo.php";

$SELECT_MOTORISTA = $ConexaoBanco->prepare("SELECT cpf, regiao_atuacao FROM motorista");
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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../../HTML/CSS-MostrarM/style.css">
    <title>Visualizar Motoristas</title>
</head>

<body>
    <header>
        <div class="d-flex align-items-center">
            <img src="../../HTML/imagens/logo.png" width="35%" alt="">
            <h1>InfoVan</h1>
        </div>
        <div class="DivVazia"></div>
        <div>
            <img src="../../HTML/imagens/filtro.png" width="85%" alt="">
        </div>
        <div></div>
    </header>
    <main>
    
       
            <div class="CardMotoristas">
                <?php foreach ($dadosRetornadosUsuarios as $index => $usuarios) :
                    foreach ($usuarios as  $usuario) : ?>
                        <div class="card" style="width: 18rem;">
                            <div class="profile-picture">
                                <img class="" src="..." alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $usuario['Usuario'] ?></h5>
                                <p class="card-text"><?php echo $dadosRetornadosMotorista[$index]['regiao_atuacao'] ?> </p>
                                <p class="card-text">R$ 150,00</p>
                            </div>
                        </div>
         <?php endforeach;
         endforeach; 
        ?>

        </div>
    </main>
</body>

</html>