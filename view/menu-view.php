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
        <div class="ml-10"><input type="checkbox" name="category" value="1" id="1"><label class="ml-3" for="1">Plats</label></div>
        <div class="ml-10"><input type="checkbox" name="category" value="2" id="2"><label class="ml-3" for="2">Postres</label></div>
        <div class="ml-10"><input type="checkbox" name="category" value="3" id="3"><label class="ml-3" for="3">Begudes</label></div>
        <div class="ml-10"><input type="checkbox" name="category" value="4" id="4"><label class="ml-3" for="4">Esmorzars</label></div>
    </section>
</section>

<section class="container mt-70">
    <div id="products-section" class="row">
    </div>
</section>

<script src="js/product.js"></script>