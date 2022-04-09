<?php session_start(); ?>
<?php require_once('sign/inc/connection.php'); ?>
<?php 

	// check for form submission
	if (isset($_POST['Submit'])) {

		$errors = array();
        $email = '';
        $password = '';

		// check if the username and password has been entered
		if (!isset($_POST['Email']) || strlen(trim($_POST['Email'])) < 1 ) {
			$errors[] = 'Username is Missing / Invalid';
		}

		if (!isset($_POST['Password']) || strlen(trim($_POST['Password'])) < 1 ) {
			$errors[] = 'Password is Missing / Invalid';
		}

		// check if there are any errors in the form
		if (empty($errors)) {
			// save username and password into variables
			$email 		= mysqli_real_escape_string($connection, $_POST['Email']);
			$password 	= mysqli_real_escape_string($connection, $_POST['Password']);
			$hashed_password = sha1($password);

			// prepare database query
			$query = "SELECT * FROM company_info 
						WHERE email = '{$email}' 
						AND password = '{$hashed_password}' 
						LIMIT 1";

			$result_set = mysqli_query($connection, $query);

			if ($result_set) {
				// query succesfful
				$_SESSION['pass_email'] = $email;

				if (mysqli_num_rows($result_set) == 1) {
					// valid user found
					// redirect to users.php
					header('Location: afterlog.php');
				} else {
					// user name and password invalid
					$errors[] = 'Invalid Username / Password';
				}
			} else {
				$errors[] = 'Database query failed';
			}
		}
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="sign/sign.css">
        <title>Sign In</title>
    </head>
    <body>
        <div class="form_area">
        <h1>Sign In</h1><br>

        <?php 
			if (isset($errors) && !empty($errors)) {
			echo '<p class="error">Invalid Username / Password</p>';
			}
		?>

        <form action="signin.php" method="post">
            <label for ="">Email :</label><br>
            <input type="email" id="Email" name="Email"><br>
            <label for ="">Password :</label><br>
            <input type="password" id="Password" name="Password"><br>
            <input type="submit" value="Submit"  name="Submit"> <br>
        </form>
        </div>

    </body>
</html>
<?php mysqli_close($connection); ?>