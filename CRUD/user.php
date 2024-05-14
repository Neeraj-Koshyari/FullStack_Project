<?php
    include("connection.php");
    if(isset($_POST["submit"])){
        $id = $_POST["Std_ID"];
        $name = $_POST["name"];
        $course = $_POST["course"];
        $email = $_POST["email"];

        $sql = "INSERT INTO student (Std_ID, Name, Course, email) VALUES ($id, '$name', '$course', '$email')";

        $result = mysqli_query($conn,$sql);
        if(!$result){
            die("Error occur in : ".mysqli_error($conn));
        }
        else{
            header("location:index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <style>
        *{
            margin:0;
            font-family: Arial;
            border:border-box;
        }
        body{
            display:flex;
            justify-content: center;
            background-color: #80ced6;
        }
        .main{
            margin-top:40px;
            padding:30px;
            width:500px;
            border: 2px solid black;
            background-color: #d5f4e6;
            font-weight: bold;
            font-size:25px;
        }
        .margin{
            margin-right:10px;
        }
        .fill{
            width:100%;
            height:30px;
            font-size: 20px;
            border:1px solid black;
            border-radius: 3px;
            padding-left:10px;
        }
        .button{
            height:30px;
            width:60px;
            margin-right:20px;
            font-weight: bold;
            border-radius: 10px;
            border:1px solid black;
        }
        .submit{
            background-color:green;
            color:white;
        }
        .cancel{
            background-color: red;
            color:white;
        }
        .button:hover{
            cursor: pointer;
            font-size:13px;
        }
    </style>
</head>
<body>
    <div class="main">
    <form method="post">
        <lable class="margin">Student ID: </lable><input class="fill" type="number" placeholder="xxxxxxx" name="Std_ID" autocomplete="off" required><br><br>
        <lable class="margin">Name: </lable><input class="fill" type="text" placeholder="xyz" name="name" autocomplete="off" required><br><br>
        <lable class="margin">Course: </lable><input class="fill" type="text" placeholder="B.tech" name="course" autocomplete="off"><br><br>
        <lable class="margin">Email: </lable><input class="fill" type="email" placeholder="xyz@gmail.com" name="email" autocomplete="off"><br><br>
        <input type="submit" name="submit" class="button submit"><button class="button cancel" onclick="locate()">Cancel</button>
    </form>
    </div>
    <script>
        function locate(){
            window.location.href = "index.php";
        }
    </script>
</body>
</html>