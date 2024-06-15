<?php

session_start();
require_once('./config.php');

    if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']) || $_SESSION['is_admin'] != 1) {
        header("Location: ../login.php");
        exit();

}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_sql = "DELETE FROM prod_registra WHERE id = $delete_id";
    if ($conn->query($delete_sql) === TRUE) {
        echo "Produto excluído com sucesso.";
    } else {
        echo "Erro ao excluir produto: " . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
    $edit_id = $_POST['edit'];
    $sabor = $_POST['sabor'];
    $new_category = $_POST['new_category'];
    $new_price = $_POST['new_price'];
    $new_quantity = $_POST['new_quantity'];

    $update_sql = "UPDATE prod_registra SET sabor = '$sabor', category = '$new_category', price = '$new_price', quantity = '$new_quantity' WHERE id = $edit_id";

    if ($conn->query($update_sql) === TRUE) {
        echo "Produto atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar produto: " . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sabor'])) {
    $sabor = $_POST['sabor'];
    $new_category = $_POST['new_category'];
    $new_price = $_POST['new_price'];
    $new_quantity = $_POST['new_quantity'];

    $insert_sql = "INSERT INTO prod_registra (sabor, category, price, quantity) VALUES ('$sabor', '$new_category', '$new_price', '$new_quantity')";

    if ($conn->query($insert_sql) === TRUE) {
        echo "Novo produto adicionado com sucesso.";
    } else {
        echo "Erro ao adicionar novo produto: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <!--IMAGEM ABA-->
   <link rel="icon" href="./IMGs/LOGOS/ICONE_MS_ABA_32.png" type="image/png">

    <title>Administração de Produtos</title>
    
</head>
<body>
    
<div class="container">
    <h1>Administração de Produtos</h1>

    <!-- Formulário para adicionar novo produto -->
    <h2>Adicionar Novo Produto</h2>
    <form action="admin_product.php" method="post">
        <input type="text" name="sabor" placeholder="sabor" required>
        <select name="new_category" required>
            <option value="Categoria 1">Categoria 1</option>
            <option value="Categoria 2">Categoria 2</option>
            <option value="Categoria 3">Categoria 3</option>
        </select>
        <input type="number" name="new_price" placeholder="Preço" step="0.01" min="0" required>
        <input type="number" name="new_quantity" placeholder="Quantidade" min="0" required>
        <button type="submit">Adicionar Produto</button>
    </form>

    <!-- Lista de produtos cadastrados -->
    <h2>Produtos Cadastrados</h2>
    <table>
        <thead>
            <tr>
                <th>Sabor</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $sql = "SELECT id, sabor, category, price, quantity FROM prod_registra";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["sabor"] . "</td>";
                    echo "<td>" . $row["category"] . "</td>";
                    echo "<td>R$ " . number_format($row["price"], 2, ',', '.') . "</td>";
                    echo "<td>" . $row["quantity"] . "</td>";
                    // Formulário para editar produto
                    echo "<td><form action='admin_product.php' method='post'>";
                    echo "<input type='hidden' name='edit' value='" . $row["id"] . "'>";
                    echo "<input type='text' name='sabor' placeholder='Novo Nome'>";
                    echo "<select name='new_category'>";
                    echo "<option value='Categoria 1'>Categoria 1</option>";
                    echo "<option value='Categoria 2'>Categoria 2</option>";
                    echo "<option value='Categoria 3'>Categoria 3</option>";
                    echo "</select>";
                    echo "<input type='number' name='new_price' placeholder='Novo Preço' step='0.01' min='0'>";
                    echo "<input type='number' name='new_quantity' placeholder='Nova Quantidade' min='0'>";
                    echo "<button type='submit'>Editar</button>";
                    echo "</form></td>";
                    echo "<td><a href='admin_product.php?delete=" . $row["id"] . "'>Excluir</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhum produto cadastrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
    <a href="logout.php">Sair</a>
</div>

</body>
</html>
