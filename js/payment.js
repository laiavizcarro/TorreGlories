document.addEventListener("DOMContentLoaded", function () {
    const url = window.location.href.split('index.php?')[0];

    // Obtenir els elements de la vista i guarda-los en variables
    let tipInput = document.getElementById("tip");
    let tipCalculatedInput = document.getElementById("tip_calculated");
    let totalPriceInput = document.getElementById("total_price");
    let finalPriceText = document.getElementById("final_price_text");

    let finalCalculatedPointsText = document.getElementById("generated_points_text");
    let calculatedPointsInput = document.getElementById("generated_points");

    let pointsInput = document.getElementById("points");
    let usePointsInput = document.getElementById("usePoints");

    tipInput.addEventListener('change', function() {
        calculateTotalPrice();
    });

    usePointsInput.addEventListener('change', function() {
        calculateTotalPrice();
    });
    
    calculateTotalPrice();


    /**
     * Calcular els punts generats en la comanda
     */
    function calculatePoints() {
        let totalPrice = parseFloat(totalPriceInput.value);
        let calculatedPoints = totalPrice * 5;

        calculatedPointsInput.value = calculatedPoints;
        finalCalculatedPointsText.innerHTML = `Punts que s'acumularan en aquesta comanda: ${Math.round(calculatedPoints)}`;
        
    }

    calculatePoints();

    function showUserPoints() {
        fetch(`${url}api_index.php?controller=User&action=getUserPoints`, {
            method: 'GET'
        })
        .then(response => response.json())
        .then(response => {
            pointsInput.value = response.data.points;
        });
    }

    showUserPoints();
    
    function calculateTotalPrice() {
        let totalPrice = parseFloat(totalPriceInput.value);

        // Tips
        let tipSelected = parseFloat(tipInput.options[tipInput.selectedIndex].value);
        let tipCalculated = totalPrice * tipSelected;
        let newTotalPrice = totalPrice + tipCalculated;

        tipCalculatedInput.value = tipCalculated.toFixed(2);

        // Points
        let points = parseInt(pointsInput.value);
        let usePoints = parseInt(usePointsInput.value);

        if (usePoints !== undefined && !isNaN(usePoints) && usePoints >= 0 && usePoints <= points) {
            newTotalPrice = totalPrice - (usePoints / 5);
        }

        finalPriceText.innerHTML = `Pagar ${newTotalPrice.toFixed(2)}€`;
    }
});