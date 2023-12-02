<section class="container text-center mt-70">
	<div>
		<h2>Consulta els productes</h2>
		<h4>Consulta els plats a escollir de la carta</h4>
	</div>
</section>

<section>
	<div class=""> 
		<ul class="nav container justify-content-end">
			<li class="nav-item">
				<a class="nav-link category_button <?= str_contains($_SERVER['REQUEST_URI'], 'category_id=1') ? 'category_button_active' : '' ?>" 
					href="<?= url ?>/index.php?controller=Product&action=products&category_id=1">Plats
                </a>
			</li>
			<li class="nav-item">
				<a class="nav-link category_button <?= str_contains($_SERVER['REQUEST_URI'], 'category_id=2') ? 'category_button_active' : '' ?>" 
					href="<?= url ?>/index.php?controller=Product&action=products&category_id=2">Postres
                </a>
			</li>
			<li class="nav-item">
				<a class="nav-link category_button <?= str_contains($_SERVER['REQUEST_URI'], 'category_id=3') ? 'category_button_active' : '' ?>" 
					href="<?= url ?>/index.php?controller=Product&action=products&category_id=3">Begudes
                </a>
			</li>
			<li class="nav-item">
				<a class="nav-link category_button <?= str_contains($_SERVER['REQUEST_URI'], 'category_id=4') ? 'category_button_active' : '' ?>" 
					href="<?= url ?>/index.php?controller=Product&action=products&category_id=4">Esmorzars
                </a>
			</li>
		</ul>
	</div>
</section>




<section class="container mt-70">
    <div class="row">
        <?php foreach ($allProducts as $product) { ?>
            <div class="col-xs-12 col-sm-12 col-md-6 product-cards">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4 productImage">
                            <img src="<?php echo $product->getImg_path() ?>" class="img-fluid" alt="Imatge del producte">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title"><?= $product->getName() ?></h4>
                                <p class="card-text"><?= $product->getTotal_Price() ?> €</p>
                                <div>
                                    <small class="text-body-secondary">
										<img src="images/iconografia/icon-gluten.png" alt="Iconografia de l'al·lèrgen" class="icons">
									</small>
                                    <a href="<?= url ?>?controller=Order&action=add&product_id=<?= $product->getId() ?>">
                                        <button class="add-btn">
                                            <img src="images/iconografia/shoppingcart-white.svg" alt="" class="icons">Afegir
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

</section>