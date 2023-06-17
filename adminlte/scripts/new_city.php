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

    $stmt = $conn->prepare("INSERT INTO `city` (`city`) VALUES (?);");

    $stmt->bind_param("s", $_POST["city"]);

    $stmt->execute();

    if ($stmt->affected_rows == 1){
        $_SESSION["success"] = "Dodano miasto";
        header("location: ../pages/views/cities.php");
        exit();
    }else{
        $_SESSION["error"] = "Nie dodano miasta";
        echo "<script>history.back();</script>";
        exit();
    }
} catch (mysqli_sql_exception $e) {
    $_SESSION["error"] = $e->getMessage();
    echo "<script>history.back();</script>";
}