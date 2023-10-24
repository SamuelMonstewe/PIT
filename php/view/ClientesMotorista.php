<?php
session_start();
require_once "../pdo.php";

$id_motorista_fk = $_SESSION['id_motorista_fk'];
$PEGAR_CLIENTES_MOTORISTA = $ConexaoBanco->prepare("SELECT usuarios.Usuario, usuarios.email FROM cliente_motorista 
    INNER JOIN usuarios 
    ON cliente_motorista.id_cliente_fk = usuarios.id WHERE id_motorista_fk = :id_motorista_fk");

$PEGAR_CLIENTES_MOTORISTA->bindParam(':id_motorista_fk', $id_motorista_fk);

if($PEGAR_CLIENTES_MOTORISTA->execute()){
    $dadosRetornados = $PEGAR_CLIENTES_MOTORISTA->fetchAll(PDO::FETCH_ASSOC);
    
}
?>


<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        <div class="container mt-5">
            <div class="table-responsive">
                <table class="table table-primary" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">Nome Cliente</th>
                            <th scope="col">Email</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($dadosRetornados as $dado): ?>
                        <tr class="">
                            <td scope="row"><?php echo $dado['Usuario'] ?></td>
                            <td scope="row"><?php echo $dado['email'] ?></td>

                        </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>


    </main>
    <footer>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>
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