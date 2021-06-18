<?php  include "requires/header.php"  ?>

<?php 

$id = $_GET['id'];

?>


<div class="main-container">
	<div class="xs-pd-20-10 pd-ltr-20">
			<div class="title pb-20">
				<h2 class="h3 mb-0">Update Blog</h2>
	        </div>

            <?php
                    $conn = mysqli_connect("localhost","root","","mkt") or die("connection Fails");
                    $query = $connect->prepare("SELECT * FROM blog  WHERE id=?");
                    $query->bind_param("s",$id);
						$query->execute();
						$query_response = $query->get_result();
						$query_fetch = $query_response->fetch_assoc();
                    // $sql = "SELECT * FROM admin  WHERE id='$id'  ";
                    // $result = mysqli_query($conn , $sql) or die("function not run");
                    // $fetch= mysqli_fetch_array()        
            ?>

                <form method="post" action="include/update.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php print($id) ?>" required>    
                    <input type="hidden" name='request' value='blog' required/>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Writer Name</label>
                        <input type="text"  class="form-control" id="inputEmail4" placeholder="Writer Name " name="name" value="<?php print($query_fetch['writer_name'] ) ?>"  required>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Heading</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Name" name="heading" value="<?php print($query_fetch['heading'] ) ?>"  required>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputPassword4">Image upload</label>
                        <input type="file" class="form-control" id="inputPassword4" placeholder="Email" name="image" value="<?php print($query_fetch['img'] ) ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputEmail4"> Short Description</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Short Description" name="short_description" value="<?php print($query_fetch['short_description'] ) ?>"  required>
                        </div>
                        <div class="form-group col-md-12">
                        <label for="inputEmail4"> Long Description</label>
                            <textarea id="summernote" name="long_description" value="<?php print($query_fetch['long_description'] ) ?>" ></textarea>
                        </div>
                        
                        
                        
                    </div>

                    <input type="submit" name="submit" class="btn btn-primary">
                </form>





<?php  include "requires/footer.php"  ?>