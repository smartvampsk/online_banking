<?php
	if (isset($_POST['cancel'])) {
		header('location:view');
	}
	
	$eid = $_GET['eId'];
	$stmt = $pdo->query("SELECT * FROM customer WHERE customer_id = '$eid'")->fetch();
	
	if (isset($_POST['update'])) {
		$stmt = $pdo->prepare("UPDATE customer
			SET firstname = :firstname, 
				surname = :surname, 
				gender = :gender,
				username = :username
			WHERE customer_id = '$eid'");
		$criteria = [
			'firstname' => $_POST['firstname'],
			'surname' => $_POST['surname'],
			'gender' => $_POST['gender'],
			'username' => $_POST['username']
		];
		$stmt->execute($criteria);
		header('location:view');
	}

	$templateVars = [
		'cus' => $stmt
	];
	
	$title = 'Online Banking- Edit customer';
	$pagename = 'Edit Customer';
	$content = loadTemplate('../views/edit_design.php', $templateVars);
?>