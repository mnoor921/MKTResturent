<?php
session_start();
include ('../admin-panel/requires/connect.php');
if (isset($_POST['signup'])) {

	if (!empty($_POST)) {

		extract($_POST);
		

		
		 $image_location = $_FILES['img']['tmp_name'];
		 $image_name = $_FILES['img']['name'];
		//  die($image_name);

		if (!empty($firstname) && !empty($image_name)  && !empty($phone) && !empty($email) && !empty($password) && !empty($address)   && !empty($c_password)) {
			
			// if(filter_var($email,FILTER_VALIDATE_EMAIL)){

			// $valid_email = $email;
			// $firstname_lowercase = strtolower($firstname);
			
			// $slug_value_text = $firstname_lowercase." ".$lastname_lowercase;
			// $new_slug = str_ireplace(" ", "_", $slug_value_text);
			$hash = password_hash($password, PASSWORD_DEFAULT,array('cost'=>9));
			if(move_uploaded_file($image_location, '../img/uploads/'.$image_name)){
				$query = $connect->prepare("INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone`, `address`,`img`) VALUES (NULL, ?, ?, ?, ?, ?, ?);");
				$query->bind_param("ssssss",$firstname,$email,$hash,$phone,$address,$image_name);
				$query->execute();

				// die($query->execute());
				
					if($query){

						header('Location: ../login.php');
					}
					else{
						$_SESSION['msg'] = 'something went wrong';
						header('Location: sign-up');

					}
			}
			
		}
		else{
			$_SESSION['msg'] = 'email is not valid';
			header('Location: sign-up');
			// echo "email is not valid";
		}
		}
		else{
			$_SESSION['msg'] = 'some fields are missing';
			header('Location: sign-up');
		}

	}


?>