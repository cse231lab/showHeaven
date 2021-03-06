<?php

require_once("../backend/db/watchlist.php");
require_once("./functions.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST["addlist"])) {
		createList($_POST["user_id"], $_POST["title"]);
	}

	if (isset($_POST["add_list_id"]) && isset($_POST["user_id"])) {
		toggleFollow(($_POST["add_list_id"]), ($_POST["user_id"]));
	}

	if (isset($_POST["delete_list_item"]) && isset($_POST["user_id"])) {
		deleteListItems(($_POST["delete_list_item"]), ($_POST["delete_list_show_id"]));
	}

	if (isset($_POST["deleteList"])) {
		deleteList($_POST["deleteList"]);
	}

	if (isset($_POST["add_list_to_list_id"]) && isset($_POST["show_id"])) {
		addListItems(($_POST["add_list_to_list_id"]), ($_POST["show_id"]));
	}

	redirect($_SERVER['HTTP_REFERER']);
}
