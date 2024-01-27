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
        echo "";
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - HealthHub</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #307247;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: rgb(37, 115, 48);
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><b>ADMIN DASHBOARD</b></h1>

        <h2>User Information</h2>
        <table>
            <tr>
                <th>E-mail</th>
                <th>Username</th>
                <th>Password</th>
            </tr>

            <?php
            if ($userdataResult->num_rows > 0) {
                while ($row = $userdataResult->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row["email"] . '</td>';
                    echo '<td>' . $row["username"] . '</td>';
                    echo '<td>' . $row["password"] . '</td>';
                    echo '</tr>';
                }
            }
            ?>
        </table>

        <h2>Appointment Information</h2>
        <table>
            <tr>
                <th>Full Name</th>
                <th>User ID</th>
                <th>Phone No</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
            </tr>

            <?php
            if ($appointmentResult->num_rows > 0) {
                while ($row = $appointmentResult->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row["full_name"] . '</td>';
                    echo '<td>' . $row["userid"] . '</td>';
                    echo '<td>' . $row["phone"] . '</td>';
                    echo '<td>' . $row["appointment_date"] . '</td>';
                    echo '<td>' . $row["appointment_time"] . '</td>';
                    echo '</tr>';
                }
            }
            ?>
        </table>
    </div>
</body>
</html>

<?php
$connect->close();
?>