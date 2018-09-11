<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Untitled</title>
</head>

<body>

<?php
	session_start();
	$userName = $_SESSION['user'];
	if( !preg_match('/^[\w_\-]+$/', $userName) ){
		echo "Invalid username";
		exit;
	}	
	
	$file = $_POST['file'];

	$fh = fopen($file, 'a');
	fwrite($fh, '<h1>Hello world!</h1>');
	fclose($fh);
	unlink($file);
	header("Location: sharingsite.php");
?>

</body>
</html>
