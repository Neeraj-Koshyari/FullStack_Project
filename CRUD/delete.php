<?php
    include("connection.php");

    $id = $_GET["DeleteId"];
    $sql = "SELECT * FROM student WHERE Std_id=$id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    $name = $row["Name"];
    $course = $row["Course"];
    $email = $row["Email"];
    
    if(isset($_POST["update"])){
        $name = $_POST["name"];
        if(isset($_POST["namebox"]))    $name = "";
        
        $course = $_POST["course"];
        if(isset($_POST["coursebox"])) $course = "";

        $email = $_POST["email"];
        if(isset($_POST["emailbox"]))   $email = "";

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
            border: 2px solid black;
            background-color: #d5f4e6;
            font-weight: bold;
            /* font-size:25px; */
        }
        .margin{
            font-size:25px;
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
        <label class="margin" >Name: <div style="color:blue; display:inline;"><?php echo $name;?></div></label><input type="hidden" name="name" value="<?php echo $name; ?>"><br>
        Tick to Delete: <input type="checkbox" name="namebox"><br><br>
        <label class="margin" >Course: <div style="color:blue; display:inline;"><?php echo $course;?></div></label><input type="hidden" name="course" value="<?php echo $course; ?>"><br>
        Tick to Delete: <input type="checkbox" name="coursebox"><br><br>
        <label class="margin" >Email: <div style="color:blue; display:inline;"><?php echo $email;?></div></label><input type="hidden" name="email" value="<?php echo $email; ?>"><br>
        Tick to Delete: <input type="checkbox" name="emailbox"><br><br>
        <input type="submit" name="update" value="Delete" class="button submit">
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
