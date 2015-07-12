<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>


<?php

 if(isset($_POST['submit'])){
          $emp_id = $_POST['emp_id'];
          $user_name = $_POST['user_name'];
          $passwd =$_POST['password'];
          $submit = $_POST['submit'];
        }

 include 'admin/connection.php';
 include 'admin/session.php';

if($submit){
	if(!empty($emp_id) && !empty($user_name) && !empty($passwd)){
		$query = "Select * from `login` WHERE `employee_id` = '$emp_id' AND `user_name` = '$user_name' AND `password` = '$passwd' ";

		 if($run=mysqli_query($server,$query)){
		 	$query_rows=mysqli_num_rows($run);
		 	if($query_rows==0){
		 		echo '<div class="error" style="font-size:25px">';
                  echo "Details entered are incorrect. Please try again!";
                  echo '</div>';
            }

            else if($query_rows == 1){

               while($row=mysqli_fetch_assoc($run)){
                    
                $user_id = $row['employee_id'];
                $_SESSION['employee_id']=$user_id;

               $query_two = "Select `role_description` FROM role_master WHERE role_id = (SELECT `employee_role_id` from `login` WHERE `employee_id` = '$user_id')";
               $run_two = mysqli_query($server,$query_two);
               $row_two = mysqli_fetch_assoc($run_two);
               $employee_role_id  = $row_two['role_description'];
	
	if($employee_role_id == 'retail_store'){
		header("location: RetailStoreManager/RetailStoreManager.php");
	}

	else if($employee_role_id == 'head_central'){
		header('location:HeadCentralStore/HeadCentralStore.php');
	}

	else if($employee_role_id == 'central_store_manager'){
		header('location:CentralStoreManager/CentralStoreManager.php');
	}

	else if($employee_role_id == 'quality_manager'){
		header('location:QualityManager/QualityManager.php');
	}
	else{
		echo '<div class="error" style="font-size:25px">';
		echo "No role assigned to you!";
		echo '</div>';
	}

              }
            }
		 }


	}else{
		echo '<div class="error" style="font-size:25px">';
		echo "Please fill all the details properly";
		echo '</div';
	}
}


?>

<body>
 <div class="jumbotron">
    <h1>USER LOGIN</h1>
  </div>
	
<div class="container">
	<form role="form" class="form-horizontal"  name="login_form" action="login.php" method="POST">
			
			<div class="form-group">
			<label>Employee ID</label><input type="text" name="emp_id" class="form-control"/><br />
			</div>

		    <div class="form-group">
			<label>User Name</label><input type="text" name="user_name" class="form-control"/><br />
			</div>

			 <div class="form-group">
			<label>Password</label><input type="password" name="password" class="form-control"/><br />
			 <div class="form-group">
			
			 <div class="form-group">
			<input type="submit" class="btn btn-primary"  name="submit" id="submit_btn" value="Log In"/>
			<input type="reset" class="btn btn-primary" name="cancel" id="cancel_btn" value="Cancel"/>
			</div>
	</form>

</div> <!-- End of class Container -->

</body>
</html>