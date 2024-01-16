<section class="container mt-70">
    <h2>Ressenyes</h2>
</section>

<section class="container mt-70">
    <div class="row">
        <div class="review-filter col-xs-12 col-sm-8 col-md-4 col0-lg-4">
            <div class="p-3">
                <h4>Puntuació</h4>
                <!--
                <img src="images/iconografia/review/review-star-fill.svg" alt="">
                <img src="images/iconografia/review/review-star-fill.svg" alt="">
                <img src="images/iconografia/review/review-star-fill.svg" alt="">
                <img src="images/iconografia/review/star.svg" alt="">
                <img src="images/iconografia/review/star.svg" alt="">
                -->
            </div>


            <!-- Puntuació i progrés de la dreta -->
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <img src="images/iconografia/review/review-star-fill.svg" alt="">
                            <progress id="file1" max="100" value="100"></progress>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <img src="images/iconografia/review/review-star-fill.svg" alt="">
                            <progress id="file2" max="100" value="80"></progress>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <img src="images/iconografia/review/review-star-fill.svg" alt="">
                            <progress id="file3" max="100" value="60" class="tg-rating"></progress>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <img src="images/iconografia/review/review-star-fill.svg" alt="">
                            <progress id="file4" max="100" value="40"></progress>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <img src="images/iconografia/review/review-star-fill.svg" alt="">
                            <progress id="file5" max="100" value="20"></progress>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Formulari de la ressenya que ha d'escriure l'usuari-->
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 review">
            <div class="p-3">
                <h4>Hola, <?php echo $_SESSION['name'] ?>! Aquí pots deixar una ressenya de la teva comanda</h4>
                <form class="tg-form row g-3 mt-20" id="tg-review-form" action="" method="POST">
                    <div class="col-md-12">
                        <?php echo $_SESSION['name'] . ' ' . $_SESSION['surname']; ?>
                        <?php echo $_SESSION['email']; ?>

                    </div>

                    <div class="col-md-12">
                        <fieldset>
                            <span class="star-cb-group">
                                <input type="radio" id="rating-5" name="rating" value=5 />
                                <label for="rating-5">5</label>
                                <input type="radio" id="rating-4" name="rating" value=4 />
                                <label for="rating-4">4</label>
                                <input type="radio" id="rating-3" name="rating" value=3 />
                                <label for="rating-3">3</label>
                                <input type="radio" id="rating-2" name="rating" value=2 />
                                <label for="rating-2">2</label>
                                <input type="radio" id="rating-1" name="rating" value=1 />
                                <label for="rating-1">1</label>
                                <input type="radio" id="rating-0" name="rating" value=0 class="star-cb-clear" checked="checked" />
                                <label for="rating-0">0</label>
                            </span>
                        </fieldset>

                        <div class="col-md-12">
                            <!--<label for="review-name" class="form-label">Titol:</label>-->
                            <input type="text" id="review-name" name="name" class="form-control" placeholder="Titol de la ressenya" required>
                            <textarea name="review" id="review" cols="30" rows="5" class="form-control tg-text-area mt-10" placeholder="Valora la teva experiència amb el restaurant i la comanda."></textarea>

                        </div>


                        <div class="col-md-12">
                            <button type="submit" value="submit" class="btn-submit fw-bold mt-20">Enviar ressenya</button>
                        </div>
                    </div>
                </form>

                <p class="error">
                    <?php echo isset($error) ? $error : ""; ?>
                </p>
            </div>
        </div>

    </div>
</section>

<section class="container mt-70">
    <div class="row" id="reviews-section">
        <h4>Ressenyes</h4>

    </div>
    <div>
        <div class="product-card mt-20">
            <div class="card-body">
                <p class="card-title"><?php echo $_SESSION['name'] ?></p>
                <p class="fw-bold">Experiència gastronòmica 4/5</p>
                <p>Sabor excepcional i presentació elegant.</p>
            </div>
            <div class="card-body">
                <p class="card-title"><?php echo $_SESSION['name'] ?></p>
                <p class="fw-bold">Servei excel·lent 5/5</p>
                <p>Atmosfera acollidora i personal molt professional. El menú ofereix una gran varietat, i tots els plats estan deliciosos.</p>
            </div>
            <div class="card-body">
                <p class="card-title"><?php echo $_SESSION['name'] ?></p>
                <p class="fw-bold">Decoració moderna i menjar deliciós 4/5</p>
                <p>L'ambient és agradable, i el menjar és deliciós i ben presentat.</p>
            </div>



        </div>
    </div>

</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    let reviews = [];
    let reviewForm = document.getElementById("tg-review-form");
    let reviewsSection = document.getElementById("reviews-section");

    reviewForm.addEventListener("submit", function (e) {
        e.preventDefault();
        addReview();
    });

    function addReview() {
        let reviewName = document.getElementById("review-name").value;
        let rating = document.querySelector('input[name="rating"]:checked').value;
        let reviewText = document.getElementById("review").value;

        let review = {
            name: reviewName,
            rating: rating,
            text: reviewText
        };

        reviews.push(review);

        reviewForm.reset();

        showReviews();
    }

    function showReviews() {
    reviewsSection.innerHTML = "<h4>Ressenyes</h4>";

    reviews.forEach(function (review) {
        let reviewContainer = document.createElement("div");
        reviewContainer.classList.add("product-card", "mt-20");
        reviewContainer.innerHTML = `
            <div class="card-body">
                <p class="card-title"><?php echo $_SESSION['name'] ?></p>
                <p class="fw-bold">${review.name} Rating: ${review.rating} </p>
                <div class="star-cb-group">
                    ${getStarsHtml(review.rating)}
                </div>
                <p>${review.text}</p>
            </div>
        `;
        reviewsSection.appendChild(reviewContainer);
    });
}


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


</script>