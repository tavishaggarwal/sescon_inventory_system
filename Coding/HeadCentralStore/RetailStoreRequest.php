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
include 'HeadCentralStore.php';

$query = "SELECT * FROM `mi` WHERE status='pending'";
$run=mysqli_query($server,$query);

 	$query_rows=mysqli_num_rows($run);

 	while($row=mysqli_fetch_assoc($run)){
 		$mi_number=$row['mi_number'];
 		$item_code = $row['item_code'];
 		$quantity_required = $row['quantity_required'];
 		$required_date = $row['required_date'];
 		$store_id = $row['store_id'];
 		$status = $row['status'];
 		$requested_date = $row['requested_date'];
 		$requested_by = $row['requested_by'];	
 	}

 	$query_two = "SELECT `item_desc`,`unit_of_measure` FROM `item` WHERE `item_code` = '$item_code'";
 
 if($run_two=mysqli_query($server,$query_two)){
 	$query_rows_two=mysqli_num_rows($run_two);

 	while($row_two=mysqli_fetch_assoc($run_two)){
 	$item_desc = $row_two['item_desc'];
 	$unit_of_measure = $row_two['unit_of_measure'];
 		
 	}
 }
if(isset($_POST['submit'])){
	$accept_reject = $_POST['accept_reject'];
	$submit = $_POST['submit'];
}

if($submit){
	if(!empty($accept_reject)){

	if($accept_reject == 'accept'){
		$query_three = "UPDATE mi SET `status` = 'accept' where `mi_number` ='$mi_number'";
		$run_three=mysqli_query($server,$query_three);
		echo "Accepted_successfully";
	}else{
			$query_four = "UPDATE mi SET `status` = 'reject' where `mi_number` ='$mi_number'";
		$run_four=mysqli_query($server,$query_four);
		echo "Order rejected successfully";
	}

}
}
?>
<boby>
<div class="left-box">
<form action="RetailStoreRequest.php" method="POST">
<table border="1" style="left:35%; position:relative;">
		<tr>
		<td>MI Number</td>
		<td><?php echo $mi_number; ?></td>
		</tr>

		<tr>
			<td>Item Code</td>
			<td><?php echo $item_code; ?></td>
		</tr>

		<tr>
			<td>Item Description</td>
			<td><?php echo $item_desc; ?></td>
		</tr>

		<tr>
			<td>Unit of Measure</td>
			<td><?php echo $unit_of_measure; ?></td>
		</tr>

		<tr>
			<td>Quantity Required</td>
			<td><?php echo $quantity_required; ?></td>
		</tr>

		<tr>
			<td>Required Date</td>
			<td><?php echo $required_date; ?></td>
		</tr>

		<tr>
			<td>Store Id</td>
			<td><?php echo $store_id; ?></td>
		</tr>

		<tr>
			<td>Status</td>
			<td><?php echo $status; ?></td>
		</tr>

		<tr>
			<td>Requested Date</td>
			<td><?php echo $requested_date; ?></td>
		</tr>

		<tr>
			<td>Requested By</td>
			<td><?php echo $requested_by; ?></td>
		</tr>

		<tr>
			<td>Accepted</td>
			<td><input type="radio" name="accept_reject" id="accept" value="accept" /></td>
		</tr>

		<tr>
			<td>Rejected</td>
			<td><input type="radio" name="accept_reject" id="reject" value="reject"/></td>
		</tr>
</table>
<br>
		<center><input type="submit" value="Submit" name="submit" class="btn btn-primary"></center>
		</form>
</div>

</boby>
</html>