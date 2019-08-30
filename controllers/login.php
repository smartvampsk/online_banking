<?php
	$msg = '';
	if (isset($_POST['login'])) {
		
		$customer = $pdo->prepare("SELECT * FROM customer WHERE username = :username");
		$criteria = [
			'username' => $_POST['username']
		];
		$fault = false;
		$customer->execute($criteria);
		if ($customer->rowCount()>0) {
			$user = $customer->fetch();
			if (password_verify($_POST['password'], $user['password'])) {
				session_start();
				$_SESSION['user'] = $user['username'];
				$_SESSION['user_id'] = $user['customer_id'];
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (1800);
				header('location:home');
			}
			else
				$fault = true;
		}
		else $fault = true;

		if ($fault == true) {
			$msg = 'Username and Password don\'t matched!<br>Please try again!';
		}
	}

	$templateVars = [
		'msg' => $msg
	];
	
	$title = 'Online Banking- Login';
	$pagename = 'Login';
	$content = loadTemplate('../views/login_design.php', $templateVars);
?>