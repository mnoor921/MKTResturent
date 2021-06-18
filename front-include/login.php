<?php 

session_start();
extract($_POST);
if(isset($submit) && isset($email) && isset($password)){
    // $_SESSION['user'] = $email;

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){

        include_once "../admin-panel/requires/connect.php";
        $email_value = $connect -> real_escape_string($email);
        $query = $connect->prepare("SELECT * FROM user WHERE email = ?");
        $query->bind_param("s", $email_value);
        $query->execute();

//         var_dump($query->execute());
// die();



        $query_response = $query->get_result();
        if($query_response->num_rows > 0){
    
            
            $query_fetch = $query_response->fetch_assoc();  
            if(password_verify($password, $query_fetch['password'])){
                
                $fetchID = $query_fetch['id'];
                if(is_numeric($fetchID)){
                    $_SESSION['user_id'] = $fetchID;
                    header("Location: ../profile.php");
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