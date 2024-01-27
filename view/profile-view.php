

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
                    <button type="submit" value="submit" class="btn-submit fw-bold">Actualitzar</button>
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
        <?php if(isset($orders)) { ?>
            <?php foreach ($orders as $order) { ?>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="card product-card">
                    <div class="card-body">
                        <p class="card-title"><?php echo date_format(date_create($order->getDate()), 'Y-m-d H:i') ?></p>
                        <span> <?= $order->getTotalPrice() ?> € </span>

                        <div class="d-flex justify-content-between">
                            <div>
                                <?php if ($order->getIsPaid()) { ?>
                                    <span class="badge rounded-pill text-bg-success">Pagada</span>
                                <?php } else { ?>
                                    <span class="badge rounded-pill text-bg-warning">Pendent</span>
                                <?php } ?>
                            </div>
                            <?php if (!$order->hasReview()) { ?>
                            <button type="button" class="btn btn-primary add-review" data-bs-toggle="modal" data-bs-target="#review-modal" data-bs-orderId="<?php echo $order->getId() ?>">
                                Ressenya
                            </button>
                            <?php } ?>
                            <a href="<?= url ?>?controller=Order&action=repeatOrder&orderId=<?= $order->getId() ?>">
                                <button class="btn-add">Repetir</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        <?php } ?>
    </div>
</section>

<div class="modal fade" id="review-modal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="reviewModalLabel">Afegir ressenya</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form onsubmit="return saveReview()" id="reviewForm">
        <div class="modal-body">
            <div class="col-md-12">
                <?php echo $_SESSION['name'] . ' ' . $_SESSION['surname']; ?>
                <?php echo $_SESSION['email']; ?>
            </div>

            <div class="col-md-12">
                <fieldset>
                    <span class="star-cb-group">
                        <input type="radio" id="rating-5" name="rate" value=5 />
                        <label for="rating-5">5</label>
                        <input type="radio" id="rating-4" name="rate" value=4 />
                        <label for="rating-4">4</label>
                        <input type="radio" id="rating-3" name="rate" value=3 />
                        <label for="rating-3">3</label>
                        <input type="radio" id="rating-2" name="rate" value=2 />
                        <label for="rating-2">2</label>
                        <input type="radio" id="rating-1" name="rate" value=1 />
                        <label for="rating-1">1</label>
                        <input type="radio" id="rating-0" name="rate" value=0 class="star-cb-clear" checked="checked" />
                        <label for="rating-0">0</label>
                    </span>
                </fieldset>

                <div class="col-md-12">
                    <input type="hidden" id="orderId" name="orderId" class="form-control" placeholder="Order de la ressenya" disabled readonly>

                    <!--<label for="review-name" class="form-label">Titol:</label>-->
                    <input type="text" id="title" name="title" class="form-control" placeholder="Titol de la ressenya" required>
                    <textarea name="review" id="review" cols="30" rows="5" class="form-control tg-text-area mt-10" placeholder="Valora la teva experiència amb el restaurant i la comanda."></textarea>
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="js/profile.js"></script>