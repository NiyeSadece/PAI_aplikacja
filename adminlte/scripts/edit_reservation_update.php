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

    $reservationId = $_SESSION["edit_reservation"];

    $stmt = $conn->prepare("UPDATE `reservations` SET `restaurant_id` = ?, `user_id` = ?, `table_id` = ?, `reservation_date` = ?, `startTime` = ?, `endTime` = ? WHERE `reservation_id` = ?");

    $stmt->bind_param(
        "iiisssi",
        $_SESSION["logged"]["restaurantId"],
        $_SESSION["logged"]["user_id"],
        $_SESSION["logged"]["table_id"],
        $_SESSION["logged"]["reservationDate"],
        $_SESSION["logged"]["startTime"],
        $_SESSION["logged"]["endTime"],
        $reservationId
    );

    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        $_SESSION["success"] = "Zaktualizowano rezerwację";
        header("location: current_reservations.php");
        exit();
    } else {
        $_SESSION["error"] = "Nie zaktualizowano rezerwacji";
        echo "<script>history.back();</script>";
        exit();
    }
} catch (mysqli_sql_exception $e) {
    $_SESSION["error"] = $e->getMessage();
    echo "<script>history.back();</script>";
}