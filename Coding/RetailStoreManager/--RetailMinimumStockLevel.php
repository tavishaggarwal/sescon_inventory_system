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

$query_two = "SELECT items_available FROM `retail_store` WHERE `item_code` = '$item_code'";

 if($run_two=mysqli_query($server,$query_two)){
 	$query_rows_two=mysqli_num_rows($run_two);

 	while($row_two=mysqli_fetch_assoc($run_two)){
 	$items_available = $row_two['items_available'];
 		
 	}
 }

if(isset($_POST['submit'])){
          $submit = $_POST['submit'];
          $checkbox = $_POST['checkbox'];
        }

if($submit){
	if(!empty($checkbox)){
       }else{
       	echo "Please check mark the check box before Submit";
       }
       }
?>


<html>
<body>
<div class="display-tables">
<form action="RetailPurchaseOrder.php" method="POST">

<table>
<tr>
		  <th width='130'>ITEM SELECT</th>
		  <th width='130'>ITEM CODE</th>
          <th width='150'>ITEM DESCRIPTION</th>
          <th width='230'>ITEMS AVAILABLE IN STOCK</th>
 </tr>

 <tr>
 	<td  width='130'><input type ='checkbox' name='checkbox'></td>
 	<td  width='130'><?php echo $item_code; ?></td>
 	<td  width='130'><?php echo $item_desc; ?></td>
 	<td  width='230'><?php echo $items_available; ?></td>
 </tr>

</table>

 <input type="submit" name="submit" class="btn btn-primary" value="Submit">

</form>
</div>
</body>
</html>