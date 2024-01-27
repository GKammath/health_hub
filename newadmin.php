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
        // Successful execution, no need to echo anything
    } else {
        echo "Error executing query: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Error preparing statement: " . $connect->error;
}

$connect->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_type = $_POST["user_type"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check user type and redirect
    if ($user_type === "admin") {
        // Redirect to admin dashboard
        header("Location: dashboard.php");
        exit();
    } elseif ($user_type === "user") {
        // Redirect to user registration page
        header("Location: regform.html");
        exit();
    } else {
        // Handle invalid user type
        echo "Invalid user type";
    }
}
?>
