<?php 
    
session_start();
extract($_POST);
extract($_GET);
if(isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id']) && is_numeric($_SESSION['admin_id']) && isset($request) && !empty($request)){

    include_once "../requires/connect.php";
    $admin_id = $connect -> real_escape_string($_SESSION['admin_id']);
    $request_value = $connect -> real_escape_string($request);
    $query = $connect->prepare("SELECT * FROM admin WHERE id = ?");
    $query->bind_param("s", $admin_id);
    $query->execute();
    $query_response = $query->get_result();
    if($query_response->num_rows > 0){

        if($request_value == "blog"){
            
            if(isset($submit) && isset($name) && isset($heading) && isset($short_description) && isset($long_description)){
            
                if(!empty($name) && !empty($heading) && !empty($short_description) && !empty($long_description)){

                    $name_value = $connect -> real_escape_string($name);
                    $heading_value = $connect -> real_escape_string($heading);
                    $short_description_value = $connect -> real_escape_string($short_description);
                    $long_description_value = $connect -> real_escape_string($long_description);

                    $target = "../../img/";
                    $filename = $connect -> real_escape_string(pathinfo($_FILES["image"]["name"], PATHINFO_FILENAME));
                    $filesize = $connect -> real_escape_string($_FILES["image"]["size"]);
                    $ImageName = $connect -> real_escape_string($_FILES["image"]["name"]);
                    $ImageNameTemp = $connect -> real_escape_string($_FILES["image"]["tmp_name"]);
                    $filetype = $connect -> real_escape_string(strtolower(pathinfo($ImageName, PATHINFO_EXTENSION)));
                    $image_path_text = $filename.microtime().time().".".$filetype;
                    $image_path = str_ireplace(" ", "", $image_path_text);
                    $image_url = $target.$image_path;

                    $check_image = getimagesize($_FILES["image"]["tmp_name"]);
                    if($check_image !== false){

                        if($filesize < 5000000){

                            if($filetype == 'jpg' || $filetype == 'png'  || $filetype == 'jpeg' || $filesize == 'gif'){
    
                                if (move_uploaded_file($_FILES["image"]["tmp_name"], $image_url )) {
                        
                                    // Creating a slug
                                    $slug_value = strtolower($name_value);
                                    $slug = str_replace(" ", "_", $slug_value);


                                    $date = date("d M Y");
                                    $query = $connect->prepare("INSERT INTO `blog` (`id`, `writer_name`, `slug`, `heading`, `short_description`, `long_description`, `date_issue`, `img`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?);");
                                    $query->bind_param("sssssss", $name_value, $slug, $heading_value, $short_description_value, $long_description_value, date("d M Y"), $image_path);
                                    if($query->execute()){          
            
                                        $_SESSION['add_success'] = "Blog has been added successfuly!";
                                        header("Location: ../blog");
                                        
                                    } else {
            
                                        $_SESSION['add_error'] = "Unable to add the blog!";
                                        header("Location: ../blog");
                
                                    }     
            
                                } else {
            
                                    $_SESSION['add_error'] = "Unable to add the blog! 1";
                                    header("Location: ../blog");
            
                                }   
    
                            } else {
    
                                $_SESSION['add_error'] = "Only JPG, PNG, JPEG and GIF files alllowed!";
                                header("Location: ../blog");
    
                            }
    
                        } else {
    
                            $_SESSION['add_error'] = "File is larger then 5MB!";
                            header("Location: ../blog");
    
                        }

                    } else {

                        $_SESSION['add_error'] = "Sorry, unable to add blog, thumbnail isn't an image!";
                        header("Location: ../blog");

                    }


                } else {

                    $_SESSION['add_error'] = "Sorry, fields are empty.";
                    header("Location: ../blog");

                }

                $query_fetch = $query_response->fetch_assoc();
                $order_id_value = $connect -> real_escape_string($order_id);
                $category_query = $connect->prepare("SELECT * FROM orders WHERE order_id = ?");
                $category_query->bind_param("s", $order_id_value);
                $category_query->execute();
                $category_query_response = $category_query->get_result();
                
                if($category_query_response->num_rows > 0 && $category_query_response->num_rows !== 0){

                    $category_query_fetch = $category_query_response->fetch_assoc();

                } else {

                    header("Location: ../orders");

                }
                
            } else {

                $_SESSION['add_error'] = "Sorry, fields are missing.";
                header("Location: ../blog");

            }

        } else if($request_value == "admin"){

            if (isset($name) && isset($email) &&  isset ($password)){
                if (!empty($name) && !empty($email) && !empty($password)){

                    $name_value = $connect -> real_escape_string($name); 
                    $email_value = $connect -> real_escape_string($email); 
                    $hash = password_hash($password,PASSWORD_DEFAULT, array('cost' => 9 ));

                    $query = $connect->prepare("INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES (NULL, ?, ?, ?)");
                    $query->bind_param("sss",$name_value,$email_value,$hash);


                    if($query->execute()){
                        $_SESSION['add_success'] = "Admin has been added successfuly";
                        header("location:../admin.php");
                    }

                }
            }

        } else if($request_value == "category"){

            
            
            if(isset($submit) && isset($name) && isset($description)){
            
                if(!empty($name) && !empty($description)){

                    $name_value = $connect -> real_escape_string($name);
                    $description_value = $connect -> real_escape_string($description);

                    $target = "../../img/";
                    $filename = $connect -> real_escape_string(pathinfo($_FILES["image"]["name"], PATHINFO_FILENAME));
                    $filesize = $connect -> real_escape_string($_FILES["image"]["size"]);
                    $ImageName = $connect -> real_escape_string($_FILES["image"]["name"]);
                    $ImageNameTemp = $connect -> real_escape_string($_FILES["image"]["tmp_name"]);
                    $filetype = $connect -> real_escape_string(strtolower(pathinfo($ImageName, PATHINFO_EXTENSION)));
                    $image_path_text = $filename.microtime().time().".".$filetype;
                    $image_path = str_ireplace(" ", "", $image_path_text);
                    $image_url = $target.$image_path;

                    $check_image = getimagesize($_FILES["image"]["tmp_name"]);
                    if($check_image !== false){

                        if($filesize < 5000000){

                            if($filetype == 'jpg' || $filetype == 'png'  || $filetype == 'jpeg' || $filesize == 'gif'){
    
                                if (move_uploaded_file($_FILES["image"]["tmp_name"], $image_url )) {
                        
                                    // Creating a slug
                                    // $slug_value = strtolower($name_value);
                                    // $slug = str_replace(" ", "_", $slug_value);

                                    $date = date("d M Y");
                                    $query = $connect->prepare("INSERT INTO `category` (`id`, `name`, `img`, `description`) VALUES (NULL, ?, ?, ?);");
                                    $query->bind_param("sss", $name_value, $image_path, $description_value);
                                    if($query->execute()){          
            
                                        $_SESSION['add_success'] = "Category has been added successfuly!";
                                        header("Location: ../category");
                                        
                                    } else {
            
                                        $_SESSION['add_error'] = "Unable to add the category!";
                                        header("Location: ../category");
                
                                    }     
            
                                } else {
            
                                    $_SESSION['add_error'] = "Unable to add the category!";
                                    header("Location: ../category");
            
                                }   
    
                            } else {
    
                                $_SESSION['add_error'] = "Only JPG, PNG, JPEG and GIF files alllowed!";
                                header("Location: ../category");
    
                            }
    
                        } else {
    
                            $_SESSION['add_error'] = "File is larger then 5MB!";
                            header("Location: ../category");

                        }

                    } else {

                        $_SESSION['add_error'] = "Sorry, unable to add blog, thumbnail isn't an image!";
                        header("Location: ../category");

                    }


                } else {

                    $_SESSION['add_error'] = "Sorry, fields are empty.";
                    header("Location: ../category");

                }

            } else {

                $_SESSION['add_error'] = "Sorry, fields are missing.";
                header("Location: ../category");

            }

        
        
        
        } else if($request_value == "product"){

            
            
            if(isset($submit) && isset($name) && isset($category_id) && isset($name) && isset($description) && isset($price) && isset($shipping)){
            
                if(!empty($name) && !empty($category_id) && !empty($name) && !empty($description) && !empty($price) && !empty($shipping)){

                    $name_value = $connect -> real_escape_string($name);
                    $description_value = $connect -> real_escape_string($description);
                    $price_value = $connect -> real_escape_string($price);
                    $category_id_value = $connect -> real_escape_string($category_id);
                    $shipping_value = $connect -> real_escape_string($shipping);

                    $target = "../../img/";
                    $filename = $connect -> real_escape_string(pathinfo($_FILES["image"]["name"], PATHINFO_FILENAME));
                    $filesize = $connect -> real_escape_string($_FILES["image"]["size"]);
                    $ImageName = $connect -> real_escape_string($_FILES["image"]["name"]);
                    $ImageNameTemp = $connect -> real_escape_string($_FILES["image"]["tmp_name"]);
                    $filetype = $connect -> real_escape_string(strtolower(pathinfo($ImageName, PATHINFO_EXTENSION)));
                    $image_path_text = $filename.microtime().time().".".$filetype;
                    $image_path = str_ireplace(" ", "", $image_path_text);
                    $image_url = $target.$image_path;


                    $check_image = getimagesize($_FILES["image"]["tmp_name"]);
                    if($check_image !== false){

                        if($filesize < 5000000){

                            if($filetype == 'jpg' || $filetype == 'png'  || $filetype == 'jpeg' || $filesize == 'gif'){
    
                                if (move_uploaded_file($_FILES["image"]["tmp_name"], $image_url )) {
                        
                                    // Creating a slug
                                    // $slug_value = strtolower($name_value);
                                    // $slug = str_replace(" ", "_", $slug_value);

                                    $tax = null;
                                    $date = date("d M Y");
                                    $query = $connect->prepare("INSERT INTO `product` (`id`, `cid`, `name`, `description`, `price`, `shipping_price`, `img`) VALUES (NULL, ?, ?, ?, ?, ?, ?);");
                                    $query->bind_param("ssssss", $category_id_value, $name_value, $description_value, $price_value, $shipping_value, $image_path);
                                    if($query->execute()){          
            
                                        $_SESSION['add_success'] = "Product has been added successfuly!";
                                        header("Location: ../product");
                                        
                                    } else {
            
                                        $_SESSION['add_error'] = "Unable to add the product! 1";
                                        header("Location: ../product");
                
                                    }     
            
                                } else {
            
                                    $_SESSION['add_error'] = "Unable to add the product!";
                                    header("Location: ../product");
            
                                }   
    
                            } else {
    
                                $_SESSION['add_error'] = "Only JPG, PNG, JPEG and GIF files alllowed!";
                                header("Location: ../product");
    
                            }
    
                        } else {
    
                            $_SESSION['add_error'] = "File is larger then 5MB!";
                            header("Location: ../product");

                        }

                    } else {

                        $_SESSION['add_error'] = "Sorry, unable to add blog, thumbnail isn't an image!";
                        header("Location: ../product");

                    }


                } else {

                    $_SESSION['add_error'] = "Sorry, fields are empty.";
                    header("Location: ../product");

                }

            } else {

                $_SESSION['add_error'] = "Sorry, fields are missing.";
                header("Location: ../product");

            }

         


        } else if($request_value == "team"){
            
            if(isset($submit) && isset($name) && isset($desigenation) && isset($description) ){
            
                if(!empty($name) && !empty($desigenation) && !empty($description) ){

                    

                    $name_value = $connect -> real_escape_string($name);
                    $desigenation_value = $connect -> real_escape_string($desigenation);
                    $description_value = $connect -> real_escape_string($description);
                
                    $target = "../../img/";
                    $filename = $connect -> real_escape_string(pathinfo($_FILES["image"]["name"], PATHINFO_FILENAME));
                    $filesize = $connect -> real_escape_string($_FILES["image"]["size"]);
                    $ImageName = $connect -> real_escape_string($_FILES["image"]["name"]);
                    $ImageNameTemp = $connect -> real_escape_string($_FILES["image"]["tmp_name"]);
                    $filetype = $connect -> real_escape_string(strtolower(pathinfo($ImageName, PATHINFO_EXTENSION)));
                    $image_path_text = $filename.microtime().time().".".$filetype;
                    $image_path = str_ireplace(" ", "", $image_path_text);
                    $image_url = $target.$image_path;

                    $check_image = getimagesize($_FILES["image"]["tmp_name"]);
                    if($check_image !== false){

                        if($filesize < 5000000){

                            if($filetype == 'jpg' || $filetype == 'png'  || $filetype == 'jpeg' || $filesize == 'gif'){

                                if (move_uploaded_file($_FILES["image"]["tmp_name"], $image_url )) {
                        
                                    // Creating a slug
                                    // $slug_value = strtolower($name_value);
                                    // $slug = str_replace(" ", "_", $slug_value);

                                    $query = $connect->prepare("INSERT INTO `team` (`id`, `name`, `designation`, `description`, `img`) VALUES (NULL, ?, ?, ?, ?);");
                                    $query->bind_param("ssss", $name_value,$desigenation_value, $description_value,  $image_path);
                                    if($query->execute()){          
                                        
                                        $_SESSION['add_success'] = "Employe has been added successfuly!";
                                        header("Location: ../team");
                                        
                                    } else {
            
                                        $_SESSION['add_error'] = "Unable to add the Employee! 1";
                                        header("Location: ../team");
                
                                    }     
            
                                } else {
            
                                    $_SESSION['add_error'] = "Unable to add the Employee!";
                                    header("Location: ../team");
            
                                }   

                            } else {

                                $_SESSION['add_error'] = "Only JPG, PNG, JPEG and GIF files alllowed!";
                                header("Location: ../team");

                            }

                        } else {

                            $_SESSION['add_error'] = "File is larger then 5MB!";
                            header("Location: ../product");

                        }

                    } else {

                        $_SESSION['add_error'] = "Sorry, unable to add blog, thumbnail isn't an image!";
                        header("Location: ../team");

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

