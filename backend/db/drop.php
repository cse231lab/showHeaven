<?php
require_once("./db.php");



function dropTable($table)
{
	global $db;
	try {
		$sql = "DROP table if exists `$table`";
		$db->exec($sql);
		print("Dropped $table Table.\n");
	} catch (PDOException $e) {
		echo $e->getMessage(); //Remove or change message in production code
	}
}

dropTable("Users");
dropTable("Show");
dropTable("Seasons");
dropTable("Episodes");