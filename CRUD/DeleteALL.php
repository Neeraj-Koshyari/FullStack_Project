<?php
    include("connection.php");
    if(isset($_GET["DeleteAllId"])){
        $id = $_GET["DeleteAllId"];

        $sql = "DELETE FROM student WHERE Std_ID=$id";
        $result = mysqli_query($conn,$sql);
        if($result){
            header("location:index.php");
        }
        else{
            die("Error occur in : ".mysqli_error($conn));
        }
    }
?>