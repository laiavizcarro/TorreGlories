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
        <div class="circle">
            <img src="images/iconografia/steps-card.svg" alt="Icone passos targeta pagament." width="25px">
        </div>
        <div class="rectangle">
            <p>Pagament</p>
        </div>

        <div class="circle active">
            <img src="images/iconografia/steps-confirmation-white.svg" alt="Icone passos confirmació" width="20px">
        </div>
        <div class="rectangle active">
            <p>Confirmació</p>
        </div>
    </section>

    <section class="container mt-70">
        <h2>Order QR</h2>
        <p>La comanda s'ha realitzat correctament</p>
        <img src="<?php echo $qrCodePath; ?>" alt="Order QR Code">    </section>
</section>