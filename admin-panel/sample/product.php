<!-- headers include -->
<?php  include "requires/header.php"  ?>



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
                <div class="tab-pane fade show active" id="admin" role="tabpanel" aria-labelledby="home-tab">


                    <!-- Data Tables -->
                    <div class="card-box pb-10">
				<div class="h5 pd-20 mb-0">Product</div>
				<table class="data-table table nowrap">
					<thead>
						<tr>
                            <th>#</th>
                            <th>Category ID</th>
							<th class="table-plus">Name</th>
							<th>Image</th>
							<th>Description</th>
							<th>Price</th>
							<th>Shipping Fee</th>
							<th class="datatable-nosort">Actions</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								1
							</td>
							<td>Female</td>
							<td>info@gmail.com</td>
							<td>*********</td>
							<td>*********</td>
							<td>*********</td>
							<td>*********</td>
							<td>
								<div class="table-actions">
									<a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
									<a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
								</div>
							</td>
						</tr>
						
					</tbody>
				</table>
			</div>

                </div>
                <div class="tab-pane fade bg-white p-4" id="new-admin" role="tabpanel" aria-labelledby="profile-tab">

                    <!-- form -->
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Category Id</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Name" name="cid"  required>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Name</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Name" name="cid"  required>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Image upload</label>
                            <input type="file" class="form-control" id="inputPassword4" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Description</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Name" name="cid"  required>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Price</label>
                            <input type="number" class="form-control" id="inputEmail4" placeholder="Name" name="cid"  required>
                            </div>
                            
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Shipping Fee</label>
                            <input type="text" class="form-control" id="inputPassword4" placeholder="Password" name="password" required >
                            </div>
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
                    </form>

                </div>
            </div>
			
			

	
			
			
		</div>
	</div>

	<?php  include "requires/footer.php"  ?>

