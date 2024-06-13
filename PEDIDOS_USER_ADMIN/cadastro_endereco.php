<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Endereço</title>

    <style>
        body { font-family: Arial, sans-serif; }
        form { max-width: 300px; margin: auto; padding: 1em; border: 1px solid #ccc; border-radius: 1em; }
        div { margin-bottom: 1em; }
        label { margin-bottom: .5em; color: #333333; display: block; }
        input, button { padding: .5em; font-size: 1em; width: 100%; }
        button { background: #007BFF; color: white; border: none; border-radius: 5px; }
    </style>

</head>
<body>
    <h1>Cadastro de Endereço</h1>
    <form action="user_cadastroendereco.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" required><br><br>

        <label for="numero">Número:</label>
        <input type="text" id="numero" name="numero" required><br><br>

        <label for="bairro">Bairro:</label>
        <input type="text" id="bairro" name="bairro" required><br><br>

        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade" required><br><br>

        <label for="cep">CEP:</label>
        <input type="text" id="cep" name="cep" placeholder="Digite Apenas os Numeros..." required><br><br>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required><br><br>

        <label for="referencia">Ponto de Referência:</label>
        <textarea id="referencia" name="referencia" rows="4" cols="50"></textarea><br><br>

        <input type="checkbox" id="moro_apt" name="moro_apt" onclick="mostrarInputsApt()"> Moro em Apt<br><br>

        <div id="inputs_apt" style="display: none;">
            <label for="bloco">Bloco:</label>
            <input type="text" id="bloco" name="bloco"><br><br>

            <label for="num_apt">Número do Apartamento:</label>
            <input type="text" id="num_apt" name="num_apt"><br><br>
        </div>

        <button type="submit">Cadastrar</button>
    </form>

    <script>
        document.getElementById('cep').addEventListener('blur', function() {
            const cep = this.value.replace(/\D/g, '');
            if (cep.length !== 8) {
                return;
            }
            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => response.json())
                .then(data => {
                    if (!data.erro) {
                        document.getElementById('endereco').value = data.logradouro;
                        document.getElementById('bairro').value = data.bairro;
                        document.getElementById('cidade').value = data.localidade;
                    }
                })
                .catch(error => console.error('Erro ao buscar endereço:', error));
        });


        function mostrarInputsApt() {
            var checkbox = document.getElementById("moro_apt");
            var inputsApt = document.getElementById("inputs_apt");

            if (checkbox.checked) {
                inputsApt.style.display = "block";
            } else {
                inputsApt.style.display = "none";
            }
        }
    </script>
</body>
</html>
