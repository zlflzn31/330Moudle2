<?php
	session_start();
	//upload logic. 
	$userName = $_SESSION['user'];
	if( !preg_match('/^[\w_\-]+$/', $userName) )
	{
		echo "Invalid username";
		exit;
	}
	$fileName = basename($_FILES['uploadedfile']['name']);
	if( !preg_match('/^[\w_\.\-]+$/', $fileName) )
	{
		echo "Invalid filename";
		exit;
	}
	
	$full_path = sprintf("/srv/uploads/%s/%s", $userName, $fileName);
	
	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) )
	{
		header("Location: sharingsite.php");
		exit;
	}
	//If can't upload a file, then just exit. 
	else
	{
		exit;
	}
?>
