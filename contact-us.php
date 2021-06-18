<?php  include"header.php"  ?>


<!-- Hwero section Section -->
<div class="hero">
    <h2>Contact US</h2>
</div>

<!-- contact us -->
<section class="contact-us my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-12">
                <div class="contact-us-form">
                    <h1 class="text-center">GET IN TOUCH</h1>
                    <p class="text-center">We are available 24/7 by fax, e-mail or by phone. You can also use our quick contact form to ask a question about our services that we offer on a regular basis. We would be pleased to answer your questions.</p>
                    <div class="form-style p-3">



                        <form method="post" action="add-contact.php">

                            <div class="form-group">
                              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="Enter Your Name">
                            </div>


                            <div class="form-group">
                              <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter Phone Number" name="phone">
                            </div>


                            <div class="form-group">
                              <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Enter Email" name="email">
                            </div>


                            <div class="form-group">
                              <textarea type="text" class="form-control" placeholder="Enter Your Message" name="message"></textarea>
                            </div>


                            <button type="submit" class="btn btn-1 my-5">Send Request</button>
                          
                          
                          </form>
                    </div>
                
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="social-links">
                    <h2>Follow US</h2>
                    <hr class="mb-3 text-left">
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-instagram"></i></a>
                    <a href=""><i class="fa fa-skype"></i></a>
                    <a href=""><i class="fa fa-google"></i></a>
                    <h2 class="mt-5">Phone</h2>
                    <hr class="mb-3 text-left">
                    <p><a href=""><i class="fa fa-phone mr-2"></i> +92 324 32134534</a></p>
                    <h2 class="mt-5">Address</h2>
                    <hr class="mb-3 text-left">
                    <p><a href=""><i class="fa fa-map-marker-alt mr-2"></i> Fatima Jinnah Road Near Aziz Hospital Sargodha </a></p>
                    <h2 class="mt-5">Opening Hour</h2>
                    <hr class="mb-3 text-left">
                    <p><i class="fa fa-clock mr-3"></i> 9:00am-23:00pm</p>
                    
                </div>
            </div>
        </div>
    </div>

</section>
<br>




<?php  include"footer.php"  ?>