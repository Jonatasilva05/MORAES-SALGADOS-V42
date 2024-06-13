const cards = document.querySelector(".contentMenu.delay1.animate__animated.animate__backInDown");
const cards1 = document.querySelector(".contentMenu.delay2.animate__animated.animate__backInDown");
const cards2 = document.querySelector(".contentMenu.delay3.animate__animated.animate__backInDown");
const cards3 = document.querySelector(".contentMenu.delay4.animate__animated.animate__backInDown");
const cards4 = document.querySelector(".contentMenu.delay5.animate__animated.animate__backInDown");
const cards5 = document.querySelector(".contentMenu.delay6.animate__animated.animate__backInDown");
const checkHeader = document.querySelector("#checkHeader");
const confereHeader = document.querySelector("#confereHeader");

function desactive() {
        if(cards.classList.contains("nopHover")){
                checkHeader.style.display = 'block';
                confereHeader.style.display = 'none';
                cards.classList.remove('nopHover');
                cards1.classList.remove('nopHover');
                cards2.classList.remove('nopHover');
                cards3.classList.remove('nopHover');
                cards4.classList.remove('nopHover');
                cards5.classList.remove('nopHover');
        }
        else
        {
                checkHeader.style.display = 'none';
                confereHeader.style.display = 'block';
                cards.classList.add('nopHover');
                cards1.classList.add('nopHover');
                cards2.classList.add('nopHover');
                cards3.classList.add('nopHover');
                cards4.classList.add('nopHover');
                cards5.classList.add('nopHover');
        }
}





const body = document.body;
const lua = document.querySelector("#lua");
const sol = document.querySelector("#sol");

function modeDark(){
        const html = document.documentElement
        html.classList.toggle('darck')
    
        if(html.classList.contains('darck')) {
                sol.style.display = 'none';
                lua.style.display = 'block'
        }
        else
        {
                lua.style.display = 'none';
                sol.style.display = 'block';
        }
    }





const olhoAbert = document.querySelector("#olhoFechado");
const olhoFecha = document.querySelector("#olhoAberto");
const oneCoxa = document.getElementById("oneCoxa");
const oneBol = document.getElementById("oneBol");
const oneRisol = document.getElementById("oneRisol");
const oneEsfir = document.getElementById("oneEsfir");
const oneSals = document.getElementById("oneSals");
const oneCroque = document.getElementById("oneCroque");
const subOneCoxa = document.getElementById("subOneCoxa");
const subOneBol = document.getElementById("subOneBol");
const oneSubRisol = document.getElementById("oneSubRisol");
const subOneEsfir = document.getElementById("subOneEsfir");
const subOneSals = document.getElementById("subOneSals");
const subOneCroque = document.getElementById("subOneCroque");
const logoNeutro = document.getElementById("logoNeutro");
const logoNormal = document.getElementById("logoNormal");

function modeNebulus(){
        if(body.classList.contains("acessible")){
                body.classList.remove('acessible');
                olhoAbert.style.display = 'none';
                olhoFecha.style.display = 'block';
                logoNeutro.style.display = 'none';
                logoNormal.style.display = 'inline-flex';


                oneCoxa.style.display = 'inline-flex';
                oneBol.style.display = 'inline-flex';
                oneRisol.style.display = 'inline-flex';
                oneEsfir.style.display = 'inline-flex';
                oneSals.style.display = 'inline-flex';
                oneCroque.style.display = 'inline-flex';
                subOneCoxa.style.display = 'none';
                subOneBol.style.display = 'none';
                oneSubRisol.style.display = 'none';
                subOneEsfir.style.display = 'none';
                subOneSals.style.display = 'none';
                subOneCroque.style.display = 'none';
                
        }
        else{
                body.classList.add('acessible');
                olhoFecha.style.display = 'none';
                olhoAbert.style.display = 'block';
                logoNeutro.style.display = 'inline-flex';
                logoNormal.style.display = 'none';

                oneCoxa.style.display = 'none';
                oneBol.style.display = 'none';
                oneRisol.style.display = 'none';
                oneEsfir.style.display = 'none';
                oneSals.style.display = 'none';
                oneCroque.style.display = 'none';
                subOneCoxa.style.display = 'inline-flex';
                subOneBol.style.display = 'inline-flex';
                oneSubRisol.style.display = 'inline-flex';
                subOneEsfir.style.display = 'inline-flex';
                subOneSals.style.display = 'inline-flex';
                subOneCroque.style.display = 'inline-flex';                
        }
}