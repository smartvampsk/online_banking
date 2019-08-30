<?php
	$stmt = $pdo->prepare("SELECT * FROM admin");
	$stmt->execute();
	if (isset($_GET['dId'])) {
		$dId = $_GET['dId'];
		$stmt = $pdo->prepare("DELETE FROM admin WHERE admin_id = '$dId'");
		$stmt->execute();
		header('location:view_admin');
	}

	$templateVars = [
		'admin' => $stmt
	];
	
	$title = 'Online Banking- View Admin';
	$pagename = 'View Admin';
	$content = loadTemplate('../views/view_admin_design.php', $templateVars);
?>