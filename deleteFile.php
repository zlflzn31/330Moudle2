<?php
	session_start();
	$userName = $_SESSION['user'];
	if( !preg_match('/^[\w_\-]+$/', $userName) )
	{
		echo "Invalid username";
		exit;
	}	
	
	$file = $_POST['file'];

	$fh = fopen($file, 'a');
	fwrite($fh, '<h1>Hello world!</h1>');
	fclose($fh);
	unlink($file);
	//After delete, let the user be in the main page. 
	header("Location: sharingsite.php");
?>