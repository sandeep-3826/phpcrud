<?php 
$title = "Login || Registration";
include ("header.php"); 
include ("config/dbcon.php");
extract($_POST);
if(isset($regis)) {
    @$fn = $_FILES['att']['name'];
    $ext = pathinfo($fn , PATHINFO_EXTENSION);
    if($ext === "jpg" || $ext === "png" || $ext==="jpeg") {
        $fnn = rand().".$ext";

        if(mysqli_query($conn , "insert into details(name,email,password,phone,image) values('$name','$email','$password','$phone','$fnn')")) {
            move_uploaded_file($_FILES['att']['tmp_name'],"images/$fnn");
            ?>
                <script>
                    alert("registration successfull");
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
                alert("only jpg and png images are allowed");
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
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h2>Login Here</h2>
                <form action="" method="post" id="myForm">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" class="btn btn-success" value="Login">
                    </div>
                </form>
            </div>
            <div class="col-md-7">
                <h2>Registration Here</h2>
                <form action="" method="post" enctype="multipart/form-data" id="registration">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="att" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="regis" class="btn btn-primary" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php 
    if(isset($login)) {
        $email = mysqli_real_escape_string($conn , htmlentities(trim($email)));
        $password = mysqli_real_escape_string($conn , htmlentities(trim($password)));

        $sel = mysqli_query($conn , "select * from details where email = '$email' ");
        $arr = mysqli_fetch_assoc($sel);

        if($email === $arr['email'] && $password=== $arr['password']) {
            session_start();
            $_SESSION['sid'] = $email;
            header("location:dashboard.php");
        }
        else {
            ?>
                <script>
                    alert("email or password is incorrect");
                </script>
            <?php
        }
    }
?>

<?php include ("footer.php"); ?>