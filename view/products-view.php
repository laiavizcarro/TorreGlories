<div class="content">
    <button><a href="<?= url ?>?controller=Product&action=insert">Insertar nou producte</a></button>
    <br><br>
    <table>
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Category</th>
            <th>Stock</th>
            <th>IVA</th>
            <th>Base price</th>
            <th>Total price</th>
            <th>Is offer</th>
            <th>Offer price</th>
            <th>Total offer price</th>
            <th></th>
        </thead>
        <tbody>
            <?php foreach($allProducts as $product){ ?>
            <tr>
                <td><?= $product->getId() ?></td>
                <td><?= $product->getName() ?></td>
                <td><?= $product->getCategory() ?></td>
                <td><?= $product->getStock() ?></td>
                <td><?= $product->getIva() ?></td>
                <td><?= $product->getBase_price() ?></td>
                <td><?= $product->getTotal_price() ?></td>
                <td><?= $product->getIs_offer() ?></td>
                <td><?= $product->getOffer_price() ?></td>
                <td><?= $product->getTotal_offer_price() ?></td>


                <td>
                    <button><a href="<?= url ?>?controller=Product&action=show&id=<?= $product->getId()?>">Modificar</a></button>
                    <button><a href="<?= url ?>?controller=Product&action=delete&id=<?= $product->getId()?>">Eliminar</a></button>
                </td>


            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>