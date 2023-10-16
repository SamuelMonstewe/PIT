<?php

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        * {
            font-family: 'Merriweather', serif;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #F6A62E;
        }

        ::-webkit-scrollbar-track {
            background-color: #ffffff;
        }

        ::-webkit-scrollbar {
            width: 5px;
            background: rgb(255, 173, 10);
        }

        ::-webkit-scrollbar-thumb {
            background: rgb(255, 173, 10);
            border-radius: 15px;
        }

        .profile-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
            padding: 30px;
            text-align: left;
            margin-top: 50px;
        }

        .profile-container h3 {
            text-align: center;
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-color: #333;
            background-image: url('sua-foto.jpg');
            /* Substitua pelo URL da sua foto */
            background-size: cover;
            background-position: center;
            border: 5px solid #fff;
            margin: 0 auto 20px;
        }

        .profile-name {
            font-size: 36px;
            font-weight: bold;
            margin: 10px 0;
            color: #333;
        }

        .profile-info {
            font-size: 1.5em;
            color: #555;
            margin-top: 20px;

        }

        .profile-info p {
            margin: 10px 0;
        }

        .profile-info strong {
            font-weight: bold;
            color: #333;
        }

        .profile-info ul {
            list-style: none;
            padding: 0;
        }

        .profile-info ul li {
            margin-bottom: 5px;
        }

        .profile-links {
            margin-top: 30px;
        }

        .profile-links a {
            display: inline-block;
            margin: 0 10px;
            text-decoration: none;
            color: #333;
            font-size: 20px;
            transition: color 0.3s ease;
        }

        .profile-links a:last-child {
            margin-right: 0;
        }

        .profile-links a:hover {
            color: #e74c3c;
        }

        .top-left {
            position: absolute;
            top: 10px;
            left: 10px;
        }

        .top-right {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .teste {
            overflow: hidden;
        }

        .btn {
            transition: 0.5s;
        }

        @media (max-width:500px) {
            #ButtonLogOut {
                position: relative;
                left: -30%;
            }
        }

        #Escolas {
            width: 100%;
        }

        #Escolas option {
            width: 50%;
        }
    </style>
</head>

<body>
    <a href="PerfilResponsavel.php" class="btn btn-outline-light shadow-lg top-left">
        <i class="fas fa-arrow-left"></i> Voltar
    </a>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="profile-container">

                    <div class="profile-picture teste">
                        <img src="" width="100%" alt="">
                    </div>
                    <h3 class="profile-name">Nome Responsavel</h3>
                    <div class="profile-info">
                        <p><strong>Escola que o aluno estuda:</strong></p>
                        <select class="mt-5 mb-5" id="Escolas" aria-label="Large select example">
                            <option selected>Escolha a Escola a Qual Fornece Serviço</option>
                            <?php
                            require_once "../pdo.php";
                            header("Access-Control-Allow-Origin: *");
                            header('Content-Type: application/json; charset=utf-8');
                            header('Content-Type: text/html; charset=utf-8');
                            $ConexaoBanco->exec("SET NAMES utf8");
                            global $ConexaoBanco;

                            $SELECT = $ConexaoBanco->prepare("SELECT nome FROM escolas ORDER BY nome");
                            $SELECT->execute();


                            while ($row = $SELECT->fetch(PDO::FETCH_ASSOC)) {
                                $nomeEscola = $row['nome'];
                                echo "<option>$nomeEscola</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (!empty($mensagem)) {
        echo $mensagem;
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>