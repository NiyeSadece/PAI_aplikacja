<?php
session_start();

// Sprawdź, czy użytkownik jest zalogowany
if (!isset($_SESSION["logged"])) {
    // Jeśli użytkownik nie jest zalogowany, przekieruj go na stronę logowania lub wyświetl odpowiedni komunikat
//    header("Location: login.php");
    exit();
}

$error = 0;


if ($error != 0){
    echo "<script>history.back();</script>";
    exit();
}

require_once "connect.php";

// Obsłuż żądanie aktualizacji rezerwacji po zatwierdzeniu formularza
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sprawdź, czy przekazano parametr edit_reservation w żądaniu POST
    if (!isset($_POST["delete_reservationId"])) {
        // Jeśli brakuje parametru edit_reservation, przekieruj użytkownika na stronę z błędem lub wyświetl odpowiedni komunikat
        echo "Brak rezerwacji do usunięcia";
        exit();
    }

    $deleteReservationId = $_POST["delete_reservationId"];

    $userId = $_SESSION["logged"]["user_id"];

    $sql = "DELETE FROM reservations WHERE `reservations`.`reservation_id` = $deleteReservationId";
    $conn->query($sql);

    if ($conn->affected_rows == 0) {
        echo "Rezerwacja nie istnieje";
        header("Location: ../scripts/current_reservations.php");
        exit();
    }else{
        header("Location: ../scripts/current_reservations.php");
    }


    exit();
}

