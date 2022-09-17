<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bank Account Management System</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
	<div class="container-fluid">
		<div class="row ">
			<div class="col"></div>
			<div class="col-6 col-sm-5 p-3 border border-primary rounded position-absolute top-50 start-50 translate-middle">
				<h2>Log In</h2><br>

				<form action="<?= base_url('Auth/loginAuth') ?>" method="POST">
					<div class="mb-3">
						<label for="InputNIC" class="form-label">NIC</label>
						<input type="text" class="form-control" id="nic" name="nic" required>
					</div>
					<div class="mb-3">
						<label for="InputPassword" class="form-label">Password</label>
						<input type="password" class="form-control" id="password" name="password" required>
					</div>
					<input type="submit" class="btn btn-primary" value="Login">
				</form><br>
				<?php echo '<label style="color: red">' . $this->session->flashdata("login_error") . '</label>';
				?>
				<?php echo '<label style="color: green">' . $this->session->flashdata("submit_success") . '</label>';
				?>
				<?php echo validation_errors('<p style="color:red">')
				?>
				<p>Don't have an account? <a href="<?= base_url('User/registerView') ?>">Register Here</a></p>
			</div>
			<div class="col">
			</div>
		</div>

	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>