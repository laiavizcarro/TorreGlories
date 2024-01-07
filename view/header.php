<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
$orderQuantity = isset($_SESSION['order_quantity']) && $_SESSION['order_quantity'] > 0 ? $_SESSION['order_quantity'] : '';
?>

<header>
	<nav class="navbar navbar-expand-lg preheader">
		<div class="container justify-content-end ">
				<?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] = true) { ?>
					<div class="dropdown">
						<button class="btn dropdown-toggle tg-btn-dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
							<?php echo $_SESSION['name'] ?>
						</button>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="<?= url ?>/index.php?controller=Profile">Perfil</a></li>
							<li><a class="dropdown-item" href="<?= url ?>/index.php?controller=User&action=logout">Tancar sessió</a></li>
						</ul>
					</div>
					
				<?php } else { ?>
					<div class="button-login">
					<a href="<?= url ?>/index.php?controller=User&action=loginView">Login</a>
					</div>
				<?php } ?>
			
			<div class="button-resume">
				<a href="<?= url ?>/index.php?controller=Order">
					<img src="images/iconografia/shoppingcart-white.svg" width="24px" alt="Icone de la cistella, redirigeix al resum de la compra">Resum compra
					<span class="badge text-bg-secondary"><?= $orderQuantity ?></span>
				</a>

			</div>
		</div>
	</nav>

	<nav class="navbar navbar-expand-lg bg-body-tertiary">
		<div class="container">
			<a class="navbar-brand" href="<?= url ?>/index.php?controller=Home">
				<img src="images/logoPrincipal.svg" alt="Logo principal de la web, redirigeix a la pàgina principal">
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link menu-link <?= str_contains($_SERVER['REQUEST_URI'], 'controller=Home') ? 'active' : '' ?>" href="<?= url ?>/index.php?controller=Home">Restaurant</a>
					</li>
					<li class="nav-item">
						<a class="nav-link menu-link <?= str_contains($_SERVER['REQUEST_URI'], 'controller=Product&action=products') ? 'active' : '' ?>" href="<?= url ?>/index.php?controller=Product&action=products&category_id=1">Carta</a>
					</li>
					<?php if (isset($_SESSION['loggedIn'], $_SESSION['isAdmin']) && $_SESSION['isAdmin'] == true) { ?>
						<li class="nav-item dropdown">
							<a class="nav-link menu-link dropdown-toggle <?= str_contains($_SERVER['REQUEST_URI'], 'controller=Product') && !str_contains($_SERVER['REQUEST_URI'], 'controller=Product&action=products') ? 'active' : '' ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Admin
							</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="<?= url ?>/index.php?controller=Product">Productes</a></li>
								<li><a class="dropdown-item" href="<?= url ?>/index.php?controller=User">Usuaris</a></li>
								<li><a class="dropdown-item" href="<?= url ?>/index.php?controller=Order&action=getOrders">Comandes</a></li>
							</ul>
							</li>
					<?php } ?>
				</ul>
				<form class="d-flex" role="search">
					<input class="form-control me-2" type="search" placeholder="Cerca" aria-label="Buscador">
					<button class="btn btn-outline-success" type="submit">Cercar</button>
				</form>
			</div>
		</div>
	</nav>

</header>