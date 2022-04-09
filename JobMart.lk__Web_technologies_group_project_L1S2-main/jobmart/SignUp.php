<?php session_start(); ?>
<?php require_once('sign/inc/connection.php'); ?>
<?php require_once('sign/inc/functions.php'); ?>

<?php 

	$errors = array();
	$com_name = '';
	$email = '';
	$password = '';
	$re_pass = '';
    

	if (isset($_POST['Submit'])) {
		
		$com_name = $_POST['Name'];
		$email = $_POST['Email'];
		$password = $_POST['Password'];
		$re_pass = $_POST['Re-Password'];

		// checking email address
		if (!is_email($_POST['Email'])) {
			$errors[] = 'Email address is invalid.';
		}

		// checking if email address already exists
		$email = mysqli_real_escape_string($connection, $_POST['Email']);
		$query = "SELECT * FROM company_info WHERE email = '{$email}' LIMIT 1";

		$result_set = mysqli_query($connection, $query);

		if ($result_set) {
			if (mysqli_num_rows($result_set) == 1) {
				$errors[] = 'Email address already exists';
			}
		}
        if ($re_pass != $password){
            $errors[] = 're-entered password does not match';
        }

		if (empty($errors)) {
			// no errors found... adding new record
			$com_name = mysqli_real_escape_string($connection, $_POST['Name']);
			$password = mysqli_real_escape_string($connection, $_POST['Password']);
			// email address is already sanitized
			$hashed_password = sha1($password);

			$query = "INSERT INTO company_info( ";
			$query .= "com_name , email, password ";
			$query .= ") VALUES (";
			$query .= "'{$com_name}' , '{$email}', '{$hashed_password}' ";
			$query .= ")";

			$result = mysqli_query($connection, $query);

			if ($result) {
				// query successful... redirecting to users page
				header('Location: afterlog.php?user_added=true');
			} else {
				$errors[] = 'Failed to add the new record.';
			}

        }

	}

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="sign/sign.css">
        <title>Sign Up</title>
    </head>
    <body>
        <div class="form_area">
        <h1>Sign Up</h1><br>

        <?php 

			if (!empty($errors)) {
				echo '<div class="errmsg">';
				echo '<b>There were error(s) on your form.</b><br>';
				foreach ($errors as $error) {
					echo '- ' . $error . '<br>';
				}
				echo '</div>';
			}

		 ?>

        <form action="SignUp.php" method="post">
            <label for ="Name">Name :</label><br>
            <input type="text" id="Name" name="Name" <?php echo 'value="'  . $com_name . '"'; ?>> <br>
            <label for ="Email">Email :</label><br>
            <input type="email" id="Email" name="Email" <?php echo 'value="' . $email . '"'; ?>  ><br>
            <label for ="password">Password :</label><br>
            <input type="password" id="Password" name="Password" ><br>
            <label for ="Re-password">Re-Password :</label><br>
            <input type="password" id="Re-Password" name="Re-Password" ><br>
            <label for="">&nbsp;</label><br>
            <input type="submit" value="Submit" name="Submit"><br>
        </form>
        </div>

    </body>
</html>

