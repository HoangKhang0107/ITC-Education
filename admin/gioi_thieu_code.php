<?php 
include 'security.php';
$connection->query("SET NAMES 'utf8'");
if(isset($_POST['update_btn']))
 { 
    
    $id =$_POST['edit_id'];
    $content_web = $_POST['content'];
    $anh = $_FILES['image']['name'];
    $vid = $_POST['vid'];

    $manv = $_POST['manv'];   

    $query= "UPDATE gioi_thieu SET Content ='$content_web', img='$anh', video ='$vid', MaNhanVien ='$manv' WHERE id ='$id'";
    $query_run = mysqli_query($connection,$query);

    if ($query_run) {
    
      $_SESSION['success']= "Sửa Thành Công";
      header('Location: gioi_thieu.php');
    } else {
  
      $_SESSION['status']= "Sửa Thất Bại";
      header('Location: gioi_thieu.php');
    }
    
 }
  

  ?>



   