<?php
  
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "root", "", "jobmart");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }

        $position = '';
        $type = '';
        $category = '';
        $edu_level = '';
        $district = '';
        $experience = '';
        $description = '';
	
          
        // Taking all 5 values from the form data(input)
        $position =  $_REQUEST['position'];
        $type =  $_REQUEST['jtime'];
        $category =  $_REQUEST['category'];
        $edu_level =  $_REQUEST['level'];
        $district =  $_REQUEST['District'];
        $experience =  $_REQUEST['exp'];
        $description =  $_REQUEST['Description'];

        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO job_rec (position , type, category , edu_level , district ,experience , description)  VALUES ('{$position}' , '{$type}', '{$category}' , '{$edu_level}' , '{$district}' , '{$experience}' , '{$description}')";
          
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully." 
                . " Please browse your localhost php my admin" 
                . " to view the updated data</h3>"; 
  
            //echo nl2br("\n$first_name\n $last_name\n "
                //. "$gender\n $address\n $email");
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
        ?>

        <form action="form_com.php" method="post">
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
        
            
        <li><label for="jtime">Job time:      </label><br>
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

<?php
// Close connection
    mysqli_close($conn);
?>