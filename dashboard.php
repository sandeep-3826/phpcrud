<?php 
$title = "User || Dashboard";
include ("header.php");
include ("config/dbcon.php");
session_start();
$sid = $_SESSION['sid'];
if($sid == ""){
    header("location:index.php");
}
?>

<section>
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>Welcome to Dashboard</h1>
                <p class="text-center"><a href="logout.php" class="btn btn-primary">Logout</a></p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-responsive">
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Phone</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                        $sel = mysqli_query($conn , "select * from details");
                        if(mysqli_num_rows($sel)>0){
                            $sn = 1;
                            while($arr=mysqli_fetch_assoc($sel)){
                                ?>
                                    <tr>
                                        <td><?= $sn; ?></td>
                                        <td><?= $arr['name']; ?></td>
                                        <td><?= $arr['email']; ?></td>
                                        <td><?= $arr['password']; ?></td>
                                        <td><?= $arr['phone']; ?></td>
                                        <td><img src="images/<?= $arr['image']; ?>" width="100" height="100" alt=""></td>
                                        <td>
                                            <a href="edit.php?id=<?php echo $arr['id']; ?>" class="btn btn-warning">Edit</a>
                                            <a href="delete.php?id=<?php echo $arr['id']; ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                $sn++;
                            }
                        }
                    ?>
                    
                </table>
            </div>
        </div>
    </div>
</section>

<?php include ("footer.php"); ?>