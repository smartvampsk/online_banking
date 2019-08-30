
<div class="pt-2">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<form method="POST" action="">
				<h2 class="pt-3 text-center">Transfer</h2>
				<hr>
				<?php
					if (!empty($msg)) {
					 	echo '<p class="text-dark text-center bg-info rounded py-1">'.$msg.'</p>';
					 }
				?>
				<div class="form-group">
					<label for="">Transfer From</label>
					<input type="hidden" class="form-control" name="customer_id" readonly="" value="<?php echo $_SESSION['user_id']; ?>" >
					<input type="text" class="form-control" name="username" readonly="" placeholder="<?php echo $_SESSION['user']; ?>">
				</div>
				<div class="form-group">
					<label for="">Transfer To (username)<span class="text-danger">*</span></label>
					<select class="form-control" name="receiver_id" required="">
						<option value="">--- select user ---</option>
						<?php 
							foreach ($users as $user) {
								echo '<option value="'.$user['customer_id'].'">'.$user['username'].'</option>';
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label>Amount <span class="text-danger">*</span></label>
					<input type="number" name="amount" class="form-control" required="">
				</div>
				<div class="form-group">
					<label>Purpose</label>
					<select class="form-control" name="description">
						<option value="Bill Sharing">Bill Sharing</option>
						<option value="Family Expenses">Family Expenses</option>
						<option value="Lend/Borrow">Lend/Borrow</option>
						<option value="Personal Use">Personal Use</option>
						<option value="Others">Others</option>
					</select>
				</div>
				<div class="text-center">
					<button type="submit" name="submit" class="btn btn-lg btn-primary text-center">Transfer</button>
				</div><br>
			</form>
		</div>
	</div>
</div>