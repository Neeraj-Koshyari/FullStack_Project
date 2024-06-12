<?php
    include "connection.php";

    if(isset($_POST['submit'])){
        $mail = $_POST['mail'];
        $password = $_POST['pass'];

        $sql = "SELECT * from logcheck";
        $result = mysqli_query($conn,$sql);

        if(!$result)    echo '<script>alert("no data found!!")</script>';
        else{
            while($row = mysqli_fetch_assoc($result)){
                $pass = $row['password'];
                if($pass == $password){
                    echo'<script>alert("login success!!")</script>';
                    header('location:home.php');
                }
            }
            echo '<script>alert("password not match!!")</script>';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <form method="post">
        Enter Email: <input type="email" name="mail"><br><br>
        Enter password: <input type="password" name="pass">
        <input type="submit" name="submit">
    </form>
</body>
</html>