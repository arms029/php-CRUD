<?php

require '../configDataBase.php';
include '../src/Cliente.php';
include '../src/data.php';

$obj_cliente = new Cliente($mysql);
$cliente = $obj_cliente->exibirPorId($_GET['id']);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meu Blog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>

<body>

    <h4 class="bg-dark text-light text-center mr-auto text-monospace text-cursive">Informações do Cliente</h4>

    <div class="container col-mb mt-4">
        <div class="col-md-12">
            <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <h6 class="mb-2"> Nome: <?php echo $cliente['nome']?></h6>
                    <h6 class="mb-2"> Data de nascimento: <?php echo data($cliente['data_nascimento'])?></h6>
                    <h6 class="mb-3"> Telefone para contato: <?php echo $cliente['telefone']?></h6>
                    <a class="btn btn-primary btn-lg btn-block" href="../index.php" role="button">Voltar</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>