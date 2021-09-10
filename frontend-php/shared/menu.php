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
				<li class="nav-item">
					<a href="./profile.php" class="nav-link">
						Profile
					</a>
				</li>
				<li class="nav-item">
					<a href="./admin.php" class="nav-link">
						Admin
					</a>
				</li>
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
						<li>
							<a class="dropdown-item">
								<button type="button" class="btn text-light ps-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
									Sign in/up
								</button>
							</a>
						</li>
						<li>
							<hr class="dropdown-divider" />
						</li>
						<li>
							<a class="dropdown-item">
								Sign Out <i class="bi bi-box-arrow-right"></i>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>

<?php

require_once("./auth.php"); ?>