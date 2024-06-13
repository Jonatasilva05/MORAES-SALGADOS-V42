<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pedidos_db";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Processamento do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST['tipo'];
    $produto = $_POST['produto'];
    $quantidade = 1; // Quantidade fixa para combos, sempre 1

    // Se o tipo for "combos", ajusta o produto para o valor selecionado no combo
    if ($tipo === 'combos') {
        $produto = $_POST['combo_produto'];
    } else {
        // Se o tipo for "unidades", a quantidade é definida pelo usuário
        $quantidade = $_POST['quantidade'];
    }

    // Prepara a instrução SQL
    $stmt = $conn->prepare("INSERT INTO pedidos (produto_id, quantidade, tipo) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $produto, $quantidade, $tipo);

    // Executa a inserção
    if ($stmt->execute() === TRUE) {
        echo "Pedido adicionado com sucesso.";
    } else {
        echo "Erro ao adicionar pedido: " . $conn->error;
    }

    // Fecha a declaração e a conexão
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pedidos de Produtos</title>
<style>
  body {
    font-family: Arial, sans-serif;
  }
  .container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
  }
  select, input[type="number"], button {
    margin-bottom: 10px;
  }
  .combo-options {
    display: none;
  }
</style>
</head>
<body>
<div class="container">
  <h2>Escolha seu produto ou combo e quantidade:</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="radio" id="unidades" name="tipo" value="unidades" checked>
    <label for="unidades">Unidades</label>
    <input type="radio" id="combos" name="tipo" value="combos">
    <label for="combos">Combos</label>
    <br>
    <div id="unidades-options">
      <select id="produto" name="produto">
        <option value="1">Produto 1 - R$10.00</option>
        <option value="2">Produto 2 - R$15.00</option>
        <option value="3">Produto 3 - R$20.00</option>
      </select>
      <br>
      <input type="number" id="quantidade" name="quantidade" placeholder="Quantidade" min="1" value="1">
    </div>
    <div id="combos-options" class="combo-options">
      <select id="combo-produto" name="combo_produto">
        <option value="20">Combo 1 - R$20.00</option>
        <option value="30">Combo 2 - R$30.00</option>
        <option value="40">Combo 3 - R$40.00</option>
        <option value="50">Combo 4 - R$50.00</option>
        <option value="100">Combo 5 - R$100.00</option>
      </select>
    </div>
    <br>
    <button type="submit">Adicionar ao Carrinho</button>
  </form>
</div>

<div class="container">
  <h2>Formulário 2 - Escolha seu produto ou combo e quantidade:</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="radio" id="unidades2" name="tipo2" value="unidades" checked>
    <label for="unidades2">Unidades</label>
    <input type="radio" id="combos2" name="tipo2" value="combos">
    <label for="combos2">Combos</label>
    <br>
    <div id="unidades-options2">
      <select id="produto2" name="produto2">
        <option value="4">Produto 4 - R$25.00</option>
        <option value="5">Produto 5 - R$30.00</option>
        <option value="6">Produto 6 - R$35.00</option>
      </select>
      <br>
      <input type="number" id="quantidade2" name="quantidade2" placeholder="Quantidade" min="1" value="1">
    </div>
    <div id="combos-options2" class="combo-options">
      <select id="combo-produto2" name="combo_produto2">
        <option value="30">Combo 6 - R$30.00</option>
        <option value="40">Combo 7 - R$40.00</option>
        <option value="50">Combo 8 - R$50.00</option>
        <option value="60">Combo 9 - R$60.00</option>
        <option value="120">Combo 10 - R$120.00</option>
      </select>
    </div>
    <br>
    <button type="submit">Adicionar ao Carrinho</button>
  </form>
</div>

<script>
  // Função para mostrar ou ocultar as opções de combo com base na seleção do usuário
  document.querySelectorAll('input[name="tipo"]').forEach((radio) => {
    radio.addEventListener('change', function() {
      const tipoSelecionado = this.value;
      const unidadesOptions = document.getElementById('unidades-options');
      const comboOptions = document.getElementById('combos-options');

      if (tipoSelecionado === 'combos') {
        unidadesOptions.style.display = 'none';
        comboOptions.style.display = 'block';
      } else {
        unidadesOptions.style.display = 'block';
        comboOptions.style.display = 'none';
      }
    });
  });

  document.querySelectorAll('input[name="tipo2"]').forEach((radio) => {
    radio.addEventListener('change', function() {
      const tipoSelecionado = this.value;
      const unidadesOptions = document.getElementById('unidades-options2');
      const comboOptions = document.getElementById('combos-options2');

      if (tipoSelecionado === 'combos') {
        unidadesOptions.style.display = 'none';
        comboOptions.style.display = 'block';
      } else {
        unidadesOptions.style.display = 'block';
        comboOptions.style.display = 'none';
      }
    });
  });
</script>
</body>
</html>
