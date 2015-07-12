<?php
include 'CentralStoreManager.php';

$query="SELECT po_number,po_date,quantity FROM po";

 if($run=mysqli_query($server,$query)){
 	$query_rows=mysqli_num_rows($run);

 	while($row=mysqli_fetch_assoc($run)){
 		$po_number = $row['po_number'];
 		$po_date= $row['po_date'];
 		$quantity = $row['quantity'];
 		
 	}
 }

 $query_two = "Select * from sin";
 if($run_two=mysqli_query($server,$query_two)){
 	$query_rows_two=mysqli_num_rows($run_two);

 	while($row_two=mysqli_fetch_assoc($run_two)){
 		$sin_no = $row_two['sin_no'];
 		$sin_date= $row_two['sin_date'];
 		$item_code = $row_two['item_code'];
 		$items_delivered= $row_two['items_delivered'];
 		$recieved_date= $row_two['recieved_date'];
 		$quality_reference_number = $row_two['quality_reference_number'];
 		$quality_manager_name = $row_two['quality_manager_name'];
 		$quality_status= $row_two['quality_status'];
 		$quantity_accepted = $row_two['quantity_accepted'];
 		$quantity_inspected= $row_two['quantity_inspected'];
 		$comments= $row_two['comments'];	
 	}
 } 

 ?>

 <html>
<body>
<div class="display-tables" >
<table border="3px" style="position: relative; left:14%; ">
	<tr>
		<td>Sin No</td>
		<td><?php echo $sin_no; ?></td>
	</tr>

	<tr>
	<td>Sin Date</td>
	<td><?php echo $sin_date; ?></td>
</tr>

<tr>
	<td>Item Code</td>
	<td><?php echo $item_code; ?></td>
</tr>

<tr>
	<td>Items Delivered</td>
	<td><?php echo $items_delivered; ?></td>
</tr>

<tr>
	<td>Recieved date</td>
	<td><?php echo $recieved_date; ?></td>
</tr>

<tr>
	<td>Quality Reference Number</td>
	<td><?php echo $quality_reference_number; ?></td>
</tr>

<tr>
	<td>Quality Manager Name</td>
	<td><?php echo $quality_manager_name; ?></td>
</tr>

<tr>
	<td>Quality Status</td>
	<td><?php echo $quality_status; ?></td>
</tr>

<tr>
	<td>Quantity Accepted</td>
	<td><?php echo $quantity_accepted; ?></td>
</tr>

<tr>
	<td>Quantity Inspected</td>
	<td><?php echo $quantity_inspected; ?></td>
</tr>

<tr>
	<td>Commnents</td>
	<td><?php echo $comments; ?></td>
</tr>
</table>
</div> 

</body>
</html>