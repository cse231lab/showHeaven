<div class="modal fade" id="exampleModal" tabIndex="-1" aria-labelledby="authModal" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content pb-3">
			<div class="modal-header">
				<h4 class="modal-title" id="authModal">
					Authentication <i class="bi bi-shield-lock-fill"></i>
				</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="d-flex">
					<div class="col-6 pe-2 border-end d-flex flex-column">
						<h5 class="border-bottom border-2 pb-1">Sign In</h5>
						<form method="post" action="./authform.php">
							<div class="input-group mb-3">
								<span class="input-group-text">
									handle
								</span>
								<input type="text" class="form-control" name="info" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
							</div>

							<div class="input-group mb-3">
								<span class="input-group-text">Password</span>
								<input type="password" name="password" class="form-control" />
							</div>

							<div class="valid-feedback">Looks good!</div>


							<button class="btn btn-secondary" type="submit">
								Sign In
							</button>
						</form>
					</div>
					<div class="col-6 ps-2">
						<h5 class="border-bottom border-2 pb-1">Sign Up</h5>
						<form method="post" action="./authform.php">
							<div class="input-group mb-3">
								<span class="input-group-text">
									Name
								</span>
								<input type="text" class="form-control" required name="name" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text">
									handle
								</span>
								<input type="text" class="form-control" required name="handle" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
							</div>

							<div class="input-group mb-3">
								<span class="input-group-text">
									email
								</span>
								<input type="email" class="form-control" required name="email" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
							</div>

							<div class="input-group mb-3">
								<span class="input-group-text">Password</span>
								<input type="password" class="form-control" required name="password" />
							</div>


							<div class="valid-feedback">Looks good!</div>
							<button class="btn btn-secondary" type="submit">
								Sign Up
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>