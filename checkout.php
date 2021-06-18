<?php  include"header.php"  ?>

<?php
/*echo "<pre>";
    print_r($_SESSION['user_id']);
    echo "</pre>";*/
if (!empty($_POST)) {
    /*echo "<pre>";
    print_r($_POST);
    echo "</pre>";*/

    $total_quantity = 0;
    $total_price = 0;
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
        $total_quantity += $item["quantity"];
        $total_price += ($item["price"]*$item["quantity"]);
    }
    $discount = 0;
    $tax = 0;
    $query = $connect->prepare("INSERT INTO orders SET first_name=?,last_name=?,country=?,address=?,city=?,phone=?,email=?,order_amount=?,discount=?,tax=?,user_id=?");
    $query->bind_param("sssssssssss",$_POST['first_name'],$_POST['last_name'],$_POST['country'],$_POST['address'],$_POST['city'],$_POST['phone'],$_POST['email'],$total_price,$discount,$tax,$_SESSION['user_id']);
    $query->execute();
    $order_id = $query->insert_id;
    foreach ($_SESSION["cart_item"] as $item){
        $p_name = $item["name"];
        $product_id = $item["p_code"];
        $quantity = $item["quantity"];
        $sale_price = $item["price"];
        $t_price = $item["quantity"]*$item["price"];
        $query = $connect->prepare("INSERT INTO order_detail SET product_id=?,p_name=?,sale_price=?,quantity=?,t_price=?,order_id=?");
        $query->bind_param("ssssss",$product_id,$p_name,$sale_price,$quantity,$t_price,$order_id);
        $query->execute();
    }
    
    // die;
    echo "<script>window.location='payment.php'</script>";

}

  $user_id = $connect -> real_escape_string($_SESSION['user_id']);
  $query = $connect->prepare("SELECT * FROM user WHERE id = ?");
  $query->bind_param("s", $user_id);
  $query->execute();

// die($query->execute());

  $query_response = $query->get_result();
  if($query_response->num_rows > 0){

    $query_fetch = $query_response->fetch_assoc();

    // print_r($query_fetch);
}
?>

<!-- Hwero section Section -->
<div class="hero">
    <h2>Check Out</h2>
</div>

<!-- contact us -->
<section class="contact-us my-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-12">
                <div class="contact-us-form ">
                    <div class="form-style p-3">
                        <h1 class="mb-3">Shipping Details <i class="fa fa-bus ml-3"></i></h1>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name" name="first_name" value="<?= @$query_fetch['name'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Last Name" name="last_name">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Company Name">
                            </div> -->
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Country" name="country">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Complete Address" name="address" value="<?= @$query_fetch['address'] ?>">
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="City" name="city">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Phone" name="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter E-mail" name="email" value="<?= @$query_fetch['email'] ?>">
                            </div>
                            <div class="form-group">
                                <textarea type="text" class="form-control" placeholder="Add Aditional Notes" name="additional"></textarea>
                            </div>


                            <button type="submit" class="btn btn-1 my-5">Update Details & Go Next</button>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-md-4 col-12 order-style">
                <div class="order-details p-3">
                    <h1 class="mb-3">Order Details</h1>
                    <hr>
                    <?php   
                    if (!empty($_SESSION["cart_item"])) {
                        $count= 0;
                        $total_quantity = 0;
                        $total_price = 0;
                        foreach ($_SESSION["cart_item"] as $item){
                            $item_price = $item["quantity"]*$item["price"];
                            ?>
                            <div class="row">
                                <div class="col-md-4 col-4">
                                    <div class="img">
                                        <img src="img/<?php echo $item["image"]; ?>" width="100%" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-6">
                                    <div class="text">
                                        <h4><?php echo $item["name"]; ?></h4>
                                        <p>Price <?php echo "$".$item["price"]; ?></p>
                                        <p><!-- <i class="fa fa-minus mr-3"></i> -->Quantity <?php echo $item["quantity"]; ?> <!-- <i class="fa fa-plus ml-3"></i> --></p>
                                    </div>
                                </div>
                                <div class="col-md-2 col-2">
                                    <div class="times">
                                        <a href="add_to_cart.php?action=remove&code=<?php echo $item["p_code"]; ?>" class="btnRemoveAction"><i class="fa fa-times"></i><a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $total_quantity += $item["quantity"];
                                $total_price += ($item["price"]*$item["quantity"]);
                            }
                        }?>
                    <!-- <div class="row">
                        <div class="col-md-4 col-4">
                            <div class="img">
                                <img src="img/blog2.jpg" width="100%" alt="">
                            </div>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="text">
                                <h4>Pizza KAbab</h4>
                                <p>Price $2.00</p>
                                <p><i class="fa fa-minus mr-3"></i> 1 <i class="fa fa-plus ml-3"></i></p>
                            </div>
                        </div>
                        <div class="col-md-2 col-2">
                            <div class="times">
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                    </div> -->
                </div>
                <hr>
                <div class="subtotal-style p-5">
                    <div class="subtotal">
                        <p>Sub Total</p>
                        <p>$<?=@$total_price?>.00</p>
                    </div>
                    <div class="subtotal">
                        <p>Tax</p>
                        <p>$0.00</p>
                    </div>
                    <div class="subtotal">
                        <p>Shipping</p>
                        <p>$0.00</p>
                    </div>
                    <hr>
                    <div class="subtotal">
                        <p>Total</p>
                        <p>$<?=@$total_price?>.00</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<br>





<?php  include"footer.php"  ?>