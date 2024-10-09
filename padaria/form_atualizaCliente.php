<?php
    require 'Banco.php';
    require 'Cliente.php';

    $banco = new Banco();
    $conexao = $banco->getConexao();
    $cliente = new Cliente($conexao);

    $cliente->setId($_GET['id']);
    $stmt = $cliente->consultar();
    $clienteSelecionado = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<form method="POST" action="atualizaCliente.php">

    <input type="hidden" name="id" value="<?php echo $clienteSelecionado['id_cliente'];?>">
    Nome: <input type="text" name="nome" value="<?php echo $clienteSelecionado['nome']; ?>">
    Telefone: <input type="text" name="telefone" value="<?php echo $clienteSelecionado['telefone']; ?>">
    Email: <input type="text" name="email" value="<?php echo $clienteSelecionado['email']; ?>">
    CPF: <input type="text" name="cpf" value="<?php echo $clienteSelecionado['cpf']; ?>">

    <input type="submit" value="Atualizar">

</form>