<?php

require_once("../backend/db/watchlist.php");
require_once("./functions.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST["addlist"])) {
		createList($_POST["user_id"], $_POST["title"]);
	}

	redirect($_SERVER['HTTP_REFERER']);
}
