<?php
	$stmt = $pdo->prepare("SELECT * FROM message");
	$stmt->execute();

	$templateVars = [
		'message' => $stmt
	];
	
	$title = 'Online Banking- View Message';
	$pagename = 'View Message';
	$content = loadTemplate('../views/message_design.php', $templateVars);
?>