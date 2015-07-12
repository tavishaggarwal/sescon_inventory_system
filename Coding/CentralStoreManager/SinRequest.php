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

$query_one = "SELECT item_code,item_desc,unit_of_measure FROM item";
 if($run_one=mysqli_query($server,$query_one)){
 	$query_rows_one=mysqli_num_rows($run_one);

 	while($row_one=mysqli_fetch_assoc($run_one)){
 		$item_code = $row_one['item_code'];
 		$item_desc= $row_one['item_desc'];
 		$unit_of_measure= $row_one['unit_of_measure'];
 		
 	}
 }

 $query_two = "SELECT mi_number,requested_date FROM mi";
  if($run_two=mysqli_query($server,$query_two)){
 	$query_rows_two=mysqli_num_rows($run_two);

 	while($row_two=mysqli_fetch_assoc($run_two)){
 		$mi_number = $row_two['mi_number'];
 		$requested_date= $row_two['requested_date'];
 		
 	}
 }

if(isset($_POST['submit'])){
		  
		  $sin_date = $_POST['sin_date'];
          $recieved_date =$_POST['recieved_date'];
          $submit = $_POST['submit'];
}

if($submit){
	if(!empty($sin_date) && !empty($recieved_date)){
  $query_three ="INSERT INTO sin VALUES ('','$sin_date','$item_code','$item_desc','$recieved_date','null','null','pending','null','null','null')";

  if($run_three=mysqli_query($server,$query_three)){
  	echo '<div class="error" style="font-size:25px">';
 	echo "SIN is Successfully generated";
 	echo '</div>';
 }else{
 	echo '<div class="error" style="font-size:25px">';
 	echo "Failed to insert recort into SIN";
 	echo "</div>";
 }


	}else{
		echo '<div class="error" style="font-size:25px">';
		echo "Please provide all the fields correctly";
		echo '</div>';
	}
}


?>

<html>
<body>
<div class="display-tables" >

<form action="" method="POST"class="form-horizontal">
<label>SIN Date</label><input type="text" name="sin_date" class="form-control">
<label>Recieved Date</label><input type="text" name="recieved_date" class="form-control"><br />
<input type="submit" value="Submit" name="submit" class="btn btn-primary">
</form>
</div> 

</body>
</html>