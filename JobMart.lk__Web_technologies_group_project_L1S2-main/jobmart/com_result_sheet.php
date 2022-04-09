<?php session_start(); ?>
<?php require_once('sign/inc/connection.php'); ?>
<?php
    $email = $_SESSION['pass_email']; 

    $query01 = "SELECT com_id FROM company_info 
					WHERE email = '{$email}' 
					LIMIT 1";

        $result01 = mysqli_query($connection, $query01);

        $rows = mysqli_fetch_assoc($result01);
        $com_id=$rows['com_id'];
        

    $sql="SELECT * FROM job_req WHERE com_ID='$com_id'";
    $result1 = mysqli_query($connection, $sql);
    $res_list='';
    $resultcheck1 = mysqli_num_rows( $result1);
    if($resultcheck1 > 0){
        while($row1 = mysqli_fetch_assoc($result1)){
            $res_list .= "<tr>";
            $res_list .= "<th>Position:{$row1['position']}</th>";
            $res_list .= "<td>Job time:{$row1['type']}<br>";
            $res_list .= "Category:{$row1['category']}<br>";
            $res_list .= "Educated level:{$row1['edu_level']}<br>";
            $res_list .= "District:{$row1['district']}<br>";
            $res_list .= "Experiance:{$row1['experience']}<br>";
            $res_list .= "{$row1['description']}</td>";
            
        }
        
    }
else{
    echo "No record in there";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Posted Vacancies </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/resultsheet.css">  
</head>

<body>
<header>
<div class="navbar">
  <a class="active" href="index.html"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="f_form.php"><i class="fa fa-fw fa-search"></i> Search</a> 
  <a href="signin.php"><i class="fa fa-fw fa-user"></i> Logout</a>
</div>
</header>
    
    <div class="record">
        <table border=1px width=100%>
        <tr>
            <th style="width:30%"></th>
            <td style="width:70%"></td>
        </tr>
        <?php echo $res_list; ?>
        </table>

    </div>
   

  


</body>


</html>