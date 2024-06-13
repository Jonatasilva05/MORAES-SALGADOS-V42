<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
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
    <link rel="stylesheet" type="text/css" href="./CSS/style.css">
    <link rel="stylesheet" type="text/css" href="./CSS/sobre.css">

    <!--IMAGEM ABA-->
    <link rel="icon" href="./IMGs/LOGOS/ICONE_MS_ABA_32.ico" type="image/x-icon">

    <title>Sobre o  Moraes Salgados</title>

</head>
<body>

<header id="header">
	<a href="./index.php" id="logo">
      <img class="imagemLogo" src="https://i.ibb.co/7yqctDq/LOGO-HEADER.jpg" id="logoNormal" alt="logo da empresa(coxinha em cima de um livro de receitas)">
      <img src="./IMGs/NEUTRO/LOGO-HEADER.jpg" id="logoNeutro" alt="LOGO NO MODO ACESSIVEL">
   </a>
	<button id="openMenu" onclick="abrir()">&#9776;</button>
	<nav id="menu">
		<button id="closeMenu">X</button>
		<a href="./index.php">Inicio</a>
		<a href="./sobre.php">Sobre</a>
		<a href="./contato.html">Contato</a>
        <a href="./login.php" class="loginBtn">Login</a>
	</nav>
</header>


<div class="videoBackground">
    <video id="video-background" autoplay loop muted class="videos">
        <source src="./IMGs/VIDEOS/VDOSOBRECOMPAC.mp4" type="video/mp4">
    </video>
</div>


<main id="main">

      <div class="container text-center">
        <div class="row">
          <div class="col">
          </div>
          <div class="col">
            <div id="containerProfile">
                <div id="contProfile">
                    <div class="cardProfile" data-state="#about">
                        <div class="card-header">
                            <div class="card-cover" style="background-image: url('https://images.unsplash.com/photo-1549068106-b024baf5062d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=934&q=80')"></div>
                            <img class="card-avatar" src="./IMGs/PRODUCAO/img2.jpg" alt="avatar" />
                            <h1 class="card-fullname">Fabiana Silva</h1>
                            <h2 class="card-jobtitle">Salgadeira</h2>
                        </div>
        
                        <div class="card-main">
                            <div class="card-section is-active" id="about">
                                    <div class="card-content">
                                    <div class="card-subtitle">Sobre mim</div>
                                    <p class="card-desc">Nasci em 1986, Sou casada, tenho 3 filhos e sou dona de uma micro-empresa no ramo alimenticío de salgados atualmente conhecida como MORAES SALGADOS, em minha juventude migrei para está área com o intuíto de ter uma condição fianceira melhor, mas acabei me apaixonando pelo que faço. Com 12 anos fui trabalhar para uma empresa de salgados que tinha seu estabelecimento localizado numa feira em Taquaritinga-SP, Aos 18 casei e sai da empresa, em seguida fiquei parada durante 1 ano, retornei a exercer a profição por via de terceiros durante 3 anos, logo em seguida desejei a trabalhar de forma autônoma, Onde fundei minha micro-empresa que estou atualmente. 
                                    </p>
                                    </div>
                                <div class="card-social">
                                <a href="#"><svg class="face" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.997 3.985h2.191V.169C17.81.117 16.51 0 14.996 0c-3.159 0-5.323 1.987-5.323 5.639V9H6.187v4.266h3.486V24h4.274V13.267h3.345l.531-4.266h-3.877V6.062c.001-1.233.333-2.077 2.051-2.077z"/></svg>
                                </a>
                                <!--COLOCAR A LOGO DO WHATSAPP NO LOCAL DO TWITER-->
                                <a href="#"><svg class="twit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M512 97.248c-19.04 8.352-39.328 13.888-60.48 16.576 21.76-12.992 38.368-33.408 46.176-58.016-20.288 12.096-42.688 20.64-66.56 25.408C411.872 60.704 384.416 48 354.464 48c-58.112 0-104.896 47.168-104.896 104.992 0 8.32.704 16.32 2.432 23.936-87.264-4.256-164.48-46.08-216.352-109.792-9.056 15.712-14.368 33.696-14.368 53.056 0 36.352 18.72 68.576 46.624 87.232-16.864-.32-33.408-5.216-47.424-12.928v1.152c0 51.008 36.384 93.376 84.096 103.136-8.544 2.336-17.856 3.456-27.52 3.456-6.72 0-13.504-.384-19.872-1.792 13.6 41.568 52.192 72.128 98.08 73.12-35.712 27.936-81.056 44.768-130.144 44.768-8.608 0-16.864-.384-25.12-1.44C46.496 446.88 101.6 464 161.024 464c193.152 0 298.752-160 298.752-298.688 0-4.64-.16-9.12-.384-13.568 20.832-14.784 38.336-33.248 52.608-54.496z" /></svg>
                                </a>
                                <a href="#"><svg class="insta" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M301 256c0 24.852-20.148 45-45 45s-45-20.148-45-45 20.148-45 45-45 45 20.148 45 45zm0 0" />
                                    <path d="M332 120H180c-33.086 0-60 26.914-60 60v152c0 33.086 26.914 60 60 60h152c33.086 0 60-26.914 60-60V180c0-33.086-26.914-60-60-60zm-76 211c-41.355 0-75-33.645-75-75s33.645-75 75-75 75 33.645 75 75-33.645 75-75 75zm86-146c-8.285 0-15-6.715-15-15s6.715-15 15-15 15 6.715 15 15-6.715 15-15 15zm0 0" />
                                    <path d="M377 0H135C60.562 0 0 60.563 0 135v242c0 74.438 60.563 135 135 135h242c74.438 0 135-60.563 135-135V135C512 60.562 451.437 0 377 0zm45 332c0 49.625-40.375 90-90 90H180c-49.625 0-90-40.375-90-90V180c0-49.625 40.375-90 90-90h152c49.625 0 90 40.375 90 90zm0 0" /></svg>
                                </a>
                                <a href="#"><svg class="link" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M23.994 24v-.001H24v-8.802c0-4.306-.927-7.623-5.961-7.623-2.42 0-4.044 1.328-4.707 2.587h-.07V7.976H8.489v16.023h4.97v-7.934c0-2.089.396-4.109 2.983-4.109 2.549 0 2.587 2.384 2.587 4.243V24zM.396 7.977h4.976V24H.396zM2.882 0C1.291 0 0 1.291 0 2.882s1.291 2.909 2.882 2.909 2.882-1.318 2.882-2.909A2.884 2.884 0 002.882 0z" /></svg>
                                </a>
                                </div>
                        </div>
                        <div class="card-section" id="experience">
                                <div class="card-content">
                                <div class="card-subtitle">MINHA CARREIRA</div>
                                    <div class="card-timeline">
                                            <div class="card-item" data-year="1998">
                                            <div class="card-item-title">Comecei a minha jornada como <span>salgadeira</span></div>
                                            <div class="card-item-desc">Que era localizada numa feira perto da minha residência</div>
                                            </div>
                                <div class="card-item" data-year="2004">
                                    <div class="card-item-title">Casei e sai da <span>empresa</span>
                                    </div>
                                    <div class="card-item-desc">Fiquei 1 ano sem exercer a profissão
                                    </div>
                                </div>
                                <div class="card-item" data-year="2005">
                                    <div class="card-item-title">Voltei a trabalhar por vias de <span>terceiros</span>
                                    </div>
                                    <div class="card-item-desc">Trabalhei durante 3 anos
                                    </div>
                                </div>
                                <div class="card-item" data-year="2008">
                                    <div class="card-item-title">Comecei a trabalhar por forma autônoma com vendas de <span>salgados e pães</span>
                                    </div>
                                    <div class="card-item-desc">Onde fundei a minha empresa
                                    </div>
                                </div>
                                <div class="card-item" data-year="2014">
                                    <div class="card-item-title">Nomeei a empresa para <span>Canaã Salgados e Pães</span>
                                    </div>
                                    <div class="card-item-desc">Fiquei 8 anos com o nome
                                    </div>
                                </div>
                                <div class="card-item" data-year="2022">
                                    <div class="card-item-title">Renomeei a empresa para <span>Moraes Salgados</span>
                                    </div>
                                    <div class="card-item-desc">Como é conhecida atualmente
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="card-section" id="contact">
                            <div class="card-content">
                                <div class="card-subtitle">MEIOS DE CONTATO</div>
                                    <div class="card-contact-wrapper">
                                        <div class="card-contact" title="Minha Localização">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" />
                                            <circle cx="12" cy="10" r="3"/></svg>
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3714.059121986421!2d-48.51906355487841!3d-21.42692103088831!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94b93a2b2e98cf03%3A0x44968ad84f198d67!2sR.%20Alderico%20Bussadori%20Filho%2C%20206%20-%20Jardim%20Maria%20Luiza%20I%2C%20Taquaritinga%20-%20SP%2C%2015906-838!5e0!3m2!1spt-BR!2sbr!4v1716835405038!5m2!1spt-BR!2sbr" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                            </iframe>
                                        </div>
                                        <div class="card-contact" title="Clique aqui para iniciar uma conversa no Whatsapp">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z" /></svg><a href="https://wa.me/5516997218972" class="whatsapp-button" target="_blank" title="">(16)99721-8972</a>
                                        </div>
                                        <div class="card-contact">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                            <path d="M22 6l-10 7L2 6" /></svg>
                                            <a target="_blank" href="mailto:jonatasmoraes05@gmail.com" class="email-button">Contato por E-mail</a>
                                        </div>
                                            <a href="https://wa.me/5516997218972" class="whatsapp-button" target="_blank" title="">
                                                <button class="contact-me">ENTRE EM CONTATO</button>
                                            </a>
                                    </div>
                                </div>
                        </div>
                            <div class="card-buttons">
                                <button data-section="#about" class="is-active">SOBRE</button>
                                <button data-section="#experience">EXPERIENCIAS</button>
                                <button data-section="#contact">CONTATO</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="col">
          </div>
        </div>
      </div>
</main>
    
<!-- <aside>
    Aside
</aside> -->

<footer>
    Footer
</footer>

</body> 
    <!--JAVASCRIPT-->
    <script src="./JS/sobre.js"></script>    
    <script src="./JS/animacao.js"></script>
    <script src="./JS/mobile.js"></script>
    <script src="./JS/hover.js"></script><!--"HOVER" DE ADD LISTA-->
    <script src="./JS/responsive.js"></script> <!--MENU BURGUER-->

    <!--JAVASCRIPT BOODSTRAP-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!--JAVASCRIPT CLOUDFLARE;JQUERY-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</html>