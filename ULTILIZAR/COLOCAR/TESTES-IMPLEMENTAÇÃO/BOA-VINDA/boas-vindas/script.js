document.addEventListener("DOMContentLoaded", function () {
    var animatedElement = document.querySelector('.animated-element');
  
    // Adiciona um ouvinte de animação para detectar o final da animação
    animatedElement.addEventListener('animationend', function () {
      redirectToHomePage();
    });
  
    function redirectToHomePage() {
      window.location.href = "../index.html";
    }
  });
  


// document.addEventListener("DOMContentLoaded", function () {
//     var animatedElement = document.querySelector('.animated-element');
  
//     window.addEventListener('scroll', function () {
//       // Obtém a posição do topo do elemento em relação ao topo da janela
//       var elementPosition = animatedElement.getBoundingClientRect().top;
  
//       // Obtém a altura da janela de visualização
//       var windowHeight = window.innerHeight;
  
//       // Define a porcentagem da altura da janela de visualização em que a animação deve ser ativada
//       var activationPercentage = 0.7;
  
//       // Calcula a posição de ativação da animação
//       var activationPoint = windowHeight * activationPercentage;
  
//       // Verifica se a posição do elemento é menor que a posição de ativação
//       if (elementPosition < activationPoint) {
//         animatedElement.style.opacity = 1; // Torna o elemento visível
//       } else {
//         animatedElement.style.opacity = 0; // Torna o elemento invisível
//       }
//     });
//   });
  