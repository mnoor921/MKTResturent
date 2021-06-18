
<?php   include"header.php"   ?>

<?php 


    $select_query = $connect->prepare("SELECT * FROM blog WHERE slug = ?");
    $select_query->bind_param("s", $slug);
    $select_query->execute();
    $select_query_response = $select_query->get_result();
    $select_query_fetch = $select_query_response->fetch_assoc();


?>


<!-- Hwero section Section -->
<div class="hero">
    <h2>Blog Details</h2>
</div>
<style>
    .user-icons a{
        color: #FF6000;
        font-size:20px;
        margin:5px 10px;
    }
</style>
<!-- blog-details start -->
<div class="container blog-details my-5">

    <h2> <?php print( htmlspecialchars( $select_query_fetch['heading'] ) ) ?> </h2>
    <div class="user-icons my-2 p-2">
        <a href=""><i class="fa fa-user mr-2"></i> <?php print( htmlspecialchars( $select_query_fetch['writer_name'] ) ) ?> </a>
        <a href=""><i class="fa fa-calendar mr-2"></i> <?php print( htmlspecialchars( $select_query_fetch['date_issue'] ) ) ?> </a>
    </div>
    <div class="img p-2">
        <img src="../img/<?php print( $select_query_fetch['img'] ) ?>">
    </div>
    <br>
    <h2 class="p-2">Description</h2>
    <br>
    <div class="text p-2">
        <p><?php print( $select_query_fetch['long_description'] ) ?></p>
    </div>
</div>

<!-- end blog-details start -->









<?php   include"footer.php"   ?>