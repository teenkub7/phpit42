<?php
include_once 'navbar.php';
include_once 'connect.php';
$username= $_GET['username'];
$sql = "DELETE FROM user WHERE username = '$username'";
$result = $con->query($sql);
if(!$result){
    echo "<script>alert('Error:ไม่สามารถลบข้อมูลได้');history.back();</script>";
}
?>