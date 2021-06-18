<?php



 $s_name = $_POST['name'];
 $s_phone = $_POST['phone'];
 $s_email = $_POST['email'];
 $s_message = $_POST['message'];


    $conn = mysqli_connect("localhost","root","","mkt") or die("connection Fails");
    
    $sql = "INSERT INTO contact(name,phone,email,message) VALUES ('{$s_name}','{$s_phone}','{$s_email}','{$s_message}')";
   
    $result = mysqli_query($conn , $sql) or die("function not run");


    header("Location:http://localhost/MKT Resturent/index.php");

    mysqli_close($conn);





?>