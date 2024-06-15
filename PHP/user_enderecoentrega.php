<?php

include_once("./config.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Escolher Endereço de Entrega</title>
</head>
<body>
<h1>Escolher Endereço de Entrega</h1>

<?php
$sql = "SELECT * FROM enderecos_entrega";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    echo "<form action='user_processaentrega.php' method='post'>";
    while ($row = $resultado->fetch_assoc()) {
        echo "<input type='radio' id='endereco_" . $row['id'] . "' name='endereco' value='" . $row['id'] . "' required>";
        echo "<label for='endereco_" . $row['id'] . "'>" . $row['endereco'] . ", " . $row['numero'] . ", " . $row['bairro'] . ", " . $row['cidade'] . "</label>";
        echo "<button type='button' onclick='editarEndereco(" . $row['id'] . ")'>Editar</button>";
        echo "<button type='button' onclick='excluirEndereco(" . $row['id'] . ")'>Excluir</button><br>";
    }
    echo "<br><input type='submit' value='Selecionar Endereço'>";
    echo "<br><br><br>";
    echo "<a href='./user_cadastroendereco.php'>Cadastrar Novo Endereço</a>";
    echo "</form>";
} else {
    echo "<p>Nenhum endereço cadastrado.</p>";
    echo "<a href='user_cadastroendereco.php'>Cadastrar Endereço</a>";
    echo "<br><br><br>";
    echo "<a href='user_lista.php'>Voltar para menu</a>";
}

$conn->close();
?>

<script>
function editarEndereco(id) {
    window.location.href = 'user_editendereco.php?id=' + id;
}

function excluirEndereco(id) {
    if (confirm('Tem certeza que deseja excluir este endereço?')) {
        window.location.href = 'user_excluirendereco.php?id=' + id;
    }
}
</script>

</body>
</html>
