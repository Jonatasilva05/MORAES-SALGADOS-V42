<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça seu Pedido</title>
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
    <h1>Faça seu Pedido</h1>
    <form>
        <div>
            <label for="item">Item:</label>
            <input type="text" id="item" name="item" required>
        </div>
        <div>
            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" required>
        </div>
        <div>
            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" required>
        </div>
        <div>
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" required>
        </div>
        <div>
            <label for="bairro">Bairro:</label>
            <input type="text" id="bairro" name="bairro" required>
        </div>
        <div>
            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade" required>
        </div>
        <div>
            <label for="numero">Número da Casa:</label>
            <input type="text" id="numero" name="numero" required>
        </div>
        <div>
            <label for="referencia">Ponto de Referência:</label>
            <input type="text" id="referencia" name="referencia">
        </div>
        <div>
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" required>
        </div>
        <button type="submit">Enviar Pedido</button>
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
    </script>
</body>
</html>
