<?php
	require '../db/db.php';
	require '../models/databaseWork.php';
	require '../functions/loadTemplate.php';

	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	}
	else
		$page = 'home';
	require '../controllers/'.$page.'.php';
	$templateVars = [
		'title' => $title,
		'pagename' => $pagename,
		'content' => $content
	];
	$html = loadTemplate('../views/design.php', $templateVars);
	echo $html;
?>