<?php

require_once("db.php");

function createListTable()
{
	global $list;
	global $db;
	try {
		$sql = "CREATE table IF NOT EXISTS $list (
			`id` int AUTO_INCREMENT,
			`title` varchar(30),
			`user_id` int,
  		PRIMARY KEY (`id`),
  		FOREIGN KEY (`user_id`) REFERENCES `Users`(`id`) ON DELETE CASCADE
		)";
		$db->exec($sql);
		print("Created $list Table.\n");
	} catch (PDOException $e) {
		echo $e->getMessage(); //Remove or change message in production code
	}
}

createListTable();

function createListItemsTable()
{
	global $list_items;
	global $db;
	try {
		$sql = "CREATE table IF NOT EXISTS $list_items (
			`list_id` int,
  		`show_id` int,
			PRIMARY KEY (`show_id`,`list_id`),
  		FOREIGN KEY (`list_id`) REFERENCES `List`(`id`) ON DELETE CASCADE,
  		FOREIGN KEY (`show_id`) REFERENCES `Showz`(`id`) ON DELETE CASCADE 
		)";
		$db->exec($sql);
		print("Created $list_items Table.\n");
	} catch (PDOException $e) {
		echo $e->getMessage(); //Remove or change message in production code
	}
}

createListItemsTable();

function createFollowTable()
{
	global $follow;
	global $db;
	try {
		$sql = "CREATE table IF NOT EXISTS $follow (
			`list_id` int,
  		`user_id` int,
  		FOREIGN KEY (`user_id`) REFERENCES `Users`(`id`) ON DELETE CASCADE,
  		FOREIGN KEY (`list_id`) REFERENCES `List`(`id`) ON DELETE CASCADE,
  		PRIMARY KEY (`list_id`, `user_id`)
		)";
		$db->exec($sql);
		print("Created $follow Table.\n");
	} catch (PDOException $e) {
		echo $e->getMessage(); //Remove or change message in production code
	}
}

createFollowTable();

function createList($user_id, $title)
{
	global $list;
	global $db;

	try {
		$sql = "INSERT INTO $list (title,user_id) 
		values(:title,:user_id)";
		$prp = $db->prepare($sql);
		$prp->execute(['title' => $title, 'user_id' => $user_id,]);
		print("Created list $list.\n");
	} catch (PDOException $e) {
		echo   $e->getMessage(); //Remove or change message in production code
	}
}

function deleteList($id)
{
	global $list;
	global $db;

	try {
		$sql = "DELETE from $list WHERE id=:id";
		$prp = $db->prepare($sql);
		$prp->execute(['id' => $id]);
		print("Created list $list.\n");
	} catch (PDOException $e) {
		echo   $e->getMessage(); //Remove or change message in production code
	}
}

function getList($handle)
{
	global $list;
	global $db;
	global $users;
	global $follow;

	try {
		$sql = "SELECT l.id,l.title,l.user_id,u.handle,
		(
			select count(f.list_id)
			from $follow f
			where f.list_id = l.id
		) as follow 
		from $list l  
		join $users u on (l.user_id = u.id) 
		where u.handle=:handle
		ORDER BY follow desc
		";

		$prp = $db->prepare($sql);
		$prp->execute(['handle' => $handle]);
		$result = $prp->fetchAll();
		return $result;
	} catch (PDOException $e) {
		echo   $e->getMessage(); //Remove or change message in production code
		return array();
	}
}
