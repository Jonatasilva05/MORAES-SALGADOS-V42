<?php
session_start();

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

// Adiciona o usuário à tabela de usuários conectados ao fazer login
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $type = $_SESSION['type'];
    $sql = "INSERT INTO userconect (username, type) VALUES ('$username', '$type')";
    $conn->query($sql);
}

// Remove o usuário da tabela de usuários conectados ao fazer logout
if (isset($_POST['logout'])) {
    $username = $_SESSION['username'];
    $sql = "DELETE FROM userconect WHERE username='$username'";
    $conn->query($sql);
    session_unset();     // Limpa as variáveis da sessão
    session_destroy();   // Destroi a sessão
    header("Location: ./PHP/login.php"); // Redireciona para a página de login
    exit();
}

// Consulta para obter todos os usuários conectados
$sql = "SELECT * FROM userconect";
$result = $conn->query($sql);

// Lista de usuários conectados
$logged_users = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $logged_users[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Página Principal</h2>
        <p>Usuários conectados:</p>
        <ul>
            <?php foreach ($logged_users as $user): ?>
                <li><?php echo $user['username']; ?> (<?php echo ($user['type'] === 'admin') ? 'Administrador' : 'Usuário'; ?>)</li>
            <?php endforeach; ?>
        </ul>
        <form action="logout.php" method="post">
            <button type="submit" name="logout">Deslogar</button>
        </form>
    </div>
</body>
</html>
