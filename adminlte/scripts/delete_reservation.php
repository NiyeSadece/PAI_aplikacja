<?php
$error = 0;

if ($error != 0){
    echo "<script>history.back();</script>";
    exit();
}

require_once "connect.php";
$sql = "DELETE FROM reservations WHERE `reservations`.`id` = $_GET[reservationIdDelete]";
$conn->query($sql);
if ($conn->affected_rows == 0){
    header("location: ../pages/views/logged_admin/reservations/reservations.php?userDel=0");
}else{
    header("location: ../pages/views/logged_admin/reservations/reservations.php?userDel=$_GET[reservationIdDelete]");
}