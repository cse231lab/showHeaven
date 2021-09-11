<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
		<a href="./showlist.php" class="navbar-brand">
			ShowHeaven
		</a>
		<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mainnavbar">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="mainnavbar">
			<ul class="navbar-nav ms-auto pe-5">
				<li class="nav-item">
					<a href="./showlist.php" class="nav-link">
						Show List
					</a>
				</li>
				<li class="nav-item">
					<a href="./show.php" class="nav-link">
						Show
					</a>
				</li>
				<?php

				if (isset($_SESSION["handle"]) && $_SESSION["handle"] != "") {
					echo "
		<li class=\"nav-item\">
			<a href=\"./profile.php?handle=" . $_SESSION["handle"] . "\" class=\"nav-link\">
			" . $_SESSION["handle"] . "
			</a>
		</li>";
				}
				if (isset($_SESSION["IS_ADMIN"]) && $_SESSION["IS_ADMIN"] == 1) {

					echo "
						<li class=\"nav-item\">
						<a href=\"./admin.php\" class=\"nav-link\">
						Admin
						</a>
						</li>
						";
				}
				?>
				<li class="nav-item">
					<a href="./watchlist.php" class="nav-link">
						list
					</a>
				</li>
				<li class="nav-item dropdown ">
					<a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
						<i class="bi bi-person-circle"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
						<?php

						if (isset($_SESSION["handle"]) && $_SESSION["handle"] == "") {
							echo "
							<li>
							<a class=\"dropdown-item\">
							<button type=\"button\" class=\"btn text-light ps-0\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\">
							Sign in/up
							</button>
							</a>
							</li>";
						} else {
							echo "
							<li>
							<a class=\"dropdown-item\" href=\"./logout.php\">
							Sign Out <i class=\"bi bi-box-arrow-right\"></i>
							</a>
							</li>";
						}
						?>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>

<?php

require_once("./auth.php"); ?>