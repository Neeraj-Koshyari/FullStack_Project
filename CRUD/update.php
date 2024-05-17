<?php
    include("connection.php");

    $id = $_GET["UpdateId"];
    $sql = "SELECT * FROM student WHERE Std_id=$id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    if(!$row){
        echo "<script>alert('Record Not Found!!');
        window.location.href = 'edit.php';
        </script>";
        // header("location:edit.php");
    }

    $name = $row["Name"];
    $course = $row["Course"];
    $email = $row["Email"];
    
    if(isset($_POST["update"])){
        $name = $_POST["name"];
        $course = $_POST["course"];
        $email = $_POST["email"];

        $sql = "UPDATE student SET Name = '$name', Course = '$course', email = '$email' WHERE Std_ID = $id";

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
            height:300px;
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
        <label class="margin" >Name: </label><input class="fill" type="text" value="<?php echo $name;?>" name="name" autocomplete="off" required><br><br>
        <label class="margin" >Course: </label><input class="fill" type="text" value="<?php echo $course;?>" name="course" autocomplete="off" required><br><br>
        <label class="margin" >Email: </label><input class="fill" type="email" value="<?php echo $email;?>" name="email" autocomplete="off" required><br><br>
        <input type="submit" name="update" value="Update" class="button submit">
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
