<?php

include 'QualityManager.php';

if(isset($_POST['submit'])){
	$status = $_POST['rb_quality'];
	$submit = $_POST['submit'];
	$partial = $_POST['tb1'];
	$reason = $_POST['tb2'];
	$partial1 = $_POST['partial'];
}

$query ="SELECT items_available FROM central_store";

if($run=mysqli_query($server,$query)){
 	$query_rows=mysqli_num_rows($run);

 	while($row=mysqli_fetch_assoc($run)){
 		$items_available= $row['items_available'];	
 	}
}

$temp = $items_available + $partial;
$temp1 = $items_available + $partial1;


if($submit){
	if(!empty($status)){
	  if(!empty($reason) && !empty($partial)){
		if($status =='accepted'){
		$query_one= "UPDATE central_store set items_available ='$temp'";
		if($run_one=mysqli_query($server,$query_one)){
			echo "Successfully update central store";
		}else{
			echo "Failed to execute querry! Please try again";
		}

		$query_two="UPDATE sin set quality_manager_name = '$name1', quality_status='accepted', quantity_accepted ='$partial',quality_reference_number='101', items_delivered='$partial', quantity_inspected='$partial', comments='$reason'";
				if($run_two=mysqli_query($server,$query_two)){
			echo "Successfully update SIN<br />";
		}else{
			echo "Failed to execute querry! Please try again";
		}
		}

		else if($status == 'rejected'){
			$query_two="UPDATE sin set quality_manager_name = '$name1', quality_status='rejected', quantity_accepted ='0',quality_reference_number='102', items_delivered='0', quantity_inspected='$partial', comments='$reason'";
				if($run_two=mysqli_query($server,$query_two)){
			echo "Successfully update SIN<br />";
		}else{
			echo "Failed to execute querry! Please try again";
		}
		}
		else{
$query_three = "UPDATE central_store set items_available ='$temp1'";
		if($run_three=mysqli_query($server,$query_three)){
			echo "Successfully update central store";
		}else{
			echo "Failed to execute querry! Please try again";
		}

		$query_four="UPDATE sin set quality_manager_name = '$name1', quality_status='partially-accepted',quality_reference_number='103', quantity_accepted ='$partial1', quantity_inspected='$partial', comments='$reason'";
				if($run_four=mysqli_query($server,$query_four)){
			echo "Successfully update SIN<br />";
		}else{
			echo "Failed to execute querry! Please try again";
		}
		}

	
			
		}else{
			echo "please fill all text boxes";
		}
	}
}


?>
<html>

	<head>
		<title>
			Quality approve/reject order
		</title>
<script type="text/javascript" src="../js/javaScript.js"></script>
	</head>

	<body>
	<form action="" method="POST" class="form-horizontal">
	<br />
		<table align="left" style="position: relative; left:20%;">
		
		<tr>
				<td>
				&nbsp;
				</td>
				<td>
					Items Inspected
				</td>
				<td>
				<input type="text" name="tb1" class="form-control"/>
				</td>
				
			</tr>


			<tr>
				
				<td>
					<input type="radio" name="rb_quality" value="accepted" class="form-control"/>
				</td>

				<td>
					Approved
				</td>
			</tr>

			<tr>
				
				<td>
					<input type="radio" name="rb_quality" value="rejected" class="form-control"/>
				</td>

				<td>
					Rejected
				</td>
			</tr>

			<tr>
				
				<td>
					<input type="radio" name="rb_quality" value="partially_accepted" class="form-control"/>
				</td>

				<td>
					Partially Approved
				</td>
				<td colspan="2">
				
				<input type="text" name="partial" placeholder="Partially accepted items...!" class="form-control"/>
				</td>

			</tr>
			
		<tr>
				<td>
				&nbsp;
				</td>
				<td>
					Comment
				</td>
				<td colspan="2">
				<input type="text" name="tb2" class="form-control"/>
				</td>
				<td>
				&nbsp;
				</td>
				
			</tr><tr>
			
				<td>
				<input type="submit" value="Submit" name="submit" class="btn btn-primary"/>&nbsp;&nbsp;
				</td>
			
				<td>
				<input type="reset" value="Reset" class="btn btn-primary"/>
				</td>
			
			</tr>			
</table>
</form>
</body>
</html>