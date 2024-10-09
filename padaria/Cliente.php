<?php 

class Cliente {
    private $conexao;
    private $id;
    private $nome;
    private $telefone;
    private $email;
    private $cpf;

    public function __construct ($db){
        $this->conexao = $db;
    }

    public function setNome ($nome){
        $this->nome = $nome;
    }

    public function setCPF ($cpf){
        $this->cpf = $cpf;
    }

    public function setTelefone ($telefone){
        $this->telefone = $telefone;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getNome(){
        return $this->nome;
    }
    public function getCPF(){
        return $this->cpf;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getid(){
        return $this->id;
    }

    public function create(){
        $query = "INSERT INTO cliente SET nome=:nome, telefone=:telefone, email=:email, cpf=:cpf";
        $stmt = $this->conexao->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":cpf", $this->cpf);

        if($stmt->execute()){
            return true;

        }
        return false;

    }

    public function read(){
        $query="select*from cliente";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function delete(){
        $query = "DELETE FROM cliente WHERE id_cliente=:id";
        $stmt = $this->conexao->prepare($query);

        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update() {
        $query = "UPDATE cliente SET nome=:nome,
                    telefone=:telefone, email=:email,
                    cpf=:cpf WHERE id_cliente=:id";
        $stmt = $this->conexao->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":cpf", $this->cpf);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function consultar() {
        $query = "SELECT * FROM cliente WHERE id_cliente = :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
    
        return $stmt;
    }
    
}
?>