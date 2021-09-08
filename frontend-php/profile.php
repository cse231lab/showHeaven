<?php
require_once("./shared/header.php");
?>

<div class=" d-flex flex-sm-column-reverse flex-md-row  justify-content-around p-3  profilegrid ">
	<div class="w-50 d-flex col-6 flex-column border border-2 border-dark rounded">
		<div class="d-flex  p-3 bg-light  ">
			<div class="  col-2 m-3 ">Name:</div>
			<div class="    m-3 ">Sarwar Khalid</div>
		</div>

		<div class="d-flex  p-3 bg-light  ">
			<div class="  col-2 m-3 ">Handle:</div>
			<div class="    m-3 ">sarwar450</div>
		</div>

		<div class="d-flex  p-3   ">
			<div class="  col-2 m-3 ">Email:</div>
			<div class="    m-3 ">sarwar@gmail.com</div>
		</div>

		<div class="d-flex  p-3 bg-light  ">
			<div class="  col-2 m-3 ">Joined at:</div>
			<div class="    m-3 ">09-02-2000</div>
		</div>
	</div>

	<div class="m-auto col-6 ps-3 d-flex flex-column justify-content-center">
		<div class=" border border-5 border-dark rounded dp">
			<img src="./images/geralt.jpg" />
		</div>

		<div class="d-flex  p-3 ">
			Geralt is a witcher. Shortly after his birth, Geralt's mother,
			Visenna, gave him away to undergo training and he stronghold of e
			became a master sword fighter lls used by the witchers.
		</div>
	</div>
</div>

<div class="d-flex">
	<button class="btn" data-bs-toggle="modal" data-bs-target="#requestShow">
		<i class="bi bi-tv"></i> Request Show
	</button>
	<button class="btn" data-bs-toggle="modal" data-bs-target="#AddList">

		<i class="bi bi-list"></i> Add List
	</button>

	<button class="btn" data-bs-toggle="modal" data-bs-target="#editP">

		<i class="bi bi-person-lines-fill"></i> Edit Profile
	</button>
</div>

<div class="d-flex flex-column">
	<h5 class="text-start">@sarwar450 's Lists</h5>
	<div class="d-flex row">
		<?php

		require_once("./Indlist.php");
		indList(69);
		indList(69);
		indList(69);
		indList(69);

		?>
	</div>
</div>

<div class="d-flex flex-column pb-5">
	<h5 class="text-start">@sarwar450 's Follows</h5>
	<div class="d-flex row">
		<?php
		indList(69);
		indList(69);
		indList(69);
		indList(69);

		?>
	</div>
</div>

<div class="modal fade" id="requestShow" tabIndex="-1" aria-labelledby="authModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content pb-3">
			<div class="modal-header">
				<div class="modal-title d-flex justify-content-between align-items-center w-100">
					<h4>Add Show</h4>

					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
			</div>
			<div class="modal-body">
				<form action="">
					<input type="text" class="form-control" placeholder="Tittle" />
					<button class="btn" type="submit">

						Submit
					</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="AddList" tabIndex="-1" aria-labelledby="authModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content pb-3">
			<div class="modal-header">
				<div class="modal-title d-flex justify-content-between align-items-center w-100">
					<h4>Add List</h4>

					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
			</div>
			<div class="modal-body">
				<form action="">
					<input type="text" class="form-control" placeholder="Tittle" />
					<button class="btn" type="submit">

						Submit
					</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="editP" tabIndex="-1" aria-labelledby="authModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content pb-3">
			<div class="modal-header">
				<div class="modal-title d-flex justify-content-between align-items-center w-100">
					<h4>Edit Profile</h4>

					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
			</div>
			<div class="modal-body">
				<form action="">
					<div class="input-group mb-3">
						<span class="input-group-text">Name</span>
						<input type="text" class="form-control" placeholder="Name" value="Sarwar Khalid" />
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text">Handle</span>
						<input type="text" class="form-control" value="sarwar450" placeholder="Handle" />
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text">Email</span>
						<input type="email" class="form-control" value="sarwar@gmail.com" placeholder="Email" />
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text">Password</span>
						<input type="password" class="form-control" placeholder="Password" />
					</div>
					<div class="mb-3">
						<label class="form-label">About</label>
						<textarea class="form-control" value="Geralt is a witcher. Shortly after his birth, Geralt's mother, Visenna, gave him away to undergo training and he stronghold of e became a master sword fighter lls used by the witchers.">
                  </textarea>
					</div>
					<div class="mb-3">
						<label class="form-label">Image</label>
						<input class="form-control" type="file" id="formFile" />
					</div>
					<button class="btn" type="submit">

						Submit
					</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
require_once("./shared/footer.php");
?>