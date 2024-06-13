const wrapper = document.querySelector('.wrapper');

function entrarbtn() {
    wrapper.classList.add('animate-signUp');
    wrapper.classList.remove('animate-signIn');
}

function cadastrarbtn() {
    wrapper.classList.add('animate-signIn');
    wrapper.classList.remove('animate-signUp');
}

// const signUpLink = document.querySelector('.cadastrarBtn');
// const signInLink = document.querySelector('.entrarBtn');

// signUpLink.addEventListener('click', () => {
//     wrapper.classList.add('animate-signIn');
//     wrapper.classList.remove('animate-signUp');
// });

// signInLink.addEventListener('click', () => {
//     wrapper.classList.add('animate-signUp');
//     wrapper.classList.remove('animate-signIn');
// });