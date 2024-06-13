var formSignin = document.querySelector('#penden')
var formSignup = document.querySelector('#pagos')
var btnColor = document.querySelector('.btnColor')

document.querySelector('#btnpende')
  .addEventListener('click', () => {
    formSignin.style.left = "25px"
    formSignup.style.left = "5000px"
    btnColor.style.left = "0px"
})

document.querySelector('#btnpagos')
  .addEventListener('click', () => {
    formSignin.style.left = "-5000px"
    formSignup.style.left = "25px"
    btnColor.style.left = "120px"
})