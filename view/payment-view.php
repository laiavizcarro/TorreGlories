<section>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<section class="container mt-70 steps">
    <div class="circle-active">
        <img src="images/iconografia/shoppingcart-white.svg" alt="Icone passos cistella." width="25px">
    </div>
    <div class="rectangle-active">
        <p>Cistella</p>
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


<div class="container checkout">
  <div id="Checkout" class="inline payment mt-10">
      <div class="card-row">
        <img class="payment-card" src="images/iconografia/visa-4.svg" alt="Logo targeta VISA">
        <img class="payment-card" src="images/iconografia/mastercard-6.svg" alt="Logo targeta Mastercard">
        <img class="payment-card" src="images/iconografia/maestro-2.svg" alt="Logo targeta Mastercard">
      </div>
      <form>
        
          <div class="form-group">
              <label or="NameOnCard">Nom</label>
              <input id="NameOnCard" class="form-control" type="text" maxlength="255"></input>
          </div>
          <div class="form-group">
              <label for="CreditCardNumber">Número de targeta</label>
              <input id="CreditCardNumber" class="null card-image form-control" type="text"></input>
          </div>
          <div class="expiry-date-group form-group">
              <label for="ExpiryDate">Data caducitat</label>
              <input id="ExpiryDate" class="form-control" type="text" placeholder="MM / AA" maxlength="7"></input>
          </div>
          <div class="security-code-group form-group">
              <label for="SecurityCode">Codi seguretat</label>
              <div class="input-container" >
                  <input id="SecurityCode" class="form-control" type="text" ></input>
              </div>
              <div class="cvc-preview-container two-card hide">
                  <div class="amex-cvc-preview"></div>
                  <div class="visa-mc-dis-cvc-preview"></div>
              </div>
          </div>
          
          <button id="PayButton" class="btn btn-block btn-success submit-button mt-10" type="submit">
              <span class="align-middle">Pagar <?=PriceCalculator::calculateOrderTotalPrice($order)?>€</span>
          </button>
      </form>
  </div>
</div>
</section>