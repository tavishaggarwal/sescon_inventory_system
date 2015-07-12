<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Retail Store Manager</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
  </head>

<?php
require 'RetailStoreManager.php';

$query = "SELECT * FROM mi";
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


?>

<body>
<div class="display-tables">

<table border="1" width="50%">
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



</table>

</body>
</html>