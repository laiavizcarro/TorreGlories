document.addEventListener("DOMContentLoaded", function () {
    let tipInput = document.getElementById("tip");
    let tipCalculatedInput = document.getElementById("tip_calculated");
    let totalPriceInput = document.getElementById("total_price");
    let finalPriceText = document.getElementById("final_price_text");

    function calculateTip() {
        let tipSelected = parseFloat(tipInput.options[tipInput.selectedIndex].value);
        let totalPrice = parseFloat(totalPriceInput.value);
        let tipCalculated = totalPrice * tipSelected;
        let newTotalPrice = totalPrice + tipCalculated;

        tipCalculatedInput.value = tipCalculated.toFixed(2);
        finalPriceText.innerHTML = `Pagar ${newTotalPrice.toFixed(2)}€`;
    }

    tipInput.addEventListener('change', function() {
        calculateTip();
    });

    calculateTip();
});