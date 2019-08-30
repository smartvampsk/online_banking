<?php
	if(session_id() == '' || !isset($_SESSION)) {
		session_start();
	}
	if (!isset($_SESSION['admin'])) {
        header('location:login');
    }
?>

<div class="pt-2">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<form method="POST" action="">
				<h2 class="pt-3 text-center">Admin Registration</h2>
				<?php
					if (!empty($msg)) {
					 	echo '<p class="text-dark text-center bg-info rounded py-1">'.$msg.'</p>';
					 }
				?>
				<hr>
				<div class="form-group">
					<label for="">First Name</label>
					<input type="text" class="form-control" name="firstname">
				</div>
				<div class="form-group">
					<label>Surname</label>
					<input type="text" class="form-control" name="surname">
				</div>
				<div class="form-group">
					<label>Username <span class="text-danger">*</span></label>
					<input type="text" name="username" class="form-control" required="">
				</div>
				<div class="form-group">
					<label>Password <span class="text-danger">*</span></label>
					<input type="password" name="password" class="form-control" required="">
				</div>
				<div class="form-group">
					<label>Confirm Password <span class="text-danger">*</span></label>
					<input type="password" name="confPassword" class="form-control" required="">
				</div>
				<div class="text-center">
					<button type="submit" name="register" class="btn btn-lg btn-primary text-center">Register</button>
				</div>
			</form>
		</div>
	</div>
</div>