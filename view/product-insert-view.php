<br><br><br><br><br><br><br><br><br><br>
<form action="<?= url ?>/index.php?controller=Product&action=insert" method="post">
    <label for="name">Nom</label>
    <input type="text" id="name" name="name" value="name" ><br>
    <label for="category_id">Categoria</label>
    <input type="text" id="category_id" name="category_id" value="category" ><br>
    <label for="stock">Stock</label>
    <input type="text" id="stock" name="stock" value="stock" ><br>
    <label for="iva">IVA</label>
    <input type="text" id="iva" name="iva" value="iva" ><br>
    <label for="base_price">Preu base</label>
    <input type="text" id="base_price" name="base_price" value="base_price" ><br>
    <label for="total_price">Preu total</label>
    <input type="text" id="total_price" name="total_price" value="total_price" ><br>
    <label for="is_offer">En oferta</label>
    <input type="checkbox" id="is_offer" name="is_offer" value="is_offer" ><br>
    <label for="offer_price">Preu en oferta</label>
    <input type="text" id="offer_price" name="offer_price" value="offer_price" ><br>
    <label for="total_offer_price">Preu total amb oferta</label>
    <input type="text" id="total_offer_price" name="total_offer_price" value="total_offer_price" ><br>

    <button type="submit">Insertar</button>
</form>