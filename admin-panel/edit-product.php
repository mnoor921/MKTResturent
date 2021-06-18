<?php  include "requires/header.php"  ?>

<?php 

$id = $_GET['id'];

?>


    <div class="main-container">
	    <div class="xs-pd-20-10 pd-ltr-20">
			<div class="title pb-20">
				<h2 class="h3 mb-0">Update Product</h2>
	        </div>

            <?php
                    $conn = mysqli_connect("localhost","root","","mkt") or die("connection Fails");
                    $query = $connect->prepare("SELECT * FROM product  WHERE id=?");
                    $query->bind_param("s",$id);
						$query->execute();
						$query_response = $query->get_result();
						$query_fetch = $query_response->fetch_assoc();
                    // $sql = "SELECT * FROM admin  WHERE id='$id'  ";
                    // $result = mysqli_query($conn , $sql) or die("function not run");
                    // $fetch= mysqli_fetch_array()        
            ?>


                <form method='post' action='include/update.php' enctype="multipart/form-data" >

                    <input type="hidden" name="id" value="<?php print($id) ?>" required>    
                    <input type="hidden" name="request" value='product'>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Category Name</label>
                            <select name="category_id" class="form-control" required>
                                
                                <?php 
                                
                                    $category_query = $connect->prepare("SELECT * FROM category");
                                    $category_query->execute();
                                    $category_query_response = $category_query->get_result();
                                    while($category_query_fetch = $category_query_response->fetch_assoc()){
                                        ?>
                                            <option value="<?php print( $category_query_fetch['id'] ) ?>"><?php print( $category_query_fetch['name'] ) ?></option>
                                        <?php
                                    }
                                
                                ?>

                            </select>

                        
                        
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Name</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Name" name="name" value="<?php print($query_fetch['name'] ) ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputPassword4">Image upload</label>
                        <input type="file" class="form-control" id="inputPassword4" name="image" value="<?php print($query_fetch['img'] ) ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Description</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Name" name="description" value="<?php print($query_fetch['description'] ) ?>"  required>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Price</label>
                        <input type="number" class="form-control" id="inputEmail4" placeholder="Name" name="price" value="<?php print($query_fetch['price'] ) ?>"  required>
                        </div>
                        
                        <div class="form-group col-md-6">
                        <label for="inputPassword4">Shipping Fee</label>
                        <input type="text" class="form-control" id="inputPassword4" placeholder="" name="shipping" value="<?php print($query_fetch['shipping_price'] ) ?>" required >
                        </div>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Update Product</button>
                
                </form>







        </div>
    </div>



<?php  include "requires/footer.php"  ?>           