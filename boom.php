<?php
$localhost = "127.0.0.1";
$username = "root";
$passwd = "";
$dbname = "healthhub";

$connect = new mysqli($localhost, $username, $passwd, $dbname);
if ($connect->connect_error) {
    die("Connection failed");
}

$email = $_GET["email"];
$username = $_GET["username"];
$password = $_GET["password"];

$query = "INSERT INTO userdata (email, username, password) VALUES (?, ?, ?)";
$stmt = $connect->prepare($query);

if ($stmt) {
    $stmt->bind_param("sss", $email, $username, $password);
    if ($stmt->execute()) 
    {
        echo "Registration done successfully!";
        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Error: " . $connect->error;
}

$connect->close();
?>
