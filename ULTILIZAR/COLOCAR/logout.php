<?php
session_start();

// Verifica se o usuário clicou no botão de logout
if (isset($_POST['logout'])) {
    // Remove o usuário da tabela de usuários conectados
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $type = $_SESSION['type'];

        // Conexão com o banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cadastro_usuarios";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Erro na conexão: " . $conn->connect_error);
        }

        // Remove o usuário da tabela de usuários conectados
        $sql = "DELETE FROM userconect WHERE username='$username' AND type='$type'";
        $conn->query($sql);

        // Fecha a conexão com o banco de dados
        $conn->close();
    }

    // Limpa as variáveis da sessão
    session_unset();
    // Destroi a sessão
    session_destroy();
    // Redireciona para a página de login
    header("Location: ./PHP/logi.php");
    exit();
} else {
    // Se o usuário tentar acessar diretamente esta página sem clicar no botão de logout, redireciona para a página principal
    header("Location: ./PHP/index.html");
    exit();
}
?>
