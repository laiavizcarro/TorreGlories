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

    let finalCalculatedPointsText = document.getElementById("generated_points_text");
    let calculatedPointsInput = document.getElementById("generated_points");

    function calculatePoints() {
        let totalPrice = parseFloat(totalPriceInput.value);
        let calculatedPoints = totalPrice * 5;

        calculatedPointsInput.value = calculatedPoints;
        finalCalculatedPointsText.innerHTML = `Punts que s'acumularan en aquesta comanda: ${Math.round(calculatedPoints)}`;
        
    }

    calculatePoints();
});