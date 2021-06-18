<?php
include("../requires/connect.php");
if (isset($_POST['submit'])){
    extract($_POST);

    $img = $_FILES['img']['name'];
    $query = $connect->prepare("INSERT INTO `blog` (`id`, `writer_name`, `heading`, `short_description`, `long_description`, `date_issue`, `img`) VALUES (NULL, ?, ?, ?, ?, ?, ?);");
    $query->bind_param("ssssss", $a_name, $heading, $s_des, $l_des, $date_issue, $img);
    if($query->execute()){
        echo "sdfsd";
    }

    die();



   
}




?>