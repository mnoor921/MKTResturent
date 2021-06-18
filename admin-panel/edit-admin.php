<?php  include "requires/header.php"  ?>
<?php 

$id = $_GET['id'];

?>


<div class="main-container">
	<div class="xs-pd-20-10 pd-ltr-20">
			<div class="title pb-20">
				<h2 class="h3 mb-0">Update Admins</h2>
	        </div>

            <?php
                    $conn = mysqli_connect("localhost","root","","mkt") or die("connection Fails");
                    $query = $connect->prepare("SELECT * FROM admin  WHERE id=?");
                    $query->bind_param("s",$id);
						$query->execute();
						$query_response = $query->get_result();
						$query_fetch = $query_response->fetch_assoc();
                    ?>







                <form method="post" action="include/update.php" >
                        <div class="form-row">
                            <input type="hidden" name="id" value="<?php print($id) ?>" required>
							<input type="hidden" name="request" value="admin" required>

                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Name</label>
                            <input type="text" class="form-control" id="inputEmail4" value="<?php print($query_fetch['name'] ) ?>" placeholder="Name" name="name"  required>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Email</label>
                            <input type="email" value="<?php print($query_fetch['email'] ) ?>" class="form-control" id="inputPassword4" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Password</label>
                            <input type="password" class="form-control" id="inputPassword4"  placeholder="Password" name="password" required >
                            </div>
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    </form>	
        
    </div>
</div>



<?php  include "requires/footer.php";?>