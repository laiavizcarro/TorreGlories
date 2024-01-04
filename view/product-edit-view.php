<section class="container mt-70">
    <a class="btn-return" href="<?= url ?>/index.php?controller=Product">
        <img src="images/iconografia/back-arrow.svg" alt="Icone tornar enrere" class="icons">
        Tornar
    </a>
    <form action="<?= url ?>/index.php?controller=Product&action=update&id=<?= $product->getId()?>" method="post" class="tg-form tg-form-block" enctype="multipart/form-data">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" value="<?= $product->getName() ?>" >
                
                <label for="category_id">Categoria</label>
                <select type="text" id="category_id" name="category_id">
                    <option value="1" <?php echo $product->getCategory() == 1 ? "selected" : "" ?>>Menú</option>
                    <option value="2" <?php echo $product->getCategory() == 2 ? "selected" : "" ?>>Postres</option>
                    <option value="3" <?php echo $product->getCategory() == 3 ? "selected" : "" ?>>Begudes i cafès</option>
                    <option value="4" <?php echo $product->getCategory() == 4 ? "selected" : "" ?>>Esmorzats i snacks</option>
                </select>

                <label for="iva">IVA</label>
                <select name="iva" id="iva" class="tg-form">
                    <option value="4" <?php echo $product->getIva() == 4 ? "selected" : "" ?>>4,00%</option>
                    <option value="10" <?php echo $product->getIva() == 10 ? "selected" : "" ?>>10,00%</option>
                    <option value="21" <?php echo $product->getIva() == 21 ? "selected" : "" ?>>21,00%</option>
                </select>

                <label for="base_price">Preu base</label>
                <input type="text" id="base_price" name="base_price" value="<?= $product->getBasePrice() ?>" pattern="^\d{1,3}(\.?\d{1,2})?$">

                <label for="total_price">Preu total</label>
                <input type="text" id="total_price" value="<?= $product->getTotalPrice() ?>" readonly disabled>

                <label for="is_offer">En oferta</label>
                <input type="checkbox" id="is_offer" name="is_offer" value="<?= $product->isOffer() ?>" <?php echo $product->isOffer() ? "checked" : "" ?>> <br>

                <label for="offer_price">Preu en oferta</label> 
                <input type="text" id="offer_price" name="offer_price" value="<?= $product->getOfferPrice() ?>" pattern="^\d{1,3}(\.?\d{1,2})?$">

                <label for="total_offer_price">Preu total amb oferta</label>
                <input type="text" id="total_offer_price" value="<?= $product->getTotalOfferPrice() ?>" readonly disabled>

                <label>Imatge del producte</label>
                <input type="file" id="img" name="img"/>

                <button type="submit" class="btn btn-primary mt-10">Actualitzar</button>
        </form>
    </div>
</div>
</section>