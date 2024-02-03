document.addEventListener("DOMContentLoaded", function () {
    const url = window.location.href.split('index.php?')[0];

    // Obtinc tots els elements checkbox
    const checkboxes = document.querySelectorAll('input[name="category"]');

    let productsSection = document.getElementById("products-section");
    products = [];
    originalProducts = [];

    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            filterProducts();
        });
    });

    getProducts();

    function getProducts() {
        fetch("http://localhost/DAW2/TorreGlories/api_index.php?controller=Product&action=getProducts", {
            method: 'POST'
        })
        .then(response => response.json())
        .then(response => {
            originalProducts = response.data;
            products = originalProducts;
            showProducts();
        })
    }

    function showProducts() {
        products.forEach(function (product) {
            let productContainer = document.createElement("div");
            productContainer.classList.add("col-xs-12", "col-sm-12", "col-md-6", "col-lg-6");
            
            let innerHTML = `
            <div class="card product-card">
                <div class="row g-0">
                    <div class="col-xs-4 col-sm-4 col-md-4 card-image">
                        <img src="${product.img_path}"
                        alt="Imatge del producte: ${product.name}">
                    </div>

                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="card-body">
                            <p class="card-title">${product.name}</p>
                            <p class="card-text">`;
            
            if (product.is_offer) {
                innerHTML += `<del class="error">${product.total_price}</del> ${product.total_offer_price} €`
            } else {
                innerHTML += `${product.total_price} €`;
            }
        
            innerHTML += `  </p>
                            <div class="d-flex justify-content-end">
                                <a class="d-flex" href="${url}index.php?controller=Order&action=add&product_id=${product.id}">
                                    <button class="btn-add">
                                        <img src="${url}images/iconografia/shoppingcart-white.svg" alt="Botó d'afegir producte a la cistella" class="icons" width="20px" height="20px">Afegir
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            `;
            
            productContainer.innerHTML = innerHTML;
            productsSection.appendChild(productContainer);
        });
    }

    function filterProducts() {
        // Obtinc les categories seleccionades
        const selectedCategories = Array.from(checkboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.value);

        clearProducts();

        if (selectedCategories.length == 0) {
            products = originalProducts;
        } else {
            // Mostro només els productes de les categories seleccionades
            selectedCategories.forEach(function(category) {
                products.push(...originalProducts.filter(product => product.category_id == category));
            });
        }        

        showProducts();
    }

    function clearProducts() {
        products = [];
        productsSection.innerHTML = "";
    }
    
});