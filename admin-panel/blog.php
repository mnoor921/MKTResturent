
<!-- headers include -->
<?php  include "requires/header.php"  ?>

	<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">

			<div class="title pb-20">
				<h2 class="h3 mb-0">All Blogs</h2>
			</div>

            <ul class="nav nav-tabs w-100" id="myTab" role="tablist">
                <li class="nav-item w-50 text-center">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="home" aria-selected="true">All Blogs</a>
                </li>
                <li class="nav-item w-50 text-center">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#new-admin" role="tab" aria-controls="profile" aria-selected="false">Add New Blog</a>
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
				<div class="h5 pd-20 mb-0">Blogs</div>
				<table class="data-table table nowrap">
					<thead>
						<tr>
                            <th>#</th>
                            <th>Writer Name</th>
							<th class="table-plus">Heading</th>
							<th>Image</th>
							<th>Short Description</th>
							<th>Long Description</th>
							<th>Date</th>
							<th class="datatable-nosort">Actions</th>
						</tr>
					</thead>
					<tbody>

                    <?php 
      
                        $query = $connect->prepare("SELECT * FROM blog");
                        $query->execute();
                        $query_response = $query->get_result();
                        while($query_fetch = $query_response->fetch_assoc()){

                    ?>


						<tr>
							<td>
                            <?php print( $query_fetch['id'] ) ?>
							</td>
							<td><?php print( $query_fetch['writer_name'] ) ?></td>
							<td><?php print( $query_fetch['heading'] ) ?></td>
							<td><img src='<?php print( "../img/" . $query_fetch['img'] ) ?>' /></td>
							<td><?php print( $query_fetch['short_description'] ) ?></td>
							<td><?php print( $query_fetch['long_description'] ) ?></td>
							<td><?php print( $query_fetch['date_issue'] ) ?></td>
							<td>
								<div class="table-actions">
									<a href='edit-blog.php?id=<?php echo $query_fetch['id'];  ?>' data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
									<a href='include/delete/blog-delete.php?id=<?php echo $query_fetch['id'];  ?>' data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>

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
                    <form method="post" action="include/add.php" enctype="multipart/form-data">

                        <input type="hidden" name='request' value='blog' required/>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Writer Name</label>
                            <input type="text"  class="form-control" id="inputEmail4" placeholder="Writer Name " name="name"  required>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Heading</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Name" name="heading"  required>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Image upload</label>
                            <input type="file" class="form-control" id="inputPassword4" placeholder="Email" name="image" required>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputEmail4"> Short Description</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Short Description" name="short_description"  required>
                            </div>
                            <div class="form-group col-md-12">
                            <label for="inputEmail4"> Long Description</label>
                                <textarea id="summernote" name="long_description" ></textarea>
                            </div>
                            
                            
                            
                        </div>
                        
                        <input type="submit" name="submit" class="btn btn-primary">
                    </form>

                </div>
            </div>
			
			

	
			
			
		</div>
	</div>

	<?php  include "requires/footer.php"  ?>
<?php 

unset($_SESSION['add_error']);
unset($_SESSION['add_success']);
