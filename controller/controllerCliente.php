<?php
class controllerCliente {
    public static function cadastrarCliente($nome, $cpf, $email, $cidade, $endereco, $senha) 
{
    include '../model/ClienteModel.php';
    $cliente = new ClienteModel(null, $nome, $cpf, $email, $cidade, $endereco, $senha);
    
    
    $cliente->cadastrarCliente($cliente);
}

    public static function listarCliente(){
        include '../model/clienteModel.php';
        $cliente = new clienteModel(null, null, null, null, null, null, null);
        return $cliente->listarCliente();
    }
    
    public static function resgatarClientePorID($id){
        include '../model/clienteModel.php';
        $cliente= new clienteModel(null, null, null, null, null, null, null);
        return $cliente->resgatarClientePorID($id);
    }

    public static function alterarCliente($id, $nome, $cpf, $email, $cidade, $endereco, $senha) {
        include_once '../model/clienteModel.php';
        $cliente = new clienteModel($id, $nome, $cpf, $email, $cidade, $endereco, $senha);
        $cliente->alterarCliente();
    }

    public static function excluirCliente($id){
        include '../model/clienteModel.php';
        $cliente = new clienteModel(null, null, null, null, null, null, null);
        $cliente->excluirCliente($id);
    }
}
?>
