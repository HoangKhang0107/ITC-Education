<?php 
include 'security.php';

$connection= mysqli_connect("localhost","root","","adminpanel");
$connection->query("SET NAMES 'utf8'");
if (isset($_POST['add_lop'])) 
{
	$ma_lop = $_POST['ma_lop'];
	$ten_lop =$_POST['ten_lop'];
	$giao_vien =$_POST['giao_vien'];
	$tinh_trang =$_POST['tinh_trang'];
	 
 	$query = $connection->query("INSERT INTO lop_hoc(MaLop,TenLop,MaGV,TinhTrang) VALUES('$ma_lop','$ten_lop','$giao_vien','$tinh_trang')", MYSQLI_STORE_RESULT);
	
 	$query_run = mysqli_query($connection,$query);
 	if ($query_run) {	
 		$_SESSION['status']="Thêm Thất Bại";
 		header('Location: lop_hoc_dir.php ');
 	} else {
 	
 		$_SESSION['success']="Thêm Thành Công"; 
 		header('Location: lop_hoc_dir.php');
 		
 	}
 	
 }	


if(isset($_POST['update_lop']))
 {
 		
 		$id = $_POST['id'];
 		$ma_lop = $_POST['ma_lop'];
	    $ten_lop=$_POST['ten_lop'];
	    $giao_vien = $_POST['giao_vien'];
	    $tinh_trang =$_POST['tinh_trang'];

 		$query= "UPDATE lop_hoc SET MaLop= '$ma_lop', TenLop ='$ten_lop', MaGV= '$giao_vien', TinhTrang ='$tinh_trang'  WHERE id ='$id'";
 		$query_run = mysqli_query($connection,$query);

 		if ($query_run) {
 		
 			$_SESSION['success']= "Your data is Updated";
 			header('Location: lop_hoc_dir.php');
 		} else {
 	
 			$_SESSION['status']= "Your data is NOT Updated";
 			header('Location: lop_hoc_dir.php');
 		}
 		
 }
 	
  
  if(isset($_POST['delete_btn']))
 {
 		$id = $_POST['delete_id'];
 		
 		$query= "DELETE FROM lop_hoc WHERE  id ='$id'";
 		$query_run = mysqli_query($connection,$query);

 		if ($query_run) {
 			
 			$_SESSION['success']= "Your data is Deleted";
 			header('Location: lop_hoc_dir.php');
 		} else {
 			
 			$_SESSION['status']= "Your data is NOT Deleted";
 			header('Location: lop_hoc_dir.php ');
 		}
 }

  ?>