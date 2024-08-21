<?php
class ClienteModel {
    private $id;
    private $nome;
    private $cpf;
    private $email;
    private $cidade;
    private $endereco;
    private $senha;

    public function __construct($id, $nome, $cpf, $email, $cidade, $endereco, $senha) {
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->cidade = $cidade;
        $this->endereco = $endereco;
        $this->senha = $senha;
    }

    // Getters e setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }
    public function cadastrarCliente(ClienteModel $cliente)
{
    include_once '../dao/ClienteDao.php';
    $dao = new ClienteDao();
    $dao->cadastrarCliente($cliente);
}
    public function listarCliente() {
        include_once '../dao/clienteDao.php';
        $dao = new clienteDao();
        return $dao->listarCliente();
    }
    
    public function resgatarClientePorID($id) {
        include_once '../dao/clienteDao.php';
        $dao = new clienteDao();
        return $dao->resgatarClientePorID($id);
    }
    
    public function alterarCliente() {
        include_once '../dao/clienteDao.php';
        $dao = new clienteDao();
        $dao->alterarCliente($this);
    }
    
    public function excluirCliente($id) {
        include_once '../dao/clienteDao.php';
        $dao = new clienteDao();
        $dao->excluirCliente($id);
    }
}
?>