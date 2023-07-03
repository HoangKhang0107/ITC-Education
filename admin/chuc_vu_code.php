<?php 
include 'security.php';

$connection->query("SET NAMES 'utf8'");
if (isset($_POST['add_cv'])) 
{
	$id = $_POST['id'];
 	$ten_chuc_vu = $_POST['ten_chuc_vu']; 	
 	$query = $connection->query("INSERT INTO chuc_vu(id,TenChucVu) VALUES('$id','$ten_chuc_vu')", MYSQLI_STORE_RESULT);
	
 	$query_run = mysqli_query($connection,$query);
 	if ($query_run) {	
 		$_SESSION['status']="Thêm Thất Bại";
 		header('Location: chuc_vu_dir.php ');
 	} else {
 	
 		$_SESSION['success']="Thêm Thành Công";
 		header('Location: chuc_vu_dir.php');
 		
 	}
 	
 }	


if(isset($_POST['update_cv']))
 {
 		
 		$id =$_POST['edit_id'];
 		$ten_chuc_vu =$_POST['edit_chuc_vu'];
 		
 		$query= "UPDATE chuc_vu SET TenChucVu ='$ten_chuc_vu' WHERE id ='$id'";
 		$query_run = mysqli_query($connection,$query);

 		if ($query_run) {
 		
 			$_SESSION['success']= "Your data is Updated";
 			header('Location: chuc_vu_dir.php');
 		} else {
 	
 			$_SESSION['status']= "Your data is NOT Updated";
 			header('Location: chuc_vu_dir.php');
 		}
 		
 }
 	
  
  if(isset($_POST['delete_cv']))
 {
 		$id = $_POST['delete_id'];
 		
 		$query= "DELETE FROM chuc_vu WHERE  id ='$id'";
 		$query_run = mysqli_query($connection,$query);

 		if ($query_run) {
 			
 			$_SESSION['success']= "Your data is Deleted";
 			header('Location: chuc_vu_dir.php');
 		} else {
 			
 			$_SESSION['status']= "Your data is NOT Deleted";
 			header('Location: chuc_vu_dir.php ');
 		}
 }

  ?>