<?php 
	$stmt = $pdo->prepare("SELECT * FROM customer LIMIT 5");
	$stmt->execute();
	
	$templateVars = [ 'customer' => $stmt];
	
	$title = 'Online Banking- Home';
	$pagename = 'Home';
	$content = loadTemplate('../views/home_design.php', $templateVars);
?>