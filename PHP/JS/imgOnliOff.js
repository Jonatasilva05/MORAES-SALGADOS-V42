//ADICIONA QUANDO ESTÁ CONECTADO A INTERNET AS IMAGENS ONLINE
function adicionarImagemLocal() {
    const LOGO = document.getElementsByClassName("imagemLogo");
    const COXINHA = document.getElementsByClassName("imagemCoxinha");
    const BOLINHO = document.getElementsByClassName("imagemBolinho");
    const CROQUETE = document.getElementsByClassName("imagemCroquete");
    const ESFIRRA = document.getElementsByClassName("imagemEsfirra");
    const RISOLES = document.getElementsByClassName("imagemRisoles");
    const SALSICHA = document.getElementsByClassName("imagemSalsicha");

    LOGO.src = "https://i.ibb.co/7yqctDq/LOGO-HEADER.jpg";
    COXINHA.src = "https://i.ibb.co/PMdhgbK/COXINHA.jpg";
    BOLINHO.src = "https://i.ibb.co/vxgCjj7/BOLINHOS.jpg";
    CROQUETE.src = "https://i.ibb.co/2cb3z5p/CROQUETE.jpg";
    ESFIRRA.src = "https://i.ibb.co/QjBZtTh/ESFIRRA.jpg";
    RISOLES.src = "https://i.ibb.co/H2yBQDW/RISOLES.jpg";
    SALSICHA.src = "https://i.ibb.co/8cs7j12/SALSICHA.jpg";

}

//REMOVE AS IMAGENS ONLINE E COLOCA AS LOCAIS SE CASO NÃO CONECTADO A INTERNET
function removerImagemLocal() {
    const LOGO = document.getElementsByClassName("imagemLogo");
    const COXINHA = document.getElementsByClassName("imagemCoxinha");
    const BOLINHO = document.getElementsByClassName("imagemBolinho");
    const CROQUETE = document.getElementsByClassName("imagemCroquete");
    const ESFIRRA = document.getElementsByClassName("imagemEsfirra");
    const RISOLES = document.getElementsByClassName("imagemRisoles");
    const SALSICHA = document.getElementsByClassName("imagemSalsicha");

    LOGO.src = "../IMGs/LOGOS/LOGO-HEADER.jpg";
    COXINHA.src = "../IMGs/SALGADOS/COXINHA.jpg";
    BOLINHO.src = "../IMGs/SALGADOS/BOLINHOS.jpeg";
    CROQUETE.src = "../IMGs/SALGADOS/CROQUETE.jpeg";
    ESFIRRA.src = "../IMGs/SALGADOS/ESFIRRA.jpeg";
    RISOLES.src = "../IMGs/SALGADOS/RISOLES.jpeg";
    SALSICHA.src = "../IMGs/SALGADOS/SALSICHA.jpeg";
}

function verificarConexao() {
if (navigator.onLine) {
adicionarImagemLocal();
console.log("Conectado a Internet");
} else {
removerImagemLocal();
console.log("Falha na conexão à Internet");
}
}

// Chama a função ao carregar a página
window.onload = verificarConexao;

// Adiciona um ouvinte de eventos para verificar alterações na conexão
window.addEventListener('online', function() {
console.log('Conectado à Internet');
});

window.addEventListener('offline', function() {
console.log('Falha na conexão à Internet');
});