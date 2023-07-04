<?php 
include 'security.php';


$connection->query("SET NAMES 'utf8'");
if (isset($_POST['add_btn'])) 
{
  
  $ma_lop =$_POST['ma_lop'];  
  $ma_gv =$_POST['ma_gv']; 
  $mo_ta =$_POST['mo_ta'];
  $ngay =$_POST['ngay'];  
  $gio =$_POST['gio']; 
  $noi_dung =$_POST['noi_dung'];  
  $nhan_xet_chung =$_POST['nhan_xet_chung']; 

  $search1 ='-';
  $replace1 ='';
  $date = str_replace($search1, $replace1, $ngay);

  $search2 =':';
  $replace2 ='';
  $time = str_replace($search2, $replace2, $gio);

  $ma_ca= $date."_".$time."_".$ma_lop;


  $query = ("INSERT INTO `ca_hoc`(`MaCaHoc`, `MaLop`, `MaGV`, `MoTa`, `Ngay`, `Gio`, `NoiDung`, `NhanXetChung`) VALUES ('$ma_ca','$ma_lop','$ma_gv','$mo_ta','$ngay','$gio','$noi_dung','$nhan_xet_chung')");
  
  $query_run = mysqli_query($connection,$query);
  if ($query_run) {
    
      $_SESSION['success']= "Thêm Thành Công";
      header('Location: diem_danh_dir.php');
    } else {
  
      $_SESSION['status']= "Thêm Thất Bại";
      header('Location: diem_danh_dir.php');
    }
    
  
 }  


if(isset($_POST['update_btn']))
 {
    
    $id =$_POST['edit_id'];
    $ma_ca =$_POST['ma_ca'];
    $ma_lop =$_POST['ma_lop'];  
    $ma_gv =$_POST['ma_gv']; 
    $mo_ta =$_POST['mo_ta'];
    $ngay =$_POST['ngay'];  
    $gio =$_POST['gio']; 
    $noi_dung =$_POST['noi_dung'];  
    $nhan_xet_chung =$_POST['nhan_xet_chung']; 
    
    $query= "UPDATE `ca_hoc` SET `MaCaHoc`='$ma_ca',`MaLop`='$ma_lop',`MaGV`='$ma_gv',`MoTa`='$mo_ta',`Ngay`='$ngay',`Gio`='$gio',`NoiDung`='$noi_dung',`NhanXetChung`='$nhan_xet_chung' WHERE id = '$id'";
    $query_run = mysqli_query($connection,$query);

    if ($query_run) {
    
      $_SESSION['success']= "Your data is Updated";
      header('Location: diem_danh_dir.php');
    } else {
  
      $_SESSION['status']= "Your data is NOT Updated";
      header('Location: diem_danh_dir.php');
    }
    
 }
  
  
  if(isset($_POST['delete_btn']))
 {
    $id = $_POST['delete_id'];
    
    $query= "DELETE FROM ca_hoc WHERE  id ='$id'";
    $query_run = mysqli_query($connection,$query);

    if ($query_run) {
      
      $_SESSION['success']= "Your data is Deleted";
      header('Location: diem_danh_dir.php');
    } else {
      
      $_SESSION['status']= "Your data is NOT Deleted";
      header('Location: diem_danh_dir.php ');
    }
 } 


if(isset($_POST['submit']))
 {
   $ma_ca_hoc=$_POST['update_hs'];
   
   $records = mysqli_query($connection,"SELECT * FROM diem_danh WHERE  MaCaHoc= '$ma_ca_hoc'");
   $num= mysqli_num_rows($records);
   if ($num) 
   {
     
      foreach ($_POST['diem_danh']  as $id => $diem_danh) 
   {
      
    
      $ma_ca= $_POST['ma_ca'][$id];
      $ma_hoc_sinh= $_POST['ma_hoc_sinh'][$id];
      $diem_danh= $_POST['diem_danh'][$id];
      $diem= $_POST['diem'][$id];
      $ghi_chu= $_POST['ghi_chu'][$id];
      $link= $_POST['link'][$id];
      
      $query ="UPDATE `diem_danh` 
               SET `DiemDanh`= '$diem_danh',`Diem`='$diem',`Ghi_Chu`='$ghi_chu',`Link`='$link' 
               WHERE `MaCaHoc`='$ma_ca' AND `MaHocSinh` ='$ma_hoc_sinh'";
     
      
      $query_run = mysqli_query($connection,$query);

      if ($query_run) {
      
        $_SESSION['success']= "Update Thành Công";
        header('Location: diem_danh_dir.php');
      } else 
      {
    
        $_SESSION['status']= "Update Thất Bại";
        header('Location: diem_danh_dir.php');
      }
    }
  }
  else
   {
  
      foreach ($_POST['diem_danh']  as $id => $diem_danh) 
    {
      
    
      $ma_ca= $_POST['ma_ca'][$id];
      $ma_hoc_sinh= $_POST['ma_hoc_sinh'][$id];
      //$diem_danh= $_POST['diem_danh'][$id];
      $diem= $_POST['diem'][$id];
      $ghi_chu= $_POST['ghi_chu'][$id];
      $link= $_POST['link'][$id];

      $query = "
        INSERT INTO diem_danh(MaCaHoc,MaHocSinh,DiemDanh,Diem,Ghi_Chu,Link) 
        VALUES('$ma_ca','$ma_hoc_sinh','$diem_danh','$diem','$ghi_chu','$link')";
      
      $query_run = mysqli_query($connection,$query);

      if ($query_run) 
      {
      
        $_SESSION['success']= "Điểm Danh Thành Công";
        header('Location: diem_danh_dir.php');
      } else 
      {
    
        $_SESSION['status']= "Điểm Danh Thất Bại";
        header('Location: diem_danh_dir.php');
      }
    }

  }

  }
 

  ?>