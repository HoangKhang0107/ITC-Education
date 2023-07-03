<?php 
include 'security.php';


$connection->query("SET NAMES 'utf8'");

if(isset($_POST['submit_diem']))
 {
   $ma_ca_hoc=$_POST['update_diemhs'];
   
   $records = mysqli_query($connection,"SELECT * FROM diem WHERE  MaCaHoc= '$ma_ca_hoc'");
   $num= mysqli_num_rows($records);
   if ($num) 
   {
     
    foreach ($_POST['diemtk1']  as $id => $diemtk1) 
    {
      $ma_ca= $_POST['ma_ca'][$id];
      $ma_hoc_sinh= $_POST['ma_hoc_sinh'][$id];

      $diemtk1= $_POST['diemtk1'][$id];
      $diemtk2= $_POST['diemtk2'][$id];
      $diemtk3= $_POST['diemtk3'][$id];
      $diemgk= $_POST['diemgk'][$id];
      $diemck= $_POST['diemck'][$id];

      $ghi_chu= $_POST['ghi_chu'][$id];
      
      $query ="UPDATE `diem` 
               SET `DiemTK1`= '$diemtk1',`DiemTK2`= '$diemtk2',`DiemTK3`= '$diemtk3',`DiemGK`='$diemgk',`DiemCK`='$diemck',`Ghi_Chu`='$ghi_chu' 
               WHERE `MaCaHoc`='$ma_ca' AND `MaHocSinh` ='$ma_hoc_sinh'";
     
      
      $query_run = mysqli_query($connection,$query);

      if ($query_run) {
      
        $_SESSION['success']= "Update Thành Công";
        header('Location: diem_dir.php');
      } else 
      {
    
        $_SESSION['status']= "Update Thất Bại";
        header('Location: diem_dir.php');
      }
    }
  }
  else
   {
  
      foreach ($_POST['diemtk1']  as $id => $diemtk1) 
    {
      
        $ma_ca= $_POST['ma_ca'][$id];
        $ma_hoc_sinh= $_POST['ma_hoc_sinh'][$id];
        $diemtk1= $_POST['chamcong'][$id];
  
        $ghi_chu= $_POST['ghi_chu'][$id];

      $query = "
        INSERT INTO diem(MaCaHoc,MaHocSinh,DiemTK1,DiemTK2,DiemTK3,DiemGK,DiemCK,Ghi_Chu) 
        VALUES('$ma_ca','$ma_hoc_sinh','$diemtk1','$diemtk2','$diemtk3','$diemgk','$diemck','$ghi_chu')";
      
      $query_run = mysqli_query($connection,$query);

      if ($query_run) 
      {
      
        $_SESSION['success']= "Nhập điểm Thành Công";
        header('Location: diem_dir.php');
      } else 
      {
    
        $_SESSION['status']= "Nhập điểm Thất Bại";
        header('Location: diem_dir.php');
      }
    }

  }

  }
 

  ?>