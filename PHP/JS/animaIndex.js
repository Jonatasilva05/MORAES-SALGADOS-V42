document.addEventListener('DOMContentLoaded', function() {
    const animatedBox = document.querySelector('.background8');
    const animationShown = localStorage.getItem('animationShown');

    if (animationShown) {
        window.location.href = './user_index.php';
    } else {
        animatedBox.style.display = 'block'; // Exibe a animação

        animatedBox.addEventListener('animationend', function() {
            localStorage.setItem('animationShown', 'true');
            window.location.href = './user_index.php';
        });
    }
});
