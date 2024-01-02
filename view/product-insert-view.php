<section class="container mt-70">
    <a class="btn-return" href="<?= url ?>/index.php?controller=Product">
        <img src="images/iconografia/back-arrow.svg" alt="Icone tornar enrere" class="icons">
        Tornar
    </a>
    <form action="<?= url ?>/index.php?controller=Product&action=insert" method="POST" class="tg-form" enctype="multipart/form-data">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name"/>

                <label for="category_id">Categoria</label>
                <select type="text" id="category_id" name="category_id">
                    <option value="1">Menú</option>
                    <option value="2">Postres</option>
                    <option value="3">Begudes i cafès</option>
                    <option value="4">Esmorzats i snacks</option>
                </select>

                <label for="iva">IVA</label>
                <select name="iva" id="iva" class="tg-form">
                    <option value="4">4,00%</option>
                    <option value="10">10,00%</option>
                    <option value="21">21,00%</option>
                </select>

                <label for="base_price">Preu</label>
                <input type="text" id="base_price" name="base_price"/>

                <label for="is_offer">En oferta</label>
                <input type="checkbox" id="is_offer" name="is_offer"/> <br>

                <label for="offer_price">Preu en oferta</label>
                <input type="text" id="offer_price" name="offer_price"/>

                <label>Imatge del producte</label>
                <input type="file" id="img" name="img"/>

                <button type="submit" class="btn btn-primary mt-10">Insertar producte</button>
            </div>
        </div>

        <?php if (isset($error)) { ?>
            <div class="row">
                <div class="col-12">
                    <p class="error"><?php echo $error ?></p>
                </div>
            </div>
        <?php } ?>
    </form>
</section>
