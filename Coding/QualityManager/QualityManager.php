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
 
    <div class="jumbotron"><h3><a href="QualityManager.php">QUALITY MANAGER</a></h3></div>

</div>

<div class="left-box">
<ul>
      <li>  <a href="QualityApproveRejectOrder.php"><h3>PO Approval or Rejection or Partially Accepted</h3></a></li>
</ul>
</div>



</body>

</html>