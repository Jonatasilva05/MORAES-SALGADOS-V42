<!--edit_order.php-->
<!--user_editorder.php-->

<?php
session_start();
require_once('./config.php');

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
    $flavor = $_POST['flavor'];

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
    <link rel="icon" href="./IMGs/LOGOS/ICONE_MS_ABA_32.png" type="image/png">
    <title>Editar Pedido</title>
</head>
<body>
    <div class="container">
        <h1>Editar Pedido</h1>

        <?php if ($order['flavor'] == 'Coxinha' || $order['flavor'] == '1'): ?>
            
            <!--COXINHA-->
            <form action="" method="post">
                <label for="product">Produto:</label>
                <select id="product" name="product">
                    <option value="Frango" <?php echo ($order['product'] == 'Frango') ? 'selected' : ''; ?>>Frango</option>
                    <option value="Frango C/ Catupiry" <?php echo ($order['product'] == 'Frango C/ Catupiry') ? 'selected' : ''; ?>>Frango C/ Catupiry</option>
                    <option value="Carne-Moída" <?php echo ($order['product'] == 'Carne-Moída') ? 'selected' : ''; ?>>Carne-Moída</option>
                    <option value="Calabresa" <?php echo ($order['product'] == 'Calabresa') ? 'selected' : ''; ?>>Calabresa</option>
                    <option value="Calabresa C/ Catupiry" <?php echo ($order['product'] == 'Calabresa C/ Catupiry') ? 'selected' : ''; ?>>Calabresa C/ Catupiry</option>
                    <option value="Pernil" <?php echo ($order['product'] == 'Pernil') ? 'selected' : ''; ?>>Pernil</option>
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

                <label for="flavor">Sabor:</label>
                    <select id="flavor" name="flavor">
                        <option value="1" <?php echo ($order['flavor'] == 1) ? 'selected' : ''; ?>>Coxinha</option>
                        <option value="2" <?php echo ($order['flavor'] == 2) ? 'selected' : ''; ?>>Bolinho</option>
                        <option value="3" <?php echo ($order['flavor'] == 3) ? 'selected' : ''; ?>>Risoles</option>
                        <option value="4" <?php echo ($order['flavor'] == 4) ? 'selected' : ''; ?>>Esfirra</option>
                        <option value="5" <?php echo ($order['flavor'] == 5) ? 'selected' : ''; ?>>Salsicha</option>
                        <option value="6" <?php echo ($order['flavor'] == 6) ? 'selected' : ''; ?>>Croquete</option>
                    </select>

                <button type="submit">Atualizar Pedido</button>
            </form>

        <?php elseif ($order['flavor'] == 'Bolinho' || $order['flavor'] == '2'): ?>
           
            <!--BOLINHO-->
            <form action="" method="post">
                <label for="product">Produto:</label>
                <select id="product" name="product">
                    <option value="Presunto e Queijo" <?php echo ($order['product'] == 'Presunto e Queijo') ? 'selected' : ''; ?>>Presunto e Queijo</option>
                    <option value="Carne-Moída" <?php echo ($order['product'] == 'Frango C/ Catupiry') ? 'selected' : ''; ?>>Frango C/ Catupiry</option>
                    <option value="Ovo" <?php echo ($order['product'] == 'Ovo') ? 'selected' : ''; ?>>Ovo</option>
                    <option value="Queijo(APENAS QUEIJO)" <?php echo ($order['product'] == 'Queijo(APENAS QUEIJO)') ? 'selected' : ''; ?>>Queijo(APENAS QUEIJO)</option>
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

                <label for="flavor">Sabor:</label>
                    <select id="flavor" name="flavor">
                        <option value="1" <?php echo ($order['flavor'] == 1) ? 'selected' : ''; ?>>Coxinha</option>
                        <option value="2" <?php echo ($order['flavor'] == 2) ? 'selected' : ''; ?>>Bolinho</option>
                        <option value="3" <?php echo ($order['flavor'] == 3) ? 'selected' : ''; ?>>Risoles</option>
                        <option value="4" <?php echo ($order['flavor'] == 4) ? 'selected' : ''; ?>>Esfirra</option>
                        <option value="5" <?php echo ($order['flavor'] == 5) ? 'selected' : ''; ?>>Salsicha</option>
                        <option value="6" <?php echo ($order['flavor'] == 6) ? 'selected' : ''; ?>>Croquete</option>
                    </select>

                <button type="submit">Atualizar Pedido</button>
            </form>

        <?php elseif ($order['flavor'] == 'Risoles' || $order['flavor'] == '3'): ?>

            <!--RISOLES-->
            <form action="" method="post">
                <label for="product">Produto:</label>
                <select id="product" name="product">
                    <option value="Presunto e Queijo" <?php echo ($order['product'] == 'Presunto e Queijo') ? 'selected' : ''; ?>>Presunto e Queijo</option>
                    <option value="Frango C/ Catupiry" <?php echo ($order['product'] == 'Frango C/ Catupiry') ? 'selected' : ''; ?>>Frango C/ Catupiry</option>
                    <option value="Calabresa" <?php echo ($order['product'] == 'Calabresa') ? 'selected' : ''; ?>>Calabresa</option>
                    <option value="Calabresa C/ Catupiry" <?php echo ($order['product'] == 'Calabresa C/ Catupiry') ? 'selected' : ''; ?>>Calabresa C/ Catupiry</option>
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

                <label for="flavor">Sabor:</label>
                    <select id="flavor" name="flavor">
                        <option value="1" <?php echo ($order['flavor'] == 1) ? 'selected' : ''; ?>>Coxinha</option>
                        <option value="2" <?php echo ($order['flavor'] == 2) ? 'selected' : ''; ?>>Bolinho</option>
                        <option value="3" <?php echo ($order['flavor'] == 3) ? 'selected' : ''; ?>>Risoles</option>
                        <option value="4" <?php echo ($order['flavor'] == 4) ? 'selected' : ''; ?>>Esfirra</option>
                        <option value="5" <?php echo ($order['flavor'] == 5) ? 'selected' : ''; ?>>Salsicha</option>
                        <option value="6" <?php echo ($order['flavor'] == 6) ? 'selected' : ''; ?>>Croquete</option>
                    </select>

                <button type="submit">Atualizar Pedido</button>
            </form>
            
        <?php elseif ($order['flavor'] == 'Esfirra' || $order['flavor'] == '4'): ?>
            
            <!--ESFIRRAS-->
            <form action="" method="post">
                <label for="product">Produto:</label>
                <select id="product" name="product">
                    <option value="Frango" <?php echo ($order['product'] == 'Frango') ? 'selected' : ''; ?>>Frango</option>
                    <option value="Frango C/ Catupiry" <?php echo ($order['product'] == 'Frango C/ Catupiry') ? 'selected' : ''; ?>>Frango C/ Catupiry</option>
                    <option value="Calabresa" <?php echo ($order['product'] == 'Calabresa') ? 'selected' : ''; ?>>Calabresa</option>
                    <option value="Calabresa C/ Catupiry" <?php echo ($order['product'] == 'Calabresa C/ Catupiry') ? 'selected' : ''; ?>>Calabresa C/ Catupiry</option>
                    <option value="Carne-Moída" <?php echo ($order['product'] == 'Carne-Moída') ? 'selected' : ''; ?>>Carne-Moída</option>
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

                <label for="flavor">Sabor:</label>
                    <select id="flavor" name="flavor">
                        <option value="1" <?php echo ($order['flavor'] == 1) ? 'selected' : ''; ?>>Coxinha</option>
                        <option value="2" <?php echo ($order['flavor'] == 2) ? 'selected' : ''; ?>>Bolinho</option>
                        <option value="3" <?php echo ($order['flavor'] == 3) ? 'selected' : ''; ?>>Risoles</option>
                        <option value="4" <?php echo ($order['flavor'] == 4) ? 'selected' : ''; ?>>Esfirra</option>
                        <option value="5" <?php echo ($order['flavor'] == 5) ? 'selected' : ''; ?>>Salsicha</option>
                        <option value="6" <?php echo ($order['flavor'] == 6) ? 'selected' : ''; ?>>Croquete</option>
                    </select>

                <button type="submit">Atualizar Pedido</button>
            </form>

        <?php elseif ($order['flavor'] == 'Salsicha' || $order['flavor'] == '5'): ?>
            
            <!--SALSICHA-->
            <form action="" method="post">
                <label for="product">Produto:</label>
                <select id="product" name="product">
                    <option value="Salsicha-Frita" <?php echo ($order['product'] == 'Salsicha-Frita') ? 'selected' : ''; ?>>Salsicha-Frita</option>
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

                <label for="flavor">Sabor:</label>
                    <select id="flavor" name="flavor">
                        <option value="1" <?php echo ($order['flavor'] == 1) ? 'selected' : ''; ?>>Coxinha</option>
                        <option value="2" <?php echo ($order['flavor'] == 2) ? 'selected' : ''; ?>>Bolinho</option>
                        <option value="3" <?php echo ($order['flavor'] == 3) ? 'selected' : ''; ?>>Risoles</option>
                        <option value="4" <?php echo ($order['flavor'] == 4) ? 'selected' : ''; ?>>Esfirra</option>
                        <option value="5" <?php echo ($order['flavor'] == 5) ? 'selected' : ''; ?>>Salsicha</option>
                        <option value="6" <?php echo ($order['flavor'] == 6) ? 'selected' : ''; ?>>Croquete</option>
                    </select>

                <button type="submit">Atualizar Pedido</button>
            </form>

        <?php elseif ($order['flavor'] == 'Croquete' || $order['flavor'] == '6'): ?>
            
            <!--SALSICHA-->
            <form action="" method="post">
                <label for="product">Produto:</label>
                <select id="product" name="product">
                    <option value="Croquete de Carne" <?php echo ($order['product'] == 'Croquete de Carne') ? 'selected' : ''; ?>>Croquete de Carne</option>
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

                <label for="flavor">Sabor:</label>
                    <select id="flavor" name="flavor">
                        <option value="1" <?php echo ($order['flavor'] == 1) ? 'selected' : ''; ?>>Coxinha</option>
                        <option value="2" <?php echo ($order['flavor'] == 2) ? 'selected' : ''; ?>>Bolinho</option>
                        <option value="3" <?php echo ($order['flavor'] == 3) ? 'selected' : ''; ?>>Risoles</option>
                        <option value="4" <?php echo ($order['flavor'] == 4) ? 'selected' : ''; ?>>Esfirra</option>
                        <option value="5" <?php echo ($order['flavor'] == 5) ? 'selected' : ''; ?>>Salsicha</option>
                        <option value="6" <?php echo ($order['flavor'] == 6) ? 'selected' : ''; ?>>Croquete</option>
                    </select>

                <button type="submit">Atualizar Pedido</button>
            </form>

        <?php else: ?>
            <script>alert('Produto Inesistente!');</script>
        <?php endif; ?>
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