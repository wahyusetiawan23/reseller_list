
<!DOCTYPE html>
<html lang="en">

<?php
	$base = base_url('assets/template/dist/');
?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title ?></title>


	<link rel="stylesheet" href="<?= $base ?>assets/compiled/css/app.css">
	<link rel="stylesheet" href="<?= $base ?>assets/compiled/css/app-dark.css">
	<link rel="stylesheet" href="<?= $base ?>assets/compiled/css/auth.css">
</head>

<body>
<script src="<?= $base ?>assets/static/js/initTheme.js"></script>
<div id="auth">

	<div class="row h-100">
		<div class="col-lg-5 col-12">
			<div id="auth-left">
				<div class="mb-4">
					<a href="<?= base_url('Auth') ?>"><img src="<?= $base ?>/assets/logo/borneo-schematics.svg" alt="Logo" style="width: 50%;"></a>
				</div>
				<h1 class="auth-title">Log in.</h1>
				<?= $this->session->flashdata('message'); ?>
				<?php $this->session->unset_userdata('message'); ?>
				<form action="<?= base_url('Auth') ?>" method="post">
					<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
					<div class="form-group position-relative has-icon-left mb-4">
						<input type="email" class="form-control form-control-xl" placeholder="Email" name="email">
						<div class="form-control-icon">
							<i class="bi bi-person"></i>
						</div>
					</div>

					<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
					<div class="form-group position-relative has-icon-right mb-4">
						<input type="password" class="form-control form-control-xl" id="passw" placeholder="Password" name="password">
						<div class="form-control-icon" onclick="seePass()">
							<i class="bi bi-eye"></i>
						</div>
					</div>
					<button class="btn btn-primary btn-block btn-lg shadow-lg mt-2">Log in</button>
				</form>
			</div>
		</div>
		<div class="col-lg-7 d-none d-lg-block">
			<div id="auth-right">

			</div>
		</div>
	</div>

</div>
</body>

</html>


<script>
	function seePass() {
		var x = document.getElementById("passw");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}
</script>
