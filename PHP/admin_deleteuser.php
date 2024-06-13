<?php

session_start();
require_once('./config.php');

    if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']) || $_SESSION['is_admin'] != 1) {
        header("Location: ../login.php");
        exit();
}


if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    $query = "DELETE FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    mysqli_stmt_execute($stmt);

    header("Location: admin_listauser.php");
    exit();
} else {
    echo "ID do usuário não fornecido.";
    header("Location: ./login.php");
    exit();
}

    


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = intval($_POST['user_id']);
    

    if ($user_id > 0) {
        $query = "DELETE FROM users WHERE id = ?";
        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($stmt, "i", $user_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    }
}

header("Location: ./admin_listauser.php");
exit;
?>
