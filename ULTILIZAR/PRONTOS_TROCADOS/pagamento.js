var formSignin = document.querySelector('#penden')
var formSignup = document.querySelector('#pagos')
var formTestar = document.querySelector('#testar')
var btnColor = document.querySelector('.btnColor')

document.querySelector('#btnpende')
  .addEventListener('click', () => {
    formSignin.style.left = "25px"
    formSignup.style.left = "5000px"
    formTestar.style.left = "5000px"
    btnColor.style.left = "0px"
})

document.querySelector('#btnpagos')
  .addEventListener('click', () => {
    formSignin.style.left = "-5000px"
    formSignup.style.left = "25px"
    formTestar.style.left = "5000px"
    btnColor.style.left = "135px"
})

document.querySelector('#btnteste')
  .addEventListener('click', () => {
    formSignin.style.left = "-5000px"
    formSignup.style.left = "-5000px"
    formTestar.style.left = "25px"
    btnColor.style.left = "272.7px"
})


function changeColor(button) {
  var buttons = document.querySelectorAll('.btnForm');
  buttons.forEach(function(btn) {
      btn.classList.remove('selected');
  });
  button.classList.add('selected');
}