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

	$statement = $pdo->prepare("SELECT *
		FROM customer c
		JOIN transact t
		ON c.customer_id = t.customer_id
		JOIN balance b 
		ON b.customer_id = c.customer_id
		WHERE c.customer_id = '$user_id'
		OR t.receiver_id = '$user_id'
		ORDER BY t.submitted_on DESC
		");
	$statement->execute();

	$templateVars = [
		'statement' => $statement,
		'user_id' => $user_id
	];
	
	$title = 'Online Banking- Statement';
	$pagename = 'Statement';
	$content = loadTemplate('../views/statement_design.php', $templateVars);
?>