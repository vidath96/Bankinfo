<?php $userid = $this->session->userdata('user_id'); ?>
<?php $userSes = $this->session->userdata('username'); ?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bank Account Management System</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>


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
						<a href="<?= base_url('Bank/allbankView') ?>" class="nav-link active" aria-current="page">
							Bank Accounts
						</a>
					</li>
					<li>
						<a href="<?= base_url('Bank/addbankView') ?>" class="nav-link link-dark">
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
						<li><a class="dropdown-item" href="<?php echo base_url('Auth/logout') ?>">Sign out</a></li>
					</ul>
				</div>
			</div>
			<div class="col-6 col-sm-10 ">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<div class="container-fluid">
						<a class="navbar-brand" href="#">Bank Account Management System</a>

					</div>
				</nav>
				<h2>All Bank Accounts</h2>
				<div class="card mb-4">
					<div class="card-header">
						<i class="fas fa-table mr-1"></i>
						Account Details
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Account No</th>
										<th>Bank Name</th>
										<th>Branch</th>
										<th>Branch Code</th>
										<th>Update</th>
										<th>Delete</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Account No</th>
										<th>Bank Name</th>
										<th>Branch</th>
										<th>Branch Code</th>
										<th>Update</th>
										<th>Delete</th>
									</tr>
								</tfoot>
								<tbody>
									<?php foreach ($allbanks as $res) : ?>
										<tr>
											<td><?= $res->bank_account_no ?></td>
											<td><?= $res->bank_name ?></td>
											<td><?= $res->branch ?></td>
											<td><?= $res->branch_code ?></td>
											<td>
												<a href="<?= base_url('Bank/editBank/' . $res->id) ?>"><i class="fa fa-edit fa-lg"></i></a>&nbsp;
											</td>
											<td>
												<a href="<?= base_url('Bank/deleteBank/' . $res->bank_account_no) ?>"><i class="fa fa-trash fa-lg" style="color:red;"></i></a>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<?php echo '<label style="color: green">' . $this->session->flashdata("delete_success") . '</label>';
						?>
					</div>
				</div>
			</div>
		</div>

	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>