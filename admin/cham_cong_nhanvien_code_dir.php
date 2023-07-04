<?php 
include 'security.php';


$connection->query("SET NAMES 'utf8'");

if(isset($_POST['submit_diem']))
 {
   $ma_ca_hoc=$_POST['update_diemhs'];
   
   $records = mysqli_query($connection,"SELECT * FROM cham_cong WHERE  MaCaHoc= '$ma_ca_hoc'");
   $num= mysqli_num_rows($records);
   if ($num) 
   {
     
    foreach ($_POST['chamcong']  as $id => $chamcong) 
    {
      $ma_ca= $_POST['ma_ca'][$id];
      $ma_nhan_vien= $_POST['ma_nhan_vien'][$id];

      $chamcong= $_POST['chamcong'][$id];

      $ghi_chu= $_POST['ghi_chu'][$id];
      
      $query ="UPDATE `cham_cong` 
               SET `ChamCong`= '$chamcong',`Ghi_Chu`='$ghi_chu' 
               WHERE `MaCaHoc`='$ma_ca' AND `MaNhanVien` ='$ma_nhan_vien'";
     
      
      $query_run = mysqli_query($connection,$query);

      if ($query_run) {
      
        $_SESSION['success']= "Update Thành Công";
        header('Location: cham_cong_dir.php');
      } else 
      {
    
        $_SESSION['status']= "Update Thất Bại";
        header('Location: cham_cong_dir.php');
      }
    }
  }
  else
   {
  
      foreach ($_POST['chamcong']  as $id => $chamcong) 
    {
      
        $ma_ca= $_POST['ma_ca'][$id];
        $ma_nhan_vien= $_POST['ma_nhan_vien'][$id];
        $chamcong= $_POST['chamcong'][$id];
  
        $ghi_chu= $_POST['ghi_chu'][$id];

      $query = "
        INSERT INTO cham_cong(MaCaHoc,MaNhanVien,ChamCong,Ghi_Chu) 
        VALUES('$ma_ca','$ma_nhan_vien','$chamcong','$ghi_chu')";
      
      $query_run = mysqli_query($connection,$query);

      if ($query_run) 
      {
      
        $_SESSION['success']= "Chấm Công Thành Công";
        header('Location: cham_cong_dir.php');
      } else 
      {
    
        $_SESSION['status']= "Chấm Công Thất Bại";
        header('Location: cham_cong_dir.php');
      }
    }

  }

  }
 

  ?>