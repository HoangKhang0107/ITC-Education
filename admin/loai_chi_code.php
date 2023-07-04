<?php 
include 'security.php';

$connection->query("SET NAMES 'utf8'");
if (isset($_POST['add'])) 
{
	
	$loai = $_POST['loai']; 
 	$ten_loai = $_POST['ten_loai']; 	
 	$query = $connection->query("INSERT INTO loai_thu_chi(Loai,TenLoai) VALUES('$loai','$ten_loai')", MYSQLI_STORE_RESULT);
	
 	$query_run = mysqli_query($connection,$query);
 	if ($query_run) {	
 		$_SESSION['status']="Thêm Thất Bại";
 		header('Location: loai_chi.php ');
 	} else {
 	
 		$_SESSION['success']="Thêm Thành Công";
 		header('Location: loai_chi.php');
 		
 	}
 	
 }	


if(isset($_POST['update']))
 {
 		
 		$id =$_POST['edit_id'];
 		
 		$ten_loai =$_POST['ten_loai'];
 		$query= "UPDATE loai_thu_chi SET TenLoai ='$ten_loai' WHERE id ='$id'";
 		$query_run = mysqli_query($connection,$query);

 		if ($query_run) {
 		
 			$_SESSION['success']= "Your data is Updated";
 			header('Location: loai_chi.php');
 		} else {
 	
 			$_SESSION['status']= "Your data is NOT Updated";
 			header('Location: loai_chi.php');
 		}
 		
 }
 	
  
  if(isset($_POST['delete_cv']))
 {
 		$id = $_POST['delete_id'];
 		
 		$query= "DELETE FROM loai_thu_chi WHERE  id ='$id'";
 		$query_run = mysqli_query($connection,$query);

 		if ($query_run) {
 			
 			$_SESSION['success']= "Your data is Deleted";
 			header('Location: loai_chi.php');
 		} else {
 			
 			$_SESSION['status']= "Your data is NOT Deleted";
 			header('Location: loai_chi.php ');
 		}
 }

  ?>