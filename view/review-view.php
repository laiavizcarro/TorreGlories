<section class="container mt-70">
    <h2>Ressenyes del restaurant</h2>
</section>

<section class="container mt-70 ">
    <div class="row">
        <div class="review-filter col-xs-12 col-sm-8 col-md-2 col0-lg-2">
            <div class="">
                <h5>Puntuació</h5>
            </div>
            <div>
                <select name="rate" id="rate">
                    <option value="ALL"></option>
                    <option value="1">1 estrella</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>

            <div class="mt-20">
                <h5>Ordre</h5>
                <select name="rateOrder" id="rateOrder">
                    <option value="ALL"></option>
                    <option value="ASC">Ascendent</option>
                    <option value="DESC">Descendent</option>
                </select>
            </div>

        </div>

        <div class="col-xs-12 col-sm-8 col-md-10 col0-lg-10">
            <div id="reviews-section">
            </div>
        </div>
    </div>

</section>

<script src="js/review.js"></script>