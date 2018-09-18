<!DOCTYPE html>
<html lang='en'>	
<head>
	<title>Sign Up Page</title>
</head>
    <body>
                
        
        <?php
            session_start();
            $newuserName = $_POST['newuserName'];
            if( !preg_match('/^[\w_\-]+$/', $newuserName) )
			{
                echo "You can only create a user name with alpabets ! Go to login page !";
                exit;
                header("Location: login.php");
            }    
            //add new user to users.txt
            $users=fopen("/srv/uploads/users.txt", "a+");
            fwrite($users, "\r\n".$newuserName);
        ?>
        <?php
                echo "Great! An account has been created for you.";
                echo "<br>";
                echo "Your new user name is $newuserName.";
                echo "<br>";
                echo "Please go back to the login page by clicking below button, and log in with new use name ! ";
        ?>

        <form action="login.php">
        <input type="submit"/>
        </form>
        </div>
    </body>    