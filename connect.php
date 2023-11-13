<?php 
  $con = mysqli_connect("localhost","root","","phpit42");
if(!$con){
 die("ไม่สามารถเชื่อมต่อได้:".mysqli_connect_error());
}