<section class="container mt-70 steps">
</section>

<section class="container mt-70">
    <h2>Detalls de la comanda</h2>
    <?php if(isset($order)) { ?>
        <p class="">Data:<?php echo date_format(date_create($order->getDate()), 'Y-m-d H:i') ?></p>    
        <p>Productes</p>
        <ul>
            <?php foreach ($order->getOrderProducts() as $orderProduct) { ?>
            <li><?php echo $orderProduct->getName(); ?> - Quantitat <?php echo $orderProduct->getQuantity(); ?> - Preu <?php echo $orderProduct->getTotalPrice(); ?> </li>
            <?php } ?>
        </ul>
        
    <?php } ?>

</section>
