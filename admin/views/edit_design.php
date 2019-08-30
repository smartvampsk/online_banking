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
				<h2 class="pt-3 text-center">Edit Customer</h2>
				<hr>
				<div class="form-group">
					<label for="">First Name</label>
					<input type="text" class="form-control" name="firstname" value="<?php echo $cus['firstname']; ?>">
				</div>
				<div class="form-group">
					<label>Surname</label>
					<input type="text" class="form-control" name="surname" value="<?php echo $cus['surname']; ?>">
				</div>
				<fieldset class="form-group">
					<div class="row">
						<legend class="col-form-label col-sm-2 pt-0">Gender</legend>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="gender" id="genderM" value="Male" checked="">
								<label class="form-check-label" for="genderM">Male</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="gender" id="genderF" value="Female" 
									<?php if($cus['gender'] == 'Female'){ echo 'checked=checked'; } ?>>
								<label class="form-check-label" for="genderF">Female</label>
							</div>
						</div>
					</div>
				</fieldset>
				<div class="form-group">
					<label>Username <span class="text-danger">*</span></label>
					<input type="text" name="username" class="form-control" value="<?php echo $cus['username']; ?>">
				</div>
				<div class="d-flex justify-content-between pt-3">
					<button type="submit" name="update" class="btn btn-lg btn-success text-center">Update</button>
					<button type="submit" name="cancel" class="btn btn-lg btn-danger text-center">Cancel</button>
				</div><br>
			</form>
		</div>
	</div>
</div>