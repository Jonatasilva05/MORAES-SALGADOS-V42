<!--order.php-->

<?php
session_start();
require_once('./config.php');

    if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']) || $_SESSION['is_admin'] != 0) {
        header("Location: ../index.php");
        exit();
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

    <title>Fazer Pedido</title>
</head>
<body>
    <div class="container">
        <h1>Fazer Pedido</h1>        
        <form id="orderForm" action="user_processorder.php" method="post">
            <input type="hidden" name="flavor" value="Coxinha">

            <label for="product">Produto:</label>
            <select id="product" name="product">
                <option value="Frango">Frango</option>
                <option value="Frango C/ Catupiry">Frango C/ Catupiry</option>
                <option value="Carne-Moída">Carne-Moída</option>
                <option value="Calabresa">Calabresa</option>
                <option value="Calabresa C/ Catupiry">Calabresa C/ Catupiry</option>
                <option value="Pernil">Pernil</option>
            </select>

            <label for="quantityType">Tipo de Quantidade:</label>
            <input type="radio" id="unidade" name="quantity_type" value="unidade" checked>
            <label for="unidade">Unidades</label>
            <input type="radio" id="combo" name="quantity_type" value="combo">
            <label for="combo">Combos</label>
            <br>

            <div id="unitQuantityContainer">
                <label for="unitQuantity">Quantidade de Unidades:</label>
                <input type="number" id="unitQuantity" name="unit_quantity" min="1" value="1">
            </div>

            <div id="comboQuantityContainer" style="display: none;">
                <label for="comboQuantity">Quantidade de Combos:</label>
                <select id="comboQuantity" name="combo_quantity">
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="70">70</option>
                    <option value="80">80</option>
                    <option value="90">90</option>
                    <option value="100">100</option>
                </select>
            </div>

            <button type="submit">Fazer Pedido</button>
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
