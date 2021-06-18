<?php  include"header.php"  ?>



<?php 

// session_start();
extract($_POST);
extract($_GET);
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) && is_numeric($_SESSION['user_id'])){

  include_once "admin-panel/requires/connect.php";
  $user_id = $connect -> real_escape_string($_SESSION['user_id']);
  $query = $connect->prepare("SELECT * FROM user WHERE id = ?");
  $query->bind_param("s", $user_id);
  $query->execute();

// die($query->execute());

  $query_response = $query->get_result();
  if($query_response->num_rows > 0){

    $query_fetch = $query_response->fetch_assoc();
// var_dump($query_fetch);


  }
  else {

    unset($_SESSION['user_id']);
    header("Location: login");

  }

} else {

  header("Location: login");

}

?>



<!-- Hwero section Section -->
<div class="hero">
  <h2>Login / Sign Up</h2>
</div>

<!-- about us section -->
<div class="container profile my-5">
  <div class="profile-img text-center">
    <img src="img\uploads\<?php echo $query_fetch['img'];?>" alt="">
  </div>
  <div class="row mt-5">
    <div class="col-md-4 col-12">
      <div class="profile-details">
        <h2><?php echo $query_fetch['name']; ?></h2>
        <!-- <h2>@d-cusa</h2> -->
        <div class="profile-inner-details">
          <!-- <p><i class="fa fa-briefcase mr-3"></i> Wordpress D-jango Mango DB</p> -->
          <p><i class="fa fa-phone mr-3"></i><?php echo $query_fetch['phone']; ?></p>
          <p><i class="fa fa-envelope mr-3"></i><?php echo $query_fetch['email']; ?></p>
          <p><i class="fa fa-map-marker-alt mr-3"></i><?php echo $query_fetch['address']; ?></p>
        </div>
        <a href="edit-profile.php" class="btn btn-1">Edit <i class="fa fa-edit ml-3"></i></a>
      </div>
    </div>
    <div class="col-md-8 col-12">
      <div class="profile-tab">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#history" role="tab" aria-controls="contact" aria-selected="false">History</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active p-4" id="home" role="tabpanel" aria-labelledby="home-tab">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit est, ea sint iste, commodi quae repellat iure vel excepturi dignissimos veritatis amet totam deserunt reiciendis quaerat aperiam unde, qui voluptate.</p>
          </div>
          <div class="tab-pane fade p-4" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <h2>Msc IT Student</h2>
            <ul>
              <li>Muhammad Noor</li>
              <li>Sher Afghan</li>
              <li>Maria Kanwal</li>
              <li>Jervia </li>
              <li>Kazma </li>
              <li>Tahira Tabusam </li>
            </ul>
          </div>
          <div class="tab-pane fade p-4" id="history" role="tabpanel" aria-labelledby="contact-tab">
            <p>Order History</p>
            <table class="data-table table nowrap">
              <thead>
                <tr>
                  <th>#</th>
                  <th class="table-plus">Order ID</th>
                  <th>Order Amount</th>
                  <th>Order Date</th>
                  <th>First Name</th>
                  <th>User Email</th>
                  <th>Items in order</th>
                  <th class="datatable-nosort">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $isdel = 0;
                $query = $connect->prepare("SELECT * FROM orders where user_id=? order by order_id desc");
                $query->bind_param("s",$_SESSION['user_id']);
                $query->execute();
                $query_response = $query->get_result();
                $count = 0;
                while($query_fetch = $query_response->fetch_assoc()){
                  ?>    
                  <tr>
                    <td><?= ++$count ?></td>
                    <td>
                      <?php print( $query_fetch['order_id'] ) ?>
                    </td>
                    <td><?php print( $query_fetch['order_amount'] ) ?></td>
                    <td><?php print( date("d-m-Y",strtotime($query_fetch['order_date'])) ) ?></td>
                    <td><?php print( $query_fetch['first_name'] ) ?></td>
                    <td><?php print( $query_fetch['email'] ) ?></td>
                    <td></td>
                    <td>
                      <div class="table-actions">
                        <!-- <a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a> -->
                        <a href="javascript:" onclick="delOrder('<?php print( $query_fetch['order_id'] ) ?>')" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
                      </div>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>    
</div>





<?php  include"footer.php"  ?>