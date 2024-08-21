<?php


class ClienteDao {
    
    public static function cadastrarCliente(ClienteModel $cliente)
{
    include_once 'Conexao.php';
    $conex = new Conexao();
    $conex->fazConexao();

    // Verificar se o CPF já existe na tabela
    $stmt = $conex->conn->prepare("SELECT cpf FROM clientes WHERE cpf = :cpf");
    $stmt->bindValue(':cpf', $cliente->getCpf());
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        // CPF já existe na tabela, exibir mensagem de erro
        echo "<script>alert('Erro: CPF já está em uso.');</script>";
        return;
    }

    // Verificar se o e-mail já existe na tabela
    $stmt = $conex->conn->prepare("SELECT email FROM clientes WHERE email = :email");
    $stmt->bindValue(':email', $cliente->getEmail());
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        // E-mail já existe na tabela, exibir mensagem de erro
        echo "<script>alert('Erro: E-mail já está em uso.');</script>";
        return;
    }

    // Verificar se o nome já existe na tabela
    $stmt = $conex->conn->prepare("SELECT nome FROM clientes WHERE nome = :nome");
    $stmt->bindValue(':nome', $cliente->getNome());
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        // Nome já existe na tabela, exibir mensagem de erro
        echo "<script>alert('Erro: Nome já está em uso.');</script>";
        return;
    }

    // Agora vamos inserir o cliente
    $sql = "INSERT INTO clientes (nome, cpf, email, cidade, endereco, senha)
            VALUES (:nome, :cpf, :email, :cidade, :endereco, :senha)";
    $stmt = $conex->conn->prepare($sql);
    $stmt->bindValue(':nome', $cliente->getNome());
    $stmt->bindValue(':cpf', $cliente->getCpf());
    $stmt->bindValue(':email', $cliente->getEmail());
    $stmt->bindValue(':cidade', $cliente->getCidade());
    $stmt->bindValue(':endereco', $cliente->getEndereco());
    $stmt->bindValue(':senha', $cliente->getSenha());
    $res = $stmt->execute();

    if($res) {
        echo "<script>alert('Cadastro realizado com Sucesso!!!');</script>";
    } else {
        echo "<script>alert('Erro: Não foi possível realizar o cadastro');</script>";
    }
    echo "<script>location.href='../View/ClienteCadastro.html';</script>";
}
     public function listarCliente()
     {
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql = "SELECT * FROM clientes ORDER BY id";
        return $conex->conn->query($sql);
     }
     
     public function resgatarClientePorID($id)
{
    include_once 'Conexao.php';
    $conex = new Conexao();
    $conex->fazConexao();
    $sql = "SELECT * FROM clientes WHERE id=:id";
    $stmt = $conex->conn->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC); // Deve retornar um array associativo
}

     
     public function alterarCliente(clienteModel $cliente) {
       include_once 'Conexao.php';
       $conex = new Conexao();
       $conex->fazConexao();
       $sql = "UPDATE clientes SET nome = :nome, cpf = :cpf, email = :email, cidade = :cidade, endereco = :endereco, senha = :senha WHERE id = :id";
       $stmt = $conex->conn->prepare($sql);
       $stmt->bindValue(':nome', $cliente->getNome());
       $stmt->bindValue(':cpf', $cliente->getCpf());
       $stmt->bindValue(':email', $cliente->getEmail());
       $stmt->bindValue(':cidade', $cliente->getCidade());
       $stmt->bindValue(':endereco', $cliente->getEndereco());
       $stmt->bindValue(':senha', $cliente->getSenha());
       $stmt->bindValue(':id', $cliente->getId());
       $res = $stmt->execute();
       if ($res) {
           echo "<script>alert('Registro Alterado com Sucesso!!!');</script>";
       } else {
           echo "<script>alert('Erro: Não foi possível Alterar o cadastro');</script>";
       }
       echo "<script>location.href='../View/Listar.php';</script>";
   }
     
   public function excluirCliente($id){
    include_once 'Conexao.php';
    $conex = new Conexao();
    $conex->fazConexao();
    $sql= "DELETE FROM clientes WHERE id = $id"; // Corrigindo a consulta de exclusão
    $res = $conex->conn->query($sql);
    if($res){
        echo "<script>alert('Exclusão realizado com Sucesso!!!');</script>";
    }
    else{
        echo "<script> alert('Erro: Não foi possível excluir o cliente');</script>";
    }
 }
 
    }
?>