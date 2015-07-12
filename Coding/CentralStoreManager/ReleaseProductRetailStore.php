<?php
include 'CentralStoreManager.php';

$query = "SELECT `mi_number`, `requested_date`,`quantity_required`,`store_id` FROM mi";
 if($run=mysqli_query($server,$query)){
 	$query_rows=mysqli_num_rows($run);

 	while($row=mysqli_fetch_assoc($run)){
 		$mi_number = $row['mi_number'];
 		$requested_date = $row['requested_date'];
 		$quantity_required = $row['quantity_required'];
 		$store_id =$row['store_id'];	
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

$query_three = "SELECT items_available FROM central_store WHERE item_code = '$item_code'";

 if($run_three=mysqli_query($server,$query_three)){
 	$query_rows_three=mysqli_num_rows($run_three);

 	while($row_three=mysqli_fetch_assoc($run_three)){
 		$current_stock = $row_three['items_available'];
 	}

 }

 if(isset($_POST['submit'])){
 	 $issued_quantity = $_POST['issued_quantity'];
     $issued_on = $_POST['issued_on'];
     $submit  =$_POST['submit'];
}

if($submit){
	if($issued_quantity<= $quantity_required && $issued_quantity>0){
	if(!empty($issued_quantity) && !empty($issued_on)){
	
	$temp = $current_stock-$issued_quantity;
$query_five = "UPDATE central_store SET items_available='$temp'";	

if($run_five=mysqli_query($server,$query_five)){
	echo '<div class="error" style="font-size:25px">';
 	echo "Successfully updated Central store records after full filling of MI <br />";
 	echo "</div>";

 }else{
 	echo '<div class="error" style="font-size:25px">';
 	echo "Error in updation of MI <br />";
 	echo "</div>";
 }

$query_four  ="INSERT INTO min VALUES ('$mi_number', '$requested_date','$item_code','$quantity_required','$issued_quantity','$issued_on','$store_id','$temp')";
 if($run_four=mysqli_query($server,$query_four)){
 	echo '<div class="error" style="font-size:25px">';
 	echo "MIN Report is generated Successfully <br />";
 	echo "</div>";

 }else{
 	echo '<div class="error" style="font-size:25px">';
 	echo "Error in genrating MIN report<br />";
 	echo "</div>";
 }


	}else{
		echo "Please enter all the fields properly";
	}
}else{
	echo "Please supply with valid data";
}
}

?>

<html>
<body>
<div class="display-tables" >
<form action="" method="POST" class="form-horizontal">
<label>Issued Quantity</label><input type="text" name="issued_quantity" class="form-control">
<label>Issued On</label><input type="text" name="issued_on" class="form-control"><br />
<input type="submit" value="submit" name="submit" class="btn btn-primary">
</form>
</div> 

</body>
</html>