<?php
session_start();
foreach ($_POST as $key => $value){
    if (empty($value)){
        echo "<script>history.back();</script>";
        exit();
    }
}

require_once "./connect.php";
$sql = "UPDATE `users` SET `role_id` = '$_POST[role_id]', `firstName` = '$_POST[firstName]', `lastName` = '$_POST[lastName]', `email` = '$_POST[email]', `phoneNumber` = '$_POST[phoneNumber]' WHERE `users`.`id` = $_SESSION[userIdUpdate];";

$conn->query($sql);
