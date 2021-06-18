<!-- headers include -->
<?php  include "requires/header.php"  ?>
<?php include_once "requires/connect.php" ?>


	<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">

			<div class="title pb-20">
				<h2 class="h3 mb-0">All Employe</h2>
			</div>

            <ul class="nav nav-tabs w-100" id="myTab" role="tablist">
                <li class="nav-item w-50 text-center">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="home" aria-selected="true">All Employe</a>
                </li>
                <li class="nav-item w-50 text-center">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#new-admin" role="tab" aria-controls="profile" aria-selected="false">Add New Employe</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="admin" role="tabpanel" aria-labelledby="home-tab">


                    <!-- Data Tables -->
                    <div class="card-box pb-10">
				<div class="h5 pd-20 mb-0">Employes</div>
				<table class="data-table table nowrap">
					<thead>
						<tr>
                            <th>#</th>
                            <th>Employe Name</th>
							<th class="table-plus">Desiganation</th>
							<th>Image</th>
							<th style="width:200px">Description</th>
							
							<th class="datatable-nosort">Actions</th>
						</tr>
					</thead>
					<tbody>

                    <?php 
      
						$query = $connect->prepare("SELECT * FROM team");
						$query->execute();
						$query_response = $query->get_result();
						while($query_fetch = $query_response->fetch_assoc()){

					?>






						<tr>
							<td>
                            <?php print( $query_fetch['id'] ) ?>
							</td>
							<td><?php print( $query_fetch['name'] ) ?></td>
							<td><?php print( $query_fetch['designation'] ) ?></td>
							<td><img src='<?php print( "../img/" . $query_fetch['img'] ) ?>' /></td>
							<td><?php print( $query_fetch['description'] ) ?></td>
							<td>
								<div class="table-actions">
									<a href='edit-team.php?id=<?php echo $query_fetch['id'];  ?>' data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
									<!-- <a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a> -->

                                    <form action="include/delete.php" method="post">
                                        <input type="hidden">
                                        <input type="hidden" name="request" value="admin">
                                        <input type="hidden" name="id" value="<?php print($id)?>">
                                        <button type="submit" name="submit" data-color="#e95959" style=" border:none;background:transparent"><i class="icon-copy dw dw-delete-3 ml-2"></i></button>
                                    </form>
                                
                                
                                
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
                    <form  method='post' action='include/add.php' enctype="multipart/form-data" >
                        <input type="hidden" name="request" value='team'>
                        <div class="form-row">
                        
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Employe Name</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Enter Name " name="name"  required>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Desiganation</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Enter Desigenation" name="desigenation"  required>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Image upload</label>
                            <input type="file" class="form-control" id="inputPassword4"  name="image" required>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Description</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Description" name="description"  required>
                            </div>
                            
                            
                            
                            
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-primary">Add New Employe </button>
                    </form>

                </div>
            </div>
			
			

	
			
			
		</div>
	</div>

	<?php  include "requires/footer.php"  ?>

