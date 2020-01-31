<?php

require 'configDataBase.php';
include 'src/Cliente.php';
include 'src/data.php';

$cliente = new Cliente($mysql);
$clientes = $cliente->exibirTodos();

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Lista de clientes</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>

<body class="bg-light">

<nav class="navbar navbar-expand mr-auto navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Lista de Clientes</a>
    <a class="navbar-brand" href="admin/adicionar-cliente.php">Formulário</a>
</nav>

<table class="table table-hover">
    <thead class="thead-light">
        <tr>
            <th scope="col"></th>
            <th scope="col">Nome</th>
            <th scope="col">Data de nascimento</th>
            <th scope="col">Telefone</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($clientes as $cliente):?>
        <tr>
            <th scope="row"></th>
            <td>
                <a href="admin/selecionar-cliente.php?id=<?php echo $cliente['id']?>"><?php echo $cliente['nome']?></a>
            </td>
            <td><?php echo data($cliente['data_nascimento'])?></td>
            <td><?php echo $cliente['telefone']?></td>

            <td><a class="btn btn-primary " href="admin/editar-cliente.php?id=<?php echo $cliente['id']?>">Editar</a>
                <a class="btn btn-primary ml-3 " href="admin/excluir-cliente.php?id=<?php echo $cliente['id']?>">Excluir</a></td>

        </tr>
    <?php endforeach ?>
        </tr>
    </tbody>
    </table>

</body>
</html>



