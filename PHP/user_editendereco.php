<?php

include_once("./config.php");

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $endereco_id = $_GET['id'];

    $sql = "SELECT * FROM enderecos_entrega WHERE id = $endereco_id";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $endereco = $resultado->fetch_assoc();
    } else {
        header("Location: index.php");
        exit();
    }

    $conn->close();
    } else {
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Editar Endereço</title>
</head>
<body>
<h1>Editar Endereço</h1>

<form action="user_processeditendereco.php" method="post">
    <input type="hidden" name="endereco_id" value="<?php echo $endereco['id']; ?>">
    <label for="endereco">Endereço:</label>
    <input type="text" id="endereco" name="endereco" value="<?php echo $endereco['endereco']; ?>"><br>
    <label for="numero">Número:</label>
    <input type="text" id="numero" name="numero" value="<?php echo $endereco['numero']; ?>"><br>
    <label for="bairro">Bairro:</label>
    <input type="text" id="bairro" name="bairro" value="<?php echo $endereco['bairro']; ?>"><br>
    <label for="cidade">Cidade:</label>
    <input type="text" id="cidade" name="cidade" value="<?php echo $endereco['cidade']; ?>"><br>
    <input type="submit" value="Salvar">
</form>

</body>
</html>