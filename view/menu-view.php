<section class="container text-center mt-70">
    <div>
        <h2>Consulta els productes</h2>
        <h4>Consulta els plats a escollir de la carta</h4>
    </div>
</section>
<!-- FILTRE DE CATEGORIES ANTIC 
<section>
    <div class="">
        <ul class="nav container justify-content-end">
            <li class="nav-item">
                <a class="nav-link btn-category <?= str_contains($_SERVER['REQUEST_URI'], 'category_id=1') ? 'btn-category_active' : '' ?>"
                href="<?= url ?>/index.php?controller=Product&action=products&category_id=1">Plats
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn-category <?= str_contains($_SERVER['REQUEST_URI'], 'category_id=2') ? 'btn-category_active' : '' ?>"
                href="<?= url ?>/index.php?controller=Product&action=products&category_id=2">Postres
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn-category <?= str_contains($_SERVER['REQUEST_URI'], 'category_id=3') ? 'btn-category_active' : '' ?>"
                href="<?= url ?>/index.php?controller=Product&action=products&category_id=3">Begudes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn-category <?= str_contains($_SERVER['REQUEST_URI'], 'category_id=4') ? 'btn-category_active' : '' ?>"
                href="<?= url ?>/index.php?controller=Product&action=products&category_id=4">Esmorzars
                </a>
            </li>
        </ul>
    </div>
</section>
FI DEL FILTRE DE CATEGORIES ANTIC -->
<section class="container mt-70">
    <section class="nav container justify-content-end">
        <div><input type="checkbox" name="category" value="1" id="1"><label for="1">Plats</label></div>
        <div><input type="checkbox" name="category" value="2" id="2"><label for="2">Postres</label></div>
        <div><input type="checkbox" name="category" value="3" id="3"><label for="3">Begudes</label></div>
        <div><input type="checkbox" name="category" value="4" id="4"><label for="4">Esmorzars</label></div>
    </section>
</section>

<section class="container mt-70">
    <div class="row">
        <?php foreach ($allProducts as $product) { ?>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="card product-card category-<?= $product->getCategory() ?>">
                    <div class="row g-0">
                        <div class="col-xs-4 col-sm-4 col-md-4 card-image">
                            <img src="<?php echo $product->getImgPath() ?>"
                            alt="Imatge del producte: <?= $product->getName() ?>">
                        </div>

                        <div class="col-xs-8 col-sm-8 col-md-8">
                            <div class="card-body">
                                <p class="card-title"><?= $product->getName() ?></p>
                                <?php if($product->isOffer()) { ?>
                                    <p class="card-text"> <del class="error"><?= $product->getTotalPrice() ?></del> <?= $product->getTotalOfferPrice() ?> € </p>
                                <?php } else { ?>
                                    <p class="card-text"> <?= $product->getTotalPrice() ?> € </p>
                                <?php } ?>
                                <div class="d-flex justify-content-end">
                                    <!--div>
										<img src="images/iconografia/icon-gluten.png" alt="Iconografia de l'al·lèrgen" 
                                            class="icons">
                                    </div-->
                                    <a class="d-flex" href="<?= url ?>?controller=Order&action=add&product_id=<?= $product->getId() ?>">
                                        <button class="btn-add">
                                            <img src="images/iconografia/shoppingcart-white.svg" alt="Botó d'afegir producte a la cistella" class="icons" width="20px" height="20px">Afegir
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<script src="js/product.js"></script>