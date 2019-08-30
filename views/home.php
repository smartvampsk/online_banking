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
<main class="home">
	<section class="content-section">
		<p>Hello, <b><i><?php echo $_SESSION['user']; ?></i></b> welcome to Online Banking</p>
		<br>
		<h3>Services</h3>
		
		<div class="card-deck mb-5 d-flex justify-content-around card-img">
			<div class="card border-0">
				<a class="nav-link text-center " href="balance">
					<img src="../images/checkbalance.png">
					<p class="pt-2">Check Balance</p>
				</a>
			</div>
			<div class="card border-0">
				<a class="nav-link text-center " href="statement">
					<img src="../images/statement.png">
					<p class="pt-2">Statement</p>
				</a>
			</div>
			<div class="card border-0">
				<a class="nav-link text-center" href="deposit">
					<img src="../images/deposit.png">
					<p class="pt-2">Deposit</p>
				</a>
			</div>
		</div>

		<div class="card-deck mb-3 d-flex justify-content-around card-img">
			<div class="card border-0">
				<a class="nav-link text-center " href="withdraw">
					<img src="../images/withdraw.png">
					<p class="pt-2">Withdraw</p>
				</a>
			</div>
			<div class="card border-0">
				<a class="nav-link text-center " href="transfer">
					<img src="../images/transfer.png">
					<p class="pt-2">Transfer</p>
				</a>
			</div>
			<div class="card border-0">
				<a class="nav-link text-center " href="enquiry">
					<img src="../images/enquiry.png">
					<p class="pt-2">Enquiry</p>
				</a>
			</div>
		</div>
	</section>
</main>