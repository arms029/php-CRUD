<?php

require '../configDataBase.php';
include '../src/Cliente.php';
include '../src/redireciona.php';
include '../src/data.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $artigo = new Cliente($mysql);
    $artigo->atualizar($_POST['id'],$_POST['nome'],$_POST['data_nascimento'],$_POST['telefone']);

    redireciona('../index.php');
}

    $obj_cliente = new Cliente($mysql);
    $cliente = $obj_cliente->exibirPorId($_GET['id']);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
</head>

<body class="bg-light">

    <h4 class="bg-dark text-light text-center mr-auto text-monospace text-cursive">Editar Cliente</h4>

    <div class="container">
        <form action="editar-cliente.php" method="post">

            <div class="form-group">
                <label for="nome">Nome completo</label>
                <input type="text" class="form-control" id="nome" name="nome" 
                    placeholder="Digite o nome do cliente" value="<?php echo $cliente['nome']?>">
            </div>

            <div class="form-group">
                <label for="nome">Data de nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" 
                    value="<?php echo $cliente['data_nascimento']?>">
            </div>

            <div class="form-group">
                <label for="nome">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" 
                    value="<?php echo $cliente['telefone']?>">
            </div>

            <p>
                <input type="hidden" name="id" value="<?php echo $_GET['id']?>"/>
            </p>

            <p>
                <a class="btn btn-primary btn-lg col-3 mr-4" href="../index.php" role="button">Voltar</a>
                <button class="btn btn-primary btn-lg col-3">Editar Cliente</button>
            </p>
        </form>

    </div>

</body>

</html>