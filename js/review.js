document.addEventListener("DOMContentLoaded", function () {
    let reviews = [];
    let reviewsSection = document.getElementById("reviews-section");
    
    function showReviews() {
        let rate = document.getElementById("rate").value;
        let rateOrder = document.getElementById("rateOrder").value;

        reviewsSection.innerHTML = '';

        let formData = new FormData();
        if (rate != "ALL") {
            formData.append("rate",  rate);
        }
        if (rateOrder != "ALL") {
            formData.append("rateOrder",  rateOrder);
        }

        fetch("http://localhost/DAW2/TorreGlories/api_index.php?controller=Review&action=getReviews", {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(response => {
            response.data.forEach(function (review) {
                let reviewContainer = document.createElement("div");
                reviewContainer.classList.add("product-card", "mt-20");
                reviewContainer.innerHTML = `
                    <div class="card-body">
                        <p class="card-title">${review.user_name} (${review.date})</p>
                        <p class="fw-bold">${review.title}</p>
                        <p>${review.review}</p>
                        <div >
                            ${getStarsHtml(review.rate)}
                        </div>
                    </div>
                `;
                reviewsSection.appendChild(reviewContainer);
            });
        })

    }

    document.getElementById("rate").addEventListener("change", function() {
        showReviews();
    });
    document.getElementById("rateOrder").addEventListener("change", function() {
        showReviews();
    });

    function getStarsHtml(rating) {
        let starsHtml = "";
        for (let i = 1; i <= 5; i++) {
            if (i <= rating) {
                starsHtml += `<img src="images/iconografia/review/review-star-fill.svg" alt="">`;
            } else {
                starsHtml += `<img src="images/iconografia/review/star.svg" alt="">`;
            }
        }
        return starsHtml;
    }

    showReviews();
});