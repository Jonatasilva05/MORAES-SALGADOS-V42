<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro de Endereço de Entrega</title>
</head>
<body>
<h1>Cadastro de Endereço de Entrega</h1>
<form action="user_processaformendereco.php" method="post">
  <label for="nome">Nome:</label><br>
  <input type="text" id="nome" name="nome" required><br><br>
  
  <label for="cep">CEP:</label><br>
  <input type="text" id="cep" name="cep" placeholder="Digite apenas numeros" required><br><br>

  <label for="endereco">Endereço:</label><br>
  <input type="text" id="endereco" name="endereco" required><br><br>

  <label for="numero">Número:</label><br>
  <input type="text" id="numero" name="numero" required><br><br>

  <label for="bairro">Bairro:</label><br>
  <input type="text" id="bairro" name="bairro" required><br><br>

  <label for="cidade">Cidade:</label><br>
  <input type="text" id="cidade" name="cidade" required><br><br>


  <label for="telefone">Telefone:</label><br>
  <input type="tel" id="telefone" name="telefone" required><br><br>

  <label for="whatsapp">Número para WhatsApp:</label><br>
  <input type="tel" id="whatsapp" name="whatsapp" required><br><br>

  <label for="pontoReferencia">Ponto de Referência:</label><br>
  <textarea id="pontoReferencia" name="pontoReferencia"></textarea><br><br>

  <label for="moradia">Tipo de Moradia:</label><br>
  <select id="moradia" name="moradia">
    <option value="casa">Casa</option>
    <option value="apt">Moro em Apt</option>
  </select><br><br>

  <div id="blocoNumero" style="display:none;">
    <label for="bloco">Bloco:</label><br>
    <input type="text" id="bloco" name="bloco"><br><br>

    <label for="numeroApt">Número do Apartamento:</label><br>
    <input type="text" id="numeroApt" name="numeroApt"><br><br>
  </div>

  <input type="submit" value="Cadastrar">
</form>

<script>
    document.getElementById("moradia").addEventListener("change", function() {
        var blocoNumeroDiv = document.getElementById("blocoNumero");
        if (this.value === "apt") {
            blocoNumeroDiv.style.display = "block";
        } else {
            blocoNumeroDiv.style.display = "none";
        }
    });

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
