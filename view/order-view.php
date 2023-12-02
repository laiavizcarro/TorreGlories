<!-- STEPS ORDER MENU -->
<section class="container mt-70 steps">
    <div class="circle-active">
        <img src="images/iconografia/shoppingcart-white.svg" alt="Icone passos cistella." width="25px">
    </div>
    <div class="rectangle-active">
        <p>Confirmació cistella</p>
    </div>
    
    <div class="circle-disabled">
        <img src="images/iconografia/steps-menu.svg" alt="Icone passos menu." width="25px">
    </div>
    <div class="rectangle-disabled">
        <p>Dades personals</p>
    </div>

    <div class="circle-disabled">
        <img src="images/iconografia/steps-card.svg" alt="Icone passos targeta pagament." width="25px">
    </div>
    <div class="rectangle-disabled">
        <p>Pagament</p>
    </div>

    <div class="circle-disabled">
        <img src="images/iconografia/steps-confirmation.svg" alt="Icone passos confirmació" width="20px">
    </div>
    <div class="rectangle-disabled">
        <p>Confirmació</p>
    </div>
</section>


<!-- ORDER RESUME -->
<section class="container mt-70 mb-1">
    <div class="order">
        <div class="orderHeader">
            <h8 style="margin: 20px;">RESTAURANT TORRE GLÒRIES</h8>
            <img src="images/iconografia/shoppingcart-white.svg" alt="Logo del carrito" width="24px" style="margin-left: 20px;">
        </div>
        
    
        <?php if(empty($order)) { ?>
            <div class="cart-empty-message">
                The cart is empty
                <img src="images/iconografia/empty-cart.svg" class="cart-image" alt="Logo de la cistella buida.">
            </div>
            
        <?php } else { ?>
            <p style="margin: 10px;">Detalls cistella</p>

            <div class="orders">
                <table class="table" style="max-width: 1100px; margin: 0px 40px;">
                    <thead>
                        <tr>
                            <th>Producte</th>
                            <th></th>
                            <th>Preu Unitat</th>
                            <th>Total</th>
                            <th>Quantitat</th>
                            <th></th>                                 
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php foreach($order as $orderLine) { ?>
                        <tr>
                            <td class="align-middle" style="width: 10%">
                                <img src="<?php echo $orderLine->getProduct()->getImg_path() ?>" class="order-product-image" alt="Imatge del producte" height="75px">
                            </td>
                            <td class="align-middle text-start" style="width: 40%;">
                                <?=$orderLine->getProduct()->getName()?>
                            </td>
                            <td class="align-middle">
                                <?=$orderLine->getProduct()->getTotal_Price()?>€
                            </td>
                            <td class="align-middle">
                                <?=PriceCalculator::calculateProductTotalPrice($orderLine)?>€
                            </td>
                            <td class="align-middle">
                                <form action="<?= url ?>/index.php?controller=Order&action=increaseOrDecrease" method="POST">
                                    <input type="hidden" name="prd" value="<?=$orderLine->getProduct()->getId()?>">
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button type="submit" class="btn btn-add-del" name="decrease" value="<?=$orderLine->getProduct()->getId()?>"> - </button>
                                        <button type="button" class="btn no-btn"><?=$orderLine->getQuantity()?></button>
                                        <button type="submit" class="btn btn-add-del" name="increase" value="<?=$orderLine->getProduct()->getId()?>"> + </button>
                                    </div>
                                </form>
                            </td>
                            <td class="align-middle">
                                <a href="<?= url ?>/index.php?controller=Order&action=delete&product_id=<?=$orderLine->getProduct()->getId()?>">
                                    <img src="images/iconografia/paperera.svg" height="25px" alt="Logo escombraries, esborrar producte">
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            
                            <td colspan="2" style="text-align:right;">TOTAL <?=PriceCalculator::calculateOrderTotalPrice($order)?>€</td>
                            <td>
                                <button class="button-resume" style="color:white; font-weight: bold; width:200px; height: 50px" >FINALITZAR COMPRA</button>
                            </td>
                            <td></td>
                        </tr>                      
                    </tfoot>
                </table>
            </div>
        <?php } ?>

    </div>

</section>