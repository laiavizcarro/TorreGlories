<section class="container mt-70">
    <div class="row">
        <a class="btn-return" href="<?= url ?>/index.php?controller=Product">
            <img src="images/iconografia/back-arrow.svg" alt="Icone tornar enrere" class="icons">
            Tornar
        </a>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
            <form class="tg-form row g-3 mt-10" method="post" enctype="multipart/form-data"
                action="<?= url ?>/index.php?controller=Product&action=update&id=<?= $product->getId()?>">
                <div class="col-12">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?= $product->getName() ?>" >
                </div>

                <div class="col-12">
                    <label for="category_id" class="form-label">Categoria</label>
                    <select type="text" id="category_id" name="category_id" class="form-control">
                        <option value="1" <?php echo $product->getCategory() == 1 ? "selected" : "" ?>>Menú</option>
                        <option value="2" <?php echo $product->getCategory() == 2 ? "selected" : "" ?>>Postres</option>
                        <option value="3" <?php echo $product->getCategory() == 3 ? "selected" : "" ?>>Begudes i cafès</option>
                        <option value="4" <?php echo $product->getCategory() == 4 ? "selected" : "" ?>>Esmorzats i snacks</option>
                    </select>
                </div>

                <div class="col-12">
                    <label for="iva" class="form-label">IVA</label>
                    <select name="iva" id="iva" class="form-control">
                        <option value="4" <?php echo $product->getIva() == 4 ? "selected" : "" ?>>4,00%</option>
                        <option value="10" <?php echo $product->getIva() == 10 ? "selected" : "" ?>>10,00%</option>
                        <option value="21" <?php echo $product->getIva() == 21 ? "selected" : "" ?>>21,00%</option>
                    </select>
                </div>

                <div class="col-12">
                    <label for="base_price" class="form-label">Preu base</label>
                    <input type="text" id="base_price" name="base_price" class="form-control"
                        value="<?= $product->getBasePrice() ?>" pattern="^\d{1,3}(\.?\d{1,2})?$">
                </div>

                <div class="col-12">
                    <label for="total_price" class="form-label">Preu total</label>
                    <input type="text" id="total_price" class="form-control" 
                        value="<?= $product->getTotalPrice() ?>" readonly disabled>
                </div>

                <div class="col-12">
                    <label for="is_offer" class="form-label mt-10">En oferta</label>
                    <input type="checkbox" id="is_offer" name="is_offer"
                        value="<?= $product->isOffer() ?>" <?php echo $product->isOffer() ? "checked" : "" ?>> <br>
                </div>

                <div class="col-12">
                    <label for="offer_price" class="form-label">Preu en oferta</label> 
                    <input type="text" id="offer_price" name="offer_price" class="form-control"
                        value="<?= $product->getOfferPrice() ?>" pattern="^\d{1,3}(\.?\d{1,2})?$">
                </div>

                <div class="col-12">
                    <label for="total_offer_price" class="form-label">Preu total amb oferta</label>
                    <input type="text" id="total_offer_price" class="form-control"
                        value="<?= $product->getTotalOfferPrice() ?>" readonly disabled>
                </div>

                <div class="col-12">
                    <label for="file" class="form-label">Imatge del producte</label>
                    <input type="file" id="img" name="img"/>
                </div>

                <div class="col-12">
                    <button type="submit" class="add-btn mt-10">Actualitzar</button>
                </div>
            </form>
        </div>
    </div>
</section>