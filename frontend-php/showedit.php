<?php
require_once("./shared/header.php");
require_once("../backend/db/show.php");
require_once("../backend/db/season.php");
require_once("../backend/db/episode.php");
require_once("../backend/db/review.php");
require_once("../backend/db/usertable.php");
require_once("functions.php");

// echo $_GET['sid'].'<br>';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	updateShow($_POST["name"], $_POST["about"], $_POST["release_date"], $_POST["type"], $_POST["imdb_textfield"], $_POST["show_id"]);


	if (!empty($_FILES["image"]["name"])) {
		// Get file info 
		$tempname = $_FILES["image"]["tmp_name"];
		$filename = basename($_FILES["image"]["name"]);
		$milliseconds = strval(round(microtime(true) * 1000));
		$folder = "images/show-" . $_POST["show_id"] . $milliseconds . $filename;
		$fileType = pathinfo($filename, PATHINFO_EXTENSION);
		$allowTypes = array('jpg', 'png', 'jpeg', 'gif');

		var_dump($folder);

		if (in_array($fileType, $allowTypes)) {
			if (move_uploaded_file($tempname, $folder)) {
				$msg = "Image uploaded successfully";
				$curr = getCoverImage($_POST["show_id"]);
				unlink($curr["image"]);
				updateShowCover($_POST["show_id"], $folder);
			} else {
				$msg = "Failed to upload image";
			}
		}
	}

	redirect("./showedit.php?sid=" . $_POST["show_id"]);
}
require_once("functions.php");

if (!isset($_GET["sid"])) {
	redirect("./showlist.php");
}

$res = retrieveShow($_GET['sid']);
if (empty($res) || $_SESSION["IS_ADMIN"] != 1) {
	redirect("./showlist.php");
}


// $szn = retrieveSeasonList($_GET['sid']);
// $rev = retrieveReviewList($_GET['sid']);

?>

<div class="container">
	<div class="modal-header">
		<div class="modal-title d-flex justify-content-between align-items-center w-100">
			<h4>Edit Show</h4>
			<a href="./show.php?sid=<?php echo $res["id"]; ?>"> Visit</a>
		</div>
	</div>
	<div class="form">
		<form action="showedit.php?sid=<?php echo $res["id"]; ?>" method="POST" enctype="multipart/form-data">
			<div class="input-group mb-3">
				<span class="input-group-text">Show ID </span>
				<input type="text" name="show_id" class="form-control" readonly required value="<?php echo $res["id"]; ?>" />
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text">Title </span>
				<input type="text" name="name" class="form-control" required placeholder="Name" value="<?php echo $res["name"]; ?>" />
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text">IMDB ID </span>
				<input type="text" name="imdb_textfield" class="form-control" placeholder="Name" value="<?php echo $res["imdb_textfield"]; ?>" />
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text">Tags</span>
				<input type="text" class="form-control" name="tags" value="" />
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text">Release date</span>
				<input type="text" class="form-control" name="release_date" value="<?php echo $res["release_date"] ?>" />
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text">Type (0 => private, 1=> public)</span>
				<input type="text" class="form-control" name="type" value="<?php echo $res["type"] ?>" />
			</div>
			<div class="mb-3">
				<label class="form-label">Description</label>
				<textarea class="form-control" name="about"><?php echo $res["about"]; ?></textarea>
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





<?php
require_once("./shared/footer.php");
?>