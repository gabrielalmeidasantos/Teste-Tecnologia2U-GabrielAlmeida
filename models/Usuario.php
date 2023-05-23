<?php

class Usuario
{
    protected $nome;
    protected $cep;
    protected $logradouro;
    protected $cidade;
    protected $bairro;
    protected $estado;

    public function __construct($nome, $cep, $logradouro, $cidade, $bairro, $estado)
    {
        $this->nome = $nome;
        $this->cep = $cep;
        $this->logradouro = $logradouro;
        $this->cidade = $cidade;
        $this->bairro = $bairro;
        $this->estado = $estado;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function getLogradouro()
    {
        return $this->logradouro;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function getEstado()
    {
        return $this->estado;
    }
}

interface usuarioInterface
{
    public function registrar(Usuario $usuario);
}
