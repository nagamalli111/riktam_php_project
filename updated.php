<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "mallesh";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: ".mysqli_connect_error());
/* check connection */
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}
$name  = trim($_GET['employee_name']);
$salary = trim($_GET['employee_salary']);
$age = trim($_GET['employee_age']);
$query = "UPDATE employee SET  employee_salary= '$salary', employee_age = '$age' WHERE employee_name = '$name' ";

mysqli_query($conn,$query);

//echo "<script type=\"text/javascript\">location.href = 'index.php';</script>";

?>