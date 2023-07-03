<?php 
include 'security.php';

if (isset($_POST['dangky'])) 
{
    $email = $_POST['email'];
  $ten = $_POST['ten'];
  $sdt = $_POST['sdt'];
  $trinhdo = $_POST['trinhdohoc'];
  $khoahoc = $_POST['khoahoc']; 
 

      $query = "
      INSERT INTO hocviendangkykhoahoc(email,Sdt,TenHocVien,MaLopHoc) 
      VALUES('$email','$sdt','$ten', '$khoahoc')"; 
      $query_run = mysqli_query($connection,$query);

      if ($query_run) 
      { 
        header('Location: lop_hocst.php');
        echo '<script> alert("Đăng ký khóa học thành công.");</script>';
      }  
  
}
