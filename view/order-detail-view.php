<section class="container mt-70 steps">
</section>

<section class="container mt-70">
    <h2>Detalls de la comanda</h2>
    <?php if(isset($order)) { ?>
        <p class=""><strong>Data:</strong> <?php echo date_format(date_create($order->getDate()), 'Y-m-d H:i') ?></p>
        <p class=""><strong>Preu total:</strong> <?php echo $order->getTotalPrice() ?>€</p>
        <p class=""><strong>Propina:</strong> <?php echo $order->getTip() ? $order->getTip() . "€" : "No" ?></p>
        <p><strong>Productes:</strong></p>
        <ul>
            <?php foreach ($order->getOrderProducts() as $orderProduct) { ?>
            <li><?php echo $orderProduct->getName(); ?> - Quantitat <?php echo $orderProduct->getQuantity(); ?> - Preu <?php echo $orderProduct->getTotalPrice(); ?> </li>
            <?php } ?>
        </ul>
        
    <?php } ?>

</section>
