<?php 
    
session_start();
extract($_POST);

// var_dump($_POST);
// die();

// extract($_GET);
if(isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id']) && is_numeric($_SESSION['admin_id']) && isset($request) && !empty($request) && isset($id) && !empty($id) && is_numeric($id)){

    include_once "../requires/connect.php";
    $admin_id = $connect -> real_escape_string($_SESSION['admin_id']);
    $request_value = $connect -> real_escape_string($request);
    $id_value = $connect -> real_escape_string($id);

    var_dump($id_value);
    // die();

    $query = $connect->prepare("SELECT * FROM admin WHERE id = ?");
    $query->bind_param("s", $admin_id);
    $query->execute();
// var_dump($query->execute());
// die();


    $query_response = $query->get_result();
    if($query_response->num_rows > 0){

        if($request_value == "admin"){
            
            if(isset($submit) && isset($name) && isset($email) ){
            
                if(!empty($name) && !empty($email)  ){

                    

                    $name_value = $connect -> real_escape_string($name);
                    $email_value = $connect -> real_escape_string($email);
                    
                    $query = $connect->prepare("UPDATE admin set name=?, email=? where id=? ");

                    // var_dump($query);
                    // die();


                    $query->bind_param("sss",$name_value,$email,$id_value);
                    // var_dump($query->bind_param("sss",$name_value,$email,$$id_value));
                    // die();


					if($query->execute())
                    {
                        // var_dump('T');
                        // die();

                        $_SESSION['add_success'] = "Admin Has been Updated Sucessfully";
                        header("Location: ../admin");
                    }
                    else{
                        $_SESSION['add_error'] = "Sorry, Unable to update.";
                        header("Location: ../admin");
                    }
                    
					

                } else {

                    $_SESSION['add_error'] = "Sorry, fields are empty.";
                    header("Location: ../team");

                }

            } else {

                $_SESSION['add_error'] = "Sorry, fields are missing.";
                header("Location: ../team");

            }

        } 



    } else {

        unset($_SESSION['admin_id']);
        header("Location: ../login");

    }

} else {

    header("Location: ../login");

}

