<?php
$error = 0;

if ($error != 0){
    echo "<script>history.back();</script>";
    exit();
}

require_once "connect.php";
$sql = "DELETE FROM city WHERE `city`.`id` = $_GET[cityIdDelete]";
$conn->query($sql);
if ($conn->affected_rows == 0){
    header("location: ../pages/views/cities.php?cityDel=0");
}else {
    header("location: ../pages/views/cities.php?cityDel=$_GET[cityIdDelete]");
}