<?php
session_start();
require_once('./config.php');

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

// Buscar informações do usuário logado
$user_id = $_SESSION['user_id'];
$is_admin = $_SESSION['is_admin'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <!--IMAGEM ABA-->
    <link rel="icon" href="./IMGs/LOGOS/ICONE_MS_ABA_32.png" type="image/png">

    <title>Produtos Disponíveis</title>
</head>
<body>
    <div class="container">
        <h1>Produtos Disponíveis</h1>

        <!-- Filtro de categoria -->
        <form action="user_product.php" method="get">
            <label for="category">Filtrar por Categoria:</label>
            <select name="category" id="category">
                <option value="">Todas</option>
                <option value="Categoria 1">Categoria 1</option>
                <option value="Categoria 2">Categoria 2</option>
                <option value="Categoria 3">Categoria 3</option>
            </select>
            <button type="submit">Filtrar</button>
        </form>

        <!-- Lista de produtos filtrados por categoria -->
        <table>
            <thead>
                <tr>
                    <th>Sabor</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('config.php');

                // Consulta SQL para obter produtos filtrados por categoria
                $where_clause = '';
                if (isset($_GET['category']) && $_GET['category'] != '') {
                    $category = $_GET['category'];
                    $where_clause = "WHERE category = '$category'";
                }
                $sql = "SELECT sabor, category, price, quantity FROM prod_registra $where_clause";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["sabor"] . "</td>";
                        echo "<td>" . $row["category"] . "</td>";
                        echo "<td>R$ " . number_format($row["price"], 2, ',', '.') . "</td>";
                        echo "<td>" . $row["quantity"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nenhum produto disponível.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>