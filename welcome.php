<html>
    <head>
    </head>
    <body>
        <b>WELCOME</b>
        <?php
        include 'connection.php';
        $em = $_GET["email"];
        $uname = $_GET["username"];
        $pass = $_GET["password"];
        $cpass = $_GET["confirm_password"];
        echo $em,$uname,$pass,$cpass;
        $query="INSERT INTO userdata(email, username,password) VALUES($em,$uname,$pass)";
        $connect->query($query);
        ?>
        
    </body>
</html>