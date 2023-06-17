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

    $stmt = $conn->prepare("INSERT INTO `tables` (`restaurant_id`, `tableNumber`,`seats`) VALUES (?, ?, ?);");

    $stmt->bind_param("iii", $_SESSION["logged"]["restaurantId"], $_POST["tableNumber"], $_POST["seats"]);

    $stmt->execute();

    if ($stmt->affected_rows == 1){
        $_SESSION["success"] = "Dodano stolik";
    }else{
        $_SESSION["error"] = "Nie dodano stolika";
        echo "<script>history.back();</script>";
        exit();
    }
    // Wykonaj zapytanie do bazy danych i pobierz aktualne dane stolików
    $stmt = $conn->prepare("SELECT t.tableNumber, t.seats
    FROM tables t
    WHERE t.restaurant_id = ?");
    $stmt->bind_param("i", $_SESSION["logged"]["restaurantId"]);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $availableTables = array();

        while ($row = $result->fetch_assoc()) {
            $tableNumber = $row["tableNumber"];
            $seats = $row["seats"];

            $availableTables[] = array("tableNumber" => $tableNumber, "seats" => $seats);
        }

        // Zaktualizuj dane stolików w sesji
        $_SESSION["logged"]["availableTables"] = $availableTables;
    }

    header("Location: ../pages/views/tables.php");
    exit();
} catch (mysqli_sql_exception $e) {
    $_SESSION["error"] = $e->getMessage();
    echo "<script>history.back();</script>";
}