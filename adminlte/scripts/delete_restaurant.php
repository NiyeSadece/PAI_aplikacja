<?php
$error = 0;

if ($error != 0){
    echo "<script>history.back();</script>";
    exit();
}

require_once "connect.php";
$sql = "DELETE FROM restaurants WHERE `restaurants`.`id` = $_GET[resetaurantIdDelete]";
$conn->query($sql);
if ($conn->affected_rows == 0){
    header("location: ../pages/views/logged_admin/restaurants/restaurants.php?userDel=0");
}else{
    header("location: ../pages/views/logged_admin/restaurants/restaurants.php?userDel=$_GET[restaaurantIdDelete]");
}