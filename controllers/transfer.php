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
	$msg = '';
	$user_id = $_SESSION['user_id'];
	$users = $pdo->prepare("SELECT * FROM customer WHERE customer_id != '$user_id' ");
	$users->execute();

	if (isset($_POST['submit'])) {
		$timezone = new DateTimeZone("Australia/Sydney");
		$date = new DateTime("now", $timezone);

		$stmt = $pdo->prepare("INSERT INTO transact(customer_id, receiver_id, amount, description, submitted_on, action_id)
			VALUES(:customer_id, :receiver_id, :amount, :description, :submitted_on, '3')");
		$criteria = [
			'customer_id' => $_POST['customer_id'],
			'receiver_id' => $_POST['receiver_id'],
			'amount' => $_POST['amount'],
			'description' => $_POST['description'],
			'submitted_on' => $date->format('Y-m-d h:i:s')
		];
		$stmt->execute($criteria);
		if ($stmt) {
			$balance = $pdo->prepare("UPDATE balance
				SET total = 
					CASE
						WHEN customer_id = :customer_id THEN total - :total
						WHEN customer_id = :receiver_id THEN total + :total 
					END
				WHERE customer_id = :customer_id
				OR customer_id = :receiver_id")
			;
			$criteriaB = [
				'total' => $_POST['amount'],
				'customer_id' => $_POST['customer_id'],
				'receiver_id' => $_POST['receiver_id']
			];
			$balance->execute($criteriaB);
			$msg = 'Transfer Successfull';
			header('refresh:10;url=transfer');
		}
		else
			$msg = 'Failed to Transfer';
	}
	$templateVars = [
		'msg' => $msg,
		'users' => $users
	];
	
	$title = 'Online Banking- Transfer';
	$pagename = 'Transfer';
	$content = loadTemplate('../views/transfer_design.php', $templateVars);
?>