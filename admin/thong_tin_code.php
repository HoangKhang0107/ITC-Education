<?php 
include 'security.php';

$connection->query("SET NAMES 'utf8'");


if(isset($_POST['update_btn']))
 {
    
    $id =$_POST['edit_id'];
    $image = $_FILES['image']['name'];
    $giolam = $_POST['glam'];
    $facebook = $_POST['fbook'];
    $youtube = $_POST['ytube']; 
    $hotline = $_POST['hline'];
    $lienhe = $_POST['lhe'];
    
    $MaNhanVien = $_POST['mnv'];      

    $query= "
    UPDATE thongtin_web 
    SET logo ='$image',
        GioLam ='$giolam', 
        Facebook='$facebook', 
        Youtube='$youtube', 
        Hotline='$hotline', 
        Lienhe='$lienhe', 
        MaNhanVien='$mnv'
    WHERE stt ='$id'";
    $query_run = mysqli_query($connection,$query);

    if ($query_run) {
    
        move_uploaded_file($_FILES["image"]["tmp_name"],"anh_nhan_vien/".$_FILES["image"]["name"]);
        $_SESSION['success']="Sửa Thành Công";
        header('Location: thong_tin.php');
    } else {
  
      $_SESSION['status']= "Sửa Thất Bại";
      header('Location: thong_tin.php');
    }
  
    
 }
  
  ?>