<?php
require_once("header.php");
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
		<a class="navbar-brand" href="./">Navbar</a>
		<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mainnavbar">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="mainnavbar">
			<ul class="navbar-nav ms-auto">
				<li class="nav-item">
					<a class="nav-link" href="./show.php">Shows</span></a>
				</li>
				<li class="nav-item dropdown ">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
						<i class="bi bi-person-circle"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
						<li><a class="dropdown-item" href="#">Sign in</a></li>
						<li><a class="dropdown-item" href="#">Profile</a></li>
						<li><a class="dropdown-item" href="#">Follows</a></li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li><a class="dropdown-item" href="#">Sign Out <i class="bi bi-box-arrow-right"></i></a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
<?php
require_once("footer.php");
?>