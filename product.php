<?php
include_once 'navbar.php';
include_once 'connect.php';
$sql = "SELECT * FROM product";
$result = $con->query($sql);
?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-success text-white">ข้อมูลสินค้า</div>
        <div class="card-body">
            <a href="addproduct.php" class="btn btn-outline-success mb-3"><i
                    class="bi bi-person-plus-fill"></i>เพื่อข้อมูล</a>
            <table class="table table-striped">
                <tr>
                    <th class="bg-success text-white">รหัสสินค้า</th>
                    <th class="bg-success text-white">ชื่อสินค้า</th>
                    <th class="bg-success text-white">ราคาสินค้า</th>
                    <th class="bg-success text-white">จํานวนสินค้า</th>
                    <th class="bg-success text-white">สถานะสินค้า</th>
                    <th class="bg-success text-white">Action</th>
                </tr>
                <?php
            while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td><?php echo $row['pro_id']?></td>
                    <td><?php echo $row['pro_name']?></td>
                    <td><?php echo $row['pro_price']?></td>
                    <td><?php echo $row['pro_amount']?></td>
                    <td><?php 
                    if($row['pro_status'] == 1){
                        echo "สินค้าพร้อมจําหน่าย";
                    }else if($row['pro_status'] == 2){
                        echo "สินค้าหมด";
                    }else if($row['pro_status'] == 3){
                        echo "สินค้ายกเลิกจําหน่าย";
                    }
                    ?></td>
                    <td>
                       <a href="edit_product.php?pro_id=<?php echo $row['pro_id']?>" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                       <a href="del_product.php?pro_id=<?php echo $row['pro_id']?> "onclick= "return confirm('ยืนยันการลบ')" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>