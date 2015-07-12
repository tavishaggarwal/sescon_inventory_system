<?php
ob_start(); // whats this used for
session_start();

 function getdetail($feild)
 {
   $query = "SELECT `$feild` FROM `login` WHERE `employee_id` = '".$_SESSION['employee_id']."'";
   require 'connection.php';
   if($run=mysqli_query($server,$query)){
     $row=mysqli_fetch_assoc($run);
     $result=$row[$feild];
     return $result;
     }
   }

?>