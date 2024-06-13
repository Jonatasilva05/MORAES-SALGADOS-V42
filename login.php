<?php
// Exemplo de login.php ou um script de autenticação
session_start();
require_once('./PHP/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifier = $_POST['identifier'];
    $password = $_POST['password'];

    // Verificar se é um administrador
    $stmt = $conn->prepare("SELECT * FROM users WHERE (username = ? OR email = ?) AND password = ? AND is_admin = 1");
    $stmt->bind_param("sss", $identifier, $identifier, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_type'] = 'admin'; // Definir o tipo de usuário como 'admin'
        header("Location: ./PHP/dashboard.php"); // Redirecionar para o painel de administração
    } else {
        // Verificar se é um usuário comum
        $stmt = $conn->prepare("SELECT * FROM users WHERE (username = ? OR email = ?) AND password = ?");
        $stmt->bind_param("sss", $identifier, $identifier, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_type'] = 'user'; // Definir o tipo de usuário como 'user'
            header("Location: ./PHP/user_bemvindo.php"); // Redirecionar para o painel do usuário
        } else {
            
        }
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="./CSS/login.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--IMAGEM ABA-->
    <link rel="icon" href="./IMGs/LOGOS/ICONE_MS_ABA_32.ico" type="image/x-icon">

    <title>Página de Login</title>

</head>
<body>
    
    <div class="videoBackground">
        <video id="video-background" autoplay loop muted class="videos">
            <source src="./IMGs/VIDEOS/VdoMesaPraiaJuncao.mp4" type="video/mp4">
        </video>
    </div>

    <div class="wrapper">
        <div class="form-wrapper sign-up" id="singup">
            <div class="sair">
                <a href="./index.php">
                <i class="bi bi-house-door"></i>
                </a>
            </div>
            <form action="./PHP/user_cadastro.php" method="post">
                <h2>Cadastro</h2>
                <div class="input-group">
                    <input type="text" name="name" required>
                    <label for="name">Primeiro Nome</label>
                </div>
                <div class="input-group">
                    <input type="text" name="email" required>
                    <label for="email">Email</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" required>
                    <label for="password">Senha</label>
                </div>
                <button type="submit" class="btn">Cadastrar</button>

                <div class="sign-link">
                    <p>Já tem conta? <a href="#" onclick="entrarbtn()">Entrar</a></p>
                </div>
            </form>
        </div>
        
        <div class="form-wrapper sign-in">
            <div class="sair">
                <a href="./index.php">
                    <i class="bi bi-house-door"></i>
                </a>
            </div>
            <form action="./PHP/user_login.php" method="post">
                <h2>Login</h2>
                <div class="input-group">
                    <input type="text" name="email_or_username" required>
                    <label for="email_or_username">Usuario ou Email</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" required>
                    <label for="password">Senha</label>
                </div>
                <div class="forgot-pass">
                    <a href="#">Esqueceu a Senha?</a>
                </div>
                <button type="submit" class="btn">Entrar</button>
                <div class="sign-link">
                    <p>Não tem conta? <a href="#" onclick="cadastrarbtn()">Cadastre-se</a></p>
                </div>
            </form>
        </div>
    </div>

    <script>
        const wrapper = document.querySelector('.wrapper');

        function entrarbtn() {
            wrapper.classList.add('animate-signUp');
            wrapper.classList.remove('animate-signIn');
        }

        function cadastrarbtn() {
            wrapper.classList.add('animate-signIn');
            wrapper.classList.remove('animate-signUp');
        }
    </script>

</body>

	<!--JAVASCRIPT BOOTSTRAP-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>