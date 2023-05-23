<?php

require("./models/Usuario.php");

class usuarioDAO implements usuarioInterface
{
    private $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function registrar(Usuario $usuario)
    {
        $nome = $usuario->getNome();
        $cep = $usuario->getCep();
        $logradouro = $usuario->getLogradouro();
        $cidade = $usuario->getCidade();
        $bairro = $usuario->getBairro();
        $estado = $usuario->getEstado();

        try {
            $query = $this->conn->prepare("INSERT INTO usuarios (nome, cep, logradouro, cidade, bairro, estado) VALUES (:nome, :cep, :logradouro, :cidade, :bairro, :estado)");

            $query->bindParam(':nome', $nome);
            $query->bindParam(':cep', $cep);
            $query->bindParam(':logradouro', $logradouro);
            $query->bindParam(':cidade', $cidade);
            $query->bindParam(':bairro', $bairro);
            $query->bindParam(':estado', $estado);

            $query->execute();

            return [
                "mensagem" => "Registro feito com sucesso!",
                "erro" => false
            ];
        } catch (\Throwable $th) {
            return [
                "mensagem" => "Falha ao criar registro!",
                "erro" => true
            ];
        }
    }
}
