<?php
$localhost = "127.0.0.1";
$username = "root";
$passwd = "";
$dbname = "healthhub";

$connect = new mysqli($localhost, $username, $passwd, $dbname);
if ($connect->connect_error) {
    die("Connection failed");
}

$sql = "SELECT * FROM userdata";
$result = $connect->query($sql);
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
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row["email"] . '</td>';
                    echo '<td>' . $row["username"] . '</td>';
                    echo '<td>' . $row["password"] . '</td>';
                    echo '</tr>';
                }
            }
            ?>
        </table>
    </div>
</body>
</html>
