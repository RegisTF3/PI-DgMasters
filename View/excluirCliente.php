<?php
include("../controller/controllerCliente.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    // Cria uma instância do controlador
    $controller = new controllerCliente();
    // Chama o método para excluir o cliente
    $controller->excluirCliente($id);
    // Redireciona de volta para a lista de clientes
    header("Location: Listar.php"); // Ajuste o nome do arquivo conforme necessário
    exit();
} else {
    echo "ID do cliente não fornecido.";
}
?>
