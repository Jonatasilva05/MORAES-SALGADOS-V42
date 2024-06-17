<!--edit_order.php-->
<!--user_editorder.php-->

<?php
session_start();
require_once('./PHP/config.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']) || $_SESSION['is_admin'] != 0) {
    header("Location: ../index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$order_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product = $_POST['product'];
    $quantity_type = $_POST['quantity_type'];
    $quantity = ($quantity_type == 'unit') ? $_POST['unit_quantity'] : $_POST['combo_quantity'];
    $flavor = $_POST['flavor']; // Campo de sabor será enviado corretamente

    // Atualiza o pedido no banco de dados
    $sql = "UPDATE orders SET product = ?, quantity_type = ?, quantity = ?, flavor = ? WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiii", $product, $quantity_type, $quantity, $flavor, $order_id, $user_id);

    if ($stmt->execute()) {
        header("Location: user_lista.php");
        exit();
    } else {
        echo "Erro ao atualizar o pedido: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Consulta para obter os detalhes do pedido
    $sql = "SELECT product, quantity_type, quantity, flavor FROM orders WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $order_id, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $order = $result->fetch_assoc();
    } else {
        echo "Pedido não encontrado.";
        exit();
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <!--IMAGEM ABA-->
   <link rel="icon" href="./IMGs/LOGOS/ICONE_MS_ABA_32.png" type="image/png">

    <title>Editar Pedido</title>
</head>
<body>
    <div class="container">
        <h1>Editar Pedido</h1>
        <form action="" method="post">

            <label for="flavor">Sabor:</label>
            <select id="flavor" name="flavor">
                <option value="1" <?php echo ($order['flavor'] == 'Sabor 1') ? 'selected' : ''; ?>>Sabor 1</option>
                <option value="2" <?php echo ($order['flavor'] == 'Sabor 2') ? 'selected' : ''; ?>>Sabor 2</option>
                <option value="3" <?php echo ($order['flavor'] == 'Sabor 3') ? 'selected' : ''; ?>>Sabor 3</option>
                <option value="4" <?php echo ($order['flavor'] == 'Sabor 3') ? 'selected' : ''; ?>>Sabor 3</option>
                <option value="5" <?php echo ($order['flavor'] == 'Sabor 3') ? 'selected' : ''; ?>>Sabor 3</option>
                <option value="6" <?php echo ($order['flavor'] == 'Sabor 3') ? 'selected' : ''; ?>>Sabor 3</option>
            </select>

            <br><br>

            <label for="product">Produto:</label>
            <select id="product" name="product">
                <option value="Produto 1" <?php echo ($order['product'] == 'Produto 1') ? 'selected' : ''; ?>>Produto 1</option>
                <option value="Produto 2" <?php echo ($order['product'] == 'Produto 2') ? 'selected' : ''; ?>>Produto 2</option>
                <option value="Produto 3" <?php echo ($order['product'] == 'Produto 3') ? 'selected' : ''; ?>>Produto 3</option>
            </select>

            <label for="quantityType">Tipo de Quantidade:</label>
            <input type="radio" id="unit" name="quantity_type" value="unit" <?php echo ($order['quantity_type'] == 'unit') ? 'checked' : ''; ?>>
            <label for="unit">Unidades</label>
            <input type="radio" id="combo" name="quantity_type" value="combo" <?php echo ($order['quantity_type'] == 'combo') ? 'checked' : ''; ?>>
            <label for="combo">Combos</label>
            <br>

            <div id="unitQuantityContainer" style="display: <?php echo ($order['quantity_type'] == 'unit') ? 'block' : 'none'; ?>;">
                <label for="unitQuantity">Quantidade de Unidades:</label>
                <input type="number" id="unitQuantity" name="unit_quantity" min="1" value="<?php echo ($order['quantity_type'] == 'unit') ? $order['quantity'] : '1'; ?>">
            </div>

            <div id="comboQuantityContainer" style="display: <?php echo ($order['quantity_type'] == 'combo') ? 'block' : 'none'; ?>;">
                <label for="comboQuantity">Quantidade de Combos:</label>
                <select id="comboQuantity" name="combo_quantity">
                    <option value="20" <?php echo ($order['quantity'] == 20) ? 'selected' : ''; ?>>20</option>
                    <option value="30" <?php echo ($order['quantity'] == 30) ? 'selected' : ''; ?>>30</option>
                    <option value="40" <?php echo ($order['quantity'] == 40) ? 'selected' : ''; ?>>40</option>
                    <option value="50" <?php echo ($order['quantity'] == 50) ? 'selected' : ''; ?>>50</option>
                    <option value="70" <?php echo ($order['quantity'] == 70) ? 'selected' : ''; ?>>70</option>
                    <option value="80" <?php echo ($order['quantity'] == 80) ? 'selected' : ''; ?>>80</option>
                    <option value="90" <?php echo ($order['quantity'] == 90) ? 'selected' : ''; ?>>90</option>
                    <option value="100" <?php echo ($order['quantity'] == 100) ? 'selected' : ''; ?>>100</option>
                </select>
            </div>

            <button type="submit">Atualizar Pedido</button>
        </form>
    </div>

    <script>
        document.querySelectorAll('input[name="quantity_type"]').forEach(function(element) {
            element.addEventListener('change', function() {
                var unitQuantityContainer = document.getElementById('unitQuantityContainer');
                var comboQuantityContainer = document.getElementById('comboQuantityContainer');
                if (this.value === 'combo') {
                    unitQuantityContainer.style.display = 'none';
                    comboQuantityContainer.style.display = 'block';
                } else {
                    unitQuantityContainer.style.display = 'block';
                    comboQuantityContainer.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
