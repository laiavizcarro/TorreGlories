<section class="container mt-70">
    <h2>Administrador de productes</h2>
</section>

<section class="container mt-20">
    <a href="<?= url ?>?controller=Product&action=insertView">
        <button class="btn btn-success">Insertar nou producte</button>
    </a>

    <br><br>
    <table class="table table-striped table-hover">
        <thead>
            <th>ID</th>
            <th>Nom</th>
            <th>Categoria</th>
            <th>IVA</th>
            <th>Preu base</th>
            <th>Preu total</th>
            <th>Oferta</th>
            <th>Preu oferta</th>
            <th>Preu total oferta</th>
            <th colspan="2">Acció</th>

        </thead>
        <tbody>
            <?php foreach($allProducts as $product){ ?>
            <tr>
                <td><?= $product->getId() ?></td>
                <td><?= $product->getName() ?></td>
                <td><?= $product->getCategoryName() ?></td>
                <td><?= $product->getIva() ?>%</td>
                <td><?= $product->getBasePrice() ?></td>
                <td><?= $product->getTotalPrice() ?></td>
                <td>
                    <?php if ($product->isOffer()) { ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
                        </svg>
                    <?php } else { ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                        </svg>
                    <?php } ?>
                </td>
                <td><?= $product->getOfferPrice() != null ? $product->getOfferPrice() : "-" ?></td>
                <td><?= $product->getTotalOfferPrice() != null ? $product->getTotalOfferPrice() : "-" ?></td>
                <td>
                    <a href="<?= url ?>?controller=Product&action=show&id=<?= $product->getId()?>">
                    <button class="btn btn-info">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                        </svg>
                    </button>
                    </a>
                </td>
                <td>
                    <a href="<?= url ?>?controller=Product&action=delete&id=<?= $product->getId()?>">
                        <button class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                        </svg>
                        </button>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</section>
