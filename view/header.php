<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
$orderQuantity = isset($_SESSION['order_quantity']) && $_SESSION['order_quantity'] > 0 ? $_SESSION['order_quantity'] : '';
?>

<header>
	<nav class="navbar navbar-expand-lg preheader">
		
		<div class="container justify-content-end ">
			<div class="button-login">
				<a href="<?= url ?>/index.php?controller=User">Login</a>
			</div>
			<div class="button-resume">				
				<a href="<?= url ?>/index.php?controller=Order">
					<img src="images/iconografia/shoppingcart-white.svg" width="24px" alt="Icone del carrito">Resum compra
					<span class="badge text-bg-secondary"><?= $orderQuantity ?></span>
				</a>
				
			</div>
		</div>
	</nav>

	<nav class="navbar navbar-expand-lg bg-body-tertiary">
		<div class="container">
			<a class="navbar-brand" href="<?= url ?>/index.php?controller=Home">
				<img src="images/logoPrincipal.svg" alt="Logo">
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link menu-link <?= str_contains($_SERVER['REQUEST_URI'], 'controller=Home') ? 'menu-link-active' : '' ?>" 
							href="<?= url ?>/index.php?controller=Home">Restaurant</a>
					</li>

					<li class="nav-item">
						<a class="nav-link menu-link <?= str_contains($_SERVER['REQUEST_URI'], 'controller=Product') ? 'menu-link-active' : '' ?>" 
							href="<?= url ?>/index.php?controller=Product&action=products&category_id=1">Carta</a>
					</li>
				</ul>
				<form class="d-flex" role="search">
					<input class="form-control me-2" type="search" placeholder="Cerca" aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Cercar</button>
				</form>
			</div>
		</div>
	</nav>

</header>