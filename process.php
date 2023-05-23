<?php

require("./config.php");
require("./dao/UsuarioDAO.php");

if ($_POST) {
    $nome = $_POST['nome'];
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $estado = $_POST['estado'];

    if (isset($nome) && isset($cep) && isset($logradouro) && isset($cidade) && isset($bairro) && isset($estado)) {
        $usuarioDAO = new usuarioDAO($conn);
        $usuario = new Usuario($nome, $cep, $logradouro, $cidade, $bairro, $estado);
        $retorno = $usuarioDAO->registrar($usuario);
        $_SESSION['retorno'] = ["mensagem" => $retorno["mensagem"], "erro" => $retorno["erro"]];
    }
}

header("location: ./index.php");
