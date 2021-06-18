<!-- headers include -->
<?php  include "requires/header.php"  ?>
<?php include_once "requires/connect.php" ?>



	<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">

			<div class="title pb-20">
				<h2 class="h3 mb-0">All Products</h2>
			</div>

            <ul class="nav nav-tabs w-100" id="myTab" role="tablist">
                <li class="nav-item w-50 text-center">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="home" aria-selected="true">All Products</a>
                </li>
                <li class="nav-item w-50 text-center">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#new-admin" role="tab" aria-controls="profile" aria-selected="false">Add New Product</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
            <?php 
                    
                    if(isset($_SESSION['add_error'])){
                        ?>
    
                            <div class="alert alert-danger m-2" role="alert">
                                <?php print( $_SESSION['add_error'] ) ?>
                            </div>
    
                        <?php 
                    }

                    if(isset($_SESSION['add_success'])){
                        ?>
    
                            <div class="alert alert-success m-2" role="alert">
                                <?php print( $_SESSION['add_success'] ) ?>
                            </div>
    
                        <?php 
                    }
                    
                ?>
                <div class="tab-pane fade show active" id="admin" role="tabpanel" aria-labelledby="home-tab">


                    <!-- Data Tables -->
                    <div class="card-box pb-10">
				<div class="h5 pd-20 mb-0">Product</div>
				<table class="data-table table nowrap">
					<thead>
						<tr>
                            <th>#</th>
                            <th>Category Id</th>
							<th class="table-plus">Name</th>
							<th>Image</th>
							<th>Description</th>
							<th>Price</th>
							<th>Shipping Fee</th>
							<th class="datatable-nosort">Actions</th>
						</tr>
					</thead>
					<tbody>



                    <?php 
      
						$query = $connect->prepare("SELECT * FROM product");
						$query->execute();
						$query_response = $query->get_result();
						while($query_fetch = $query_response->fetch_assoc()){

					?>






						<tr>
							<td>
                            <?php print( $query_fetch['id'] ) ?>
							</td>
							<td><?php print( $query_fetch['cid'] ) ?></td>
							<td><?php print( $query_fetch['name'] ) ?></td>
							<td><img src='<?php print( "../img/" . $query_fetch['img'] ) ?>' width="70px" /></td>
							<td><?php print( $query_fetch['description'] ) ?></td>
							<td><?php print( $query_fetch['price'] ) ?></td>
							<td><?php print( $query_fetch['shipping_price'] ) ?></td>
							<td>
								<div class="table-actions">
									<a href='edit-product.php?id=<?php echo $query_fetch['id'];  ?>' data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
									<a href='include/delete/product-delete.php?id=<?php echo $query_fetch['id'];  ?>' data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
								
                                    <!-- <form action="include/delete.php" method="post">
                                        <input type="hidden">
                                        <input type="hidden" name="request" value="admin">
                                        <input type="hidden" name="id" value="<?php print($id)?>">
                                        <button type="submit" name="submit" data-color="#e95959" style=" border:none;background:transparent"><i class="icon-copy dw dw-delete-3 ml-2"></i></button>
                                    </form> -->
                                
                                
                                </div>
							</td>
						</tr>


                    <?php

                        }

                    ?>





					</tbody>
				</table>
			</div>

                </div>
                <div class="tab-pane fade bg-white p-4" id="new-admin" role="tabpanel" aria-labelledby="profile-tab">

                    <!-- form -->
                    <form method='post' action='include/add.php' enctype="multipart/form-data" >

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
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Name" name="name"  required>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Image upload</label>
                            <input type="file" class="form-control" id="inputPassword4" name="image" required>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Description</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Name" name="description"  required>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Price</label>
                            <input type="number" class="form-control" id="inputEmail4" placeholder="Name" name="price"  required>
                            </div>
                            
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Shipping Fee</label>
                            <input type="text" class="form-control" id="inputPassword4" placeholder="Password" name="shipping" required >
                            </div>
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
                    </form> 

                </div>
            </div>
			
			

	
			
			
		</div>
	</div>

	<?php  include "requires/footer.php"  ?>

<?php 

unset($_SESSION['add_error']);
unset($_SESSION['add_success']);