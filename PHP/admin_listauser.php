<?php

session_start();
require_once('./config.php');

    if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']) || $_SESSION['is_admin'] != 1) {
        header("Location: ../login.php");
        exit();
}

    $query = "SELECT id, name, email, password, is_admin FROM users";
    $result = mysqli_query($conn, $query);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">

    <!--IMAGEM ABA-->
   <link rel="icon" href="./IMGs/LOGOS/ICONE_MS_ABA_32.png" type="image/png">

    <title>Painel do Administrador</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .admin {
            background-color: #dff0d8;
        }
        .user {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>Painel do Administrador</h1>
    
    <h2>Lista de Administradores</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome de Usuário</th>
                <th>Email</th>
                <th>Data de Criação</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                mysqli_data_seek($result, 0);
                while ($user = mysqli_fetch_assoc($result)) : 

                if ($user['is_admin']) : ?>
                    <tr class="admin">
                        <td><?php echo htmlspecialchars($user['id']); ?></td>
                        <td><?php echo htmlspecialchars($user['name']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td><?php echo htmlspecialchars($user['password']); ?></td>
                        <td>
                            <form action="admin_deleteuser.php" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este administrador?');">
                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endif;
            endwhile; ?>
        </tbody>
    </table>

    <h2>Lista de Usuários</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome de Usuário</th>
                <th>Email</th>
                <th>Data de Criação</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                mysqli_data_seek($result, 0);
                while ($user = mysqli_fetch_assoc($result)) : 

                if (!$user['is_admin']) : ?>
                    <tr class="user">
                        <td><?php echo htmlspecialchars($user['id']); ?></td>
                        <td><?php echo htmlspecialchars($user['name']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td><?php echo htmlspecialchars($user['password']); ?></td>
                        <td>
                            <form action="admin_deleteuser.php" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endif;
            endwhile; ?>
        </tbody>
    </table>

    <a href="./logout.php">Logout</a>
</body>
</html>
