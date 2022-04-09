<?php session_start(); ?>
<?php require_once('sign/inc/connection.php'); ?>
<?php require_once('sign/inc/functions.php'); ?>

<?php

	$errors = array();
	$position = '';
	$type = '';
	$category = '';
	$edu_level = '';
    $district = '';
	$experience = '';
	$description = '';
    $email = $_SESSION['pass_email'];  
	
    
	if (isset($_POST['Submit'])) {

        $query01 = "SELECT com_id FROM company_info 
					WHERE email = '{$email}' 
					LIMIT 1";

        $result01 = mysqli_query($connection, $query01);

        $rows = mysqli_fetch_assoc($result01);
        $com_id=$rows['com_id'];

		$position = $_POST['position'];
		$type = $_POST['jtime'];
		$category = $_POST['category'];
		$edu_level = $_POST['level'];
        $district = $_POST['District'];
		$experience =$_POST['exp'];
		$description = $_POST['Description'];

		$position = mysqli_real_escape_string($connection, $_POST['position']);
		$type = mysqli_real_escape_string($connection, $_POST['jtime']);
        $category = mysqli_real_escape_string($connection, $_POST['category']);
        $edu_level = mysqli_real_escape_string($connection, $_POST['level']);
        $district = mysqli_real_escape_string($connection, $_POST['District']);
        $experience = mysqli_real_escape_string($connection, $_POST['exp']);
        $description = mysqli_real_escape_string($connection, $_POST['Description']);

		$query = "INSERT INTO job_req( ";
		$query .= "position , type, category , edu_level , district ,experience , description , com_ID ";
		$query .= ") VALUES (";
		$query .= "'{$position}' , '{$type}', '{$category}' , '{$edu_level}' , '{$district}' , '{$experience}' , '{$description}' , '{$com_id}' ";
		$query .= ")";
        
		$result = mysqli_query($connection, $query);

		if ($result) {
			// query successful... redirecting to users page
			header('Location: com_result_sheet.php?user_added=true');
		} else {
			$errors[] = 'Failed to add the new record.';
        
		}

	}

?>

<!DOCTYPE html>
<html>
    <head>
       <link rel="stylesheet" href="form_com/form_com.css">
        <title>f_form</title>
    </head> 
    <body>
        
        <div class="form_area">
            <center><h1>What kind of employee do you need</h1>
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

        <form action="form_com.php" method="POST">
            <ul>
                <li> <label for="post">Select position:</label><br>
                    <select id="post" name="position" class="select">
                    <option value="Other">Other</option>
                    <option value="Accountant">Accountant</option>
                    <option value="Engineer">Engineer</option>
                    <option value="Manager">Manager</option>
                    <option value="Architecturer">Architecturer</option><br>
                    </select>
                </li><br>
        
            
        <li><label for="jtime">Job time: </label><br>
            <select id="jtime" name="jtime" class="select">
            <option value="Full time">Full time</option>
            <option value="Part time">Part time</option>
            </select></li><br>

        <li> <label for="category">Select job category:</label><br>
            <select id="category" name="category" class="select">
            <option value="All">All</option>
            <option value="Accounting">Accounting</option>
            <option value="Engineering">Engineering</option>
            <option value="Management">Management</option>
            <option value="Architecture">Architecture</option><br>
            </select></li><br>

            
        <li> <label for="level">Education level:</label><br>
            <select id="level" name="level" class="select">
            <option value="None">None</option>
            <option value="OL">OL</option>
            <option value="AL">AL</option>
            <option value="Graduate">Graduate</option><br>
            </select></li><br>

            <li><label for="District">District:</label><br>
            <select id="District" name="District" class="select">
            <option value="Colombo">Colombo</option>
            <option value="Rathnapura">Rathnapura</option>
            <option value="Kandy">Kandy</option>
            <option value="All of srilanka">All of srilanka</option><br>
            </select></li><br>

        <li><label for="exp">Experience in years :</label><br>
            <input type="number" id="exp" name="exp" class="select" min="0" max="30"></li>  
<br>
            <li> <label for="Description">Description:</label><br>
            <input type="text" id="Description" name="Description"></li><br>
            <input type="submit" value="submit" name='Submit'>
        </ul></center>
        </form>
        </div>
    </body>
</html>