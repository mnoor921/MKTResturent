<?php  include"header.php"  ?>


<!-- Hwero section Section -->
<div class="hero">
    <h2>Login / Sign Up</h2>
</div>

<!-- about us section -->
<div class="container my-5">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="img p-5">
                <img src="img/imgpsh_fullsize_anim.png" width="100%" alt="">
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="contact-us-form log-in-style  p-5">
                <h1 class="text-center">Log In</h1>
                <div class="form-style ">
                <form class="my-3" action="front-include/login.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                          <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                        </div>
                        <button type="submit" name="submit" class="btn btn-1 my-5">Log In</button>
                        <p>Don't have Account Click Here <a href="sign-up.php"> Sign up </a></p>
                      </form>
                </div>
            
            </div>
        </div>
    </div>    
</div>



<?php  include"footer.php"  ?>