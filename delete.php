<?php 
$title = "Delete || Details";
include ("config/dbcon.php");
session_start();
$sid = $_SESSION['sid'];
if($sid == ""){
    header("location:index.php");
}
$id = $_GET['id'];
$del = mysqli_query($conn , "delete from details where id='$id' ");
if($del){
    header("location:dashboard.php");
    ?>
        <script>
            alert("data deleted successfully");
        </script>
    <?php
}
else {
    ?>
        <script>
            alert("error! something went wrong");
        </script>
    <?php
}
?>