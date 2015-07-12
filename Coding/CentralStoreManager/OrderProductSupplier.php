<?php
require 'CentralStoreManager.php';

if(isset($_POST['submit'])){
	$po_date = $_POST['po_date'];
	$item_code = $_POST['item_code'];
	$supplier_id = $_POST['supplier_id'];
	$quantity = $_POST['quantity'];
	$submit = $_POST['submit'];

}
if($submit){
if(is_numeric($quantity) && $quantity>0){

	if(!empty($po_date) && !empty($item_code) && !empty($supplier_id) && !empty($quantity)){

		$query = "SELECT item_desc,unit_of_measure,supplier_central_price FROM item WHERE item_code = '$item_code'";
		if($run=mysqli_query($server,$query)){
 	$query_rows=mysqli_num_rows($run);

 	while($row=mysqli_fetch_assoc($run)){
 		$item_desc= $row['item_desc'];
 		$unit_of_measure = $row['unit_of_measure'];
 		$supplier_central_price= $row['supplier_central_price'];
    }
 		
 		$query_one = "INSERT into po VALUES ('','$po_date','$item_code','$supplier_id','$quantity','$name1','null','pending')";

 		if($run=mysqli_query($server,$query_one)){
 			echo '<div class="error" style="font-size:25px">';
 			echo "Sucessfully updated PO records";
 			echo "</div>";
 	}else{
 		echo '<div class="error" style="font-size:25px">';
 		echo "Error in updating PO";
 		echo '</div>';
 	}

 }
	}else{
		echo '<div class="error" style="font-size:25px">';
		echo "Please enter all the fieds properly";
		echo "</div>";
	}
}else{
	echo '<div class="error" style="font-size:25px">';
	echo "Please supply quantity within numerics only";
	echo '</div>';
}
}

?>

<html>
<body>
<div class="display-tables">

<form action="" class="form-horizontal" method="POST">
	<label>PO Date</label><input type="text" name="po_date" class="form-control">
	<label>Item Code</label><input type="text" name="item_code" class="form-control">
	<label>Supplier ID</label><input type="text" name="supplier_id" class="form-control">
	<label>Quantity</label><input type="text" name="quantity" class="form-control"><br />

	<input type="submit" name="submit" value="Submit" class="btn btn-primary">
</form>
</div>
</body>
</html>