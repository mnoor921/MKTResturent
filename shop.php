<?php  include"header.php"  ?>


<!-- Hwero section Section -->
<div class="hero">
    <h2>Shop</h2>
</div>



<?php 
// print_r($_SESSION); 

$select_query = $connect->prepare("SELECT * FROM category WHERE slug = ?");
$select_query->bind_param("s", $slug);
$select_query->execute();

    // var_dump($select_query->execute());

$select_query_response = $select_query->get_result();
    // var_dump($select_query_response);
$select_query_fetch = $select_query_response->fetch_assoc();



    // var_dump($select_query_fetch['id']);

$select_query = $connect->prepare("SELECT * FROM product WHERE cid = ?");
$select_query->bind_param("s", $_GET['slug']);
$select_query->execute();


$select_query_response = $select_query->get_result();
    // echo '<br>';
$select_query_fetch = $select_query_response->fetch_assoc();
    // print_r($select_query_fetch);

    // var_dump($select_query_fetch);
    // die();





?>




<div class="section our-menu mb-5">
    <div class="container">
      <p class="text-center dic">Discover</p>
      <h1 class="text-center mb-5">Our Menu</h1>
      <div class="row">

        <?php
        foreach($select_query_response as $s)
            {   ?>
                <div class="col-md-4 col-12">
                    <div class="product-card">
                        <div class="img" style="background:url('../img/<?php echo $s['img']; ?>')">
                            <!-- <img src="../img/" width="100%" height="100%" alt=""> -->
                            <p class="price">Price:<?php echo $s['price']; ?></p>
                        </div>
                        <div class="card-body-style p-4">
                            <h2><?php  echo $s['name']; ?></h2>
                            <small><i class="fa fa-cheese"></i><i class="fa fa-hamburger"></i><i class="fa fa-pizza-slice"></i></small>
                            <p><?php  echo $s['description']; ?></p>
                            <div class="row">
                                <div class="col-md-6 col-6 ">
                                    <button onclick="add_to_cart(this,<?php echo $s['id']?>,<?php echo $s['price'];?>)" class="btn btn-1 pl-2">Add To Cart<i class="fa fa-shopping-cart ml-1"></i></button>
                                    <!-- <form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                                        <div class="cart-action">
                                            <input type="text" class="product-quantity" name="quantity" value="1" size="2" />
                                            <input type="submit" value="Add to Cart" class="btnAddAction" />
                                        </div>
                                    </form> -->
                                </div>
                                <div class="col-md-6 col-6">
                                    <a href="" class="btn btn-1">Details<i class="fa fa-arrow-right ml-1"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }

            ?>

        </div>
    </div>
</div>



<?php  include"footer.php"  ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">
	function add_to_cart(t,product_id,price){
        // console.log(t,product_id,price)
        var product_id = product_id;
        var price = price;
        var quantity = 1;
        var id = $(t).attr("id");

        $.ajax({
            url: '../add_to_cart.php',
            type: 'POST',
            data: {product_id: product_id,price: price,quantity : quantity},
            datatype: 'JSON',
            success: function(response)
            {
                // return false;
                var dataArray = jQuery.parseJSON(response);
                console.log(dataArray.msg)
                if(dataArray.msg == 'success'){
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Item Added to cart!',
                        footer: ''
                    })
                    /*$(t).css('background-color','rgb(175, 245, 78)');
                    $(t).html('Added To Cart <i class="fa fa-shopping-cart ml-3"></i>');
                    // $('.modal-body').append('<b>Appended text</b>');
                    $('.modal-body').append(response);
                    */

                }else if(dataArray.msg == 'session'){
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Please login first!',
                        footer: ''
                    })
                 /*$(t).css('background-color','rgb(245, 24, 32)');
                 $(t).html('Already exists in cart <i class="fa fa-shopping-cart ml-3"></i>');*/
             }

         }    
     });
    }
</script>