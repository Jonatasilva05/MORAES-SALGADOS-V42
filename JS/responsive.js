//RESPONSIVIDADE DO CORPO DA PAGINA
const mainNone = document.getElementById('main');

openMenu.addEventListener('click', () => {
	
	menu.style.display = "flex"
	mainNone.style.display = "none"
	menu.style.right = (menu.offsetWidth * -1) + 'px'

	setTimeout(()=> {
		menu.style.opacity = '1'
		menu.style.right = "0"
		openMenu.style.display = 'none'
	}, 10);
})

closeMenu.addEventListener('click', () => {
	menu.style.opacity = '0'
	mainNone.style.display = "flex"
	menu.style.right = (menu.offsetWidth * -1) + 'px'

	setTimeout(()=> {
		menu.removeAttribute('style')
		openMenu.removeAttribute('style')
	}, 200);
})