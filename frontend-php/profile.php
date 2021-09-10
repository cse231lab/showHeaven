<?php
require_once("./shared/header.php");
require_once("./functions.php");


if (!isset($_GET["handle"])) {
	redirect("./showlist.php");
}

$handle = $_GET["handle"];

require_once("../backend/db/usertable.php");
$user = retrieveUser($handle);
if ($user == false) {
	redirect("./showlist.php");
}
?>

<div class=" d-flex flex-sm-column-reverse flex-md-row  justify-content-around p-3  profilegrid ">
	<div class="w-50 d-flex col-6 flex-column border border-2 border-dark rounded">
		<div class="d-flex  p-3 bg-light  ">
			<div class="  col-2 m-3 ">Name:</div>
			<div class="    m-3 "><?php echo $user["name"]; ?></div>
		</div>

		<div class="d-flex  p-3 bg-light  ">
			<div class="  col-2 m-3 ">Handle:</div>
			<div class="    m-3 "><?php echo $user["handle"]; ?></div>
		</div>

		<div class="d-flex  p-3   ">
			<div class="  col-2 m-3 ">Email:</div>
			<div class="    m-3 "><?php echo $user["email"]; ?></div>
		</div>

		<div class="d-flex  p-3 bg-light  ">
			<div class="  col-2 m-3 ">Joined at:</div>
			<div class="    m-3 "><?php echo $user["created_at"]; ?></div>
		</div>
	</div>

	<div class="m-auto col-6 ps-3 d-flex flex-column justify-content-center">
		<div class=" border border-5 border-dark rounded dp">
			<img src=" <?php echo $user['image']; ?>" />
		</div>

		<div class="d-flex  p-3 ">
			<?php echo $user["about"]; ?>
		</div>
	</div>
</div>

<div class="d-flex">

	<button class="btn" data-bs-toggle="modal" data-bs-target="#AddList">

		<i class="bi bi-list"></i> Add List
	</button>

	<button class="btn" data-bs-toggle="modal" data-bs-target="#editP">

		<i class="bi bi-person-lines-fill"></i> Edit Profile
	</button>
</div>

<div class="d-flex flex-column">
	<h5 class="text-start">@<?php echo $user["handle"]; ?>'s Lists</h5>
	<div class="d-flex row">
		<?php

		require_once("./Indlist.php");
		require_once("../backend/db/watchlist.php");

		$res = getList($user["handle"]);

		foreach ($res as $key => $value) {
			indList($value);
		}

		?>
	</div>
</div>

<div class="d-flex flex-column pb-5">
	<h5 class="text-start">@<?php echo $user["handle"]; ?>'s Follows</h5>
	<div class="d-flex row">
		<?php
		require_once("./Indlist.php");
		require_once("../backend/db/watchlist.php");

		$follows = getFollow($user["id"]);

		foreach ($follows as $key => $value) {
			indList($value);
		}

		?>
	</div>
</div>



<div class="modal fade" id="AddList" tabIndex="-1" aria-labelledby="authModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content pb-3">
			<div class="modal-header">
				<div class="modal-title d-flex justify-content-between align-items-center w-100">
					<h4>Add List</h4>

					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
			</div>
			<div class="modal-body">
				<form action="./watchlistupdate.php" method="POST">
					<input type="text" name="user_id" class="d-none" value="<?php echo $user["id"]; ?>" />
					<input type="text" name="title" class="form-control" placeholder="Tittle" />
					<input class="btn" type="submit" name="addlist">
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="editP" tabIndex="-1" aria-labelledby="authModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content pb-3">
			<div class="modal-header">
				<div class="modal-title d-flex justify-content-between align-items-center w-100">
					<h4>Edit Profile</h4>

					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
			</div>
			<div class="modal-body">
				<form action="./profileupdate.php" method="post" enctype="multipart/form-data">
					<div class="input-group mb-3">
						<span class="input-group-text">Name</span>
						<input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $user["name"]; ?>" />
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text">Handle</span>
						<input type="text" name="handle" class="form-control" value="<?php echo $user["handle"]; ?>" placeholder="Handle" readonly />
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text">Email</span>
						<input type="email" name="email" class="form-control" value="<?php echo $user["email"]; ?>" placeholder="Email" />
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text">Password</span>
						<input type="password" name="password" class="form-control" placeholder="Keep empty if you don't plan to change" />
					</div>
					<div class="mb-3">
						<label class="form-label">About</label>
						<textarea class="form-control" name="about"><?php echo $user["about"]; ?></textarea>
					</div>
					<div class="mb-3">
						<label class="form-label">Image</label>
						<input class="form-control p-0" name="image" type="file" id="formFile" />
					</div>
					<button class="btn" type="submit">
						Submit
					</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
require_once("./shared/footer.php");
?>