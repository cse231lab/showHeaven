<?php
require_once("../backend/db/usertable.php");
require_once("./functions.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	var_dump($_FILES["image"]["name"]);
	updateUser($_POST["name"], $_POST["handle"], $_POST["email"], $_POST["about"], $_POST["password"]);


	if (!empty($_FILES["image"]["name"])) {
		// Get file info 
		$tempname = $_FILES["image"]["tmp_name"];
		$filename = basename($_FILES["image"]["name"]);
		$milliseconds = strval(round(microtime(true) * 1000));
		$folder = "images/" . $_POST["handle"] . $milliseconds . $filename;
		$fileType = pathinfo($filename, PATHINFO_EXTENSION);
		$allowTypes = array('jpg', 'png', 'jpeg', 'gif');

		if (in_array($fileType, $allowTypes)) {
			if (move_uploaded_file($tempname, $folder)) {
				$msg = "Image uploaded successfully";
				$curr = getUserImage($_POST["handle"]);
				unlink($curr["image"]);
				updateImage($_POST["handle"], $folder);
			} else {
				$msg = "Failed to upload image";
			}
		}
	}

	redirect("./profile.php?handle=" . $_POST["handle"]);
}
