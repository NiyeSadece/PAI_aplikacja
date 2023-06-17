<?php

session_start();

require_once "./connect.php";

// Pobierz bieżące rezerwacje użytkownika
$userId = $_SESSION["logged"]["user_id"];

// Sprawdź, czy użytkownik o podanym ID istnieje w tabeli "reservations"
$sqlCheckUser = "SELECT user_id FROM reservations WHERE user_id = $userId";
$resultCheckUser = $conn->query($sqlCheckUser);

if ($resultCheckUser->num_rows > 0) {
    // Użytkownik istnieje w tabeli "reservations"

    $sql = "SELECT res.reservation_id, res.reservation_date, res.startTime, res.endTime, s.status, r.name AS restaurantName, a.address, t.tableNumber, t.seats
        FROM reservations res
        INNER JOIN restaurants r ON res.restaurant_id = r.restaurant_id
        INNER JOIN address a ON r.address_id = a.id
        INNER JOIN tables t ON res.table_id = t.table_id
        INNER JOIN status s ON res.status_id = s.id
        WHERE res.user_id = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Przygotuj tablicę na dane rezerwacji
        $reservations = [];

        // Dodaj dane rezerwacji do tablicy
        while ($row = $result->fetch_assoc()) {
            $reservationId = $row["reservation_id"];
            $reservationDate = $row["reservation_date"];
            $startTime = $row["startTime"];
            $endTime = $row["endTime"];
            $restaurantName = $row["restaurantName"];
            $address = $row["address"];
            $tableNumber = $row["tableNumber"];
            $seats = $row["seats"];
            $status = $row["status"];

            $reservation = [
                "reservationId" => $reservationId,
                "restaurantName" => $restaurantName,
                "address" => $address,
                "tableNumber" => $tableNumber,
                "seats" => $seats,
                "reservationDate" => $reservationDate,
                "startTime" => $startTime,
                "endTime" => $endTime,
                "status" => $status
            ];

            $reservations[] = $reservation;
        }

        // Zapisz dane rezerwacji w sesji
        $_SESSION["reservations"] = $reservations;

        // Przekieruj użytkownika na stronę "current_reservations.php"
        header("location: ../pages/views/current_reservations.php");
        exit();
    } else {
        $_SESSION["reservations"] = [];
        header("location: ../pages/views/current_reservations.php");
    }
} else {
    // Użytkownik nie istnieje w tabeli "reservations"
    $_SESSION["reservations"] = [];
    header("location: ../pages/views/current_reservations.php");
}



//session_start();
//
//require_once "./connect.php";
//
//// Pobierz bieżące rezerwacje użytkownika
//$userId = $_SESSION["logged"]["user_id"];
//$sql = "SELECT res.reservation_id, res.reservation_date, res.startTime, res.endTime, r.name AS restaurantName, a.address, t.tableNumber, t.seats
//        FROM reservations res
//        INNER JOIN restaurants r ON res.restaurant_id = r.restaurant_id
//        INNER JOIN address a ON r.address_id = a.id
//        INNER JOIN tables t ON res.table_id = t.table_id
//        WHERE res.user_id = $userId";
//$result = $conn->query($sql);
//
//if ($result->num_rows > 0) {
//    // Przygotuj tablicę na dane rezerwacji
//    $reservations = [];
//
//    // Dodaj dane rezerwacji do tablicy
//    while ($row = $result->fetch_assoc()) {
//        $reservationId = $row["reservation_id"];
//        $reservationDate = $row["reservation_date"];
//        $startTime = $row["startTime"];
//        $endTime = $row["endTime"];
//        $restaurantName = $row["restaurantName"];
//        $address = $row["address"];
//        $tableNumber = $row["tableNumber"];
//        $seats = $row["seats"];
//
//        $reservation = [
//            "reservationId" => $reservationId,
//            "restaurantName" => $restaurantName,
//            "address" => $address,
//            "tableNumber" => $tableNumber,
//            "seats" => $seats,
//            "reservationDate" => $reservationDate,
//            "startTime" => $startTime,
//            "endTime" => $endTime
//        ];
//
//        $reservations[] = $reservation;
//    }
//
//    // Zapisz dane rezerwacji w sesji
//    $_SESSION["reservations"] = $reservations;
//
//    // Przekieruj użytkownika na stronę "current_reservations.php"
//    header("location: ../pages/views/current_reservations.php");
//    exit();
//} else {
//    $_SESSION["reservations"] = [];
//    header("location: ../pages/views/current_reservations.php");
//}
//
//?>