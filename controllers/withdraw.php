<?php 
	$msg = '';
	if (isset($_POST['submit'])) {
		$timezone = new DateTimeZone("Australia/Sydney");
		$date = new DateTime("now", $timezone);

		$stmt = $pdo->prepare("INSERT INTO transact(customer_id, amount, description, submitted_on, action_id)
			VALUES(:customer_id, :amount, :description, :submitted_on, '2')");
		$criteria = [
			'customer_id' => $_POST['customer_id'],
			'amount' => $_POST['amount'],
			'description' => $_POST['description'],
			'submitted_on' => $date->format('Y-m-d h:i:s')
		];
		$stmt->execute($criteria);
		if ($stmt) {
			$balance = $pdo->prepare("UPDATE balance
				SET total = total - :total
				WHERE customer_id = :customer_id");
			$criteriaB = [
				'total' => $_POST['amount'],
				'customer_id' => $_POST['customer_id']
			];
			$balance->execute($criteriaB);
			$msg = 'Withdrawal Successfully';
			header('refresh:10;url=withdraw');
		}
		else
			$msg = 'Failed to Withdraw';
	}
	$templateVars = [
		'msg' => $msg
	];
	
	$title = 'Online Banking- Withdraw';
	$pagename = 'Withdraw';
	$content = loadTemplate('../views/withdraw_design.php', $templateVars);
?>