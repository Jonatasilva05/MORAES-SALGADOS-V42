<?php

// Dados do banco de dados
$host = 'localhost'; // Host do banco de dados
$usuario = 'root'; // Usuário do banco de dados
$senha = ''; // Senha do banco de dados
$banco = 'moraesalgados'; // Nome do banco de dados

// Conectar ao banco de dados
$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verificar conexão
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

?>