<?php
include_once 'navbar.php';
include_once 'connect.php';
$username=$_GET['username'];
$sql = "SELECT * FROM user WHERE username = '$username' ";
$result = $con->query($sql);
$row=mysqli_fetch_array($result);
if(isset($_POST['submit'])){
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    if($password == '' || $fullname == '' || $email == '' ){
        echo "<script> alert('กรอกข้อมูลให้ครบถ้วนด้วยครับ')</script>";
    }else{
    $sql = "UPDATE user SET password ='$password',fullname = '$fullname',email='$email' 
    WHERE username = '$username'";
    $result = $con->query($sql);
    if(!$result){
        echo "<script> alert('ไม่สามารถเเก้ไขได้')</script>";
    }else{
        header('location:user.php');
}
   }//เช็คค่าว่าง
     }//เช็คการกดปุ่ม
?>
<div class="container mt-5 w-50">
    <div class="card">
        <div class="card-header bg-primary text-white">
            เเก้ไขข้อมูลuser
        </div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                <div class="mb-3">
                    <label class="form-label">Username</label>,
                    <input type="text" name="username" class="form-control" value="<?php echo $row['username']?>" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">password</label>
                    <input type="text" name="password" class="form-control" value="<?php echo $row['password']?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Fullname</label>
                    <input type="text" name="fullname" class="form-control" value="<?php echo $row['fullname']?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">email</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $row['email']?>">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">บันทึกข้อมูล</button>
            </form>
        </div>
    </div>
</div>