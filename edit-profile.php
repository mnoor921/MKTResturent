<?php  include"header.php"  ?>
<?php 
include_once "admin-panel/requires/connect.php";
if (!empty($_POST) && !empty($_POST['pass'])) {
    // echo $_SESSION['user_id'];
    // print_r($_POST); die;

    $user_id = $connect -> real_escape_string($_SESSION['user_id']);
    $query = $connect->prepare("SELECT * FROM user WHERE id = ?");
    $query->bind_param("s", $user_id);
    $query->execute();

// die($query->execute());

    $query_response = $query->get_result();

    $profile = $query_response->fetch_assoc();
    $hash = password_hash($_POST['pass'], 
      PASSWORD_DEFAULT,array('cost'=>'9'));
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $image_loc = $_FILES['image']['tmp_name'];
        $destination = 'img/uploads/'.$image;
        if (move_uploaded_file($image_loc, $destination)) {
        // unlink('img/uploads/'.$profile['img']);
            $query = $connect->prepare("UPDATE user SET name=?,address=?,phone=?,email=?,img=?,password=? where id=?");
            $query->bind_param("sssssss",$_POST['name'],$_POST['address'],$_POST['phone'],$_POST['email'],$image,$hash,$_SESSION['user_id']);
            $query->execute();
        // echo "<script>window.location='profile.php'</script>";   
        }
    } else {
        $query = $connect->prepare("UPDATE user SET name=?,address=?,phone=?,email=?,password=? where id=?");
        $query->bind_param("ssssss",$_POST['name'],$_POST['address'],$_POST['phone'],$_POST['email'],$hash,$_SESSION['user_id']);
        $query->execute();
        // echo "<script>window
    }

} else if(!empty($_POST)){
    $user_id = $connect -> real_escape_string($_SESSION['user_id']);
    $query = $connect->prepare("SELECT * FROM user WHERE id = ?");
    $query->bind_param("s", $user_id);
    $query->execute();

// die($query->execute());

    $query_response = $query->get_result();

    $profile = $query_response->fetch_assoc();
    if (!empty($_FILES['image']['name'])) {

        $image = $_FILES['image']['name'];
        $image_loc = $_FILES['image']['tmp_name'];
        $destination = 'img/uploads/'.$image;
        if (move_uploaded_file($image_loc, $destination)) {
            // unlink('img/uploads/'.$profile['img']);
            $query = $connect->prepare("UPDATE user SET name=?,address=?,phone=?,email=?,img=? where id=?");
            $query->bind_param("ssssss",$_POST['name'],$_POST['address'],$_POST['phone'],$_POST['email'],$image,$_SESSION['user_id']);
            $query->execute();
            echo "<script>window.location='profile.php'</script>";   
        }
    }else {
        $query = $connect->prepare("UPDATE user SET name=?,address=?,phone=?,email=? where id=?");
        $query->bind_param("sssss",$_POST['name'],$_POST['address'],$_POST['phone'],$_POST['email'],$_SESSION['user_id']);
        $query->execute();
        echo "<script>window.location='profile.php'</script>";   
    }
}


$user_id = $connect -> real_escape_string($_SESSION['user_id']);
$query = $connect->prepare("SELECT * FROM user WHERE id = ?");
$query->bind_param("s", $user_id);
$query->execute();

// die($query->execute());

$query_response = $query->get_result();

$profile = $query_response->fetch_assoc();
?>


<section class="hero">
    <h2>Edit Profile</h2>
</section>




<div class="container">

    <div class="row">
    <div class="col-md-2"></div>

    <div class="col-md-8 col-12">
    <div class="contact-us-form ">
        <div class="form-style p-3">
            <h1 class="mb-3">Edit Profile <i class="fa fa-pencil ml-3"></i></h1>
            <form action="" method="post" enctype="multipart/form-data">
                
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$profile['name']?>" placeholder="Name" name="name">
                        </div>
                    
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputPassword1" value="<?=$profile['address']?>" placeholder="Address" name="address">
                </div>
                
                        <div class="form-group">
                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$profile['phone']?>" placeholder="Phone" name="phone">
                        </div>
                    
                <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$profile['email']?>" placeholder="Enter E-mail" name="email">
                </div>
                <img src="img\uploads\<?php echo $profile['img'];?>" style="width:200px; height:200px;"><br><br>
                <input type="file" name="image"><br><br>
                <input type="password" name="pass" autocomplete="new-password" placeholder="New Password" class="form-control">
                <button type="submit" class="btn btn-1 my-5">Update Details & Go Next</button>
            </form>
        </div>

    </div>
</div>


    <div class="col-md-2"></div>
    </div>
</div>


<?php  include"footer.php"  ?>

