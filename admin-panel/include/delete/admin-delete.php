<?php 
$id= $_GET['id'];
include '../../requires/connect.php';
$sql = "DELETE FROM admin WHERE id = '{$id}'";
$result = mysqli_query($connect , $sql) or die("function not run");

header("Location:http://localhost/MKT%20Resturent/admin-panel/admin.php");


mysqli_close($conn);

?>