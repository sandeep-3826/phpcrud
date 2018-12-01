<?php 
$title = "Update || Details";
include ("header.php"); 
include ("config/dbcon.php");
session_start();
$sid = $_SESSION['sid'];
if($sid == ""){
    header("location:index.php");
}
extract ($_POST);

$id = $_GET['id'];
$sel = mysqli_query($conn , "select * from details where id='$id'");
$arr = mysqli_fetch_assoc($sel);

if(isset($update)) {
    @$fn = $_FILES['att']['name'];
    $ext = pathinfo($fn , PATHINFO_EXTENSION);
    if($ext === "jpg" || $ext === "png" || $ext==="jpeg") {
        $fnn = rand().".$ext";
        if(mysqli_query($conn , "update details set name='$name',email='$email',password='$password',phone='$phone',image='$fnn' where id='$id' ")) {
            move_uploaded_file($_FILES['att']['tmp_name'],"images/$fnn");
            header("location:dashboard.php");
            ?>
                <script>
                    alert("data updated successfully");
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
    }
    else {
        ?>
            <script>
                alert("error! only jpg and png images are allowed");
            </script>
        <?php
    }
}
?>

<section>
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>PHP Crud Operation</h1>
                <p class="text-center"><a href="logout.php" class="btn btn-primary">Logout</a></p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Update Here</h2>
                <form action="" method="post" enctype="multipart/form-data" id="myForm">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $arr['name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $arr['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo $arr['password']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" placeholder="Phone" value="<?php echo $arr['phone']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="att" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="update" class="btn btn-primary" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php include ("footer.php"); ?>