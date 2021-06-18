<?php 

session_start();
extract($_POST);
if(isset($submit) && isset($email) && isset($password)){

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){

        include_once "../requires/connect.php";
        $email_value = $connect -> real_escape_string($email);
        $query = $connect->prepare("SELECT * FROM admin WHERE email = ?");
        $query->bind_param("s", $email_value);
        $query->execute();
        $query_response = $query->get_result();
        if($query_response->num_rows > 0){
    
            
            $query_fetch = $query_response->fetch_assoc();  
            if(password_verify($password, $query_fetch['password'])){
                
                $fetchID = $query_fetch['id'];
                if(is_numeric($fetchID)){
                    $_SESSION['admin_id'] = $fetchID;
                    header("Location: ../index");
                }
    
            } else {
             
                $_SESSION['loginError'] = "Sorry, your password is incorrect!";
                header("Location: ../login");
    
            }
    
        } else {
    
            
            $_SESSION['loginError'] = "Your email address is incorrect!";
            header("Location: ../login");
    
    
        }

    } else {

        $_SESSION['loginError'] = "Your email address is invalid!";
        header("Location: ../login");

    }



} 