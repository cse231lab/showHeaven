<?php
require_once("../backend/db/usertable.php");

$query = "";
if (isset($_GET["query"]) == true) {
	$query = $_GET["query"];
}

if (isset($_POST["handleCheck"])) {
	if (isset($_POST["userstatus"])) updateType($_POST["handle"], 1);
	else updateType($_POST["handleCheck"], 0);
	redirect("");
}

if (isset($_POST["handleDelete"])) {
	deleteUser($_POST["handleDelete"]);
	redirect("");
}


$result = getAllUser($query);

?>

<div class="d-flex justify-content-between p-3">
	<form method="get" class="col-5 d-flex">
		<div class="input-group">
			<label htmlFor="searchField" class="input-group-text">
				Search
			</label>
			<input class="form-control" value="<?php echo $query; ?>" name="query" id="searchField" placeholder="Type to search..." />
		</div>

		<button class="btn" role="submit">
			<i class="bi bi-search"></i>
		</button>
	</form>
</div>
<table class="table">
	<thead>
		<tr>
			<th scope="col"> # </th>
			<th scope="col">handle</th>
			<th scope="col">Name</th>
			<th scope="col">Is Admin</th>
			<th scope="col">Delete</th>

		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($result as $key => $value) {
			# code...

			//var_dump($value);
			echo $value["handle"];
			echo " 
			<tr>
				<td>$key</td>
				<td>
					<a class=\"text-decoration-none link-secondary\" href=\"./profile.php?handle=" . $value["handle"] . "\">
						<h5>" . $value["handle"] . "</h5>
					</a>
				</td>
				<td>" . $value["name"] . "</td>
				<td>
					<div class=\"form-check form-check \">
						<form method=\"post\">
						<input class=\"d-none\" name=\"handleCheck\" type=\"text\" value=\"" . $value["handle"] . "\">
						<input class=\"form-check-input\" name=\"userstatus\" type=\"checkbox\" " . ($value["type"] == 1 ? "checked" : "") . "  onChange=\"this.form.submit()\"/>
						</form>
						</div>
				</td>
				<td>
					<form method=\"post\">
						<input class=\"d-none\" name=\"handleDelete\" type=\"text\" value=\"" . $value["handle"] . "\">
						<button class=\"btn text-danger\" onclick=\"this.form.submit()\"><i class=\"bi bi-trash-fill\"></i></button>
					</form>
				</td>
			</tr>
			";
		}
		?>
	</tbody>
</table>