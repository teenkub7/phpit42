<?php
include_once 'navbar.php';
include_once 'connect.php';
$pro_id= $_GET['pro_id'];
$sql = "DELETE FROM product WHERE pro_id = '$pro_id'";
$result = $con->query($sql);
if(!$result){
    echo "<script>alert('Error:ไม่สามารถลบข้อมูลได้');history.back();</script>";
}else{
    header('location:product.php');
}
?>