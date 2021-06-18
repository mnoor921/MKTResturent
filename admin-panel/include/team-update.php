<?php 
    
session_start();
extract($_POST);


if(isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id']) && is_numeric($_SESSION['admin_id']) && isset($request) && !empty($request) && isset($id) && !empty($id) && is_numeric($id)){

    include_once "../requires/connect.php";
    $admin_id = $connect -> real_escape_string($_SESSION['admin_id']);
    $request_value = $connect -> real_escape_string($request);
    $id_value = $connect -> real_escape_string($id);

    

    $query = $connect->prepare("SELECT * FROM team WHERE id = ?");
    $query->bind_param("s", $id_value);
    $query->execute();


    $query_response = $query->get_result();
    if($query_response->num_rows > 0){

        if($request_value == "team"){
            
            if(isset($submit) && isset($name) && isset($description) ){
            
                if(!empty($name) && !empty($description)  ){

                    

                    $name_value = $connect -> real_escape_string($name);
                    $description_value = $connect -> real_escape_string($description);
                    
                    $query = $connect->prepare("UPDATE team set name=?, description=? where id=? ");

                    

                    $query->bind_param("sss",$name_value,$description_value,$id_value);
                   


					if($query->execute())
                    {
                        

                        $_SESSION['add_success'] = "Admin Has been Updated Sucessfully";
                        header("Location: ../team");
                    }
                    else{
                        $_SESSION['add_error'] = "Sorry, Unable to update.";
                        header("Location: ../category");
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

