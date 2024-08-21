<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gshop.css">
    <title>Alterar Cliente</title>
</head>
<body>
<header>
    <h1>Alterar Dados do Cliente</h1>
</header>
<div class="form-container">
    <?php
    include("../controller/controllerCliente.php");
    
    // Recupera o ID do cliente a partir da URL
    $id = $_GET['id'];
    
    // Busca os dados do cliente
    $cliente = controllerCliente::resgatarClientePorID($id);
    
    if ($cliente) {
    ?>
    <form action="../controller/processaCliente.php" method="post" class="formu" id="formAlterarCliente">
        <input type="hidden" name="op" value="Alterar"/>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($cliente['id']); ?>"/>
        
        <label for="nome">Nome do Cliente:</label><br>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($cliente['nome']); ?>"><br>

        <label for="cpf">CPF:</label><br>
        <input type="number" id="cpf" name="cpf" value="<?php echo htmlspecialchars($cliente['cpf']); ?>"><br>

        <label for="email">E-mail:</label><br>
        <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($cliente['email']); ?>"><br>

        <label for="cidade">Cidade:</label><br>
        <input type="text" id="cidade" name="cidade" value="<?php echo htmlspecialchars($cliente['cidade']); ?>"><br>
        
        <label for="endereco">Endereço:</label><br>
        <input type="text" id="endereco" name="endereco" value="<?php echo htmlspecialchars($cliente['endereco']); ?>"><br>

        <label for="senha">Senha:</label><br>
        <input type="text" id="senha" name="senha" value="<?php echo htmlspecialchars($cliente['senha']); ?>"><br>

        <input type="submit" value="Alterar">
    </form>
    <?php
    } else {
        echo "Cliente não encontrado.";
    }
    ?>
</div>
</body>
</html>
