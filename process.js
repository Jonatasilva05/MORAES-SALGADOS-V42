document.querySelectorAll('input[name="quantity_type"]').forEach(function(element) {
    element.addEventListener('change', function() {
        var unitQuantityContainer = document.getElementById('unitQuantityContainer');
        var comboQuantityContainer = document.getElementById('comboQuantityContainer');
        if (this.value === 'combo') {
            unitQuantityContainer.style.display = 'none';
            comboQuantityContainer.style.display = 'block';
            updateComboPrice();
        } else {
            unitQuantityContainer.style.display = 'block';
            comboQuantityContainer.style.display = 'none';
            updateUnitPrice();
        }
    });
});

document.querySelector('.unitQuantity1').addEventListener('input', function() {
    updateUnitPrice();
});

document.getElementById('comboQuantity').addEventListener('change', function() {
    updateComboPrice();
});

function updateUnitPrice() {
    var unitQuantity1 = parseInt(document.querySelector('.unitQuantity1').value);
    var finalPrice1 = unitQuantity1 * 5;
    document.getElementById('finalPrice1').textContent = finalPrice1.toFixed(2);
}

function updateComboPrice() {
    var comboQuantity = parseInt(document.getElementById('comboQuantity').value);
    var finalPrice1= comboQuantity + 30;
    document.getElementById('finalPrice1').textContent = finalPrice1.toFixed(2);
}


document.addEventListener('DOMContentLoaded', function() {
    updateUnitPrice();
});










document.querySelectorAll('input[name="quantity_type1"]').forEach(function(element) {
    element.addEventListener('change', function() {
        var unitQuantityContainer1 = document.getElementById('unitQuantityContainer1');
        var comboQuantityContainer1 = document.getElementById('comboQuantityContainer1');
        if (this.value === 'combo') {
            unitQuantityContainer1.style.display = 'none';
            comboQuantityContainer1.style.display = 'block';
            updateComboPrice1();
        } else {
            unitQuantityContainer1.style.display = 'block';
            comboQuantityContainer1.style.display = 'none';
            updateUnitPrice1();
        }
    });
});

document.querySelector('.unitQuantity2').addEventListener('input', function() {
    updateUnitPrice1();
});

document.getElementById('comboQuantity2').addEventListener('change', function() {
    updateComboPrice1();
});

function updateUnitPrice1() {
    var unitQuantity2 = parseInt(document.querySelector('.unitQuantity2').value);
    var finalPrice2 = unitQuantity2 * 5;
    document.getElementById('finalPrice2').textContent = finalPrice2.toFixed(2);
}

function updateComboPrice1() {
    var comboQuantity2 = parseInt(document.getElementById('comboQuantity2').value);
    var finalPrice2= comboQuantity2 + 30;
    document.getElementById('finalPrice2').textContent = finalPrice2.toFixed(2);
}


document.addEventListener('DOMContentLoaded', function() {
    updateUnitPrice1();
});










document.querySelectorAll('input[name="quantity_type3"]').forEach(function(element) {
    element.addEventListener('change', function() {
        var unitQuantityContainer3 = document.getElementById('unitQuantityContainer3');
        var comboQuantityContainer3 = document.getElementById('comboQuantityContainer3');
        if (this.value === 'combo') {
            unitQuantityContainer3.style.display = 'none';
            comboQuantityContainer3.style.display = 'block';
            updateComboPrice3();
        } else {
            unitQuantityContainer3.style.display = 'block';
            comboQuantityContainer3.style.display = 'none';
            updateUnitPrice3();
        }
    });
});

document.querySelector('.unitQuantity3').addEventListener('input', function() {
    updateUnitPrice3();
});

document.getElementById('comboQuantity3').addEventListener('change', function() {
    updateComboPrice3();
});

function updateUnitPrice3() {
    var unitQuantity3 = parseInt(document.querySelector('.unitQuantity3').value);
    var finalPrice3 = unitQuantity3 * 5;
    document.getElementById('finalPrice3').textContent = finalPrice3.toFixed(2);
}

function updateComboPrice3() {
    var comboQuantity3 = parseInt(document.getElementById('comboQuantity3').value);
    var finalPrice3= comboQuantity3 + 30;
    document.getElementById('finalPrice3').textContent = finalPrice3.toFixed(2);
}


document.addEventListener('DOMContentLoaded', function() {
    updateUnitPrice3();
});










document.querySelectorAll('input[name="quantity_type4"]').forEach(function(element) {
    element.addEventListener('change', function() {
        var unitQuantityContainer4 = document.getElementById('unitQuantityContainer4');
        var comboQuantityContainer4 = document.getElementById('comboQuantityContainer4');
        if (this.value === 'combo') {
            unitQuantityContainer4.style.display = 'none';
            comboQuantityContainer4.style.display = 'block';
            updateComboPrice4();
        } else {
            unitQuantityContainer4.style.display = 'block';
            comboQuantityContainer4.style.display = 'none';
            updateUnitPrice4();
        }
    });
});

document.querySelector('.unitQuantity4').addEventListener('input', function() {
    updateUnitPrice4();
});

document.getElementById('comboQuantity4').addEventListener('change', function() {
    updateComboPrice4();
});

function updateUnitPrice4() {
    var unitQuantity4 = parseInt(document.querySelector('.unitQuantity4').value);
    var finalPrice4 = unitQuantity4 * 5;
    document.getElementById('finalPrice4').textContent = finalPrice4.toFixed(2);
}

function updateComboPrice4() {
    var comboQuantity4 = parseInt(document.getElementById('comboQuantity4').value);
    var finalPrice4= comboQuantity4 + 30;
    document.getElementById('finalPrice4').textContent = finalPrice4.toFixed(2);
}


document.addEventListener('DOMContentLoaded', function() {
    updateUnitPrice4();
});










document.querySelectorAll('input[name="quantity_type5"]').forEach(function(element) {
    element.addEventListener('change', function() {
        var unitQuantityContainer5 = document.getElementById('unitQuantityContainer5');
        var comboQuantityContainer5 = document.getElementById('comboQuantityContainer5');
        if (this.value === 'combo') {
            unitQuantityContainer5.style.display = 'none';
            comboQuantityContainer5.style.display = 'block';
            updateComboPrice5();
        } else {
            unitQuantityContainer5.style.display = 'block';
            comboQuantityContainer5.style.display = 'none';
            updateUnitPrice5();
        }
    });
});

document.querySelector('.unitQuantity5').addEventListener('input', function() {
    updateUnitPrice5();
});

document.getElementById('comboQuantity5').addEventListener('change', function() {
    updateComboPrice5();
});

function updateUnitPrice5() {
    var unitQuantity5 = parseInt(document.querySelector('.unitQuantity5').value);
    var finalPrice5 = unitQuantity5 * 5;
    document.getElementById('finalPrice5').textContent = finalPrice5.toFixed(2);
}

function updateComboPrice5() {
    var comboQuantity5 = parseInt(document.getElementById('comboQuantity5').value);
    var finalPrice5= comboQuantity5 + 30;
    document.getElementById('finalPrice5').textContent = finalPrice5.toFixed(2);
}


document.addEventListener('DOMContentLoaded', function() {
    updateUnitPrice5();
});










document.querySelectorAll('input[name="quantity_type6"]').forEach(function(element) {
    element.addEventListener('change', function() {
        var unitQuantityContainer6 = document.getElementById('unitQuantityContainer6');
        var comboQuantityContainer6 = document.getElementById('comboQuantityContainer6');
        if (this.value === 'combo') {
            unitQuantityContainer6.style.display = 'none';
            comboQuantityContainer6.style.display = 'block';
            updateComboPrice6();
        } else {
            unitQuantityContainer6.style.display = 'block';
            comboQuantityContainer6.style.display = 'none';
            updateUnitPrice6();
        }
    });
});

document.querySelector('.unitQuantity6').addEventListener('input', function() {
    updateUnitPrice6();
});

document.getElementById('comboQuantity6').addEventListener('change', function() {
    updateComboPrice6();
});

function updateUnitPrice6() {
    var unitQuantity6 = parseInt(document.querySelector('.unitQuantity6').value);
    var finalPrice6 = unitQuantity6 * 5;
    document.getElementById('finalPrice6').textContent = finalPrice6.toFixed(2);
}

function updateComboPrice6() {
    var comboQuantity6 = parseInt(document.getElementById('comboQuantity6').value);
    var finalPrice6= comboQuantity6 + 30;
    document.getElementById('finalPrice6').textContent = finalPrice6.toFixed(2);
}

document.addEventListener('DOMContentLoaded', function() {
    updateUnitPrice6();
});