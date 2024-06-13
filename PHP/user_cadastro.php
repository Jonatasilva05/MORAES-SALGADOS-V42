<?php
session_start();
require_once('./config.php');

$user_id = $_SESSION['user_id'];
$is_admin = $_SESSION['is_admin'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id FROM users WHERE name = '$name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo
            "<script>
                alert('Nome ou Usuário em uso, \\n Porfavor Utilize outro Nome ou Usuário');
                history.go(-1);
            </script>";
        exit();
    }

    // Verificar se o email já está em uso
    $sql = "SELECT id FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo 
        "<script>
            alert('Email já em uso, \\n Porfavor Utilize outro endereço de Email');
            history.go(-1);
        </script>";
        exit();
    }

    // Aqui você pode realizar outras validações, como verificar se o nome de usuário contém um número, etc.

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo
            "<script>
                alert('Cadastro Realizado com sucesso');
                history.go(-1);
            </script>";
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
}
?>
