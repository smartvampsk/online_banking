<?php
	$msg = '';
	if (isset($_POST['login'])) {
		
		$admin = $pdo->prepare("SELECT * FROM admin WHERE username = :username");
		$criteria = [
			'username' => $_POST['username']
		];
		$fault = false;
		$admin->execute($criteria);
		if ($admin->rowCount()>0) {
			$user = $admin->fetch();
			if (password_verify($_POST['password'], $user['password'])) {
				session_start();
				$_SESSION['admin'] = $user['username'];
				$_SESSION['admin_id'] = $user['admin_id'];
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