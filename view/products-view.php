<section class="container mt-70">
    <a href="<?= url ?>?controller=Product&action=insertView">
        <button class="btn btn-success">Insertar nou producte</button>
    </a>

    <br><br>
    <table class="table table-striped table-hover">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Category</th>
            <th>IVA</th>
            <th>Base price</th>
            <th>Total price</th>
            <th>Is offer</th>
            <th>Offer price</th>
            <th>Total offer price</th>
            <th></th>
            <th></th>

        </thead>
        <tbody>
            <?php foreach($allProducts as $product){ ?>
            <tr>
                <td><?= $product->getId() ?></td>
                <td><?= $product->getName() ?></td>
                <td><?= $product->getCategory() ?></td>
                <td><?= $product->getIva() ?></td>
                <td><?= $product->getBasePrice() ?></td>
                <td><?= $product->getTotalPrice() ?></td>
                <td><?= $product->isOffer() ?></td>
                <td><?= $product->getOfferPrice() != null ? $product->getOfferPrice() : "-" ?></td>
                <td><?= $product->getTotalOfferPrice() != null ? $product->getTotalOfferPrice() : "-" ?></td>
                <td>
                    <a href="<?= url ?>?controller=Product&action=show&id=<?= $product->getId()?>">
                    <button class="btn btn-info">Modificar</button>
                    </a>
                </td>
                <td>
                    <a href="<?= url ?>?controller=Product&action=delete&id=<?= $product->getId()?>">
                        <button class="btn btn-danger">Eliminar</button>
                    </a>
                </td>


            </tr>
            <?php } ?>
        </tbody>
    </table>

</section>
