<?php
    include("connection.php");

    if(isset($_POST["search"])){
        $id = $_POST["stdId"];
        header("location:update.php?UpdateId=$id");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
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
        form{
            display:inline;
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
            height:40px;
            width:70px;
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
            font-size:15px;
        }
    </style>
<body>
    <div class="main">
    <form method="post">
        <lable class="margin">Enter Student Id: </lable><input type="text" class="fill" name="stdId" required><br><br>
        <input type="submit" name="search" value="search" class="button submit">
    </form>
    <button class="button cancel" onclick="locate()">Cancel</button> 
    </div>
    <script>
        function locate(){
            window.location.href = "index.php";
        }
    </script>
</body>
</html>
