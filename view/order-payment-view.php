<section>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<section class="container mt-70 steps">
    <div class="circle">
        <img src="images/iconografia/shoppingcart.svg" alt="Icone passos cistella." width="25px">
    </div>
    <div class="rectangle">
        <p>Cistella</p>
    </div>
    <div class="circle active">
        <img src="images/iconografia/steps-card-white.svg" alt="Icone passos targeta pagament." width="25px">
    </div>
    <div class="rectangle active">
        <p>Pagament</p>
    </div>

    <div class="circle">
        <img src="images/iconografia/steps-confirmation.svg" alt="Icone passos confirmació" width="20px">
    </div>
    <div class="rectangle">
        <p>Confirmació</p>
    </div>
</section>


<section class="container d-flex justify-content-center mt-20">
  <div class="payment">
      <div class="d-flex justify-content-center">
        <img src="images/iconografia/visa-4.svg" alt="Logo targeta VISA" width="50px">
        <img src="images/iconografia/mastercard-6.svg" alt="Logo targeta Mastercard" width="50px">
        <img src="images/iconografia/maestro-2.svg" alt="Logo targeta Maestro" width="50px">
      </div>
      <form method="POST" action="<?= url ?>/index.php?controller=Order&action=checkoutPayment">
        
          <div class="form-group">
              <label or="NameOnCard">Nom</label>
              <input id="NameOnCard" name="card-name" class="form-control" type="text" maxlength="255" required></input>
          </div>
          <div class="form-group mt-10">
              <label for="CreditCardNumber">Número de targeta</label>
              <input id="CreditCardNumber" name="card-number" class="null card-image form-control" type="tel" maxlength="16" pattern="\d*" required></input>
          </div>
          <div class="expiry-date-group form-group  mt-10">
              <label for="ExpiryDate">Data caducitat</label>
              <input id="ExpiryDate" name="card-expiry-date" class="form-control" type="text" placeholder="MM / AA" maxlength="7" pattern="\d{2}\s?\/\s?\d{2}" required></input>
          </div>
          <div class="security-code-group form-group  mt-10">
              <label for="SecurityCode">Codi seguretat</label>
              <div class="input-container" >
                  <input id="SecurityCode" name="card-cvv" class="form-control" type="text" maxlength="3" pattern="\d{3}" required></input>
              </div>
          </div>
          
          <button id="PayButton" class="btn btn-block btn-success btn-submit mt-10" type="submit">
              <span class="align-middle">Pagar <?=PriceCalculator::calculateOrderTotalPrice($order)?>€</span>
          </button>

          <p class="error">
                <?php echo isset($error) ? $error : "" ?>
            </p>
      </form>
  </div>
</section>