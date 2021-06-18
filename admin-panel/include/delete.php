<?php 
    
session_start();
extract($_POST);
extract($_GET);

if(isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id']) && is_numeric($_SESSION['admin_id']) && isset($request) && !empty($request)   ){

    include_once "../requires/connect.php";
    $admin_id = $connect -> real_escape_string($_SESSION['admin_id']);
    $request_value = $connect -> real_escape_string($request);
    $id_value = $connect -> real_escape_string($id);
    $query = $connect->prepare("SELECT * FROM admin WHERE id = ?");
    $query->bind_param("s", $admin_id);
    $query->execute();
    $query_response = $query->get_result();
    if($query_response->num_rows > 0){

        if($request_value == "admin"){
            
            if(isset($submit)  ){
            
             
                print("djkadh");
            
                    $query = $connect->prepare("DELETE from admin where id=? ");
                    $query->bind_param("s",$id_value);
					if($query->execute())
                    {
                        $_SESSION['add_success'] = "Admin Has been Updated Sucessfully";
                        header("Location: ../admin");
                    }
                    else{
                        $_SESSION['add_error'] = "Sorry, Unable to update.";
                        header("Location: ../admin");
                    }
                }     
					

                

            

        } 



    } else {

        unset($_SESSION['admin_id']);
        header("Location: ../login");

    }

} else {

    header("Location: ../login");

}

