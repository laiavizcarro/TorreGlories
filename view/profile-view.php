<?php if (isset($lastOrder)) { ?>
<section class="container-fluid">
    <div class="col-xs-12 col-sm-12 col-md-12 last-order">
        <div class="container">
            <h4>Última Comanda (<?php echo date_format(date_create($lastOrder->getDate()), 'Y-m-d H:i') ?>)</h4>
            <p>Total: <?php echo $lastOrder->getTotalPrice() ?> €</p>
            <a href="<?= url ?>/index.php?controller=Order&action=repeatOrder&orderId=<?=$lastOrder->getId()?>">
                <button class="btn btn-outline-primary">Repetir comanda</button>
            </a>  
        </div>
    </div>
</section>
<?php } ?>

<section class="container mt-70">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h4>Dades Personals</h4>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h4>Comandes</h4>
        </div>
    </div>
</section>