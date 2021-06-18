<?php
include 'requires/connection.php';
include 'requires/header.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login');
}


$query = $conn->prepare("SELECT * FROM users WHERE ID = ?");
$query->bind_param("s", $_SESSION['user_id']);
$query->execute();
$query_response = $query->get_result();
$fetch_user = $query_response->fetch_assoc();
?>


<!-- Hero Section -->
<section class="hero">
    <h2>Customer Profile</h2>
</section>

<!-- profile section -->

<div class="container barber-profile my-5">
    <div class="img text-center" style="margin-top: -6rem;">
        <img src="uploads/<?=$fetch_user['image']?>" class="rounded-circle" alt="" style="width:100px; height: 100px;">
        <h2 style="font-size: 40px;font-weight: 700;" ><?= $fetch_user['firstname'].' '.$fetch_user['lastname']?></h2>
    </div>
    <br>

    <div class="row">
        <div class="col-md-4 col-12">
            <div class="barbar-information p-4">
                    <!-- <div class="skills">
                        <h2>Skills</h2>
                        <ul>
                            <li><i class="fa fa-briefcase mr-2"></i>.</li>
                            <li><i class="fa fa-briefcase mr-2"></i>Lorem ipsum dolor sit amet.</li>
                            <li><i class="fa fa-briefcase mr-2"></i>Lorem ipsum dolor sit amet.</li>
                            <li><i class="fa fa-briefcase mr-2"></i>Lorem ipsum dolor sit amet.</li>
                        </ul>
                    </div> -->
                    <div class="skills">
                        <h2>Personal Info</h2>
                        <!-- <?php
                            if(isset($_SESSION['edit_msg']) && $_SESSION['edit_msg'] != 'Updated Successfully!'){
                                ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $_SESSION['edit_msg'];
                                            unset($_SESSION['edit_msg']);
                                        ?>
                                    </div>
                                <?php
                            }
                            else if(isset($_SESSION['edit_msg'])){
                                ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo $_SESSION['edit_msg']; unset($_SESSION['edit_msg']);?>
                                    </div>
                                <?php
                            }
                            ?> -->

                            <ul>
                                <li><i class="fa fa-phone mr-2"></i><?= $fetch_user['phone']?></li>
                                <li><i class="fa fa-envelope mr-2"></i><?= $fetch_user['email']?></li>
                                <li><i class="fa fa-map-marker-alt mr-2"></i><?= $fetch_user['address']?></li>
                                <!-- <li><i class="fa fa-link mr-2"></i>Lorem ipsum dolor sit amet.</li> -->
                            </ul>
                        </div>
                        <!-- <a href="" class="btn btn-1">Edit <i class="fa fa-edit ml-2"></i></a> -->
                    <!-- <?php
                    if(isset($_SESSION['user_id'])){
                        ?> -->
                        <!-- <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">Edit</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body mx-3"> -->
                                        <!-- <div class="md-form mb-5">
                                          <i class="fas fa-user prefix grey-text"></i>
                                          <label data-error="wrong" data-success="right" for="orangeForm-name">Your name</label>
                                          <input type="text" id="orangeForm-name" class="form-control validate">
                                        </div>
                                        <div class="md-form mb-5">
                                          <i class="fas fa-envelope prefix grey-text"></i>
                                          <label data-error="wrong" data-success="right" for="orangeForm-email">Your email</label>
                                          <input type="email" id="orangeForm-email" class="form-control validate">
                                        </div>

                                        <div class="md-form mb-4">
                                          <i class="fas fa-lock prefix grey-text"></i>
                                          <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
                                          <input type="password" id="orangeForm-pass" class="form-control validate">
                                      </div> -->
                                      <!-- <div class="modal-header">
                                        <img src="uploads/<?=$fetch_user['image']?>" alt="avatar" class="rounded-circle img-responsive" style="width:100px; margin:0 auto;">
                                    </div>
                                    <div class="modal-body  mb-1">
                                        <form action="includes/edit_customer.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="user_id" value="<?=$fetch_user['ID']?>">    
                                        <label>First Name</label>
                                        <input type="text" name="firstname" class="form-control" value="<?=$fetch_user['firstname']?>">

                                        <label>Last Name</label>
                                        <input type="text" name="lastname" class="form-control" value="<?=$fetch_user['lastname']?>">

                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" value="<?=$fetch_user['email']?>">

                                        <label>Phone</label>
                                        <input type="number" name="phone" class="form-control" value="<?=$fetch_user['phone']?>">

                                        <label>Old Password</label>
                                        <input type="password" name="oldpassword" class="form-control">

                                        <label>New Password</label>
                                        <input type="password" name="newpassword" class="form-control">

                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control" value="<?=$fetch_user['address']?>">

                                        <label>City</label>
                                        <input type="text" name="city" class="form-control" value="<?=$fetch_user['city']?>">
                                        <label>Change Image</label>
                                        <input type="file" name="image">
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button class="btn btn-success" type="submit" name="submit">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </form> -->
                    <!--   </div> -->

                   <!--  <div class="text-center">
                      <a href="" class="btn btn-1 mb-4" data-toggle="modal" data-target="#modalRegisterForm">Edit <i class="fa fa-edit ml-2"></i> </a>
                  </div> -->
                <!--   <?php
              }
              ?> -->
          </div>
      </div>

      <div class="col-md-8 col-12">
        <div class="barbar-information p-4">
            <h2>Dashboard</h2>
            <ul class="nav nav-tabs w-100" id="myTab" role="tablist" style="background: #222222;color: #A57F3E;">
                <!-- <li class="nav-item ">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="home" aria-selected="true">Dashboard</a>
              </li> -->
              <!-- <li class="nav-item ">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#balance" role="tab" aria-controls="contact" aria-selected="false">Balance</a>
            </li> -->
            <li class="nav-item ">
              <a class="nav-link " id="home-tab" data-toggle="tab" href="#order" role="tab" aria-controls="home" aria-selected="true">Orders</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#history" role="tab" aria-controls="profile" aria-selected="false">Histroy</a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="contact" aria-selected="false">Profile</a>
          </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <!-- <div class="tab-pane fade show active p-2" id="dashboard" role="tabpanel" aria-labelledby="home-tab">
            <div class="dashboard">
                <div class="dashboard-state m-2 d-flex">
                    <img src="img/profits.png" width="50px" class="mr-3" alt="">
                    <h2>Analysis</h2>
                </div>
                <br>
                <canvas id="myChart"></canvas>

            </div>
        </div> -->

        <!-- order  -->

        <div class="tab-pane fade show active p-2" id="order" role="tabpanel" aria-labelledby="home-tab">
            <div class="order">
                <table class="table table-hover table-responsive">
                    <thead>
                        <tr class="">
                            <th>Order ID</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>ZipCode</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $status = 0;
                           $order_query = $conn->prepare("SELECT * FROM orders WHERE user_id = ? AND status = ?");
                            $order_query->bind_param("ss", $_SESSION['user_id'], $status);
                            $order_query->execute();
                            $order_query_response = $order_query->get_result();
                            while($fetch_orders = $order_query_response->fetch_assoc()){
                                // $q = $conn->prepare("SELECT * FROM services WHERE service_id = ?");
                                // $q->bind_param("s", $fetch_orders['service_id']);
                                // $q->execute();
                                // $q_response = $q->get_result();
                                // $service_name = $q_response->fetch_assoc();
                                ?>
                                    <tr>
                                        <td><?= $fetch_orders['ID']?></td>
                                       <!--  <td><?= $service_name['name']?></td> -->
                                        <td><?= $fetch_orders['address']?></td>
                                        <td><?= $fetch_orders['city']?></td>
                                        <td><?= $fetch_orders['country']?></td>
                                        <td><?= $fetch_orders['zipcode']?></td>
                                        <td><?= $fetch_orders['order_date']?></td>
                                        <!-- <td>
                                            <a href="" class="badge bg-success text-white">Accept</a>
                                            <a href="" class="badge bg-danger text-white">Cancel</a>
                                        </td> -->
                                    </tr>
                                <?php
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
        
        


        <!-- history -->

        <div class="tab-pane fade p-2" id="history" role="tabpanel" aria-labelledby="profile-tab">
            <div class="order">
                <table class="table table-hover table-responsive">
                    <thead>
                        <tr class="">
                            <th>Order ID</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>ZipCode</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $status = 0;
                           $order_query2 = $conn->prepare("SELECT * FROM orders WHERE user_id = ? AND status = ?");
                            $order_query2->bind_param("ss", $_SESSION['user_id'], $status);
                            $order_query2->execute();
                            $order_query_response2 = $order_query2->get_result();
                            while($fetch_orders2 = $order_query_response2->fetch_assoc()){
                                // $q2 = $conn->prepare("SELECT * FROM services WHERE service_id = ?");
                                // $q2->bind_param("s", $fetch_orders2['service_id']);
                                // $q2->execute();
                                // $q_response2 = $q2->get_result();
                                // $service_name2 = $q_response2->fetch_assoc();
                                ?>
                        <tr>
                            <td><?= $fetch_orders2['ID']?></td>
                            <!-- <td><?= $service_name2['name']?></td> -->
                            <td><?= $fetch_orders2['address']?></td>
                            <td><?= $fetch_orders2['city']?></td>
                            <td><?= $fetch_orders2['country']?></td>
                            <td><?= $fetch_orders2['zipcode']?></td>
                            <td><?= $fetch_orders2['order_date']?></td>
                            <td>
                                <a href="" class="badge bg-success text-white">Success</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- balance -->

       <!--  <div class="tab-pane fade p-2" id="balance" role="tabpanel" aria-labelledby="contact-tab">
            <div class="balance-history mt-5">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="wallet text-center d-flex">
                            <div class="img mx-3">
                                <img src="img/wallet.png" class="mt-2" width="50px" alt="">
                            </div>
                            <div class="text">
                                <h2>Balance</h2>
                                <h4>345$</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="wallet text-center d-flex">
                            <div class="img mx-3">
                                <img src="img/payment.png" class="mt-2" width="50px" alt="">
                            </div>
                            <div class="text">
                                <h2>Pending</h2>
                                <h4>345$</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="wallet text-center d-flex">
                            <div class="img mx-3">
                                <img src="img/salary.png" class="mt-2" width="50px" alt="">
                            </div>
                            <div class="text">
                                <h2>Earned</h2>
                                <h4>345$</h4>
                            </div>
                        </div>
                    </div>

                </div>
                <br>
                <a href="" class="btn btn-1">Withdraw $</a>
            </div>
        </div> -->

        <!-- profile -->

        <div class="tab-pane fade p-2" id="profile" role="tabpanel" aria-labelledby="contact-tab">

            <div class="profile-form p-3">
                <h2>Update Profile</h2>
                
                <!-- <form>
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                      <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Phone Number">
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Address">
                  </div>
                  <div class="form-group">
                    <label for="">Profile Picture</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" placeholder="Address">
                </div>

                <button type="submit" class="btn btn-1">Update</button>
            </form> -->
            <form action="includes/edit_customer.php" method="post" enctype="multipart/form-data">
                <?php
                if(isset($_SESSION['failure']) && !empty($_SESSION['failure'])){
                    
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['failure'];
                        unset($_SESSION['failure']);
                        ?>
                    </div>
                    <?php
                }
                else if(isset($_SESSION['success'])){
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_SESSION['success']; unset($_SESSION['success']);?>
                    </div>
                    <?php
                }
                ?>
                <input type="hidden" name="user_id" value="<?=$fetch_user['ID']?>">    
                <label>First Name</label>
                <input type="text" name="firstname" class="form-control" value="<?=$fetch_user['firstname']?>">

                <label>Last Name</label>
                <input type="text" name="lastname" class="form-control" value="<?=$fetch_user['lastname']?>">

                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?=$fetch_user['email']?>">

                <label>Phone</label>
                <input type="number" name="phone" class="form-control" value="<?=$fetch_user['phone']?>">

                <label>Old Password</label>
                <input type="password" name="oldpassword" class="form-control">

                <label>New Password</label>
                <input type="password" name="newpassword" class="form-control">

                <label>Address</label>
                <input type="text" name="address" class="form-control" value="<?=$fetch_user['address']?>">

                <label>City</label>
                <input type="text" name="city" class="form-control" value="<?=$fetch_user['city']?>"><br>
                <label>Change Image</label>
                <input type="file" name="image">
                <button class="btn btn-success" type="submit" name="submit">Save Changes</button>
            </form> 
        </div>

    </div>
</div>
</div>
</div>



</div>
</div>

<?php
include 'requires/footer.php';
?>




