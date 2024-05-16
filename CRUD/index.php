<?php
    include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        *{
            margin:0;
            font-family: Arial;
            border:border-box;
        }
        body{
            background-color: gray;
        }
        .box{
            text-decoration:none;
            color:white;
        }
        #nav{ 
            height:60px;
            background-color:#0F1111;
            color:white;
            display:flex;
            align-items:center;
            justify-content: space-evenly;
        }
        table {
            font-size:20px;
            border:1px solid black;
            border-collapse:collapse;
            width:90%;
            margin-left:70px;
            text-align: center;
        }
        th{
            height:50px;
            border:3px solid black;
            text-decoration: underline;
            background-color: #80ced6;
        }
        td{
            height:50px;
            border:2px solid black;
            background-color: #d5f4e6;
        }
        .button{
            height:30px;
            margin-right:20px;
            font-weight: bold;
            border-radius: 10px;
            border:1px solid black;
        }
        .submit{
            background-color:green;
            color:white;
            width:60px;
        }
        .cancel{
            background-color: red;
            color:white;
            width:80px;
        }
        .del{
            background-color: blue;
            color:white;
            width:80px;
        }
        .button:hover{
            cursor: pointer;
            font-size:13px;
        }
    </style>
</head>
<body>
    <nav id = "nav">
        <a href="" class="box">Home</a>
        <a href="edit.php" class="box">Edit</a>
        <a href="user.php" class="box">Add</a>
    </nav><br><br>
    <table>
        <tr>
            <th>Sr. no</th>
            <th>Student ID</th>
            <th>Name</th>
            <th>Course</th>
            <th>Email</th>
            <th>Operation</th>
        </tr>
        <?php
            $sql = "SELECT * FROM student";
            $result = mysqli_query($conn,$sql);

            if($result){
                $val = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['Std_ID'];
                    $name = $row['Name'];
                    $course = $row['Course'];
                    $email = $row['Email'];
                    echo '<tr>
                        <td>'.$val.'</td>
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td>'.$course.'</td>
                        <td>'.$email.'</td>
                        <td><button onclick="update('.$id.')" class="button submit">Update</button>
                        <button onclick="del('.$id.')" class="button del">Delete</button>
                        <button onclick="validate('.$id.')" class="button cancel">Delete All</button></td>
                    </tr>';
                    // <a href="update.php?UpdateId='.$id.'"></a>
                    // <a href="DeleteAll.php?DeleteAllId='.$id.'">Delete ALL</a>
                    $val++;
                }
            }
        ?>
    </table>
    <script>
        function update(id){
            window.location.href = "update.php?UpdateId="+id;
        }
        function del(id){
            window.location.href = "delete.php?DeleteId="+id;
        }
        function validate(id){
            confirmation = confirm("Are You Sure??");
            if(confirmation)    window.location.href = "DeleteAll.php?DeleteAllId="+id;
        }
    </script>
</body>
</html>
