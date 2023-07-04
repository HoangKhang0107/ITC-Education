<?php 
include 'security.php'; 
$connection->query("SET NAMES 'utf8'");

if (isset($_POST['add'])) 
{
  $id = $_POST['id'];
  $tuan_hoc = $_POST['tuan_hoc'];
  $ghi_chu = $_POST['ghi_chu']; 
  $image = $_FILES['image']['name'];

  if(file_exists("upload/".$_FILES["image"]["name"])) 
  {
       $store = $_FILES["image"]["name"];
       $_SESSION['status'] = "Hình Ảnh Đã Tồn Tại $store";
       header('Location:pq/sa/lich_hoc.php');
  }
  else
  {
      $query = "INSERT INTO lich_hoc(tuan,ghi_chu,img) VALUES('$tuan_hoc','$ghi_chu','$image')";
  
      $query_run = mysqli_query($connection,$query);

      if ($query_run) 
      { 
        move_uploaded_file($_FILES["image"]["tmp_name"],"upload/".$_FILES["image"]["name"]);
        $_SESSION['success']="Thêm Thành Công";
        header('Location: pq/sa/lich_hoc.php');
      } 
      else {
        
        $_SESSION['status']="Thêm Thất Bại";
        header('Location: pq/sa/lich_hoc.php ');
        
      }
  }

  
  
 }  



  
if(isset($_POST['update_btn']))
 {
    
    $id =$_POST['edit_id'];
    $tuan_hoc = $_POST['tuan_hoc'];
    $ghi_chu = $_POST['ghi_chu']; 
    $image = $_FILES['image']['name'];

    $query= "UPDATE lich_hoc SET tuan='$tuan_hoc', ghi_chu='$ghi_chu', img='$image'  WHERE id ='$id'";
    $query_run = mysqli_query($connection,$query);

    if ($query_run) {
    
        move_uploaded_file($_FILES["image"]["tmp_name"],"upload/".$_FILES["image"]["name"]);
        $_SESSION['success']="Sửa Thành Công";
        header('Location: pq/sa/lich_hoc.php');
    } else {
  
      $_SESSION['status']= "Sửa Thất Bại";
      header('Location: pq/sa/lich_hoc.php');
    }
    
 }
  
  
  if(isset($_POST['delete_btn']))
 {
    $id = $_POST['delete_id'];
    
    $query= "DELETE FROM lich_hoc WHERE  id ='$id'";
    $query_run = mysqli_query($connection,$query);

    if ($query_run) {
      
      $_SESSION['success']= "Xóa Thành Công";
      header('Location: pq/sa/lich_hoc.php');
    } else {
      
      $_SESSION['status']= "Xóa Thất Bại";
      header('Location: pq/sa/lich_hoc.php ');
    }
 }

  ?>