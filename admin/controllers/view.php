<?php
	$msg = '';
	$stmt = $pdo->prepare("SELECT * FROM customer");
	$stmt->execute();

	if (isset($_GET['dId'])) {
		$dId = $_GET['dId'];
		$del = $pdo->prepare("DELETE FROM customer WHERE customer_id = '$dId'");
		$del->execute();
		$msg = "Delete Successfully";
		header('refresh:10;url=view');
	}

	$templateVars = [
		'msg' => $msg,
		'customer' => $stmt
	];
	
	$title = 'Online Banking- View Customer';
	$pagename = 'View Customer';
	$content = loadTemplate('../views/view_design.php', $templateVars);
?>