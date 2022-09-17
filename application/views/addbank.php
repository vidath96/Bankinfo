<?php $userid = $this->session->userdata('user_id'); ?>
<?php $userSes = $this->session->userdata('username'); ?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bank Account Management System</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<style>
		input {
			padding-top: 0.25em;
		}
	</style>
</head>

<body>
	<div class="container-fluid">
		<div class="row ">
			<div class="col-2 d-flex flex-column flex-shrink-0 p-3 bg-light">
				<a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
					<svg class="bi me-2" width="40" height="32">
						<use xlink:href="#bootstrap" />
					</svg>
					<span class="fs-4">BAMS</span>
				</a>
				<hr>
				<ul class="nav nav-pills flex-column mb-auto">
					<li class="nav-item">
						<a href="<?= base_url('Bank/allbankView') ?>" class="nav-link link-dark" aria-current="page">
							Bank Accounts
						</a>
					</li>
					<li>
						<a href="<?= base_url('Bank/addbankView') ?>" class="nav-link active">
							Add Account
						</a>
					</li>
				</ul>
				<hr>
				<div class="dropdown align-self-center">
					<a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
						<strong><?= $userSes ?></strong>
					</a>
					<ul class="dropdown-menu text-small shadow">
						<li><a class="dropdown-item" href="<?php echo base_url('User/userView/'.$userid) ?>">Profile</a></li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li><a class="dropdown-item" href="<?php echo base_url('Auth/logout') ?>">Sign out</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-6 col-sm-10 ">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<div class="container-fluid">
						<a class="navbar-brand" href="#">Bank Account Management System</a>

					</div>
				</nav>
				<h2>Add Bank Account</h2>
				<form action="<?= base_url('Bank/addAccount') ?>" method="POST">
					<div class="form-group">
						<label class="form-label">Account No</label><br>
						<input type="text" name="accountno" placeholder="111111111" class="form-control" required>
					</div>

					<div class="form-group">
						<label class="label form-label">Bank Name</label><br>
						<input type="text" name="bankname" placeholder="ABC Bank" class="form-control" required>
					</div>
					<div class="form-group">
						<label class="label form-label">Branch </label><br>
						<input type="text" name="branch" placeholder=" Gampaha" class="form-control" required>
					</div>
					<div class="form-group">
						<label class="label form-label">Branch Code</label><br>
						<input type="number" name="branchcode" placeholder="000" class="form-control" required>
					</div>
					<br>
					<button type="submit" class="btn btn-primary">Add Account</button>
				</form>
				<?php echo '<label style="color: green">' . $this->session->flashdata("submit_success") . '</label>'; ?>
				<?php echo validation_errors('<p style="color:red">'); ?>
			</div>
		</div>

	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>