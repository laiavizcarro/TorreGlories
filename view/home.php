<section class="container-fluid">
	<div id="carouselExample" class="carousel slide">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="images/home/banner_restaurant.jpg" class="d-block w-100" alt="Imatge del restaurant.">
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
	<div>
		<h2>Benvinguts al Restaurant Torre Glòries</h2>
		<h6>Una experiència inoblidable per a descobrir nous sabors des del restaurant ubicat al mirador.</h6>
	</div>
</section>

<section class="container mt-70">
	<div class="row g-4">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div class="p-5 home-welcome-primary">
				<h3>Plats cassolans</h3>
				<p style="color: white; font-size:19px;">Vine a provar els nostres plats cassolans, cuinats pel xef de la casa.
					Recomanem els canelons de la iaia i el pastís de formatge per a un menú complet.
				</p>
				<a href="<?= url ?>/index.php?controller=Product&action=products&category_id=1">
					<button class="btn btn-outline-primary">Consultar</button>
				</a>

			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div class="p-5 home-plates-bg"></div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div class="p-5 home-breakfast-bg"></div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div class="p-5 home-welcome-secondary">

				<div class="container ">
					<div class="row align-items-center">
						<div class="col-2">
							<img src="images/iconografia/sandwich.svg" alt="" height="80" width="80">
						</div>
						<div class="vl col-1"></div>
						<div class="col-9">
							<h4>Esmorzars i berenars</h4>
							<p style="color:white">Prova el croissant de mantega i el biquini planxat calent estrella de torre Glòries.</p>
							<a href="<?= url ?>/index.php?controller=Product&action=products&category_id=4">
								<button class="btn btn-outline-primary">Consultar</button>
							</a>

						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div class="p-5 home-welcome-secondary">
				<div class="container ">
					<div class="row align-items-center">
						<div class="col-2">
							<img src="images/iconografia/drink.svg" alt="" height="80" width="80">
						</div>
						<div class="col-10">
							<h4>Begudes</h4>
							<p style="color:white">Consulta les nostres begudes i cocktails premium per acompanyar els teus àpats.</p>
							<a href="<?= url ?>/index.php?controller=Product&action=products&category_id=3">
								<button class="btn btn-outline-primary">Consultar</button>
							</a>
						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
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
			<div class="p-5 home-offer-breakfast-bg">
				<h5>Entrepà vegetal més suc o cafè</h5>
				<button class="btn btn-outline-secondary">Accedir</button>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
			<div class="p-5 home-offer-pasta-bg">
				<h5>Plat de pasta i postre</h5>
				<button class="btn btn-outline-secondary">Accedir</button>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
			<div class="p-5 home-offer-toast-bg">
				<h5>Torrades amb melmelada</h5>
				<button class="btn btn-outline-secondary">Accedir</button>
			</div>
		</div>

	</div>
</section>

<section class="container-fluid mt-70">
	<div class="calendar">
		<div class="container">
			<div class="row g-4">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="p-5 ">
						<!--<img src="images/iconografia/horarios-1.svg" alt="" width="100px">-->
						<img src="images/iconografia/calendar-clock.svg" alt="" width="50px"><h7>Dinars i sopars</h7>
						<p style="font-weight: bold; color: black ">Durant tot l'any</p>
						<p>De dilluns a diumenge, de 12 a 15:30 h i de 20:00 a 00:00 h.</p>
						<p style="font-weight: bold; color: black ">Dies de tancament</p>
						<p>Mirador torre Glòries tancarà els dies 25 de desembre i 1 de gener.
							Els dies 24 i 31 de desembre, Restaurant torre Glòries obrirà de 9:00 a 15 h.
						</p>			
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="p-5">
						<h7>Esmorzars i berenars</h7>
						<p style="font-weight: bold; color: black ">Durant tot l'any</p>
						<p>De dilluns a diumenge, de 7:30 a 11:45 h i de 16:00 a 19:45 h.</p>
						<p style="font-weight: bold; color: black ">Dies de tancament</p>
						<p>Mirador torre Glòries tancarà els dies 25 de desembre i 1 de gener.
						Els dies 24 i 31 de desembre, Restaurant torre Glòries obrirà de 9:00 a 15 h.
						</p>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>