<?php

class Cliente{

    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function exibirTodos(): array{

        $resultado = $this->mysql->query('SELECT * FROM cliente');
        $clientes = $resultado->fetch_all(MYSQLI_ASSOC);

        return $clientes;

    }

    public function exibirPorId(int $id): array{

        $selecionaCliente = $this->mysql->prepare("SELECT * FROM cliente WHERE id = ?");
        $selecionaCliente->bind_param('s', $id);
        $selecionaCliente->execute();
        $cliente = $selecionaCliente->get_result()->fetch_assoc();
        return $cliente;

    }

    public function adicionar(string $nome, string $dataNascimento, string $telefone): void{

        $adicionaCliente = $this->mysql->prepare("INSERT INTO cliente (nome, data_nascimento, telefone) VALUES (?, ?, ?)");
        $adicionaCliente->bind_param('sss', $nome, $dataNascimento, $telefone);
        $adicionaCliente->execute(); 

    }

    public function excluir(int $id): void{

        $excluirCliente = $this->mysql->prepare("DELETE FROM cliente WHERE id = ?");
        $excluirCliente->bind_param('s', $id);
        $excluirCliente->execute();  

    }

    public function atualizar(int $id, string $nome, string $dataNascimento, string $telefone): void{

        $atualizarCliente = $this->mysql->prepare("UPDATE cliente SET nome = ?, data_nascimento = ?, telefone = ? WHERE id = ?");
        $atualizarCliente->bind_param('ssss', $nome, $dataNascimento, $telefone, $id);
        $atualizarCliente->execute();

    }
}

?>