<section class="container mt-70">
    <h2>Administrador de comandes</h2>
</section>

<section class="container mt-20">
    <table class="table table-striped table-hover">
            <thead>
                <th>ID</th>
                <th>Usuari</th>
                <th>Data</th>
                <th>Pagada</th>
                <th>Preu total</th>
            </thead>
            <tbody>
                <?php foreach($allOrders as $order){ ?>
                    <tr>
                        <td><?= $order->getId() ?></td>
                        <td><?= $order->getUserName() . " " . $order->getUserSurname() ?></td>
                        <td><?= date_format(date_create($order->getDate()), 'Y-m-d H:i') ?></td>
                        <td>
                        <?php if ($order->getIsPaid()) { ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
                            </svg>
                        <?php } else { ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-x" viewBox="0 0 16 16">
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                            </svg>
                        <?php } ?>
                        </td>
                        <td><?= $order->getTotalPrice() ?> €</td>
                    </tr>
                <?php } ?>
            </tbody>
    </table>
</section>