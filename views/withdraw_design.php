<?php
	if(session_id() == '' || !isset($_SESSION)) {
		session_start();
	}
	if (!isset($_SESSION['user'])) {
        header('location:login');
    }
    else{
    	$now = time();
	    if ($now > $_SESSION['expire']) {
	    	session_start();
			session_destroy();
			session_unset();
			header('location:login?msg=Session time out!<br>Please Login Again!');
	    }
    }
?>

<div class="pt-2">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<form method="POST" action="">
				<h2 class="pt-3 text-center">Withdraw</h2>
				<hr>
				<?php
					if (!empty($msg)) {
					 	echo '<p class="text-dark text-center bg-info rounded py-1">'.$msg.'</p>';
					 }
				?>
				<div class="form-group">
					<label for="">Username</label>
					<input type="hidden" class="form-control" name="customer_id" readonly="" value="<?php echo $_SESSION['user_id']; ?>" >
					<input type="text" class="form-control" name="firstname" readonly="" placeholder="<?php echo $_SESSION['user']; ?>">
				</div>
				<div class="form-group">
					<label>Amount <span class="text-danger">*</span></label>
					<input type="number" name="amount" class="form-control" required="">
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" name="description"></textarea>
				</div>
				<div class="text-center">
					<button type="submit" name="submit" class="btn btn-lg btn-primary text-center">Withdraw</button>
				</div><br>
			</form>
		</div>
	</div>
</div>