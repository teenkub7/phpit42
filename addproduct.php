<?php
include_once 'navbar.php';
if(isset($_POST['submit'])){
    include_once 'connect.php';
    $pro_name = $_POST['pro_name'];
    $pro_price = $_POST['pro_price'];
    $pro_amount = $_POST['pro_amount'];
    $pro_status = $_POST['pro_status'];
    if($pro_name == '' || $pro_price == '' || $pro_amount == '' || $pro_status == ''){
        echo "<script>alert('กรุณากรอกข้อมูลให้ครบทุกช่อง'); history.back();</script>";
    }else{
        $num= mysqli_num_rows($con->query("SELECT pro_name FROM product WHERE pro_name='$pro_name' "));
        if($num==1){
            echo "<script>alert('ชื่อสินค้านี้มีอยู่เเล้ว'); history.back();</script>";
        }else{
    $sql = "INSERT INTO product VALUES(' ','$pro_name','$pro_price','$pro_amount','$pro_status')";
    $result = $con->query($sql);
    if(!$result){
        echo "<script>alert('Error:ไม่สามารถเพิ่มข้อมูลได้'); history.back();</script>";
    }else{
        header('location:product.php');
    }
}//เช็คproduct
}//เช็คค่าว่าง
}//เช็คปุ่ม submit
?>
<div class="container mt-5 w-50">
    <div class="card">
        <div class="card-header bg-primary text-white">
            เพิ่มข้อมูลสินค้า
        </div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                <div class="mb-3">
                    <label class="form-label">ชื่อสินค้า</label>
                    <input type="text" name="pro_name" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">ราคาสินค้า</label>
                    <input type="text" name="pro_price" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">จํานวนสินค้า</label>
                    <input type="text" name="pro_amount" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">สถานะสินค้า</label>
                    <select name="pro_status" class="from-select">
                    <option value="1">สินค้าพร้อมจํานวน</option>
                    <option value="2">สินค้าหมด</option>
                     <option value="3">สินค้ายกเลิกจํานวน</option>
</select>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">บันทึกข้อมูล</button>
            </form>
        </div>
    </div>
</div>