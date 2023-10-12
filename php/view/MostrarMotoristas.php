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
        <a href="../../HTML/index.html" class="text-decoration-none text-dark">
            <div class="d-flex align-items-center">
                <img src="../../HTML/imagens/logo.png" width="35%" alt="">
                <h1>InfoVan</h1>
            </div>
        </a>
        <div class="DivVazia"></div>
        <div>
            <img src="../../HTML/imagens/filtro.png" onclick="Filter()" width="85%" alt="">
        </div>
        <div></div>
        <div id="FilterBtn" class="Filter">
            <h2>
                Turnos:
            </h2>
            <div class="d-flex align-items-center">
                <input type="checkbox" class="mr-4" value="MANHÃ">
                <h4>Manhã</h4>
            </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" class="mr-4" value="TARDE">
                <h4>Tarde</h4>
            </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" class="mr-4" value="NOITE">
                <h4>Noite</h4>
            </div>
        </div>
    </header>
    <main>
        <div class="CardMotoristas">
            <div class="card" style="width: 18rem;">
                <div class="profile-picture">
                    <img class="" src="..." alt="">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Vanderlei</h5>
                    <p class="card-text">Céu Azul / Pampulha - Floresta / Centro</p>
                    <p class="card-text">R$ 150,00</p>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="profile-picture">
                    <img class="" src="..." alt="">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Vanderlei</h5>
                    <p class="card-text">Céu Azul / Pampulha - Floresta / Centro</p>
                    <p class="card-text">R$ 150,00</p>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="profile-picture">
                    <img class="" src="..." alt="">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Vanderlei</h5>
                    <p class="card-text">Céu Azul / Pampulha - Floresta / Centro</p>
                    <p class="card-text">R$ 150,00</p>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="profile-picture">
                    <img class="" src="..." alt="">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Vanderlei</h5>
                    <p class="card-text">Céu Azul / Pampulha - Floresta / Centro</p>
                    <p class="card-text">R$ 150,00</p>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="../../js/MostrarMotoristas.js"></script>

</html>