<?php
require_once("./functions.php");
require_once("../backend/db/usertable.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST["info"])) {
		session_start();
		if (userLogIn($_POST["info"], $_POST["password"])) {
		} else {
			// session_destroy();
		}
	} else {

		$name = $_POST["name"];
		$email = $_POST["email"];
		$handle = $_POST["handle"];
		$password = $_POST["password"];

		createUser($name, $handle, $email, $password);
	}

	redirect("./showlist.php");
}
