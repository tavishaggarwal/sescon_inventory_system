<?php
require 'CentralStoreManager.php';

$query_one = "SELECT * FROM min";
if($run_one=mysqli_query($server,$query_one)){
 	$query_rows_one=mysqli_num_rows($run_one);

 	while($row_one=mysqli_fetch_assoc($run_one)){
 		$min_number = $row_one['mi_number'];
 		$mi_date = $row_one['mi_date'];
 		$item_code= $row_one['item_code'];
 		$mi_quantity = $row_one['mi_quantity'];
 		$issued_quantity = $row_one['issued_quantity'];
 		$issued_on = $row_one['issued_on'];
 		$issue_to_whom = $row_one['issue_to_whom'];
 		$current_stock= $row_one['current_stock'];
 	}

 }

$query_two = "SELECT item_code, item_desc, unit_of_measure FROM item";

 if($run_two=mysqli_query($server,$query_two)){
 	$query_rows_two=mysqli_num_rows($run_two);

 	while($row_two=mysqli_fetch_assoc($run_two)){
 		$item_code = $row_two['item_code'];
 		$item_desc = $row_two['item_desc'];
 		$unit_of_measure= $row_two['unit_of_measure'];
 	}

 }

 $query_three = "SELECT * FROM mi";
if($run_three=mysqli_query($server,$query_three)){
 	$query_rows_three=mysqli_num_rows($run_three);

 	while($row_three=mysqli_fetch_assoc($run_three)){
 		$requested_date = $row_three['requested_date'];
 		$mi_number= $row_three['mi_number'];

 	}

 }




?>

<html>
<body>
<div class="display-tables">
<table border="2px" style="left:13%; position:relative;">
	<tr>
		<td>MIN number</td>
		<td><?php echo $min_number; ?></td>
	</tr>

	<tr>
		<td>MIN date</td>
		<td><?php echo $mi_date; ?></td>
	</tr>

	<tr>
		<td>MI date</td>
		<td><?php echo $requested_date; ?></td>
	</tr>

    <tr>
		<td>MI number</td>
		<td><?php echo $mi_number; ?></td>
	</tr>
	<tr>
		<td>Item_code</td>
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
		<td>MI Quantity</td>
		<td><?php echo $mi_quantity; ?></td>
	</tr>

	<tr>
		<td>Issued_quantity</td>
		<td><?php echo $issued_quantity; ?></td>
	</tr>

	<tr>
		<td>Issued On</td>
		<td><?php echo $issued_on; ?></td>
	</tr>

	<tr>
		<td>Isued to whom</td>
		<td><?php echo $issue_to_whom; ?></td>
	</tr>

	<tr>
		<td>Current_stock</td>
		<td><?php echo $current_stock; ?></td>
	</tr>
</table>
</div>
</body>
</html>