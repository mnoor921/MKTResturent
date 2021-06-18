<?php
session_start();
include_once "admin-panel/requires/connect.php";

if (!empty(@$_SESSION['user_id'])) {
// removing item from cart
if (!empty($_GET['action'])) {
	if ($_GET['action'] == 'remove') {
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
				if($_GET["code"] == $k)
					unset($_SESSION["cart_item"][$k]);				
				if(empty($_SESSION["cart_item"]))
					unset($_SESSION["cart_item"]);
			}
			echo "<script>window.location='cart.php'</script>";
		}
	}
}

// adding item to cart
if (!empty($_GET['action'])) {
	if ($_GET['action'] == 'empty') {
		unset($_SESSION["cart_item"]);
		echo "<script>window.location='cart.php'</script>";
	}
}

// adding item to cart
if(!empty($_POST["quantity"])) {
	$select_query = $connect->prepare("SELECT * FROM product WHERE id = ?");
	$select_query->bind_param("s", $_POST['product_id']);
	$select_query->execute();
	$select_query_response = $select_query->get_result();
	$productByCode = $select_query_response->fetch_assoc();
	$itemArray = array($productByCode["p_code"]=>array('name'=>$productByCode["name"], 'p_code'=>$productByCode["p_code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode["price"], 'image'=>$productByCode["img"]));

	if(!empty($_SESSION["cart_item"])) {
		if(in_array($productByCode["p_code"],array_keys($_SESSION["cart_item"]))) {
			foreach($_SESSION["cart_item"] as $k => $v) {
				if($productByCode["p_code"] == $k) {
					if(empty($_SESSION["cart_item"][$k]["quantity"])) {
						$_SESSION["cart_item"][$k]["quantity"] = 0;
					}
					$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
				}
			}
		} else {
			$_SESSION["cart_item"][$productByCode["p_code"]] = $itemArray[$productByCode["p_code"]];
			// $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
		}
	} else {
		$_SESSION["cart_item"] = $itemArray;

	}
	echo json_encode(array("msg"=>"success"));
}

}
else {
	echo json_encode(array("msg"=>"session"));
}

?>