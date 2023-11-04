<form action="<?= url ?>/index.php?controller=Product&action=update&id=<?= $product->getId()?>" method="post">
    <label for="name">Nom</label>
    <input type="text" id="name" name="name" value="<?= $product->getName()  ?>" ><br>
    <label for="category_id">Categoria</label>
    <input type="text" id="category_id" name="category_id" value="<?= $product->getCategory()  ?>" ><br>
    <label for="stock">Stock</label>
    <input type="text" id="stock" name="stock" value="<?= $product->getStock()  ?>" ><br>
    <label for="iva">IVA</label>
    <input type="text" id="iva" name="iva" value="<?= $product->getIva()  ?>" ><br>
    <label for="base_price">Preu base</label>
    <input type="text" id="base_price" name="base_price" value="<?= $product->getBase_price()  ?>" ><br>
    <label for="total_price">Preu total</label>
    <input type="text" id="total_price" name="total_price" value="<?= $product->getTotal_price()  ?>" ><br>
    <label for="is_offer">En oferta</label>
    <input type="checkbox" id="is_offer" name="is_offer" value="<?= $product->getIs_offer()  ?>" ><br>
    <label for="offer_price">Preu en oferta</label>
    <input type="text" id="offer_price" name="offer_price" value="<?= $product->getOffer_price()  ?>" ><br>
    <label for="total_offer_price">Preu total amb oferta</label>
    <input type="text" id="total_offer_price" name="total_offer_price" value="<?= $product->getTotal_offer_price()  ?>" ><br>

    <button type="submit">Actualitzar</button>
</form>