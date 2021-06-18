<!-- headers include -->
<?php  include "requires/header.php"  ?>
<?php include_once "requires/connect.php" ?>




	<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">

			<div class="title pb-20">
				<h2 class="h3 mb-0">All Users</h2>
			</div>


                    <!-- Data Tables -->
            <div class="card-box pb-10">
				<div class="h5 pd-20 mb-0">Users</div>
				<table class="data-table table nowrap">
					<thead>
						<tr>
                            <th>#</th>
							<th class="table-plus">Name</th>
							<th>Image</th>
							<th>Email</th>
							<th>Password</th>
							<th>Phone</th>
							<th>Address</th>
							<th class="datatable-nosort">Status</th>
						</tr>
					</thead>
					<tbody>



					<?php 
      
						$query = $connect->prepare("SELECT * FROM user");
						$query->execute();
						$query_response = $query->get_result();
						while($query_fetch = $query_response->fetch_assoc()){

					?>



						<tr>
							<td>
							<?php print( $query_fetch['id'] ) ?>
							</td>
							<td><?php print( $query_fetch['name'] ) ?></td>
							<td><?php print( $query_fetch['img'] ) ?></td>
							<td><?php print( $query_fetch['email'] ) ?></td>
							<td><?php print( $query_fetch['password'] ) ?></td>
							<td><?php print( $query_fetch['phone'] ) ?></td>
							<td><?php print( $query_fetch['address'] ) ?></td>
							<td>
								<div class="table-actions">
									<a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
									<a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
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
	</div>

	<?php  include "requires/footer.php"  ?>

	