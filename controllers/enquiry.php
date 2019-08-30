<?php 
	$msg = '';
	if (isset($_POST['submit'])) {
		$stmt = $pdo->prepare("INSERT INTO message(name, contact, email, message)
			VALUES(:name, :contact, :email, :message)");
		$criteria = [
			'name' => $_POST['name'],
			'contact' => $_POST['contact'],
			'email' => $_POST['email'],
			'message' => $_POST['message']
		];
		$stmt->execute($criteria);
		$msg = 'Thank You!<br>Your Message is sent.<br>We will contact you soon ';
		header('refresh:10;url=enquiry');
	}
	$templateVars = [
		'msg' => $msg
	];
	
	$title = 'Online Banking- Enquiry';
	$pagename = 'Enquiry';
	$content = loadTemplate('../views/enquiry_design.php', $templateVars);
?>