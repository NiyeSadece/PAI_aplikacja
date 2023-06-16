<?php

session_start();

foreach ($_POST as $value){
    if (empty($value)){
        $_SESSION["error"] = "Wypełnij wszystkie pola!";
        echo "<script>history.back();</script>";
        exit();
    }
}

$error = 0;


if ($error != 0){
    echo "<script>history.back();</script>";
    exit();
}

require_once "./connect.php";



try {

    $stmt = $conn->prepare("INSERT INTO `reservations` (`restaurant_id`, `user_id`,`table_id`, `reservation_date`,  `startTime`, `endTime`, `created_at`) VALUES (?, ?, ?, ?, ?, ?, current_timestamp());");

    $stmt->bind_param("iiisss", $_SESSION["logged"]["restaurantId"], $_SESSION["logged"]["user_id"], $_SESSION["logged"]["table_id"], $_SESSION["logged"]["reservationDate"], $_SESSION["logged"]["startTime"], $_SESSION["logged"]["endTime"]);

    $stmt->execute();

    if ($stmt->affected_rows == 1){
        $_SESSION["success"] = "Dodano rezerwację";
        header("location: ../pages/views/current_reservations.php");
        exit();
    }else{
        $_SESSION["error"] = "Nie dodano rezerwacji";
        echo "<script>history.back();</script>";
        exit();
    }
} catch (mysqli_sql_exception $e) {
    $_SESSION["error"] = $e->getMessage();
    echo "<script>history.back();</script>";
}

