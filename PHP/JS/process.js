document.querySelectorAll('input[name="quantity_type"]').forEach(function(element) {
    element.addEventListener('change', function() {
        var unitQuantityContainer = document.getElementById('unitQuantityContainer');
        var comboQuantityContainer = document.getElementById('comboQuantityContainer');
        if (this.value === 'combo') {
            unitQuantityContainer.style.display = 'none';
            comboQuantityContainer.style.display = 'block';
        } else {
            unitQuantityContainer.style.display = 'block';
            comboQuantityContainer.style.display = 'none';
        }
    });
});

document.querySelectorAll('input[name="quantity_type1"]').forEach(function(element) {
    element.addEventListener('change', function() {
        var unitQuantityContainer1 = document.getElementById('unitQuantityContainer1');
        var comboQuantityContainer1 = document.getElementById('comboQuantityContainer1');
        if (this.value === 'combo') {
            unitQuantityContainer1.style.display = 'none';
            comboQuantityContainer1.style.display = 'block';
        } else {
            unitQuantityContainer1.style.display = 'block';
            comboQuantityContainer1.style.display = 'none';
        }
    });
});

document.querySelectorAll('input[name="quantity_type3"]').forEach(function(element) {
    element.addEventListener('change', function() {
        var unitQuantityContainer3 = document.getElementById('unitQuantityContainer3');
        var comboQuantityContainer3 = document.getElementById('comboQuantityContainer3');
        if (this.value === 'combo') {
            unitQuantityContainer3.style.display = 'none';
            comboQuantityContainer3.style.display = 'block';
        } else {
            unitQuantityContainer3.style.display = 'block';
            comboQuantityContainer3.style.display = 'none';
        }
    });
});

document.querySelectorAll('input[name="quantity_type4"]').forEach(function(element) {
    element.addEventListener('change', function() {
        var unitQuantityContainer4 = document.getElementById('unitQuantityContainer4');
        var comboQuantityContainer4 = document.getElementById('comboQuantityContainer4');
        if (this.value === 'combo') {
            unitQuantityContainer4.style.display = 'none';
            comboQuantityContainer4.style.display = 'block';
        } else {
            unitQuantityContainer4.style.display = 'block';
            comboQuantityContainer4.style.display = 'none';
        }
    });
});

document.querySelectorAll('input[name="quantity_type5"]').forEach(function(element) {
    element.addEventListener('change', function() {
        var unitQuantityContainer5 = document.getElementById('unitQuantityContainer5');
        var comboQuantityContainer5 = document.getElementById('comboQuantityContainer5');
        if (this.value === 'combo') {
            unitQuantityContainer5.style.display = 'none';
            comboQuantityContainer5.style.display = 'block';
        } else {
            unitQuantityContainer5.style.display = 'block';
            comboQuantityContainer5.style.display = 'none';
        }
    });
});

document.querySelectorAll('input[name="quantity_type4"]').forEach(function(element) {
    element.addEventListener('change', function() {
        var unitQuantityContainer6 = document.getElementById('unitQuantityContainer6');
        var comboQuantityContainer6 = document.getElementById('comboQuantityContainer6');
        if (this.value === 'combo') {
            unitQuantityContainer6.style.display = 'none';
            comboQuantityContainer6.style.display = 'block';
        } else {
            unitQuantityContainer6.style.display = 'block';
            comboQuantityContainer6.style.display = 'none';
        }
    });
});






/*CALCULADORA DOS VALORES UNITÁRIOS*/
document.querySelector('.unitQuantity1').addEventListener('input', function() {
    var unitQuantity1 = parseInt(this.value);
    var finalPrice1 = unitQuantity1 * 5;
    document.getElementById('finalPrice1').textContent = finalPrice1.toFixed(2);
 });

 document.querySelector('.unitQuantity2').addEventListener('input', function() {
    var unitQuantity2 = parseInt(this.value);
    var finalPrice2 = unitQuantity2 * 5;
    document.getElementById('finalPrice2').textContent = finalPrice2.toFixed(2);
 });

 document.querySelector('.unitQuantity3').addEventListener('input', function() {
    var unitQuantity3 = parseInt(this.value);
    var finalPrice3 = unitQuantity3 * 5;
    document.getElementById('finalPrice3').textContent = finalPrice3.toFixed(2);
 });

 document.querySelector('.unitQuantity4').addEventListener('input', function() {
    var unitQuantity4 = parseInt(this.value);
    var finalPrice4 = unitQuantity4 * 5;
    document.getElementById('finalPrice4').textContent = finalPrice4.toFixed(2);
 });

 document.querySelector('.unitQuantity5').addEventListener('input', function() {
    var unitQuantity5 = parseInt(this.value);
    var finalPrice5 = unitQuantity5 * 5;
    document.getElementById('finalPrice5').textContent = finalPrice5.toFixed(2);
 });

 document.querySelector('.unitQuantity6').addEventListener('input', function() {
    var unitQuantity6 = parseInt(this.value);
    var finalPrice6 = unitQuantity6 * 5;
    document.getElementById('finalPrice6').textContent = finalPrice6.toFixed(2);
 });