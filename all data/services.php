<?php

include 'requires/connection.php';
include 'requires/header.php';


// fetching the services from the dtabase
$slug = $_GET['slug'];
$query = $conn->prepare('SELECT * FROM services where slug = ?');
$query->bind_param("s",$slug);
$query->execute();
$fetch_services = $query->get_result();
?>
<style type="text/css">
	.what-we-do{
		padding: 20px;
		border-radius: 5px;
		box-shadow: 1px 0px 5px silver;
		color: #000;
	}
</style>

<!-- Hero Section -->
<section class="hero">
	<h2> Services </h2>
	<p>We Provide The Best Services.</p>
</section>

<!-- services section  -->
<div class="container my-5">
	<h2 class="heading-style  " data-aos="fade-up">Our Best Services</h2>
	<hr class="w-25  mb-3" data-aos="fade-up">
	<br>
	<div class="row">
		<?php
		$i = 0;
		while ($result = $fetch_services->fetch_assoc()) {
			?>
			<!-- <div class="col-md-8 col-12"> -->
				

		<!-- <div class="accordion" id="myAccordion">
			<div class="card">
				<button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#collapsible<?=$i?>" data-parent="#myAccordion"><?= $result['name']?></button>
				<div id="collapsible<?=$i?>" class="collapse">
					<?=$result['description']?>
				</div>
			</div>
		</div> -->

			<!-- <div class="accordion" id="accordionExample">
			  <div class="card">
			    <div class="card-header" id="headingOne">
			      <h5 class="mb-0">
			        <div class="text-center">
				        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?=$i?>" aria-expanded="true" aria-controls="collapseOne" style="text-align: center;">
				          <?=$result['name']?>
			        	</button>
			        </div>
			      </h5>
			    </div>

			    <div id="collapse<?=$i?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
			      <div class="card-body">
			        <?=$result['description']?>
			      </div>
			    </div>
			  </div>
			  
			  </div>
			</div>-->




				<div class="col-md-4 col-12">
                <div class="category-card p-2" data-aos="fade-up">
                    <div class="img text-center my-4">
                        <img src="/uploads/<?=$result['image']?>" width="100px" height="100px" alt="">
                    </div>
                    <div class="card-text p-3">
                        <div class="d-flex" style="justify-content: space-between;">
                            <h3><?=$result['name']?></h3>
                            <h4>Price :<?=$result['price']?> $</h4>
                        </div>
                        <p class="text-justify"><?=$result['description']?></p>
                    
                        <button class="btn btn-1 w-100" id="<?= $i?>" onclick="add_to_cart(this,<?php echo $_SESSION['user_id']?>,<?php echo $result['price']?>,<?php echo $result['service_id']?>)">Add To Cart <i class="fa fa-shopping-cart ml-3"></i></button>
                    
                    </div>
                </div>
            </div>

						<?php
					$i++;
					}
					?> 
	</div>
</div>
</div>	
<?php
include 'requires/footer.php';
?>

<script type="text/javascript">
	function add_to_cart(t,user_id,price,service_id){
    	var user_id = user_id;
    	var price = price;
    	var service_id = service_id;
    	var id = $(t).attr("id");
    	
    	$.ajax({
            url: '/includes/add_to_cart.php',
            type: 'POST',
            data: {user_id: user_id,price: price,service_id: service_id},
            success: function(response)
            {
                // var dataArray = jQuery.parseJSON(response);
                if(response != ''){

                	$(t).css('background-color','rgb(175, 245, 78)');
                    $(t).html('Added To Cart <i class="fa fa-shopping-cart ml-3"></i>');
                    // $('.modal-body').append('<b>Appended text</b>');
                 
                    $('.modal-body').append(response);


             }else if(response == ''){
	             	$(t).css('background-color','rgb(245, 24, 32)');
	                $(t).html('Already exists in cart <i class="fa fa-shopping-cart ml-3"></i>');
             }

            }    
    });
		   }
</script>




