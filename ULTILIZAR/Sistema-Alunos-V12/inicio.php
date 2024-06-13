<?php
include_once('conexao.php');
session_start();

if (isset($_GET['logout'])) {
    // Finaliza a sessão
    session_destroy();
    
    // Redireciona para a página de login
    header('Location: login.html');
    exit;
}


$userId = $_SESSION['usu_id']; // Obtém o ID do usuário da sessão

// Consulta ao banco de dados para obter os dados do usuário
$query = "SELECT * FROM usuario WHERE usu_id = " . $_SESSION['usu_id'];
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$userData = mysqli_fetch_assoc($result);





?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="./css/menu.css">
    <link rel="stylesheet" type="text/css" href="./css/marca/inicio.css">
    <link rel="stylesheet" href="./css/cartao.css">


    <title>Inicio</title>
</head>
<body>
    
    <header>
        <div id="header">
            <nav id="nav-bar">
                <div id="logo">
                <a href="inicio.html">
                    <img src="./img/buss.png" alt="logo do onibus">
                </a>
                </div>
                <div id="nav-list">
                    <ul>
                        <li class="nav-menu"><a href="./inicio.php" class="nav-link">Incio</a></li>
                        <li class="nav-menu"><a href="./pagamento.html" class="nav-link">Pagamentos</a></li>
                        <li class="nav-menu"><a href="./peso.php" class="nav-link">Dados Pessoais</a></li>

                    </ul>
                </div>
				<div class="login-button">
					<a href="?logout=true" id="fechar" class="nav-link">Sair</a>
				</div>
    
                <div class="mobile-menu-icon">
                    <button onclick="menuShow()">
                        <img class="icon" src="./img/responsive/menu_white_36dp.svg" alt="">
                    </button>
                </div>   
            </nav>
    
            <div class="mobile-menu">
                <ul>
                    <li class="nav-menu"><a href="./inicio.php" class="nav-link">Incio</a></li>
                    <li class="nav-menu"><a href="./pagamento.html" class="nav-link">Pagamentos</a></li>
                    <li class="nav-menu"><a href="./peso.php" class="nav-link">Dados Pessoais</a></li>

                </ul>
                
					
				
            </div>
        </div>
    </header>

<main>
    <div class="wrapper" id="app">
        <div class="card-item" v-bind:class="{ '-active' : isCardFlipped }">
            <div class="card-item__cover">
              <img
              v-bind:src="'https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/' + currentCardBackground + '.jpeg'" class="card-item__bg">
            </div>
            
            <div class="card-item__wrapper">
              <div class="card-item__top">
  <!-- aqui vai a imagem do aluno              <img src="https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/chip.png" class="card-item__chip"> -->
                <div class="card-item__type">
                  <transition name="slide-fade-up">
                    <img src="./img/SANTA ERNESTINA 2022 (1).png" alt="logo da prefeitura">
                  </transition>
                </div>
              </div>
						<?php { ?>
					<label for="cardNumber" class="card-item__number" ref="cardNumber">
                    <div class="dados">
                        <div class="nome">
						<label>Nome: <?php echo $userData['usu_nomec']; ?></label>
						</div>
                            <div class="br"></div>
                      
                        <div class="periodo">
                            <label>Periodo do Curso: <?php echo $userData['usu_periodo']; ?></label>
                        </div>
                            <div class="br"></div>
                            <div class="fone">
                                <label>Telefone:<?php echo $userData['usu_telefone']; ?></label>
                            </div>
							   <div class="br"></div>
                            <div class="fone">
                                <label>Celular: <?php echo $userData['usu_celular']; ?></label>
                            </div>
                            <div class="br"></div>
                        <div class="cds">
                            <label>Cidade: <?php echo $userData['usu_city']; ?></label>
                        </div>
							<?php } ?>
						</form>                         
                  </div>
              </div>
              </div>
              </label>
            </div>
          </div>
        </div>
  
</main>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js'></script>
    <script src='https://unpkg.com/vue-the-mask@0.11.1/dist/vue-the-mask.js'></script>
    <script  src="./java/cartao.js"></script>
    <script src="./java/sair.js"></script>
</body>
</html>