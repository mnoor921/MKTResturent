<?php  include"header.php"  ?>



<!-- Hwero section Section -->
<div class="hero">
    <h2>Cart</h2>
</div>

<!-- Cart-section start -->
<section class="cart-style my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-12">
                <table class="table text-center p-3">
                    <thead>
                      <tr>
                        <th scope="col">P.ID</th>
                        <th scope="col">Product Img</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Quanity</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php   
                    if (!empty($_SESSION["cart_item"])) {
                        $count= 0;
                        $total_quantity = 0;
                        $total_price = 0;
                        foreach ($_SESSION["cart_item"] as $item){
                            $item_price = $item["quantity"]*$item["price"];
                            ?>
                            <tr>
                                <td><?= ++$count ?></td>
                                <td><img src="img/<?php echo $item["image"]; ?>" width="100px" height="100px" alt=""></td>
                                <td><?php echo $item["name"]; ?></td>
                                <td><p><!-- <i class="fa fa-minus mr-3"></i> --><?php echo $item["quantity"]; ?><!-- <i class="fa fa-plus ml-3"></i> --></p></td>
                                <td><?php echo "$ ".$item["price"]; ?></td>
                                <td><?php echo "$ ". number_format($item_price,2); ?></td>
                                <td><a href="add_to_cart.php?action=remove&code=<?php echo $item["p_code"]; ?>" class="btnRemoveAction"><i class="fa fa-times"></i><a></td>
                                </tr>
                                <?php
                                $total_quantity += $item["quantity"];
                                $total_price += ($item["price"]*$item["quantity"]);
                            }
                        } else { ?>
                            <tr>
                                <td colspan="6">Ooops! Cart is empty</td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 col-12 order-style">

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
                <a href="checkout.php" class="btn btn-1">Proceed To Checkout</a>
            </div>
        </div>
    </div>
</section>


<!-- end Cart-section start -->






<?php  include"footer.php"  ?>