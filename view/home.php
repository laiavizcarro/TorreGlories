<section class="container-fluid">
	<div id="carouselExample" class="carousel slide">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="images/home/banner_restaurant.jpg" class="d-block w-100" alt="Imatge del restaurant.">
				<div class="carousel-content">
					<h1>Restaurant Torre Glòries</h1>
				</div>
			</div>
			<div class="carousel-item">
				<img src="images/home/banner_vistes.jpeg" class="d-block w-100" alt="Imatge de les vistes del restaurant.">
			</div>
			<div class="carousel-item">
				<img src="images/home/banner_coctail.webp" class="d-block w-100" alt="Imatge dels coctails del restaurant.">
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>

</section>

<section class="container text-center mt-70">
	<h2>Menja a Barcelona com mai</h2>
	<h4>Una experiència inoblidable per a descobrir nous sabors des del restaurant ubicat al mirador.</h4>
</section>

<section class="container mt-70">
	<div class="row g-4">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
			<div class="p-5 home-welcome-primary">
				<h3 class="text-pink">Plats cassolans</h3>
				<p class="text-white" style="font-size:19px;">Vine a provar els nostres plats cassolans, cuinats pel xef de la casa.
					Recomanem els canelons de la iaia i el pastís de formatge per a un menú complet.
				</p>
				<a href="<?= url ?>/index.php?controller=Product&action=products&category_id=1">
					<button class="btn btn-outline-primary">Consultar</button>
				</a>		
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
			<div class="p-5 home-plates-bg"></div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
			<div class="p-5 home-breakfast-bg"></div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
			<div class="home-welcome-secondary">
				<div class="row">
					<div class="col-2 d-flex justify-content-center">
						<img src="images/iconografia/sandwich.svg" alt="Icone d'un sandwich">
					</div>
					<div class="col-1 d-flex justify-content-center">
						<div class="home-vertical-separator"></div>
					</div>
					<div class="col-9 d-flex flex-column">
						<h3 class="h3-smallest text-white">Esmorzars i berenars</h3>
						<p class="text-white">Prova el croissant de mantega i el biquini planxat calent estrella de torre Glòries.</p>
						<a href="<?= url ?>/index.php?controller=Product&action=products&category_id=4">
							<button class="btn btn-outline-primary">Consultar</button>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
			<div class="home-welcome-secondary">
				<div class="row">
					<div class="col-2">
						<img src="images/iconografia/drink.svg" alt="Icono d'una beguda.">
					</div>
					<div class="col-1 d-flex justify-content-center">
						<div class="home-vertical-separator"></div>
					</div>
					<div class="col-9 d-flex flex-column">
						<h3 class="h3-smallest text-white">Begudes</h3>
						<p class="text-white">Consulta les nostres begudes i cocktails premium per acompanyar els teus àpats.</p>
						<a href="<?= url ?>/index.php?controller=Product&action=products&category_id=3">
							<button class="btn btn-outline-primary">Consultar</button>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
			<div class="p-5 home-drinks-bg">
			</div>
		</div>
	</div>
</section>

<section class="container text-center mt-70">
	<div>
		<h2>Consulta les nostres ofertes</h2>
	</div>
</section>

<section class="container mt-70">
	<div class="row g-4">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
			<div class="p-5 home-offer home-offer-breakfast-bg">
				<div class="home-offer-heading">
					<h3 class="h3-offers">Entrepà vegetal més suc</h3>
				</div>
				<a href="<?= url ?>/index.php?controller=Product&action=products&category_id=4&product_id=26">
				<div class="d-flex justify-content-center text-center">
					<button class="btn home-offer-button">Accedir</button>
				</div>
				</a>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
			<div class="p-5 home-offer home-offer-pasta-bg">
				<div class="home-offer-heading">
					<h3 class="h3-offers">Plat de pasta i postre</h3>
				</div>
				<a href="<?= url ?>/index.php?controller=Product&action=products&category_id=1&product_id=27">
				<div class="d-flex justify-content-center text-center">
					<button class="btn home-offer-button">Accedir</button>
				</div>
				</a>
			</div>	
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
			<div class="p-5 home-offer home-offer-toast-bg">
				<div class="home-offer-heading">
					<h3 class="h3-offers">Torrades amb melmelada</h3>
				</div>
				<a href="<?= url ?>/index.php?controller=Product&action=products&category_id=4&product_id=28">
				<div class="d-flex justify-content-center text-center">
					<button class="btn home-offer-button">Accedir</button>
				</div>
				</a>
			</div>
		</div>

	</div>
</section>

<section class="container-fluid mt-70 calendar">
	<div class="container">
		<div class="row g-4">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 p-5">
				<div class="horaris">
					<img src="images/iconografia/horarios-1.svg" alt="Imatge d'un calendari per mostrar horaris i calendari" width="80px">
					<div class="horaris-content">
						<h5>Dinars i sopars</h5>
						<p class="text-black fw-bold">Durant tot l'any</p>
						<p>De dilluns a diumenge, de 12 a 15:30h i de 20:00 a 00:00h.</p>
						<p class="text-black fw-bold">Dies de tancament</p>
						<p>Mirador torre Glòries tancarà els dies 25 de desembre i 1 de gener.
							Els dies 24 i 31 de desembre, Restaurant torre Glòries obrirà de 9:00 a 15 h.
						</p>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 p-5">
				<div class="">
					<h5>Esmorzars i berenars</h5>
					<div class="horaris-content">
						<p class="text-black fw-bold">Durant tot l'any</p>
						<p>De dilluns a diumenge, de 7:30 a 11:45h i de 16:00 a 19:45h.</p>
						<p class="text-black fw-bold">Dies de tancament</p>
						<p>Mirador torre Glòries tancarà els dies 25 de desembre i 1 de gener.
							Els dies 24 i 31 de desembre, Restaurant torre Glòries obrirà de 9:00 a 15h.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
	


<section class="container-fluid mt-70">
    <img src="images/footer/mapa.svg" alt="Imatge del mapa d'on es troba ubicat el restaurant i els mètodes de transport.">
</section>

<section class="container-fluid" style="margin-bottom: -70px;">
	<div class="contact">
		<div class="container d-flex justify-content-between">
			<p>Estàs pensant a celebrar un esdeveniment exclusiu en un lloc emblemàtic de Barcelona?</p>
			<button class="btn btn-outline-primary">Contacta amb nosaltres</button>
		</div>
	</div>
</section>