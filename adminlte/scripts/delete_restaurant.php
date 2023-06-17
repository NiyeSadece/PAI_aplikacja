<?php
$error = 0;

if ($error != 0){
    echo "<script>history.back();</script>";
    exit();
}

require_once "connect.php";
$restaurantIdDelete = $_GET["restaurantIdDelete"];

// Sprawdź, czy parametr został przekazany
if (empty($restaurantIdDelete)) {
    header("location: ../pages/views/restaurants.php?restaurantDel=0");
    exit();
}

// Usuń stoliki
$sql = "DELETE FROM tables WHERE restaurant_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $restaurantIdDelete);
$stmt->execute();

// Sprawdź, czy usunięto stoliki
if ($stmt->affected_rows === -1) {
    header("location: ../pages/views/restaurants.php?restaurantDel=0");
    exit();
}

// Pobierz ID adresu
$stmt = $conn->prepare("SELECT address_id FROM restaurants WHERE restaurant_id = ?");
$stmt->bind_param("i", $restaurantIdDelete);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("location: ../pages/views/restaurants.php?restaurantDel=0");
    exit();
}

$row = $result->fetch_assoc();
$addressID = $row["address_id"];

// Usuń restaurację
$sql = "DELETE FROM restaurants WHERE restaurant_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $restaurantIdDelete);
$stmt->execute();

// Sprawdź, czy usunięto restaurację
if ($stmt->affected_rows === 0) {
    header("location: ../pages/views/restaurants.php?restaurantDel=0");
    exit();
}

// Usuń adres
$sql = "DELETE FROM address WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $addressID);
$stmt->execute();

// Sprawdź, czy usunięto adres
if ($stmt->affected_rows === 0) {
    header("location: ../pages/views/restaurants.php?restaurantDel=0");
} else {
    header("location: ../pages/views/restaurants.php?restaurantDel=$restaurantIdDelete");
}
