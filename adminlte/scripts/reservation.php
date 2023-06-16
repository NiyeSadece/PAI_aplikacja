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

    $cityID = $_POST["city"]; //zwraca wartość city.id
    $address = $_POST["address"]; //zwraca wartość address.address
    $reservationDate = $_POST["reservation_date"];
    $startTime = $_POST["start_time"];
    $endTime = $_POST["end_time"];

    //Pobranie nazwy restauracji

    $sql = "SELECT r.name, r.restaurant_id
        FROM restaurants r
        INNER JOIN address a ON r.address_id = a.id
        INNER JOIN city c ON a.city_id = c.id
        WHERE a.address = '$address' AND c.id = '$cityID'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION["logged"]["restaurantName"] = $row["name"];
            $_SESSION["logged"]["restaurantId"] = $row["restaurant_id"];
        }
    } else {
        echo "Brak restauracji o podanym adresie i mieście.";
    }


    // Pobranie numeru stolika

    $sql = "SELECT t.tableNumber, t.seats, t.table_id
        FROM tables t
        INNER JOIN restaurants r ON r.restaurant_id = t.restaurant_id
        INNER JOIN address a ON r.address_id = a.id
        INNER JOIN city c ON a.city_id = c.id
        WHERE r.address_id = (SELECT id FROM address WHERE address = '$address') AND c.id = '$cityID'";

    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        $availableTables = array();

        while ($row = $result->fetch_assoc()) {
            $tableNumber = $row["tableNumber"];
            $seats = $row["seats"];
            $tableID = $row["table_id"];

            $_SESSION["logged"]["table_id"] = $tableID;
            $availableTables[] = array("tableNumber" => $tableNumber, "seats" => $seats);
        }

        $_SESSION["logged"]["availableTables"] = $availableTables;
        $_SESSION["logged"]["cityID"] = $cityID;
        $_SESSION["logged"]["address"] = $address;
        $_SESSION["logged"]["reservationDate"] = $reservationDate;
        $_SESSION["logged"]["startTime"] = $startTime;
        $_SESSION["logged"]["endTime"] = $endTime;


        header("Location: ../pages/views/show_tables.php");
        exit();
    } else {
        echo "Brak dostępnych stolików.";
    }














    //stary kod

//    if ($result->num_rows > 0) {
//
//
//        while ($row = $result->fetch_assoc()) {
//
//
//            $_SESSION["logged"]["cityID"] = $cityID;
//            $_SESSION["logged"]["address"] = $address;
//            $_SESSION["logged"]["reservationDate"] = $reservationDate;
//            $_SESSION["logged"]["startTime"] = $startTime;
//            $_SESSION["logged"]["endTime"] = $endTime;
//
//            header("Location: ../pages/views/show_tables.php");
//            exit();
//            // Tutaj możesz wyświetlić inne dane stolika, np. ilość miejsc (seats)
//        }
//    } else {
//        echo "Brak dostępnych stolików.";
//    }
//
//
//
} catch (mysqli_sql_exception $e) {
    $_SESSION["error"] = $e->getMessage();
    echo "<script>history.back();</script>";
}