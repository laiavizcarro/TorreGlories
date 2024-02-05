document.addEventListener("DOMContentLoaded", function () {
    let totalPriceInput = document.getElementById("total_price");
    let finalCalculatedPoints = document.getElementById("generated_points");

    function calculatePoints() {
        let totalPrice = parseFloat(totalPriceInput.value);
        console.log(`total_price: ${totalPrice}`);
        let calculatedPoints = totalPrice * 5;
        finalCalculatedPoints.innerHTML = `Punts que s'acumularan en aquesta comanda: ${calculatedPoints}`;
    }

    calculatePoints();
})