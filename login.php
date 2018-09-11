<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
</head>
    <body>
		<div>
			<div id= "login layout">
				<h1>This is Hong Wi and Sam Pointer's File Sharing Website </h1>
				<h4>To log in this site, please provide your user name below.</h4>
				
				<form action ="login.php" method = "POST">
					<div class="input">
						Username: <input type="text" name="user"/></br>
						<input type="submit" name="loginAction" value="Log In"></br>
					</div>
					<p>
					If you are not an user, please sign up by clicking below button.
					</p>
					<input type="submit" name= "signupAction" value="Sign Up"/>
				</form>
			</div>
			<?php
	
			if(isset($_POST["loginAction"])){
			session_start();
			$userName = $_POST["user"];			
			if( !preg_match('/^[\w_\-]+$/', $userName) ){
				echo "Invalid username. Type a different user name";				
				exit;
			}
			$_SESSION['user'] = $userName;
			$validUser = false;
			$h = fopen("/srv/uploads/users.txt", "r");
			$linenum = 1;
			echo "<ul>\n";
			while( !feof($h) ){
				$trim = trim(fgets($h));
				if ($userName == $trim) {
					$validUser = true;
				}
				else {				
				$linenum++;
				}
			}
			echo "</ul>\n";		
			fclose($h);
			// [2] if he is in, then he should be redirected.
			if($validUser) {
				$_SESSION['loggedin'] = true;		 // dealing with security stuff.
				$_SESSION['username'] = $userName;
				header("Location: sharingsite.php");
				exit;
			}
			// [3] if he is not, then he should be asked to sign up. 
			else {	
			}
			}
			?>
		</div>
    </body>
</html>