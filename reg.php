.<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registration - Health Hub</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .container {
            width: 300px;
            margin: 0 auto;
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            margin-top: 100px;
        }
        h2 {
            color: #307247;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #2d6341;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register for Health Hub</h2>
        <form action="boom.php" method="get">
            <input type="text" name="username" id="username" placeholder="Username" required><br>
            <input type="password" name="password" id="password" placeholder="Password" required><br>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required><br>
            <p class="error" id="password_error"></p>
            <input type="submit" value="Register">
        </form>
    </div>

   
</body>
</html>
