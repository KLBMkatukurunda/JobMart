<html>
    <head>
       <link rel="stylesheet" href="f_form/f_form.css">
        <title>f_form</title>
    </head> 
    <body>
        
        <div class="form_area">
            <center><h1>What kind of job do you need</h1>
            <form action="resultsheet.php" method="post">
            <ul>
           <li> <label for="search">Search:</label><br>
            <input type="text" id="search" name="search"></li><br>
            
            <input  type="submit" value="search" name="searchbutt">

        <li><label for="jtime">Job time:      </label><br>
            <select id="jtime" name="jtime" class="select">
            <option value="Full time">Full time</option>
            <option value="Part time">Part time</option>
            </select></li><br>

        <li> <label for="category">Select job category:</label><br>
            <select id="category" name="category" class="select">
            <option value="All">other</option>
            <option value="Accounting">Accounting</option>
            <option value="Engineering">Engineering</option>
            <option value="Management">Management</option>
            <option value="Architecture">Architecture</option><br>
            </select></li><br>

            
        <li> <label for="level">Education level:</label><br>
            <select id="level" name="level" class="select">
            <option value="None">None</option>
            <option value="OL">O/L</option>
            <option value="AL">A/L</option>
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
<input type="submit" value="submit" name="Submit">
        </ul></center>
        </form>
        </div>
    </body>
</html>