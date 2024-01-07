<section class="container mt-70">
    <h2>Inserir producte</h2>
</section>

<section class="container mt-20">
    <a class="btn-return" href="<?= url ?>/index.php?controller=Product">
        <img src="images/iconografia/back-arrow.svg" alt="Icone tornar enrere" class="icons">
        Tornar
    </a>
    
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
        <form method="POST" class="tg-form row mt-10 g-3" enctype="multipart/form-data"
            action="<?= url ?>/index.php?controller=Product&action=insert">

            <div class="col-12">
                <label for="name" class="form-label">Nom</label>
                <input type="text" id="name" name="name" class="form-control"/>
            </div>
            <div class="col-12">
                <label for="category_id" class="form-label">Categoria</label>
                <select type="text" id="category_id" name="category_id" class="form-control">
                    <option value="1">Menú</option>
                    <option value="2">Postres</option>
                    <option value="3">Begudes i cafès</option>
                    <option value="4">Esmorzats i snacks</option>
                </select>
            </div>
            <div class="col-12">
                <label for="iva" class="form-label">IVA</label>
                <select name="iva" id="iva" class="form-control">
                    <option value="4">4,00%</option>
                    <option value="10">10,00%</option>
                    <option value="21">21,00%</option>
                </select>
            </div>
            <div class="col-12">
                <label for="base_price" class="form-label">Preu</label>
                <input type="text" id="base_price" name="base_price" class="form-control"/>
            </div>
            <div class="col-12">
                <label for="is_offer" class="form-label mt-10">En oferta</label>
                <input type="checkbox" id="is_offer" name="is_offer"/> <br>
            </div>
            <div class="col-12">
                <label for="offer_price" class="form-label">Preu en oferta</label>
                <input type="text" id="offer_price" name="offer_price" class="form-control"/>
            </div>
            <div class="col-12">
                <label for="file" class="form-label">Imatge del producte</label>
                <input type="file" id="img" name="img"/>
            </div>
            <div class="col-12">
                <button type="submit" class="btn-add mt-10">Inserir</button>
            </div>

            <?php if (isset($error)) { ?>
                <div class="row">
                    <div class="col-12">
                        <p class="error"><?php echo $error ?></p>
                    </div>
                </div>
            <?php } ?>
        </form>
    </div>
</section>
