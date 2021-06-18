<?php
session_start();
include '../requires/connection.php';
if(isset($_POST['submit'])){

	extract($_POST);
	$image_location = $_FILES['image']['tmp_name'];
	$image_name = $_FILES['image']['name'];

	if (isset($_POST['submit'])) {
		// echo $image_location;die;
		if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($phone) && !empty($oldpassword) && !empty($newpassword) && !empty($address) && !empty($city) && !empty($image_name)){
			$query = $conn->prepare("SELECT * FROM users WHERE ID = ?");
			$query->bind_param("s", $user_id);
			$query->execute();
			$query_response = $query->get_result();
			$fetch_user = $query_response->fetch_assoc();
			if (password_verify($oldpassword, $fetch_user['password'])) {
				$firstname_lowercase = strtolower($firstname);
				$lastname_lowercase = strtolower($lastname);
				$slug_value_text = $firstname_lowercase." ".$lastname_lowercase;
				$new_slug = str_ireplace(" ", "_", $slug_value_text);

				$hash = password_hash($newpassword, PASSWORD_DEFAULT,array('cost'=>9));
				if(move_uploaded_file($image_location, '../uploads/'.$image_name)){
					unlink("../uploads/".$fetch_user['image']);
					$update_query = $conn->prepare("UPDATE users set firstname = ?, lastname = ?, email = ?, phone = ?, password = ?, address = ?, city = ?, image = ? WHERE ID = ?");
					$update_query->bind_param("sssssssss", $firstname,$lastname,$email,$phone,$hash,$address,$city,$image_name,$user_id);
					$update_query->execute();
					$_SESSION['success'] = 'Updated Successfully!';
					header('Location: /customer-profile');
				}
				
			}
			else{
				$_SESSION['failure'] = 'Password did not match';
				header('Location: /customer-profile');
			}
			

		}
		else{
			$_SESSION['failure'] = 'Updation failed due to some error';
			header('Location: /customer-profile');
		}
		
	}
	else{
		$_SESSION['failure'] = 'Form is not completely filled';
		header('Location: /customer-profile');
	}
}
?>