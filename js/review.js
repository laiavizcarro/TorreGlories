document.addEventListener("DOMContentLoaded", function () {
    let reviews = [];
    let reviewForm = document.getElementById("tg-review-form");
    let reviewsSection = document.getElementById("reviews-section");

    reviewForm.addEventListener("submit", function (e) {
        e.preventDefault();
        addReview();
    });

    function addReview() {
        let title = document.getElementById("title").value;
        let rate = document.querySelector('input[name="rate"]:checked').value;
        let reviewText = document.getElementById("review").value;

        let review = {
            title: title,
            review: reviewText,
            rate: rate
        };

        fetch("http://localhost/DAW2/TorreGlories/api_index.php?controller=API&action=addReview", {
            method: 'POST',
            headers: {
                'Content-Type': 'application-json; charset=UTF-8'
            },
            body: JSON.stringify(review)
        })
        .then(response => response.json())
        .then(response => {
            if (response.success == true) {
                reviews.push(review);
                reviewForm.reset();
                showReviews();
                notie.alert({ type: 'success', text: 'Ressenya insertada correctament', time: 2 }) 

            }
        });


    }

    function showReviews() {
        let rate = document.getElementById("rate").value;
        let rateOrder = document.getElementById("rateOrder").value;

        reviewsSection.innerHTML = '';

        fetch("http://localhost/DAW2/TorreGlories/api_index.php?controller=API&action=getReviews", {
            method: 'POST',
            headers: {
                'Content-Type': 'application-json; charset=UTF-8'
            },
            body: JSON.stringify({
                rate: rate == "ALL" ? null : rate,
                rateOrder: rateOrder == "ALL" ? null : rateOrder
            })
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


    function saveReviewsToLocalStorage() {
        localStorage.setItem('reviews', JSON.stringify(reviews));
    }

    showReviews();
});