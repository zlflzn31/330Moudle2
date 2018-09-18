<?php
	session_start();
	// view file logic.
    $old_file_name = $_POST['file'];
	$new_file_name = $_POST['newFileName'];
 	$userName = $_SESSION['user'];	   
	if( !preg_match('/^[\w_\-]+$/', $userName) )
	{
		echo "Invalid username";
		exit;
	}
    // Reference of these below logic:
    //https://www.geeksforgeeks.org/php-rename-function/
    
	$full_path_old_file = sprintf("/srv/uploads/%s/%s", $userName, $old_file_name);
    $full_path_new_file = sprintf("/srv/uploads/%s/%s", $userName, $new_file_name);
    if(file_exists($full_path_new_user))
    { 
       echo "Error While Renaming $old_name" ;
    }
    else
    {
		$finfo = new finfo(FILEINFO_MIME_TYPE);
		$mime = $finfo->file($full_path_old_file);
		if(rename( $full_path_old_file, $full_path_new_file))
		{ 
		   echo "Successfully Renamed $old_file_name to $new_file_name" ;
		   header("Location: sharingsite.php");
		}
		else
		{
		   echo "A File With The Same Name Already Exists" ;
		}
    }
    
    
?>