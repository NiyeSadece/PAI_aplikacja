<?php
session_start();
require_once "./connect.php";

// Sprawdź, czy użytkownik jest zalogowany
if (!isset($_SESSION["logged"])) {
    // Jeśli użytkownik nie jest zalogowany, przekieruj go na stronę logowania lub wyświetl odpowiedni komunikat
    header("Location: login.php");
    exit();
}

// Obsłuż żądanie aktualizacji rezerwacji po zatwierdzeniu formularza
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sprawdź, czy przekazano parametr edit_reservation w żądaniu POST
    if (!isset($_POST["edit_reservation"])) {
        // Jeśli brakuje parametru edit_reservation, przekieruj użytkownika na stronę z błędem lub wyświetl odpowiedni komunikat
        echo "Brak rezerwacji do edycji";
        exit();
    }

    $reservationId = $_POST["edit_reservation"];

    $userId = $_SESSION["logged"]["user_id"];

    // Pobierz informacje o rezerwacji na podstawie przekazanego reservationId i userId
    $sql = "SELECT * FROM `reservations` WHERE reservation_id = $reservationId AND user_id = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows !== 1) {
        echo "Rezerwacja nie istnieje";
        exit();
    }

    $reservation = $result->fetch_assoc();
    $_SESSION["edit_reservationId"] = $reservationId;
    echo "test";
    // Aktualizuj rekord rezerwacji w bazie danych na podstawie przekazanego reservationId

    // Jeśli aktualizacja powiedzie się, przekieruj użytkownika z powrotem do `current_reservations.php` i wyświetl komunikat o sukcesie

   header("Location: ../pages/views/edit_reservation.php");
    exit();
}
?>