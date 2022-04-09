<?php session_start(); ?>
<?php require_once('sign/inc/connection.php'); ?>
<?php
    $errors = array();
	$search = '';
	$type = '';
	$category = '';
	$edu_level = '';
    $district = '';
	$experience = '';
	
    if (isset($_POST['searchbutt'])){
        $search = $_POST['search'];
        $search = mysqli_real_escape_string($connection, $_POST['search']);

        $sql1 = "SELECT * FROM job_req INNER JOIN company_info ON job_req.com_ID=company_info.com_id WHERE position LIKE '%$search%' OR category LIKE '%$search%'";
        $result1 = mysqli_query($connection, $sql1);
        $res_list='';
        $resultcheck1 = mysqli_num_rows( $result1);
        if($resultcheck1 > 0){
            while($row1 = mysqli_fetch_assoc($result1)){
                $res_list .= "<tr>";
                $res_list .= "<th>{$row1['com_name']}</th>";
                $res_list .= "<td>Position:{$row1['position']}<br>";
                $res_list .= "Job time:{$row1['type']}<br>";
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
    }else if(isset($_POST['Submit'])){
        $type = $_POST['jtime'];
        $category = $_POST['category'];
        $edu_level = $_POST['level'];
        $district = $_POST['District'];
        $experience = $_POST['exp'];

        $type = mysqli_real_escape_string($connection, $_POST['jtime']);
        $category = mysqli_real_escape_string($connection, $_POST['category']);
        $edu_level = mysqli_real_escape_string($connection, $_POST['level']);
        $district = mysqli_real_escape_string($connection, $_POST['District']);
        $experience = mysqli_real_escape_string($connection, $_POST['exp']);

        if(empty($experience)){
            $sql2="SELECT * FROM job_req INNER JOIN company_info ON job_req.com_ID=company_info.com_id WHERE type LIKE '$type' AND category LIKE '$category' AND edu_level LIKE '$edu_level' AND district LIKE '$district' ";
            $result1 = mysqli_query($connection, $sql2);
            $res_list='';
            $resultcheck1 = mysqli_num_rows( $result1);
            if($resultcheck1 > 0){
                while($row1 = mysqli_fetch_assoc($result1)){
                    $res_list .= "<tr>";
                    $res_list .= "<th>{$row1['com_name']}</th>";
                    $res_list .= "<td>Position:{$row1['position']}<br>";
                    $res_list .= "Job time:{$row1['type']}<br>";
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
        }else{
            $sql3="SELECT * FROM job_req INNER JOIN company_info ON job_req.com_ID=company_info.com_id WHERE type LIKE '$type' AND category LIKE '$category' AND edu_level LIKE '$edu_level' AND district LIKE '$district' AND experience LIKE '$experience' ";
            $result1 = mysqli_query($connection, $sql3);
            $res_list='';
            $resultcheck1 = mysqli_num_rows( $result1);
            if($resultcheck1 > 0){
                while($row1 = mysqli_fetch_assoc($result1)){
                    $res_list .= "<tr>";
                    $res_list .= "<th>{$row1['com_name']}</th>";
                    $res_list .= "<td>Position:{$row1['position']}<br>";
                    $res_list .= "Job time:{$row1['type']}<br>";
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
        }

    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/resultsheet.css">

</head>

<body>

<div class="navbar">
  <a class="active" href="index.html"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="f_form.php"><i class="fa fa-fw fa-search"></i> Search</a> 
 
</div>

<div class="record">
        <table border=1px width=100%>
        <tr>
            <th style="width:30%"></th>
            <td style="width:70%"></td>
        </tr>
        <?php echo $res_list; ?>
        </table>

 

</body>
</html>
