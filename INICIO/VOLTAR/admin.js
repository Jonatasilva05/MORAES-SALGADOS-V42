const text = "Seja Bem-vindo adm...";
const loadingTextElement = document.getElementById("loading-text");
let index = 0;

function showLoadingText() {
    loadingTextElement.textContent = text.slice(0, index);

    index++;
    if (index > text.length) {
        index = 0;
    }
}

setInterval(showLoadingText, 200);