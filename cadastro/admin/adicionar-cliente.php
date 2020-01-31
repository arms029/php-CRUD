<?php

require '../configDataBase.php';
include '../src/Cliente.php';
include '../src/redireciona.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $cliente = new Cliente($mysql);
    $cliente->adicionar($_POST['nome'],$_POST['data_nascimento'],$_POST['telefone']);

    redireciona('../index.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <title>Adicionar Cliente</title>
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand mr-auto navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php">Lista de Clientes</a>
        <a class="navbar-brand" href="#">Formulário</a>
    </nav>

    <h4 class="bg-light text-dark text-center mr-auto text-monospace text-cursive">Cadastro de Clientes</h4>
    <div class="container">

        <form action="adicionar-cliente.php" method="post">


            <div class="form-group">
                <label for="nome">Nome completo</label>
                <input type="text" class="form-control" id="nome" name="nome" 
                    placeholder="Digite o nome do cliente">
            </div>

            <div class="form-group">
                <label for="data_nascimento">Data de nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="12345678">
            </div>

            <p>
                <a class="btn btn-primary btn-lg col-3 mr-4" href="../index.php" role="button">Voltar</a>
                <button class="btn btn-primary btn-lg col-3">Cadastrar Cliente</button>
            </p>


        </form>

    </div>

</body>
</html>
