<!DOCTYPE html>
<html>
<head>
	<title>connection</title>
</head>

<?php

error_reporting(0);
@ini_set('display_errors', 0);

$hostname = 'localhost';
$username = 'root';
$password='1234';


$database='SesconInventoryManagement';

$server=mysqli_connect($hostname,$username,$password,$database);


?>

<body>

</body>
</html>
