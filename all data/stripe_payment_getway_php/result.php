<?php
session_start();
include 'connection.php';
if (isset($_GET['order_id'])) {
$user_id = $_SESSION['user_id'];
$order_id = $_GET['order_id'];
$user_id = $_GET['user_id'];
$address = $_GET['address'];
$city = $_GET['city'];
$country = $_GET['country'];
$zipcode = $_GET['zipcode'];
$status = $_GET['status'];
$order_date = $_GET['order_date'];

 $query = mysqli_query($conn,"INSERT INTO `orders` (`order_id`, `user_id`, `address`, `city`, `country`, `zipcode`, `status`, `order_date`) VALUES ('$order_id', '$user_id', '$address', '$city', '$country', '$zipcode', '$status', '$order_date')");
				 if($query){
				 	// echo "inserted...";
				 }
				 else{
				 	echo "error...". mysqli_error($conn);

				 }
	$fetch_cart_items = mysqli_query($conn,"SELECT * FROM cart WHERE user_id = '".$user_id."'");
	while($items = mysqli_fetch_assoc($fetch_cart_items)){
		 $service_id = $items['service_id'];
		$order_detail_query = mysqli_query($conn,"INSERT INTO `order_details` (`order_id`, `service_id`) VALUES ('$order_id', '$service_id')");


		}
		if($order_detail_query){
			$_SESSION['order_id'] = $order_id;
			$delete_cart_query = mysqli_query($conn,"truncate table cart");
			header('Location: /thankyou');
		}					 
}

?>