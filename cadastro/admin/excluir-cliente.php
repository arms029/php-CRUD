<?php

require '../configDataBase.php';
include '../src/Cliente.php';
include '../src/redireciona.php';
include '../src/data.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $cliente = new Cliente($mysql);
    $cliente->excluir($_POST['id']);

    redireciona('../index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <title>Excluir Cliente</title>
</head>

<body class="light">
    <div class="container text-center mt-4 ">
        <h1>Você realmente deseja <b class="text-danger">excluir</b> o cliente?</h1>
        <form method="post" action="excluir-cliente.php">

            <input type="hidden" name="id" value="<?php echo $_GET['id']?>"/>

            <div class="mt-4">
                <a class="btn btn-primary btn-lg mr-4 col-3" href="../index.php">Cancelar</a>
                <button class="btn btn-primary btn-lg col-3">Excluir</button>
            </div>
        </form>
    </div>
</body>

</html>