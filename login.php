<!DOCTYPE html>
<html lang='en'>	
<head>
	<title>Login page</title>
	<link rel="stylesheet" href="login.css">	
</head>
    <body>
		<div>
			<h1>This is Hong Wi's File Sharing Website </h1>
			<h4>To log in this site, please provide your user name below.</h4>
			<form action ="login.php" method = "POST">
				<div class="input">
					Username: <input type="text" name="user"/><br>
					<input type="submit" name="loginAction" value="Log In"><br>
				</div>
			</form>
<!--
Reference of below signup action:
https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_signup_form
-->				
			<form action="signup.php" method = "POST" >
				<div class="container">
					<h3>If you are a new user, please sign up.</h3>
					<p>Please enter user name you want.</p>
					<br>
					<label for="newuserName" ><b>New User Name</b></label>
					<input type="text" placeholder="Enter User Name" name="newuserName" id ="newuserName" required>
					<div class="clearfix">
						<button type="submit" name="signupAction">Sign Up</button>
					</div>
				</div>
			</form>			
			<?php
			//after login button is clicked, this php will be excuted. 
			if(isset($_POST["loginAction"]))
			{
				session_start();
				$userName = $_POST["user"];			
				if( !preg_match('/^[\w_\-]+$/', $userName) )
				{
					echo "Invalid username. Type a different user name";				
					exit;
				}
				$_SESSION['user'] = $userName;
				$validUser = false;
				$h = fopen("/srv/uploads/users.txt", "r");
				$linenum = 1;
				echo "<ul>\n";
				while( !feof($h) )
				{
					$trim = trim(fgets($h));
					if ($userName == $trim)
					{
						$validUser = true;
					}
					else
					{				
					$linenum++;
					}
				}
				echo "</ul>\n";		 		
				fclose($h);
				if($validUser)
				{
					$_SESSION['loggedin'] = true;		 // dealing with security stuff.
					$_SESSION['username'] = $userName;
					header("Location: sharingsite.php");
					exit;
				}
			}	
			?>

		</div>
    </body>
</html>