<?php
include_once 'navbar.php';
if(isset($_POST['submit'])){
    include_once 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    if($username == '' || $password == '' || $fullname == '' || $email == ''){
        echo "<script>alert('กรุณากรอกข้อมูลให้ครบทุกช่อง'); history.back();</script>";
    }else{
        $num= mysqli_num_rows($con->query("SELECT username FROM user WHERE username='$username' "));
        if($num==1){
            echo "<script>alert('usernameมีอยู่เเล้ว'); history.back();</script>";
        }else{
    $sql = "INSERT INTO user VALUES('$username','$password','$fullname','$email')";
    $result = $con->query($sql);
    if(!$result){
        echo "<script>alert('Error:ไม่สามารถเพิ่มข้อมูลได้'); history.back();</script>";
    }else{
        header('location:user.php');
    }
}//เช็คusername
}//เช็คค่าว่าง
}//เช็คปุ่ม submit
?>
<div class="container mt-5 w-50">
    <div class="card">
        <div class="card-header bg-primary text-white">
            เพิ่มข้อมูลuser
        </div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Fullname</label>
                    <input type="text" name="fullname" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">บันทึกข้อมูล</button>
            </form>
        </div>
    </div>
</div>