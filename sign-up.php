<?php  include"header.php"  ?>



<!-- Hwero section Section -->
<div class="hero">
    <h2>Login / Sign Up</h2>
</div>

<!-- about us section -->
<div class="container my-5">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="contact-us-form log-in-style p-5">
                <h1 class="text-center">Sign Up</h1>
                <div class="form-style ">
                <form class="my-3" action="front-include/signup_submit.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <input type="text" class="form-control" name="firstname" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" name="phone" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone">
                        </div>
                        <div class="form-group">
                          <input type="address" class="form-control" name="address" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                          <input type="file" class="form-control" name="img" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                          <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                          <input type="password" class="form-control" name="c_password" id="exampleInputPassword1" placeholder="Confirm Password">
                        </div>
                        <button type="submit" name="signup" class="btn btn-1 my-2">Sign Up</button>
                        <p>Already have Account Click Here <a href="login.php"> Login </a></p>
                    </form>
                </div>
            
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="img p-5 mt-5">
                <img src="img/imgpsh_fullsize_anim.png" width="100%" alt="">
            </div>
        </div>
       
    </div>    
</div>



<?php  include"footer.php"  ?>