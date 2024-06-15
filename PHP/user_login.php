<?php
session_start();
require_once('./config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_or_username = $_POST['email_or_username'];
    $password = $_POST['password'];

    if (filter_var($email_or_username, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT id, name, is_admin FROM users WHERE email = '$email_or_username' AND password = '$password'";
    } else {
        $sql = "SELECT id, name, is_admin FROM users WHERE name = '$email_or_username' AND password = '$password'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['is_admin'] = $row['is_admin'];
        
        if ($_SESSION['is_admin'] == 1) {
            header("Location: ./dashboard.php");
        } else {
            header("Location: ./user_bemvindo.php");
        }
    } else {
        echo
        "<script>
            alert('Usuário ou Senha Incorretos \\n \\n Por favor tente novamente');
            history.go(-1);
        </script>";
    }
}
?>
