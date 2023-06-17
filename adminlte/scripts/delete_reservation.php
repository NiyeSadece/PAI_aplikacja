<?php
$error = 0;

if ($error != 0){
    echo "<script>history.back();</script>";
    exit();
}

require_once "connect.php";
$sql = "DELETE FROM reservations WHERE `reservations`.`reservation_id` = $_GET[reservationIdDelete]";
$conn->query($sql);
if ($conn->affected_rows == 0){
    header("location: ../pages/views/reservations.php?reservationDel=0");
}else{
    header("location: ../pages/views/reservations.php?reservationDel=$_GET[reservationIdDelete]");
}