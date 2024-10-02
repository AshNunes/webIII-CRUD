<?php 
    require 'Banco.php';
    require 'Cliente.php';

    $banco = new Banco();
    $conexao = $banco->getConexao();

    $cliente = new Cliente($conexao);
    $cliente->setId($_GET['id']);

    if($cliente->delete()){
        echo "Cliente deletado com sucesso!";
        header("Refresh:3;url=listarCliente.php");
    } else {
        echo "Erro ao deletar o cliente.";
    }

?>