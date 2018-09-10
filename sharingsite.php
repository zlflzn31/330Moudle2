<!DOCTYPE html>
<html>
<head>
	<title>File Sharing Site Page</title>
</head>

<body>
	<?php
		session_start();
		$userName = $_SESSION['user'];
	?>
	<h1><?php echo $userName; ?>, you successfully logged in our website. </h1>
	<h3>Please explore as much as you want :)</h3>
	
	
	<div id = "uploadFile">
		<form enctype="multipart/form-data" action="uploader.php" method="POST">
			<p>
				<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
				<label for="uploadfile_input">Choose a file to upload:</label> <input name="uploadedfile" type="file" id="uploadfile_input" />
			</p>
			<p>
				<input type="submit" value="Upload File" />
			</p>
		</form>			
	</div>
	
	<h4>your current files are: </h4>
	<?php
		if (!file_exists("/srv/uploads/" . $userName) ) {
		mkdir("/srv/uploads/" . $userName, 0777);
		}
		$userDirectoryPath = "/srv/uploads/" . $userName;
		//scandir returns an array of files and directories.
		
		$userFiles = scandir($userDirectoryPath);
	
		if (!array_key_exists(2, $userFiles)) {
	
	?>
		<h4>you have no files yet. You could upload your files using upload button.</h4>
	<?php
		}
		else {
			for ( $i = 2; $i < sizeof($userFiles); $i++) {
				$fileName = $userFiles[$i];
				$filePath = $userDirectoryPath."/".$fileName;
				
				printf("%s",$userFiles[$i]);
	?>
				<form action= "viewFile.php" method="post">
					<input type="hidden" name="file" value="<?php echo $filepath;?>"/>
					<input type="submit" name="viewAction" value="View File"/>
				</form>
				<form action= "deleteFile.php" method="POST">
					<input type="hidden" name="file" value="<?php echo $filePath;?>"/>
					<input type="submit" name="deleteAction" value="Delete file"/>					
				</form>
	
	<?php
			}
		}
	
	?>







	


</body>
</html>
