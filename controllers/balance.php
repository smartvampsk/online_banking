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

<?php
	$user_id = $_SESSION['user_id'];
	$balance = $pdo->prepare("SELECT * FROM balance WHERE customer_id = '$user_id'");
	$balance->execute();
	$templateVars = [
		'balance' => $balance
	];
	
	$title = 'Online Banking- Balance';
	$pagename = 'Balance';
	$content = loadTemplate('../views/balance_design.php', $templateVars);
?>