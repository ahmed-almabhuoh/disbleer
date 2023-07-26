function calculateDiscount() {
    var inputField1 = document.getElementById('inputField1');
    var inputField2 = document.getElementById('inputField2');

    var value = parseFloat(inputField1.value);
    var discountedValue = value - (value * 0.1);

    inputField2.value = discountedValue.toFixed(2);
}