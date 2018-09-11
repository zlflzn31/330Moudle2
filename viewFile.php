<?php
	session_start();

	$fileName = $_GET['file'];	
	if( !preg_match('/^[\w_\.\-]+$/', $fileName) ){
		echo "Invalid filename";
		exit;
	}
	$userName = $_SESSION['user'];	
	if( !preg_match('/^[\w_\-]+$/', $userName) ){
		echo "Invalid username";
		exit;
	}
	$full_path = sprintf("/srv/uploads/%s/%s", $userName, $fileName);	
	//echo "$full_path";
	// Now we need to get the MIME type (e.g., image/jpeg).  PHP provides a neat little interface to do this called finfo.
	$finfo = new finfo(FILEINFO_MIME_TYPE);
	$mime = $finfo->file($full_path);
	
	// Finally, set the Content-Type header to the MIME type of the file, and display the file.
	header("Content-Type: ".$mime);
	readfile($full_path);

?>
