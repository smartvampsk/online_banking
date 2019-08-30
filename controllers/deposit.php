<?php 
	$msg = '';
	if (isset($_POST['submit'])) {
		$timezone = new DateTimeZone("Australia/Sydney");
		$date = new DateTime("now", $timezone);

		$stmt = $pdo->prepare("INSERT INTO transact(customer_id, amount, description, submitted_on, action_id)
			VALUES(:customer_id, :amount, :description, :submitted_on, '1')");
		$criteria = [
			'customer_id' => $_POST['customer_id'],
			'amount' => $_POST['amount'],
			'description' => $_POST['description'],
			'submitted_on' => $date->format('Y-m-d h:i:s')
		];
		$stmt->execute($criteria);
		if ($stmt) {
			$balance = $pdo->prepare("UPDATE balance 
				SET total = total + :total
				WHERE customer_id = :customer_id");
			$criteriaB = [
				'total' => $_POST['amount'],
				'customer_id' => $_POST['customer_id']
			];
			$balance->execute($criteriaB);
			$msg = 'Deposited Successfully';
			header('refresh:10;url=deposit');

		}
		else
			$msg = 'Failed to Deposit';
	}
	$templateVars = [
		'msg' => $msg
	];
	
	$title = 'Online Banking- Deposit';
	$pagename = 'Deposit';
	$content = loadTemplate('../views/deposit_design.php', $templateVars);
?>