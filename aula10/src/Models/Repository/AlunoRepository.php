<?php

namespace src\Models\Repository;

use src\Config\connection;
use src\Models\Entity\Aluno;
use PDO;

class AlunoRepository
{
    public $conn;

    public function __construct()
    {

        //instância da classe connection
        $database = new connection();

        //método: estabelecer com a conexão com BD
        $this->conn = $database->getConnection();
    }

    public function save(Aluno $aluno)
    {

        // INJEÇÃO DE SQL
        $query = "INSERT INTO aluno (nome,genero) VALUES(:nome, :genero)";

        $nome = $aluno->getNome();
        $genero = $aluno->getGenero();

        //criação do stmt
        $stmt = $this->conn->prepare($query);

        //definição dos parametros 
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":genero", $genero);

        $stmt->execute();
    }

    public function findAll()
    {
        $query = "SELECT * FROM ALUNO";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // todas as classes ou tabelas tem um ID
    public function findByID($id)
    {
        $query = "SELECT * FROM ALUNO WHERE id =:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update(Aluno $aluno)
    {
        //$comando ou $sql
        $query = "UPDATE aluno SET nome = :nome, genero=:genero WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        //atribuição variaveis
        $nome = $aluno->getNome();
        $genero = $aluno->getGenero();
        $id = $aluno->getId();

        //atribuir os valores nos parametros
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":genero", $genero);
        $stmt->bindParam(":id", $id);

        //executando a query
        $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM aluno WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}
