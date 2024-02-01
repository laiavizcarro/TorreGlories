// Obtinc tots els elements checkbox
const checkboxes = document.querySelectorAll('input[name="category"]');

checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        filterProducts();
    });
});

function filterProducts() {
    // Obtinc les categories seleccionades
    const selectedCategories = Array.from(checkboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);

    /* Amago tots els productes
    const allProducts = document.querySelectorAll('.product-card');
    allProducts.forEach(function(product) {
        product.style.display = 'none';
    });*/

    // Mostro només els productes de les categories seleccionades
    selectedCategories.forEach(function(category) {
        const productsToShow = document.querySelectorAll('.category-' + category);
        productsToShow.forEach(function(product) {
            product.style.display = 'block';
        });
    });
}
