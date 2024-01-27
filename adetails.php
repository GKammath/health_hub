<?php
$localhost = "127.0.0.1";
$username = "root";
$passwd = "";
$dbname = "healthhub";

$connect = new mysqli($localhost, $username, $passwd, $dbname);
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$name = $_POST["username"];
$pwd = $_POST["password"];

$query = "INSERT INTO admin (aname, apwd) VALUES (?, ?)";
$stmt = $connect->prepare($query);

if ($stmt) {
    $stmt->bind_param("ss", $name, $pwd);
    if ($stmt->execute()) {
        echo "Admin account created successfully!";
    } else {
        echo "Error executing query: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Error preparing statement: " . $connect->error;
}

$connect->close();
?>
