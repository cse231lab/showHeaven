<?php
require_once("./shared/header.php");
require_once("../backend/db/show.php");
require_once("functions.php");
if ((isset($_SESSION["IS_ADMIN"]) && $_SESSION["IS_ADMIN"] == 1) == false) {
	redirect("./showlist.php");
}

if (isset($_POST["add_show_name"])) {
	createShow($_POST["add_show_name"]);
	echo "<meta http-equiv='refresh' content='0'>";
}

?>

<div class="pt-5 pb-5">
	<div class="d-flex">
		<button class="btn btn-secondary rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#userc" aria-expanded="false" aria-controls="userc">
			UserList
		</button>
		<button class="btn btn-secondary rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#showc" aria-expanded="false" aria-controls="showc">
			Non public show list
		</button>
		<button class="btn" data-bs-toggle="modal" data-bs-target="#requestShow">
			<i class="bi bi-tv"></i> Add Show
		</button>
		<a class="btn" href="deletedshowlist.php">
			<i class="bi bi-tv"></i> Deleted Shows
		</a>
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

	<div class="modal fade" id="requestShow" tabIndex="-1" aria-labelledby="authModal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content pb-3">
				<div class="modal-header">
					<div class="modal-title d-flex justify-content-between align-items-center w-100">
						<h4>Add Show</h4>

						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
				</div>
				<div class="modal-body">
					<form action="" method="POST">
						<input type="text" class="form-control" placeholder="Tittle" name="add_show_name" />
						<button class="btn" type="submit">

							Submit
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
require_once("./shared/footer.php");
?>