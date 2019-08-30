<?php 
	$msg = ''; 
	if (isset($_POST['register'])) {
		$password = $_POST['password'];
		$confPassword = $_POST['confPassword'];
		if ($password != $confPassword) {
			$msg = "Password don't match. Please Try again!";
		}
		else{
			$stmt = $pdo->prepare("INSERT INTO admin(firstname, surname, username, password)
				VALUES(:firstname, :surname, :username, :password)");
			$criteria = [
				'firstname' => $_POST['firstname'],
				'surname' => $_POST['surname'],
				'username' => $_POST['username'], 
				'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
			];
			$stmt->execute($criteria);
			$msg = "Admin Registered Successfully";
			header('refresh:10;url=register_admin');
		}
	}
	
	$templateVars = [
		'msg' => $msg
	];
	
	$title = 'Online Banking- Register Admin';
	$pagename = 'Register';
	$content = loadTemplate('../views/register_admin_design.php', $templateVars);
?>