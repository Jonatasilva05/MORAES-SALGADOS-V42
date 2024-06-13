let preveiwContainer = document.querySelector('.products-preview');
let previewBox = preveiwContainer.querySelectorAll('.preview');

//FUNÇÃO QUE ATIVA O "HOVER PARA A COMPRA FINAL DO PRODUTO" QUANDO ESTA NO CARD ORIGINAL NORMAL
document.querySelectorAll('.products-container .product').forEach(product =>{
  product.onclick = () =>{
    preveiwContainer.style.display = 'flex';
    let name = product.getAttribute('data-name');
    previewBox.forEach(preview =>{
      let target = preview.getAttribute('data-target');
      if(name == target){
        preview.classList.add('active');
      }
    });
  };
});

//FUNÇÃO QUE ATIVA O "HOVER PARA A COMPRA FINAL DO PRODUTO" QUANDO ESTA NO CARD DE EFEITO DE TRANSLAÇÃO
document.querySelectorAll('.container.text-center .col').forEach(product =>{
  product.onclick = () =>{
    preveiwContainer.style.display = 'flex';
    let name = product.getAttribute('data-name');
    previewBox.forEach(preview =>{
      let target = preview.getAttribute('data-target');
      if(name == target){
        preview.classList.add('active');
      }
    });
  };
});


previewBox.forEach(close =>{
  close.querySelector('.bi.bi-x-circle').onclick = () =>{
    close.classList.remove('active');
    preveiwContainer.style.display = 'none';
  };
});





















// const a = document.querySelector('.cart')
// a.addEventListener('click', () => {
//   alert('Adicionado a lista com sucesso');
// })

// function addSuces() {
//   if(a == 'click'){
//     alert("Adicionado com sucesso a lista");
//   }
// }