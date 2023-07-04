<?php 
include 'security.php';
$connection->query("SET NAMES 'utf8'");

if (isset($_POST['add_lop'])) 
{
	$ma_lop = $_POST['ma_lop'];
	$ten_lop =$_POST['ten_lop'];
	
	 
 	$query = $connection->query("INSERT INTO lop_hoc(MaLop,TenLop) VALUES('$ma_lop','$ten_lop')", MYSQLI_STORE_RESULT);
	
 	$query_run = mysqli_query($connection,$query);
 	if ($query_run) {	
 		$_SESSION['status']="Thêm Thất Bại";
 		header('Location: pq/sa/lop_hoc.php ');
 	} else {
 	
 		$_SESSION['success']="Thêm Thành Công";
 		header('Location: pq/sa/lop_hoc.php');
 		
 	}
 	
 }	


if(isset($_POST['update_lop']))
 {
 		
 		$id = $_POST['edit_id'];
 		$ma_lop = $_POST['edit_ma_lop'];
	    $ten_lop=$_POST['edit_ten_lop'];
	    

 		$query= "UPDATE lop_hoc SET MaLop= '$ma_lop' TenLop ='$ten_lop' WHERE id ='$id'";
 		$query_run = mysqli_query($connection,$query);

 		if ($query_run) {
 		
 			$_SESSION['success']= "Cập nhật lớp học thành công";
 			header('Location: pq/sa/lop_hoc.php');
 		} else {
 	
 			$_SESSION['status']= "Cập nhật lớp học thất bại";
 			header('Location: pq/sa/lop_hoc.php');
 		}
 		
 }
 	
  
  if(isset($_POST['delete_btn']))
 {
 		$id = $_POST['delete_id'];
 		
 		$query= "DELETE FROM lop_hoc WHERE  id ='$id'";
 		$query_run = mysqli_query($connection,$query);

 		if ($query_run) {
 			
 			$_SESSION['success']= "Your data is Deleted";
 			header('Location: pq/sa/lop_hoc.php');
 		} else {
 			
 			$_SESSION['status']= "Your data is NOT Deleted";
 			header('Location: pq/sa/lop_hoc.php ');
 		}
 }

  ?>