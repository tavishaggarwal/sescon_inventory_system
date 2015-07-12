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

$query = "SELECT `item_code`,`item_desc` FROM `item` WHERE item_code = (SELECT `item_code` FROM retail_store WHERE items_available < `min_stock_level`)";
 
 if($run=mysqli_query($server,$query)){
 	$query_rows=mysqli_num_rows($run);

 	while($row=mysqli_fetch_assoc($run)){
 		$item_code = $row['item_code'];
 		$item_desc = $row['item_desc'];
 		
 	}
 }

$query_two = "SELECT items_available,store_id FROM `retail_store` WHERE `item_code` = '$item_code'";

 if($run_two=mysqli_query($server,$query_two)){
 	$query_rows_two=mysqli_num_rows($run_two);

 	while($row_two=mysqli_fetch_assoc($run_two)){
 	$items_available = $row_two['items_available'];
 	$store_id = $row_two['store_id'];
 		
 	}
 }

 if(isset($_POST['submit'])){

          $submit = $_POST['submit'];
        }

 if($submit){
 	          $quantity = $_POST['quantity'];
 	          if(!is_numeric($quantity)){
 	          	echo '<div class="error" style="font-size:25px">';
 	          	echo "Please enter numeric char only for quantity required coloumn";
 	          	echo "</div>";
 	          }else{
          $expecting_date = $_POST['expecting_date'];
          $requested_date =$_POST['requested_date'];
        	if(!empty($quantity) && !empty($expecting_date) && !empty($requested_date)){
        		$query_three = "INSERT INTO `mi` VALUES ('1','$item_code','$quantity','$expecting_date','$store_id','pending','$requested_date','$name1')";

   if($run_three=mysqli_query($server,$query_three)){
   	echo '<div class="error" style="font-size:25px">';
 		echo "Successfully Submited";
 		echo "</div>";
 	}
 }else{
 	echo '<div class="error" style="font-size:25px">';
 	echo "Please fill al fields properly";
 	echo "</div>";
  }
        		
} 
}      
?>

<body>
<div class="display-tables">

<form action="" class="form-horizontal" method="POST" >
	<table>
	<tr>
			  <th width='130'>ITEM CODE</th>
	          <th width='150'>ITEM DESCRIPTION</th>
	          <th width='230'>ITEMS AVAILABLE IN STOCK</th>
	          <th width='180'>QUANTITY REQUIRED</th>
	          <th width='150'>EXPECTING DATE</th>
	          <th width='150'>REQUESTED DATE</th>
	 </tr>

	 <tr>
	 	<td  width='130'><?php echo $item_code; ?></td>
	 	<td  width='130'><?php echo $item_desc; ?></td>
	 	<td  width='230'><?php echo $items_available; ?></td>
	 	<td><input type="text" name="quantity" class="form-control"></td>
	 	<td><input type="date" name="expecting_date" class="form-control"></td>
	 	<td><input type="date" name="requested_date"class="form-control"></td><br />
	 </tr>

	</table>
	<br />
	<div id="hi" style="left:20%; position: relative;"><input type="submit" class="btn btn-primary" name="submit" value="Submit"></center>	
</form>

</div>
</body>
</html>