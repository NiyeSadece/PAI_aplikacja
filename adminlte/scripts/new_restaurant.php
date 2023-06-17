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

    $cityID = $_POST["city"];
    $address = $_POST["address"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];

    $stmt = $conn->prepare("INSERT INTO `address` (`city_id`, `address`) VALUES (?, ?);");

    $stmt->bind_param("is", $cityID, $address);

    $stmt->execute();

    if ($stmt->affected_rows == 1){
        $_SESSION["success"] = "Dodano adres";
        $_SESSION["logged"]["address"] = $address;
    }else{
        $_SESSION["error"] = "Nie dodano adresu";
        echo "<script>history.back();</script>";
        exit();
    }

    $stmt = $conn->prepare("SELECT a.id FROM address a WHERE a.address = ?");
    $stmt->bind_param("s", $address);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $addressID = $row['id'];
    } else {
        $_SESSION["error"] = "Brak podanego adresu.";
        echo "<script>history.back();</script>";
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO `restaurants` (`name`, `phoneNumber`, `address_id`) VALUES (?, ?, ?);");

    $stmt->bind_param("ssi", $name, $phone, $addressID);

    $stmt->execute();

    if ($stmt->affected_rows == 1){
        $_SESSION["success"] = "Dodano restaurację";
    }else{
        $_SESSION["error"] = "Nie dodano restauracji";
        echo "<script>history.back();</script>";
        exit();
    }
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
        $_SESSION["error"] = "Brak restauracji o podanym adresie i mieście.";
        echo "<script>history.back();</script>";
        exit();
    }

    $restaurantID = $_SESSION["logged"]["restaurantId"];
    var_dump($restaurantID);
    if (!empty($restaurantID)) {
        $stmt = $conn->prepare("SELECT t.tableNumber, t.seats
        FROM tables t
        INNER JOIN restaurants r ON r.restaurant_id = t.restaurant_id
        WHERE r.restaurant_id = ?");
        $stmt->bind_param("i", $restaurantID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $availableTables = array();

            while ($row = $result->fetch_assoc()) {
                $tableNumber = $row["tableNumber"];
                $seats = $row["seats"];

                $availableTables[] = array("tableNumber" => $tableNumber, "seats" => $seats);
            }
            $_SESSION["logged"]["availableTables"] = $availableTables;
        }
    } else {
        $_SESSION["error"] = "Nieprawidłowy identyfikator restauracji.";
        echo "<script>history.back();</script>";
        exit();
    }


    header("Location: ../pages/views/tables.php");
        exit();

} catch (mysqli_sql_exception $e) {
    $_SESSION["error"] = $e->getMessage();
    echo "<script>history.back();</script>";
}
