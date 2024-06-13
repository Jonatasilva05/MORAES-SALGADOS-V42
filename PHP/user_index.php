<?php
session_start();
require_once('./config.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']) || $_SESSION['is_admin'] != 0) {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!--Cloudflare-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
   <!--SweetAlert2 CSS-->
   <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css" rel="stylesheet">
   <!--SweetAlert2 JAVASCRIPT-->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>

   <!--FONT GOOGLE FONTS-->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
   
   <!--FONT BOOTSTRAP ICONS-->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

   <!--BOOTSTRAP CSS-->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

	<!--CSS-->
	<link rel="stylesheet" href="./CSS/style.css">
   <link rel="stylesheet" href="./CSS/index.css">

   <!--IMAGEM ABA-->
   <link rel="icon" href="./IMGs/LOGOS/ICONE_MS_ABA_32.png" type="image/png">

	<title>MORAES SALGADOS</title>

</head>
<body>

<header id="header">
	<a href="./user_index.php" id="logo">
      <img class="imagemLogo" src="https://i.ibb.co/7yqctDq/LOGO-HEADER.jpg" id="logoNormal" alt="logo da empresa(coxinha em cima de um livro de receitas)">
      <img src="./IMGs/NEUTRO/LOGO-HEADER.jpg" id="logoNeutro" alt="LOGO NO MODO ACESSIVEL">
   </a>
	<button id="openMenu" onclick="abrir()">&#9776;</button>
	<nav id="menu">
		<button id="closeMenu">X</button>
		<a href="./user_index.php">Inicio</a>
		<a href="./user_sobre.php">Sobre</a>
		<a href="./user_contato.php">Contato</a>
      <a href="#" onclick="desactive(); return false;">
         <i class="bi bi-ban" id="checkHeader" title="Desativa os efeitos da Página"></i>
         <i class="bi bi-check-circle" id="confereHeader" title="Ativa os efeitos da Página"></i>
      </a>
      <a href="./user_lista.php" title="Meu carrinho">
         <button class="Btn">
            <div class="sign">
               <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                  <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z">
                  </path>
               </svg>
            </div>
            <div class="text">Carrinho</div>
          </button>
      </a>
      <a href="./logout.php" class="btnSairConta" title="Deslogar da Conta">
         <button class="button">
            <div class="svgIcon">
               <img src="../IMGs/ICONES/SAIDA.png" alt="LOGO DE UMA SAÍDA DE EMERGENCIA" title="Deslogar da conta">
            </div>
         </button>
      </a>
	</nav>
</header>

<main id="main">
   
   <!--CARD COM ANIMAÇÃO ORIGINAL-->
   <div class="container">
      <h3 class="title"> Aproveite nossos produtos </h3>
      
      <div class="products-container">
         <!--COXINHA-->
         <div class="product" data-name="p-1">
            <img src="https://i.ibb.co/PMdhgbK/COXINHA.jpg" alt="COXINHA">
            <h3>COXINHA</h3>
            <div class="price"><b>R$5,00 uni.</b></div>
         </div>

         <!--BOLINHO-->
         <div class="product" data-name="p-2">
            <img src="https://i.ibb.co/vxgCjj7/BOLINHOS.jpg" alt="BOLINHOS">
            <h3>BOLINHOS</h3>
            <div class="price"><b>R$5,00 uni.</b></div>
         </div>

         <!--RISOLES-->
         <div class="product" data-name="p-3">
            <img src="https://i.ibb.co/H2yBQDW/RISOLES.jpg" alt="RISOLES">
            <h3>RISOLES</h3>
            <div class="price"><b>R$5,00 uni.</b></div>
         </div>

         <!--ESFIRRAS-->
         <div class="product" data-name="p-4">
            <img src="https://i.ibb.co/QjBZtTh/ESFIRRA.jpg" alt="ESFIRRA">
            <h3>ESFIRRA</h3>
            <div class="price">R$5,OO uni.</div>
         </div>

         <!--SALSICHAS-->
         <div class="product" data-name="p-5">
            <img src="https://i.ibb.co/8cs7j12/SALSICHA.jpg" alt="SALSICHA"> 
            <h3>SALSICHA</h3>
            <div class="price"><b>R$5,00 uni.</b></div>
         </div>

         <!--CROQUETES-->
         <div class="product" data-name="p-6">
            <img src="https://i.ibb.co/2cb3z5p/CROQUETE.jpg" alt="CROQUETE">
            <h3>CROQUETE</h3>
            <div class="price"><b>R$5,00 uni.</b></div>
         </div>
      </div>
   </div>

   
   <!--CARD COM ANIMAÇÃO DE TRANSLAÇÃO-->
   <div class="container text-center">
      <div class="row">
         <!--COXINHA-->
         <div class="col" data-name="p-1">
            <div class="containerCard">
               <div class="card">
                  <div class="card2">
                     <div class="contentMenu delay1 animate__animated animate__backInDown" id="menuContent">
                        <div class="back">
                           <div class="back-content">
                              <span class="material-symbols-outlined">
                                 <img src="./IMGs/SALGADOS/COXINHA.jpg" id="oneCoxa" alt="Imagem de uma coxinha frita">
                                 <img src="./IMGs/NEUTRO/COXINHA.jpg" id="subOneCoxa" alt="Imagem de uma coxinha frita aplicada a acessibilidade">
                              </span>
                           </div>
                        </div>
                        <div class="front">                   
                           <div class="front-content">
                              <ul>
                                 <legend><h2>Temos Coxinhas nos<br>Sabores de:</h2></legend>
                                 <br><br>
                                 <li>FRANGO <span onclick="frango()"><i class="bi bi-info-circle"></i></span></li>
                                 <li>FRANGO C/ CATUPIRY <span onclick="frangoCatupiry()"><i class="bi bi-info-circle"></i></span></li>
                                 <li>CARNE-MOÍDA <span onclick="carneMoida()"><i class="bi bi-info-circle"></i></span></li>
                                 <li>CALABRESA <span onclick="calabresa()"><i class="bi bi-info-circle"></i></span></li>
                                 <li>CALABRESA C/ CATUPIRY <span onclick="calabresaCatupiry()"><i class="bi bi-info-circle"></i></span></li>
                                 <li>PERNIL <span onclick="pernil()"><i class="bi bi-info-circle"></i></span></li>
                              </ul>
                              <div class="row">
                                 <div class="col">
                                 </div>
                                 <div class="col-6">
                                    <button class="btn-shine">
                                       <span>SAIBA MAIS</span>
                                    </button>
                                 </div>
                                 <div class="col">                                   
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <!--BOLINHO-->
         <div class="col" data-name="p-2">
            <div class="containerCard">
               <div class="card">
                  <div class="card2">
                     <div class="contentMenu delay2 animate__animated animate__backInDown">
                        <div class="back">
                           <div class="back-content">
                              <span class="material-symbols-outlined">
                                 <img src="./IMGs/SALGADOS/BOLINHOS.jpeg" id="oneBol" alt="Imagem de um bolinho frito">
                                 <img src="./IMGs/NEUTRO/BOLINHOS.jpg" id="subOneBol" alt="Imagem de um bolinho frito aplicada a acessibilidade">
                              </span>
                           </div>
                        </div>
                        <div class="front">                   
                           <div class="front-content">
                              <ul>
                                 <legend><h2>Temos Bolinhos nos<br>Sabores de:</h2></legend>
                                 <br><br>
                                 <li>PRESUNTO E QUEIJO <span onclick="presuntoQueijo()"><i class="bi bi-info-circle"></i></span></li>
                                 <li>CARNE-MOÍDA <span onclick="bolCarneMoida()"><i class="bi bi-info-circle"></i></span></li>
                                 <li>OVO <span onclick="ovo()"><i class="bi bi-info-circle"></i></span></li>
                                 <li>QUEIJO <span onclick="queijo()"><i class="bi bi-info-circle"></i></span></li>
                              </ul>
                              <div class="row">
                                 <div class="col">
                                 </div>
                                 <div class="col-6">
                                    <button class="btn-shine">
                                       <span>SAIBA MAIS</span>
                                    </button>
                                 </div>
                                 <div class="col">                                   
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <!--RISOLES-->
         <div class="col" data-name="p-3">
            <div class="containerCard">
               <div class="card">
                  <div class="card2">
                     <div class="contentMenu delay3 animate__animated animate__backInDown">
                        <div class="back">
                           <div class="back-content">
                              <span class="material-symbols-outlined">
                                 <img src="./IMGs/SALGADOS/RISOLES.jpeg" id="oneRisol" alt="Imagem de um risoles frito">
                                 <img src="./IMGs/NEUTRO/RISOLES.jpg" id="oneSubRisol" alt="Imagem de um risoles frito aplicada a acessibilidade">
                              </span>
                           </div>
                        </div>
                        <div class="front">                   
                           <div class="front-content">
                                 <ul>
                                    <legend><h2>Temos Risoles nos<br>Sabores de:</h2></legend>
                                    <br><br>
                                    <li>PRESUNTO E QUEIJO <span onclick="risoPresuntoQueijo()"><i class="bi bi-info-circle"></i></span></li>
                                    <li>CALABRESA <span onclick="risoCalabresa()"><i class="bi bi-info-circle"></i></span></li>
                                    <li>CALABRESA C/ CATUPIRY <span onclick="risoCalabresaCatupiry()"><i class="bi bi-info-circle"></i></span></li>
                                    <li>CARNE-MOÍDA <span onclick="risoCarneMoida()"><i class="bi bi-info-circle"></i></span></li>
                                 </ul>
                                 <div class="row">
                                    <div class="col">
                                    </div>
                                    <div class="col-6">
                                       <button class="btn-shine">
                                          <span>SAIBA MAIS</span>
                                       </button>
                                    </div>
                                    <div class="col">                                   
                                    </div>
                                 </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <!--ESFIRRA-->
         <div class="col" data-name="p-4">
            <div class="containerCard">
               <div class="card">
                  <div class="card2">
                     <div class="contentMenu delay4 animate__animated animate__backInDown">
                        <div class="back">
                           <div class="back-content">
                              <span class="material-symbols-outlined">
                                 <img src="./IMGs/SALGADOS/ESFIRRA.jpeg" id="oneEsfir" alt="Imagem de uma esfirra assada">
                                 <img src="./IMGs/NEUTRO/ESFIRRA.jpg" id="subOneEsfir" alt="Imgagem de uma esfirra assada aplicada acessibilidade">
                              </span>
                           </div>
                        </div>
                        <div class="front">                   
                           <div class="front-content">
                              <ul>
                                 <legend><h2>Temos Esfirra nos<br>Sabores:</h2></legend>
                                 <br><br>
                                 <li>FRANGO <span onclick="esfiFrango()"><i class="bi bi-info-circle"></i></span></li>
                                 <li>FRANGO C/ CATUPIRY <span onclick="esfiFrangoCatupiry()"><i class="bi bi-info-circle"></i></span></li>
                                 <li>CALABRESA <span onclick="esfiCalabresa()"><i class="bi bi-info-circle"></i></span></li>
                                 <li>CALABRESA C/ CATUPIRY <span onclick="esfiCalabresaCatupiry()"><i class="bi bi-info-circle"></i></span></li>
                                 <li>CARNE-MOÍDA <span onclick="esfiCarneMoida()"><i class="bi bi-info-circle"></i></span></li>
                              </ul>
                              <div class="row">
                                 <div class="col">
                                 </div>
                                 <div class="col-6">
                                    <button class="btn-shine">
                                       <span>SAIBA MAIS</span>
                                    </button>
                                 </div>
                                 <div class="col">                                   
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <!--SALSICHA-->
         <div class="col" data-name="p-5">
            <div class="containerCard">
               <div class="card">
                   <div class="card2">
                       <div class="contentMenu delay5 animate__animated animate__backInDown">
                           <div class="back">
                           <div class="back-content">
                              <span class="material-symbols-outlined">
                                 <img src="./IMGs/SALGADOS/SALSICHA.jpeg" id="oneSals" alt="Imagem de uma Salsicha frita">
                                 <img src="./IMGs/NEUTRO/SALSICHA.jpg" id="subOneSals" alt="Imagem de uma salsicha frita aplicada acessibilidade">
                              </span>
                           </div>
                           </div>
                           <div class="front">                   
                              <div class="front-content">
                                 <ul>
                                    <legend><h2>Temos Salsichas nos<br>Sabores:</h2></legend>
                                    <br><br>
                                    <li>SALSICHA FRITA<span onclick="salsicha()"><i class="bi bi-info-circle"></i></span></li>
                                 </ul>
                                 <div class="row">
                                    <div class="col">
                                    </div>
                                    <div class="col-6">
                                       <button class="btn-shine">
                                          <span>SAIBA MAIS</span>
                                       </button>
                                    </div>
                                    <div class="col">                                   
                                    </div>
                                 </div>
                              </div>
                           </div>
                       </div>
                   </div>
               </div>
            </div>
         </div>

         <!--CROQUETE-->
         <div class="col" data-name="p-6">
            <div class="containerCard">
               <div class="card">
                  <div class="card2">
                     <div class="contentMenu delay6 animate__animated animate__backInDown">
                        <div class="back">
                           <div class="back-content">
                              <span class="material-symbols-outlined">
                                 <img src="./IMGs/SALGADOS/CROQUETE.jpeg" id="oneCroque" alt="Imagem de um croquete frito">
                                 <img src="./IMGs/NEUTRO/CROQUETE.jpg" id="subOneCroque" alt="Imagem de um croquete frito aplicado acessibilidade">
                              </span>
                           </div>
                        </div>
                        <div class="front">                   
                           <div class="front-content">
                              <ul>
                                 <legend><h2>Temos Croquete nos<br>Sabores:</h2></legend>
                                 <br><br>
                                 <li>CARNE-MOÍDA<span onclick="croqueCarneMoida()"><i class="bi bi-info-circle"></i></span></li>
                              </ul>
                              <div class="row">
                                 <div class="col">
                                 </div>
                                 <div class="col-6">
                                    <button class="btn-shine">
                                       <span>SAIBA MAIS</span>
                                    </button>
                                 </div>
                                 <div class="col">                                   
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   
   <!--CARD QUE O USUÁRIO IRÁ ESCOLHER SE FARÁ A COMPRA OU ELE COLOCARÁ NA LISTA DE PEDIDOS-->
   <div class="products-preview">

      <!--COXINHA-->
      <div class="preview" data-target="p-1">
         <i class="bi bi-x-circle" id="teste"></i>
         <img src="https://i.ibb.co/PMdhgbK/COXINHA.jpg" alt="COXINHA">
         <h3>COXINHAS</h3>
         <div class="stars">
            <span>SABORES DE:</span>
         </div>
         
         <hr>

         <form id="orderForm" action="./PROCESS/user_processorderCox.php" method="post">
            <input type="hidden" name="flavor" value="Coxinha">
            <label for="product">Sabor:</label>
            <select id="product" name="product">
               <option value="Frango">Frango</option>
               <option value="Frango C/ Catupiry">Frango C/ Catupiry</option>
               <option value="Carne-Moída">Carne-Moída</option>
               <option value="Calabresa">Calabresa</option>
               <option value="Calabresa C/ Catupiry">Calabresa C/ Catupiry</option>
               <option value="Pernil">Pernil</option>
            </select>

            <br><br>
      
            <label for="quantityType">Deseja Comprar Por:</label>
            <br>
            <input type="radio" id="unidade" name="quantity_type" value="unit" checked>
            <label for="unidade">Unidades</label>
            <input type="radio" id="combo" name="quantity_type" value="combo">
            <label for="combo">Combos</label>

            <hr>
      
            <div id="unitQuantityContainer">
               <label for="unitQuantity">Deseja Quantas Unidades:</label>
               <br>
               <input type="number" class="unitQuantity1" id="unitQuantity" name="unit_quantity" min="1" value="1">
            </div>
      
            <div id="comboQuantityContainer" style="display: none;">
               <label for="comboQuantity">Qual Combo Deseja:</label>
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

            <hr>

            <a href="">DESEJO COMPRAR PARA FESTAS</a>
         <div class="price">R$<span id="finalPrice1">5,00</span> Reais</div>
         <div class="buttons">
            <button type="submit" onclick="return confirm('Pedido Realizado com Sucesso!');" class="cart">Fazer Pedido</button>
            <a href="./login.php" class="cart">Minha lista</a>
            <a href="./login.php" class="buy">Comprar</a>
         </div>
         </form>
         
      </div>

      <!--BOLINHO-->
      <div class="preview" data-target="p-2">
         <i class="bi bi-x-circle"></i>
         <img src="https://i.ibb.co/vxgCjj7/BOLINHOS.jpg" alt="BOLINHOS"> 
         <h3>BOLINHOS</h3>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>SABORES DE:</span>
         </div>

         <hr>

         <form id="orderForm" action="./PROCESS/user_processorderBol.php" method="post">
         <input type="hidden" name="flavor" value="Bolinho">
         <label for="product1">Sabor:</label>
         <select id="product1" name="product1">
             <option value="Presunto e Queijo">Presunto e Queijo</option>
             <option value="Carne-Moída">Carne-Moída</option>
             <option value="Ovo">Ovo</option>
             <option value="Bolinho de Queijo(APENAS QUEIJO)">Bolinho de Queijo(APENAS QUEIJO)</option>
         </select>

         <br><br>
   
         <label for="quantityType">Deseja Comprar Por:</label>
         <br>
         <input type="radio" id="unidade" name="quantity_type1" value="unit" checked>
         <label for="unidade">Unidades</label>
         <input type="radio" id="combo" name="quantity_type1" value="combo">
         <label for="combo">Combos</label>

         <hr>
   
         <div id="unitQuantityContainer1">
            <label for="unitQuantity">Quantas Unidades Deseja:</label>
            <input type="number" class="unitQuantity2" id="unitQuantity" name="unit_quantity1" min="1" value="1">
         </div>
   
         <div id="comboQuantityContainer1" style="display: none;">
            <label for="comboQuantity">Qual Combo Deseja:</label>
            <select id="comboQuantity" name="combo_quantity1">
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

         <hr>

         <a href="">DESEJO COMPRAR PARA FESTAS</a>
         <div class="price">R$<span id="finalPrice2">5,00</span> Reais</div>
         <div class="buttons">
            <button type="submit" onclick="return confirm('Pedido Realizado com Sucesso!');" class="cart">Fazer Pedido</button>
            <a href="./login.php" class="cart">Minha lista</a>
            <a href="./login.php" class="buy">Comprar</a>
         </div>
         </form>
      </div>

      <!--RISOLES-->
      <div class="preview" data-target="p-3">
         <i class="bi bi-x-circle" id="btnFecharThree"></i>
         <img src="https://i.ibb.co/H2yBQDW/RISOLES.jpg" alt="RISOLES">
         <h3>RISOLES</h3>
         <div class="stars">
            <span>SABORES DE:</span>
         </div>

         <hr>

         <form id="orderForm" action="./PROCESS/user_processorderRis.php" method="post">
         <input type="hidden" name="flavor" value="Risoles">
         <label for="product3">Sabor:</label>
         <select id="product3" name="product3">
            <option value="Presunto e Queijo">Presunto e Queijo</option>
             <option value="Carne-Moída">Carne-Moída</option>
             <option value="Calabresa">Calabresa</option>
             <option value="Calabresa C/ Catupiry">Calabresa C/ Catupiry</option>
         </select>

         <br><br>
   
         <label for="quantityType">Deseja Comprar Por:</label>
         <br>
         <input type="radio" id="unidade" name="quantity_type3" value="unit" checked>
         <label for="unidade">Unidades</label>
         <input type="radio" id="combo" name="quantity_type3" value="combo">
         <label for="combo">Combos</label>

         <hr>
   
         <div id="unitQuantityContainer3">
            <label for="unitQuantity">Quantas Unidades Deseja:</label>
            <input type="number" class="unitQuantity3" id="unitQuantity" name="unit_quantity3" min="1" value="1">
         </div>
   
         <div id="comboQuantityContainer3" style="display: none;">
            <label for="comboQuantity">Qual Combo Deseja:</label>
            <select id="comboQuantity" name="combo_quantity3">
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

         <hr>

         <a href="">DESEJO COMPRAR PARA FESTAS</a>
         <div class="price">R$<span id="finalPrice3">5,00</span> Reais</div>
         <div class="buttons">
            <button type="submit" onclick="return confirm('Pedido Realizado com Sucesso!');" class="cart">Fazer Pedido</button>
            <a href="./login.php" class="cart">Minha lista</a>
            <a href="./login.php" class="buy">Comprar</a>
         </div>
      </form>
      </div>

      <!--ESFIRRAS-->
      <div class="preview" data-target="p-4">
         <i class="bi bi-x-circle" id="btnFecharFour"></i>
         <img src="https://i.ibb.co/QjBZtTh/ESFIRRA.jpg" alt="ESFIRRA">
         <h3>ESFIRRAS</h3>
         <div class="stars">
            <span>SABORES DE:</span>
         </div>

         <hr>

         <form id="orderForm" action="./PROCESS/user_processorderEsf.php" method="post">
         <input type="hidden" name="flavor" value="Esfirra">
         <label for="product4">Sabor:</label>
         <select id="product4" name="product4">
             <option value="Frango">Frango</option>
             <option value="Frango C/ Catupiry">Frango C/ Catupiry</option>
             <option value="Calabresa">Calabresa</option>
             <option value="Calabresa C/ Catupiry">Calabresa C/ Catupiry</option>
             <option value="Carne-Moída">Carne-Moída</option>
         </select>

         <br><br>
   
         <label for="quantityType">Deseja Comprar Por:</label>
         <br>
         <input type="radio" id="unidade" name="quantity_type4" value="unit" checked>
         <label for="unidade">Unidades</label>
         <input type="radio" id="combo" name="quantity_type4" value="combo">
         <label for="combo">Combos</label>

         <hr>
   
         <div id="unitQuantityContainer4">
            <label for="unitQuantity">Quantas Unidades Deseja:</label>
            <input type="number" class="unitQuantity4" id="unitQuantity" name="unit_quantity4" min="1" value="1">
         </div>
   
         <div id="comboQuantityContainer4" style="display: none;">
            <label for="comboQuantity">Qual Combo Deseja:</label>
            <select id="comboQuantity" name="combo_quantity4">
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

         <hr>

         <a href="">DESEJO COMPRAR PARA FESTAS</a>
         <div class="price">R$<span id="finalPrice4">5,00</span> Reais</div>
         <div class="buttons">
            <button type="submit" onclick="return confirm('Pedido Realizado com Sucesso!');" class="cart">Fazer Pedido</button>
            <a href="./login.php" class="cart">Minha lista</a>
            <a href="./login.php" class="buy">Comprar</a>
         </div>
      </form>
      </div>

      <!--SALSICHAS-->
      <div class="preview" data-target="p-5">
         <i class="bi bi-x-circle" id="btnFecharFive"></i>
         <img src="https://i.ibb.co/8cs7j12/SALSICHA.jpg" alt="SALSICHA">
         <h3>SALSICHAS</h3>
         <div class="stars">
            <span>SABORES DE:</span>
         </div>

         <hr>

         <form id="orderForm" action="./PROCESS/user_processorderSal.php" method="post">
         <input type="hidden" name="flavor" value="Salsicha">
         <label for="product5">Sabor:</label>
         <select id="product5" name="product5">
             <option value="Salsicha Frita">Salsicha Frita</option>
         </select>

         <br><br>
   
         <label for="quantityType">Deseja Comprar Por:</label>
         <br>
         <input type="radio" id="unidade" name="quantity_type5" value="unit" checked>
         <label for="unidade">Unidades</label>
         <input type="radio" id="combo" name="quantity_type5" value="combo">
         <label for="combo">Combos</label>

         <hr>
   
         <div id="unitQuantityContainer5">
            <label for="unitQuantity">Quantas Unidades Deseja:</label>
            <input type="number" class="unitQuantity5" id="unitQuantity" name="unit_quantity5" min="1" value="1">
         </div>
   
         <div id="comboQuantityContainer5" style="display: none;">
            <label for="comboQuantity">Qual Combo Deseja:</label>
            <select id="comboQuantity" name="combo_quantity5">
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

         <hr>

         <a href="">DESEJO COMPRAR PARA FESTAS</a>
         <div class="price">R$<span id="finalPrice5">5,00</span> Reais</div>
         <div class="buttons">
            <button type="submit" onclick="return confirm('Pedido Realizado com Sucesso!');" class="cart">Fazer Pedido</button>
            <a href="./login.php" class="cart">Minha lista</a>
            <a href="./login.php" class="buy">Comprar</a>
         </div>
      </form>
      </div>

      <!--CROQUETES-->
      <div class="preview" data-target="p-6">
         <i class="bi bi-x-circle" id="btnFecharSix"></i>
         <img src="https://i.ibb.co/2cb3z5p/CROQUETE.jpg" alt="CROQUETE">
         <h3>CROQUETES</h3>
         <div class="stars">
            <span>SABORES DE:</span>
         </div>

         <hr>

         <form id="orderForm" action="./PROCESS/user_processorderCro.php" method="post">
         <input type="hidden" name="flavor" value="Croquete">
         <label for="product6">Sabor:</label>
         <select id="product6" name="product6">
         <option value="Croquete de Carne">Croquete de Carne</option>
         </select>

         <br><br>
   
         <label for="quantityType">Deseja Comprar Por:</label>
         <br>
         <input type="radio" id="unidade" name="quantity_type6" value="unit" checked>
         <label for="unidade">Unidades</label>
         <input type="radio" id="combo" name="quantity_type6" value="combo">
         <label for="combo">Combos</label>

         <hr>
   
         <div id="unitQuantityContainer6">
            <label for="unitQuantity">Quantas Unidades Deseja:</label>
            <input type="number" class="unitQuantity6" id="unitQuantity" name="unit_quantity6" min="1" value="1">
         </div>
   
         <div id="comboQuantityContainer6" style="display: none;">
            <label for="comboQuantity">Qual Combo Deseja:</label>
            <select id="comboQuantity" name="combo_quantity6">
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

         <hr>

         <a href="">DESEJO COMPRAR PARA FESTAS</a>
         <div class="price">R$<span id="finalPrice6">5,00</span> Reais</div>
         <div class="buttons">
            <button type="submit" onclick="return confirm('Pedido Realizado com Sucesso!');" class="cart">Fazer Pedido</button>
            <a href="./login.php" class="cart">Minha lista</a>
            <a href="./login.php" class="buy">Comprar</a>
         </div>
         </form>
      </div>
   </div>

</main>

<!-- <aside>
	Aside
</aside> -->

<footer>
	Footer
</footer>


<div class="botaoDesactive">
   <div class="botaoMais">
       <input type="checkbox" id="toogle" class="hidden-trigger">
       <label for="toogle" class="circle">
           <svg class="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="48" height="48" xml:space="preserve" version="1.1" viewBox="0 0 48 48">
               <image width="48" height="48" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAQAAAD9CzEMAAAAbElEQVR4Ae3XwQnFQAiE4eVVsGAP1mkPFjwvQvYSWCQYCYGZv4Dv5MGB5ghcIiDQI+kCftCzNsAR8y5gYu2rwCBAgMBTgEC3rek2yQEtAZoDjso8AyaKexmIDJUZD40AAQIE0gwx449GgMC9/t0b7GTsa7J+AAAAAElFTkSuQmCC">
               </image>
           </svg>
       </label>
       
       <div class="subs">
         <button class="sub-circle">
           <input value="1" name="sub-circle" type="radio" id="sub1" class="hidden-sub-trigger">
           <a href="" onclick="modeDark(); return false;">
               <i title="Modo Escuro" class="bi bi-brightness-high" id="sol"></i>
               <i title="Modo Claro" class="bi bi-moon-stars" id="lua"></i>
           </a>
         </button>
         <button class="sub-circle">
           <input value="1" name="sub-circle" type="radio" id="sub2" class="hidden-sub-trigger">
           <a href="" onclick="modeNebulus(); return false;">
               <i title="Retirar Acessibilidade" class="bi bi-eye-slash" id="olhoFechado"></i>
               <i title="Acessibilidade" class="bi bi-eye" id="olhoAberto"></i>
           </a>
         </button>
         <button class="sub-circle">
           <input value="1" name="sub-circle" type="radio" id="sub3" class="hidden-sub-trigger">
           <a href="">
               <i class="bi bi-ban"></i>
           </a>
         </button>
         <button class="sub-circle">
           <input value="1" name="sub-circle" type="radio" id="sub4" class="hidden-sub-trigger">
           <a href="">
            <i class="bi bi-check-circle"></i>
           </a>
         </button>
         <button class="sub-circle">
           <input value="1" name="sub-circle" type="radio" id="sub5" class="hidden-sub-trigger">
           <a href="">
            <i class="bi bi-check-circle"></i>
           </a>
         </button>
         <button class="sub-circle">
           <input value="1" name="sub-circle" type="radio" id="sub6" class="hidden-sub-trigger">
           <a href="">
               <i class="bi bi-zoom-in"></i>
           </a>
         </button>
         <button class="sub-circle">
           <input value="1" name="sub-circle" type="radio" id="sub7" class="hidden-sub-trigger">
           <a href="">
               <i class="bi bi-zoom-out"></i>
           </a>
         </button>
         <button class="sub-circle">
           <input value="1" name="sub-circle" type="radio" id="sub8" class="hidden-sub-trigger">
           <a href="">
               <i class="bi bi-journal-plus"></i>
           </a>
         </button>
       </div>
   </div>
</div>

	<!--JAVASCRIPT-->
   <!-- <script src="./JS/drop.js"></script> -->
   <script src="./JS/animacao.js"></script>
   <script src="./JS/mobile.js"></script>
	<script src="./JS/hover.js"></script><!--"HOVER" DE ADD LISTA-->
   <script src="./JS/imgOnliOff.js"></script><!--IMAGEM ONLINE E OFFILINE-->
   <script src="./JS/responsive.js"></script> <!--MENU BURGUER-->
   <script src="./JS/alertas.js"></script><!-- SCRIPT DOS ALERTAS PERSONALIZADOS E TAMBÉM PARA QUANDO-->
   <script src="./JS/process.js"></script><!--É PARA A FUNCIONALIDADE DO RADIO BUTON NA ESCOLHA PARA ADICIONAR A LISTA-->

	<!--JAVASCRIPT BOODSTRAP-->
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

   <!--JAVASCRIPT CLOUDFLARE;JQUERY-->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

</body> 
</html>