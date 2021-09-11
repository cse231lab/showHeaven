<?php
require_once("../backend/db/show.php");
$shows = retrieveShowList("", 0);

if (isset($_POST["deleteShow"])) {
	deleteShow($_POST["deleteShow"]);
	echo "<meta http-equiv='refresh' content='0'>";
}
?>

<table class="table">
	<thead>
		<tr>
			<th scope="col"> # </th>
			<th scope="col">Name</th>
			<th scope="col">Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php

		foreach ($shows as $key => $value) {
			echo "
			<tr>
				<td>" . ($key + 1) . "</td>
				<td>
					<a class=\"text-decoration-none link-secondary\" href=\"./show.php?sid=" . $value["id"] . "\">
						<h5> " . $value["name"] . "</h5>
					</a>
				</td>
				<td>
				<form action=\"\" method=\"POST\">
				<input class=\"d-none\" name=\"deleteShow\" type=\"text\" value=\"" . $value["id"] . "\">
				<button class=\"btn\">
						<i class=\"bi bi-trash-fill\"></i>
					</button>
					</form>
				</td>
			</tr>
			";
		}

		?>
	</tbody>
</table>