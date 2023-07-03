<?php 
include 'admin/database/dbconfig.php'; 

if (isset($_POST['them_kh'])) 
{
  $ten = $_POST['hoten'];
  $sdt = $_POST['sdt'];
  $trinhdo = $_POST['trinhdohoc'];
  $khoahoc = $_POST['khoahoc']; 
 

      $query = "
      INSERT INTO khach_hang_dang_ky(HoTen,Sdt,TrinhDoHIenTai,KhoaHoc, TinhTrang) 
      VALUES('$ten','$sdt','$trinhdo','$khoahoc', 'chưa tư vấn')"; 
      $query_run = mysqli_query($connection,$query);

      if ($query_run) 
      {                 
        header('Location: index.php');
      }  
  
}  
?>

