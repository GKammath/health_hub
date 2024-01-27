<?php
$localhost = "127.0.0.1";
$username = "root";
$passwd = "";
$dbname = "healthhub";

$connect = new mysqli($localhost, $username, $passwd, $dbname);
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
// Validate and retrieve data from the form
$name = isset($_POST["full_name"]) ? $_POST["full_name"] : '';
$userid = isset($_POST["userid"]) ? $_POST["userid"] : '';
$contact = isset($_POST["phone"]) ? $_POST["phone"] : '';
$date = isset($_POST["appointment_date"]) ? $_POST["appointment_date"] : '';
$time = isset($_POST["appointment_time"]) ? $_POST["appointment_time"] : '';

// Insert data into the 'appointment' table
$query = "INSERT INTO appointment (full_name, userid, phone, appointment_date, appointment_time) VALUES (?, ?, ?, ?, ?)";
$stmt = $connect->prepare($query);

if ($stmt) {
    $stmt->bind_param("sssss", $name, $userid, $contact, $date, $time);
    if ($stmt->execute()) {
        echo "Appointment booked successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Error: " . $connect->error;
}

// Query for userdata table
$userdataSql = "SELECT * FROM userdata";
$userdataResult = $connect->query($userdataSql);

// Query for appointment table
$appointmentSql = "SELECT * FROM appointment";
$appointmentResult = $connect->query($appointmentSql);
?>
