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
                <select name="rate" id="rate">
                    <option value="ALL"></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <select name="rateOrder" id="rateOrder">
                    <option value="ALL"></option>
                    <option value="ASC">Ascendent</option>
                    <option value="DESC">Descendent</option>
                </select>
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
                                    <input type="radio" id="rating-5" name="rate" value=5 />
                                    <label for="rating-5">5</label>
                                    <input type="radio" id="rating-4" name="rate" value=4 />
                                    <label for="rating-4">4</label>
                                    <input type="radio" id="rating-3" name="rate" value=3 />
                                    <label for="rating-3">3</label>
                                    <input type="radio" id="rating-2" name="rate" value=2 />
                                    <label for="rating-2">2</label>
                                    <input type="radio" id="rating-1" name="rate" value=1 />
                                    <label for="rating-1">1</label>
                                    <input type="radio" id="rating-0" name="rate" value=0 class="star-cb-clear" checked="checked" />
                                    <label for="rating-0">0</label>
                                </span>
                            </fieldset>

                            <div class="col-md-12">
                                <!--<label for="review-name" class="form-label">Titol:</label>-->
                                <input type="text" id="title" name="title" class="form-control" placeholder="Titol de la ressenya" required>
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
        <div class="row">
            <h4>Ressenyes</h4>
        </div>
        <div id="reviews-section">
            <!--div class="product-card mt-20">
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
            </div-->
        </div>

    </section>
    <script src="js/review.js"></script>