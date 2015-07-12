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
$query = "SELECT * FROM po";
 if($run=mysqli_query($server,$query)){
 	$query_rows=mysqli_num_rows($run);

 	while($row=mysqli_fetch_assoc($run)){
 		$po_number = $row['po_number'];
 		$po_date = $row['po_date'];
 		$item_code= $row['item_code'];
 		$supplier_id = $row['supplier_id'];
 		$raised_by = $row['raised_by'];
 		$approved_by= $name1;
 		$quantity = $row['quantity'];
 	}

 }

$query_two = "SELECT * FROM item";

 if($run_two=mysqli_query($server,$query_two)){
 	$query_rows_two=mysqli_num_rows($run_two);

 	while($row_two=mysqli_fetch_assoc($run_two)){
 		$item_code = $row_two['item_code'];
 		$item_desc = $row_two['item_desc'];
 		$unit_of_measure= $row_two['unit_of_measure'];
 		$supplier_central_price = $row_two['supplier_central_price'];
 	}

 }
 if(isset($_POST['submit'])){
	$accept_reject = $_POST['accept_reject'];
	$submit = $_POST['submit'];
}

if($submit){
	if(!empty($accept_reject)){

	if($accept_reject == 'accept'){
		$query_three = "UPDATE po SET `status` = 'accept', `approved_by`='$name1' where `po_number` ='$po_number'";
		$run_three=mysqli_query($server,$query_three);
		echo "Accepted_successfully and approved_by ".$name1;
	}else{
			$query_four = "UPDATE po SET `status` = 'reject' where `po_number` ='$po_number'";
		$run_four=mysqli_query($server,$query_four);
		echo "Order rejected successfully";
	}

}
}
$total = $quantity * $supplier_central_price;
?>
<boby>

<div class="left-box">
<form action="PurchaseOrderRequest.php" method="POST">
<table border="3" style="left:38%; position:relative;">
<tr>
	<td>PO Number</td>
	<td><?php echo $po_number; ?></td>
</tr>

<tr>
	<td>PO Date</td>
	<td><?php echo $po_date; ?></td>
</tr>

<tr>
	<td>Item Code</td>
	<td><?php echo $item_code; ?></td>
</tr>

<tr>
	<td>Item_description</td>
	<td><?php echo $item_desc; ?></td>
</tr>

<tr>
	<td>Unit of measurement</td>
	<td><?php echo $unit_of_measure; ?></td>
</tr>

<tr>
	<td>Supplier Id</td>
	<td><?php echo $supplier_id; ?></td>
</tr>

<tr>
	<td>Quantity</td>
	<td><?php echo $quantity; ?></td>
</tr>

<tr>
	<td>Supplier Central Price</td>
	<td><?php echo $supplier_central_price; ?></td>
</tr>

<tr>
	<td>Total Value</td>
	<td><?php echo $total; ?></td>
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
