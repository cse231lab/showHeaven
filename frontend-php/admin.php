<?php
require_once("./shared/header.php");
?>

<div class="pt-5 pb-5">
	<div class="d-flex">
		<button class="btn btn-secondary rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#userc" aria-expanded="false" aria-controls="userc">
			UserList
		</button>
		<button class="btn btn-secondary rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#showc" aria-expanded="false" aria-controls="showc">
			Non public show list
		</button>
	</div>

	<div class="collapse" id="userc">
		<div class="d-flex flex-column">
			<h5>Users</h5>

			<?php require_once("./userlist.php"); ?>
		</div>
	</div>
	<div class="collapse" id="showc">
		<h5>Non Public Shows</h5>
		<?php require_once("./AdminShowList.php"); ?>

	</div>
</div>

<?php
require_once("./shared/footer.php");
?>