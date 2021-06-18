<?php
	include 'requires/connection.php';
	include 'requires/header.php';

?>
<style type="text/css">
	.delete:hover{
		color: red; 
		cursor: pointer;
		border: 1px solid red;
		border-radius: 50%;
		padding: 10px;
	}
</style>
 <!-- Hero Section -->
    <section class="hero">
        <h2>Cart</h2>
    </section>

    <!-- all pricing table -->
    <div class="container-fluid my-5">
        <h2 class="heading-style  " data-aos="fade-up">My Shopping Bag</h2>
        <hr class="w-25   mb-3" data-aos="fade-up">


        <div class="row">

            <div class="col-md-8 col-12">

                <div class="cart-table">

            

                    <table class="table table-border table-cart">

                        <thead class="text-center">
                            <tr>
                                <th>Product</th>
                                <th></th>
                                <!-- <th>Qty</th> -->
                                
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody class="text-center">
                        	<?php
					            $user_id = $_SESSION['user_id'];
					            $query = $conn->prepare('SELECT * FROM cart where user_id = ?');
					            $query->bind_param("s",$user_id);
					            $query->execute();
					            $fetch_cart_items = $query->get_result();
					            while ($items = $fetch_cart_items->fetch_assoc()) {
					            	$_SESSION['service_id'] = $items['service_id'];
					              $query2 = $conn->prepare('SELECT * FROM services where service_id = ?');
					              $query2->bind_param("s",$items['service_id']);
					              $query2->execute();
					              $fetch_response = $query2->get_result();
					              $fetch_service = $fetch_response->fetch_assoc();
					             ?>
					           <tr id="tr<?=$items['service_id']?>">
                                <td>
                                    <img src="uploads/<?= $fetch_service['image']?>" width="60px" height="60px" alt="">
                                </td>

                                <td>
                                    <h4><?= $fetch_service['name']?></h4>
                                    <h4><?= $fetch_service['description']?></h4>
                                </td>

                                <!-- <td>
                                    <p><span><i class="fa fa-minus"></i></span> 1  <span><i class="fa fa-plus"></i></span></p>
                                </td> -->

                                <td>
                                    <p>$ <?= $items['total']?></p>
                                </td>

                                

                                <td>
                                    <i class="fa fa-trash-alt delete" onclick="del_cart_item2(<?=$items['service_id']?>)"></i>
                                </td>


                            </tr>
					             <?php
					         	}
					         ?>
                            
                            
                        </tbody>



                    </table>

                </div>

            </div>
            <?php
            $user_id = $_SESSION['user_id'];
            $sum_query = $conn->prepare('SELECT SUM(total) AS grand_total FROM cart Where user_id = ?');
            $sum_query->bind_param('s',$user_id);
            $sum_query->execute();
            $fetch_sum = $sum_query->get_result();
            $fetch_sum_response = $fetch_sum->fetch_assoc();
            $_SESSION['charge'] = $fetch_sum_response['grand_total'];

            ?>
            <div class="col-md-4 col-12">
                <h2>Summery</h2>
                <hr>
                <p>Do you Have Any Coupon Code?</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Enter Code" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <span class="input-group-text btn-1" id="basic-addon2" style="border: 1px solid #979797;">Apply Coupon</span>
                    </div>
                </div>
                <hr>
                <div class="subtotals">
                    <div class="d-flex" style="justify-content: space-between;">
                        <p>Subtotals</p>
                        <div>
                        	
                        			 <div>$<?= $fetch_sum_response['grand_total']?></div>
                        	
                        </div>
                        
                        
                    </div>

                    <!-- <div class="d-flex" style="justify-content: space-between;">
                        <p>Shipping Fee</p>
                        <p>$0.00</p>
                    </div> -->

                    <!-- <div class="d-flex" style="justify-content: space-between;">
                        <p>Sales Tax</p>
                        <p>$1.00</p>
                    </div> -->
                </div>
                <hr>
                <div class="d-flex" style="justify-content: space-between; font-size: 18px; font-weight: 700;">
                    <p>Estimated Total</p>
                    <p>$<?=$fetch_sum_response['grand_total']?></p>
                </div>
                <br>
                <!-- <button class="btn-1 w-100 btn" onclick="window.location=('api/stripe_payment_gateway/index.php')">Checkout</button> -->
                <!-- <?php
                	// include 'api/stripe_payment_gateway/config.php';
                ?>
                <form method="post" action="api/stripe_payment_gateway/save.php">
				<script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
				data-key="<?php echo $publishableKey?>"
				data-amount="<?php echo $fetch_sum_response['grand_total']?>"
				data-name="hello world"
				data-description="hello pakistan"
				data-currency="usd"
				>
		
				</script>
				</form> -->
				<button class="btn btn-1" onclick="window.location='api/stripe_payment_getway_php/index.php'">Pay Now</button>   

    </div>
</div>
</div>

    <?php
    	include 'requires/footer.php';
    ?>
    <script type="text/javascript">
      function del_cart_item2(service_id){
        var service_id = service_id;
        
        $.ajax({
            url: '/includes/del_from_cart.php',
            type: 'POST',
            data: {service_id: service_id},
            success: function(response)
            {
                // var dataArray = jQuery.parseJSON(response);
                if(response == 'Successfully Deleted!'){

                  $('#tr'+service_id).remove();
                  $('#'+service_id).remove();
                    
             }

            }    
         });
      }
    </script>

		