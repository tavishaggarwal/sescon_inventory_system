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
include '../admin/session.php';
include '../admin/connection.php';

 if(isset($_SESSION['employee_id'])&& !empty($_SESSION['employee_id'])){
     $name1=getdetail('employee_name');
     $name_upper = strtoupper($name1);

    echo "<div class ='logout'><font size = '5' style='position: absolute; right: 17px;' >WELCOME 
    $name_upper<br><li><h3><a href='../admin/logout.php'>Logout</a></li></font></div>"; 
  } else{
   header('location:../login.php');
   }

?>

<body>
<div class="container">
 
    <div class="jumbotron"><h3><a href="CentralStoreManager.php">CENTRAL STORE MANAGER</a></h3></div>

</div>

<div class="left-box">
<ul>
      <li>  <a href="ReleaseProductRetailStore.php"><h3>Release Product</h3></a></li>
     <li> <a href="OrderProductSupplier.php " ><h3>Order Product</h3></a></li>
     <li><a href="MinReport.php"><h3> MIN Report</h3></a></li>
     <li><a href="SinRequest.php"><h3> SIN Request</h3></a></li>
     <li><a href="SinReport.php"><h3> SIN Report</h3></a></li>
      </ul>
</div>



</body>

</html>