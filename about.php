<?php   include"header.php"   ?>
<?php include_once "admin-panel/requires/connect.php" ?>
<!-- Hwero section Section -->
<div class="hero">
    <h2>About Us</h2>
</div>

<!-- about us section -->
<div class="container">
    <h2 class="text-center mx-auto mt-5">About US</h2>
    <hr >
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="img">
                <img src="img/pizza-7-310x260.png" width="100%" alt="">
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="about-text text-justify mt-5">
                <h2>About US</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, voluptate, eveniet libero cumque ducimus sit maiores veniam placeat praesentium voluptatum amet saepe nostrum error consectetur aspernatur atque? Cumque, iure ullam.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur facilis dolorum explicabo nesciunt, aut architecto. Optio ab repellendus, similique deserunt, illo sunt vero, suscipit dolores corporis sequi neque. Dicta, dolores!</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur facilis dolorum explicabo nesciunt, aut architecto. Optio ab repellendus, similique deserunt, illo sunt vero, suscipit dolores corporis sequi neque. Dicta, dolores!</p>
            </div>
        </div>
    </div>
</div>

<!-- Our Team -->
<div class="container my-5">
    <h1 class="text-center mt-5">Our Team / Our Chef</h1>
    <hr class="mb-5">
    <div class="row pt-5">
        

        <?php 
      
              $query = $connect->prepare("SELECT * FROM team");
              $query->execute();
              $query_response = $query->get_result();
              while($query_fetch = $query_response->fetch_assoc()){

                ?>

                    <div class="col-md-4 col-12">
                        <div class="card">
                            <img class="card-img-top" src="<?php print( "img/" . $query_fetch['img'] ) ?>" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title"><?php print( $query_fetch['name'] ) ?></h5>
                              <small class="pb-2 badge"><?php print( $query_fetch['designation'] ) ?></small>
                              <p class="card-text" style="font-size:15px;font-weight:500;"><?php print( $query_fetch['description'] ) ?></p>
                              <!-- <a href="#" class="btn btn-1">Go To Pofile</a> -->
                            </div>
                          </div>
                    </div>
              


            <?php 


          }

         ?>






        <!-- <div class="col-md-4 col-12">
            <div class="card">
                <img class="card-img-top" src="img/chef-2.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Kazma Rehman</h5>
                  <small class="pb-2">Founder OF MKT</small>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-1">Go To Pofile</a>
                </div>
              </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="card">
                <img class="card-img-top" src="img/chef-3.png" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Maria Kanwal</h5>
                  <small class="pb-2">CEO OF MKT</small>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-1">Go To Pofile</a>
                </div>
              </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="card">
                <img class="card-img-top" src="img/chef-4.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Maria Kanwal</h5>
                  <small class="pb-2">CEO OF MKT</small>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-1">Go To Pofile</a>
                </div>
              </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="card">
                <img class="card-img-top" src="img/chef-5.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Maria Kanwal</h5>
                  <small class="pb-2">CEO OF MKT</small>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-1">Go To Pofile</a>
                </div>
              </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="card">
                <img class="card-img-top" src="img/chef-6.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Maria Kanwal</h5>
                  <small class="pb-2">CEO OF MKT</small>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-1">Go To Pofile</a>
                </div>
              </div>
        </div> -->
    </div>
</div>



<?php   include"footer.php"   ?>