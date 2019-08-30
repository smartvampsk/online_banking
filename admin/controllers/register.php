<?php
	$msg = ''; 
	if (isset($_POST['register'])) {
		$password = $_POST['password'];
		$confPassword = $_POST['confPassword'];
		if ($password != $confPassword) {
			$msg = "Password don't match. Please Try again!";
		}
		else{
			$stmt = $pdo->prepare("INSERT INTO customer(firstname, surname, gender, username, password)
				VALUES(:firstname, :surname, :gender, :username, :password)");
			$criteria = [
				'firstname' => $_POST['firstname'],
				'surname' => $_POST['surname'],
				'gender' => $_POST['gender'],
				'username' => $_POST['username'], 
				'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
			];
			$stmt->execute($criteria);
			if ($stmt == true) {
				$customer_id = $pdo->lastInsertId();
				$balance = $pdo->prepare("INSERT INTO balance(customer_id, total) VALUES ('$customer_id', '0')");
				$balance->execute();
				$msg = "Customer Registered Successfully";
				header('refresh:10;url=register');
			}
			
		}
	}
	
	$templateVars = [
		'msg' => $msg
	];
	
	$title = 'Online Banking- Register';
	$pagename = 'Register';
	$content = loadTemplate('../views/register_design.php', $templateVars);
?>