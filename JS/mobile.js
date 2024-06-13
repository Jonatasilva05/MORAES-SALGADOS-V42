// const html = document.documentElement
// const aside = document.getElementById("aside");
// const header = document.getElementById("header");

// function minhaFuncao() {
//     // Verifica se a largura da tela é menor que 1000 pixels
//     if (window.innerWidth < 1000) {
//         // Coloque o código que você deseja executar aqui
//         html.classList.add('light')
//         header.style.display =  'none'
//         aside.style.display = 'flex'
//     }
//     else{
//         html.classList.remove('light')
//         header.style.display = 'flex'
//         aside.style.display = 'none'
//     }
// }
// // Adiciona um ouvinte de evento para o redimensionamento da tela
// window.addEventListener('resize', minhaFuncao);



/*FAZ O CONTAINER-TEXT (O CARD QUE TEM O EFEITO TRANSLATIVO EM VOLTA) SUMIR E O GIRD FEITO A MÃO ORIGINAL APARECER*/
const container = document.querySelector(".container");
const row = document.querySelector(".container.text-center");

function mobile() {

    // Verifica a largura da tela
    var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

    // quando for menor que 992 ativa a função
    if (screenWidth < 992) {
        container.style.display = 'inline-block';
        row.style.display = 'none';
    } else {
        container.style.display = 'none'; 
        row.style.display = 'flex';  
    }
}

// Chama a função quando a página é carregada
window.addEventListener('load', mobile);
window.addEventListener('resize', mobile);