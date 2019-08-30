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
				<h2 class="pt-3 text-center">Enquiry</h2>
				<p class="text-muted text-center">Should have any queries? Feel free to contact us!</p>
				<hr>
				<?php
					if (!empty($msg)) {
					 	echo '<p class="text-white text-center bg-info rounded py-1">'.$msg.'</p>';
					 }
				?>
				<div class="form-group">
					<label for="">Fulll Name</label>
					<input type="text" class="form-control" name="name">
				</div>
				<div class="form-group">
					<label>Contact No.</label>
					<input type="text" class="form-control" name="contact">
				</div>
				<div class="form-group">
					<label>Email<span class="text-danger">*</span></label>
					<input type="email" name="email" class="form-control">
				</div>
				<div class="form-group">
					<label>Message <span class="text-danger">*</span></label>
					<textarea class="form-control" name="message" required=""></textarea>
				</div>
				<div class="text-center">
					<button type="submit" name="submit" class="btn btn-lg btn-primary text-center">Send</button>
				</div><br>
			</form>
		</div>
	</div>
</div>