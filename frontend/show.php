<?php
require_once("./components/menu.php");
?>

<div class="container">

	<!-- <form action="" class=""> -->
	<div class="col-6">
		<div class="input-group p-3">
			<label for="searchField" class="input-group-text">Search</label>
			<input class="form-control" id="searchField" placeholder="Type to search...">
		</div>
	</div>
	<!-- </form> -->

	// ShowList.tsx // ShowItem

	<ul class="list-group" id="show-list">
		<li class="list-group-item border-0">
			<div class="card mb-3">
				<div class="row g-0">
					<div class="col-3 d-flex align-items-center">
						<img src="${dat.image}" class="img-fluid rounded-start" alt="...">
					</div>
					<div class="col-8">
						<div class="card-body">
							<a class="card-title" href="./profile.php?id=${dat.id}">
								<h5>${dat.name}</h5>
							</a>
							<p class="card-text">${dat.about}</p>
							<p class="card-text"> Tags: ${dat.tags.toString()}</p>
							<p class="card-text"><small class="text-muted">${dat.updated_at}</small></p>
						</div>
					</div>
				</div>
			</div>
		</li>
	</ul>
</div>

<script src="./js/show.js">

</script>