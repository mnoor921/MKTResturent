<?php 

session_start();
extract($_POST);
extract($_GET);
if(isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id']) && is_numeric($_SESSION['admin_id'])){

  include_once "requires/connect.php";
  $admin_id = $connect -> real_escape_string($_SESSION['admin_id']);
  $query = $connect->prepare("SELECT * FROM admin WHERE id = ?");
  $query->bind_param("s", $admin_id);
  $query->execute();
  $query_response = $query->get_result();
  if($query_response->num_rows > 0){

    $query_fetch = $query_response->fetch_assoc();

  } else {

    unset($_SESSION['admin_id']);
    header("Location: login");

  }

} else {

  header("Location: login");

}

?>



<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>MKT</title>

	<!-- Site favicon -->
	<!-- <link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png"> -->

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

	
</head>
<body>
	
	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			
		</div>
		<div class="header-right ">
			
			<div class="user-info-dropdown mr-5 mt-3">
				<a href="logout.php"><i class="fa fa-power-off"></i></a>
			</div>
		</div>
	</div>


	<!-- left navbar -->


	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.html">
				<img src="src/images/lgoo-new.png" width="50px" alt="" class="dark-logo">
				<img src="src/images/lgoo-new.png" width="120px" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="index.php" class="dropdown-toggle">
							<span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="admin.php" class="dropdown-toggle">
							<span class="micon dw dw-user-1"></span><span class="mtext">Admins</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="order.php" class="dropdown-toggle">
							<span class="micon dw dw-user-1"></span><span class="mtext">Orders</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="category.php" class="dropdown-toggle">
							<span class="micon dw dw-house-1"></span><span class="mtext">Category</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="product.php" class="dropdown-toggle">
							<span class="micon dw dw-house-1"></span><span class="mtext">Products</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="newsletter.php" class="dropdown-toggle">
							<span class="micon dw dw-house-1"></span><span class="mtext">Newsletter</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="team.php" class="dropdown-toggle">
							<span class="micon dw dw-house-1"></span><span class="mtext">Our Team</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="contact.php" class="dropdown-toggle">
							<span class="micon dw dw-house-1"></span><span class="mtext">Contact</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="user.php" class="dropdown-toggle">
							<span class="micon dw dw-house-1"></span><span class="mtext">User</span>
						</a>
					</li>
					<!-- <li class="dropdown">
						<a href="cart.php" class="dropdown-toggle">
							<span class="micon dw dw-house-1"></span><span class="mtext">Cart</span>
						</a>
					</li> -->
					<li class="dropdown">
						<a href="blog.php" class="dropdown-toggle">
							<span class="micon dw dw-house-1"></span><span class="mtext">Blog</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="privacy.php" class="dropdown-toggle">
							<span class="micon dw dw-house-1"></span><span class="mtext">Privacy</span>
						</a>
					</li>
					<li class="">
						<a href="terms.php" class="dropdown-toggle">
							<span class="micon dw dw-house-1"></span><span class="mtext">Terms & Condition</span>
						</a>
					</li>
					<li class="logout.php">
						<a href="logout.php" class="dropdown-toggle">
							<span class="micon dw dw-house-1"></span><span class="mtext">Log Out</span>
						</a>
					</li>
					
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>


