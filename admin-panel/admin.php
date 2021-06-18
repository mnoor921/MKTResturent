<!-- headers include -->
<?php  include "requires/header.php"  ?>
<?php include_once "requires/connect.php" ?>



	<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">

			<div class="title pb-20">
				<h2 class="h3 mb-0">All Admins</h2>
			</div>

            <ul class="nav nav-tabs w-100" id="myTab" role="tablist">
                <li class="nav-item w-50 text-center">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="home" aria-selected="true">Admins</a>
                </li>
                <li class="nav-item w-50 text-center">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#new-admin" role="tab" aria-controls="profile" aria-selected="false">Add New Admin</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="admin" role="tabpanel" aria-labelledby="home-tab">


                    <!-- Data Tables -->
                    <div class="card-box pb-10">
				<div class="h5 pd-20 mb-0">Admin</div>
				<table class="data-table table nowrap">
					<thead>
						<tr>
                            <th>#</th>
							<th class="table-plus">Name</th>
							<th>Email</th>
							<th>Password</th>
							<th class="datatable-nosort">Actions</th>
						</tr>
					</thead>
					<tbody>

					<?php 
      
						$query = $connect->prepare("SELECT * FROM admin");
						$query->execute();
						$query_response = $query->get_result();
						while($query_fetch = $query_response->fetch_assoc()){

					?>



						<tr>
							<td>
							<?php print( $query_fetch['id'] ) ?>
							</td>
							<td><?php print( $query_fetch['name'] ) ?></td>
							<td><?php print( $query_fetch['email'] ) ?></td>
							<td><?php print( $query_fetch['password'] ) ?></td>
							<td>
								<div class="table-actions">
									<a href='edit-admin.php?id=<?php echo $query_fetch['id'];  ?>' data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
									<a href='include/delete/admin-delete.php?id=<?php echo $query_fetch['id'];  ?>' data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
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





                    <!-- form -->
                    <form method="post" action="include/add.php" >
                        <div class="form-row">
							<input type="hidden" name="request" value="admin" required>
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Name</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Name" name="name"  required>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Email</label>
                            <input type="email" class="form-control" id="inputPassword4" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Password</label>
                            <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password" required >
                            </div>
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-primary">Add Admin</button>
                    </form>

                </div>
            </div>
			
			

			

			
			
		</div>
	</div>

	<?php  include "requires/footer.php"  ?>

	