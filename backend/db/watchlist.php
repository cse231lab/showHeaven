<?php

require_once("db.php");

$show = "`Showz`";

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
	} catch (PDOException $e) {
		echo $e->getMessage(); //Remove or change message in production code
	}
}

// create/delete follow

function toggleFollow($list_id, $user_id)
{
	global $follow;
	global $db;

	try {
		$sql = "SELECT * FROM $follow WHERE user_id=:userId AND list_id=:listId";
		$prp = $db->prepare($sql);
		$prp->execute(["userId" => $user_id, "listId" => $list_id]);
		$res = $prp->fetch();

		if (empty($res)) {
			$sql = "INSERT INTO $follow (list_id,user_id)	VALUES (:listId,:userId)";
		} else {
			$sql = "DELETE from $follow where user_id =:userId and list_id = :listId";
		}

		$prp = $db->prepare($sql);
		$prp->execute(["userId" => $user_id, "listId" => $list_id]);
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
	} catch (PDOException $e) {
		echo   $e->getMessage(); //Remove or change message in production code
	}
}

function getOneList($list_id)
{
	global $list;
	global $db;

	try {
		$sql = "SELECT * from $list where id = $list_id";

		$prp = $db->prepare($sql);

		$prp->execute();
		$result = $prp->fetch();
		return $result;
	} catch (PDOException $e) {
		echo   $e->getMessage(); //Remove or change message in production code
		return array();
	}
}

function getList($handle = "", $search = "")
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
		join $users u on (l.user_id = u.id) ";

		if ($handle != "") $sql .= " where u.handle='$handle' ";
		if ($search != "") {
			if ($handle != "") $sql .= " and ";
			else $sql .= " where ";
			$sql .= " l.title LIKE '%$search%' ";
		}

		$sql .= " ORDER BY follow desc ";

		$prp = $db->prepare($sql);

		$prp->execute();
		$result = $prp->fetchAll();
		return $result;
	} catch (PDOException $e) {
		echo   $e->getMessage(); //Remove or change message in production code
		return array();
	}
}

function getFollow($id)
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
		join $follow f on (f.list_id = l.id)
		where f.user_id=:id
		ORDER BY follow desc
		";

		$prp = $db->prepare($sql);
		$prp->execute(['id' => $id]);
		$result = $prp->fetchAll();
		return $result;
	} catch (PDOException $e) {
		echo   $e->getMessage(); //Remove or change message in production code
		return array();
	}
}

function getListItems($list_id)
{
	global $db;
	global $list_items;
	global $show;

	try {
		$sql = "SELECT l.show_id as show_id,l.list_id as list_id, s.image,s.name
		FROM $list_items l
		JOIN $show s
		ON (s.id = l.show_id)
		where  l.list_id = :listId
		";

		$prp = $db->prepare($sql);
		$prp->execute(['listId' => $list_id]);
		$result = $prp->fetchAll();
		return $result;
	} catch (PDOException $e) {
		echo   $e->getMessage(); //Remove or change message in production code
		return array();
	}
}

function deleteListItems($list_id, $show_id)
{
	global $db;
	global $list_items;

	try {
		$sql = "DELETE FROM $list_items WHERE show_id=:showId and list_id=:listId";

		$prp = $db->prepare($sql);
		$prp->execute(['listId' => $list_id, 'showId' => $show_id]);
	} catch (PDOException $e) {
		echo   $e->getMessage(); //Remove or change message in production code
	}
}


function addListItems($list_id, $show_id)
{
	global $db;
	global $list_items;

	try {
		$sql = "INSERT INTO $list_items(list_id,show_id) value($list_id,$show_id)";

		$prp = $db->prepare($sql);
		$prp->execute();
	} catch (PDOException $e) {
		echo   $e->getMessage(); //Remove or change message in production code
	}
}
