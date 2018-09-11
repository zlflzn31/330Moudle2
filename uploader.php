<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Uploader page</title>
</head>

<body>
	<p>uploader place.</p>
<?php
session_start();
$userName = $_SESSION['user'];
if( !preg_match('/^[\w_\-]+$/', $userName) ){
	echo "Invalid username";
	exit;
}
$fileName = basename($_FILES['uploadedfile']['name']);
if( !preg_match('/^[\w_\.\-]+$/', $fileName) ){
	echo "Invalid filename";
	exit;
}

$full_path = sprintf("/srv/uploads/%s/%s", $userName, $fileName);

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
	header("Location: sharingsite.php");
	exit;
}else{
	header("Location: upload_failure.php");
	exit;
}

?>


</body>
</html>
