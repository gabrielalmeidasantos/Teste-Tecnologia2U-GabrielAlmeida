<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste Tecnologia 2U</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/app.css">
</head>

<body>
    <main>
        <div class="container">
            <h1>Teste Tecnologia 2U 2023</h1>
            <?php if (isset($_SESSION['retorno']) and $_SESSION['retorno']['erro']) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['retorno']["mensagem"] ?>
                </div>
            <?php elseif (isset($_SESSION['retorno']) and !$_SESSION['retorno']['erro']) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['retorno']["mensagem"] ?>
                </div>
            <?php endif ?>
            <form class="row g-3" method="post" onsubmit="cadastrar(event)" action="./process.php">
                <div class=" col-md-6">
                    <label for="inputNome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="inputNome" name="nome" placeholder="Seu nome" required>
                </div>
                <div class="col-md-6">
                    <label for="inputCep" class="form-label">CEP:</label>
                    <input type="number" maxlength="8" class="form-control" name="cep" id="inputCep" onchange="consultaCEP(event)" placeholder="00000000" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                </div>
                <div class="col-12">
                    <label for="inputEndereco" class="form-label" required>Endereço:</label>
                    <input type="text" class="form-control" id="inputEndereco" name="logradouro" readonly>
                </div>
                <div class="col-md-5">
                    <label for="inputCidade" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="inputCidade" name="cidade" readonly>
                </div>
                <div class="col-md-5">
                    <label for="inputBairro" class="form-label">Bairro</label>
                    <input type="text" class="form-control" id="inputBairro" name="bairro" readonly>
                </div>
                <div class="col-md-2">
                    <label for="inputEstado" class="form-label">Estado:</label>
                    <input type="text" class="form-control" id="inputEstado" name="estado" readonly>
                </div>
                <div class="col-12 disabled">
                    <button type="submit" class="btn btn-primary" id="buttonSubmit" disabled>Cadastrar</button>
                </div>
            </form>
        </div>
    </main>

    <script src="./assets/js/script.js"></script>
</body>

</html>

<?php session_destroy(); ?>