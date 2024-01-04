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
            <h2>Dades Personals</h2>
            <form class="tg-form row g-3" action="<?= url ?>/index.php?controller=Profile&action=update" method="POST">
                <div class="col-md-3">    
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?= $user->getName()?>" required>
                </div>

                <div class="col-md-3"> 
                    <label for="surname" class="form-label">Cognoms</label>
                    <input type="text" id="surname" name="surname" class="form-control" value="<?= $user->getSurname()?>" required>
                </div>

                <div class="col-md-3">
                    <label for="email" class="form-label">Correu</label>
                    <input type="text" id="email" name="email" class="form-control" value="<?= $user->getEmail()?>" disabled>
                </div>

                <div class="col-md-3">
                <?php if ($user->isAdmin()) { ?>
                    <label for="incorporation_date" class="form-label">Data incorporació</label>
                    <input type="date" id="incorporation_date" name="incorporation_date" class="form-control" value="<?= $user->getIncorporationDate()?>" required pattern="^[\d]{9}$">

                <?php } else { ?>
                    <label for="phone_number" class="form-label">Telefon</label>
                    <input type="text" id="phone_number" name="phone_number" class="form-control" value="<?=$user->getPhoneNumber()?>" required pattern="^[\d]{9}$">
                <?php } ?>
                </div>

                <div class="col-md-3">
                    <label for="password" class="form-label">Contrasenya antiga</label>
                    <input type="password" id="old_password" name="old_password" class="form-control">
                </div>

                <div class="col-md-3">
                    <label for="new_password" class="form-label">Contrasenya nova</label>
                    <input type="password" id="new_password" name="new_password" class="form-control">
                </div>

                <div class="col-md-6"></div>

                <div class="col-md-12">
                    <button type="submit" value="submit" class="btn-submit bold">Actualitzar</button>
                </div>

                <p class="error">
                    <?php echo isset($error) ? $error : "" ?>
                </p>
            </form>
        </div>
    </div>
</section>

<section class="container">
    <div class="row">
        <h2>Comandes</h2>
        <?php foreach ($orders as $order) { ?>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="card product-card">
                <div class="card-body">
                    <p class="card-title"><?php echo date_format(date_create($order->getDate()), 'Y-m-d H:i') ?></p>
                    <span> <?= $order->getTotalPrice() ?> € </span>

                    <div>
                        <div>
                            <?php if ($order->getIsPaid()) { ?>
                                <span class="badge rounded-pill text-bg-success">Pagada</span>
                            <?php } else { ?>
                                <span class="badge rounded-pill text-bg-warning">Pendent</span>
                            <?php } ?>
                        </div>
                        <div class="justify-content-end">
                            <a href="<?= url ?>?controller=Order&action=repeatOrder&orderId=<?= $order->getId() ?>">
                                <button class="btn-add">Repetir</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</section>