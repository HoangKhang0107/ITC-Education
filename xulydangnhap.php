<?php
ob_start();
session_start();
if(isset($_SESSION['matk']))
{
	$layid_dangnhap = $_SESSION['matk'];
}
include("class/class-lms.php");
$p = new lms();
if(isset($_SESSION['matk']))
{
	$phanquyen = $p->laycot("SELECT PhanQuyen FROM taikhoan WHERE MaTK = '$layid_dangnhap' LIMIT 1");
	$trangthai = $p->laycot("SELECT Trangthai FROM taikhoan WHERE MaTK = '$layid_dangnhap' LIMIT 1");
    if($phanquyen == 1){
		if( $trangthai == "Hoạt động"){
			header('location: view/actors/adminitors/index_quantrivien.php');
		}
		else{
			echo '<script> alert("Tài khoản của bạn đã bị khóa. Vui lòng liên hệ CSKH để tìm hiểu thêm. XIn cảm ơn.");</script>';
			header( "refresh:0;url=login.php" ); 
		}	
    }
		if($phanquyen == 2 ){
			if( $trangthai == "Hoạt động"){
				header('location: view/actors/ministry/index_giaovu.php');
			}
			else{
				echo '<script> alert("Tài khoản của bạn đã bị khóa. Vui lòng liên hệ CSKH để tìm hiểu thêm. XIn cảm ơn.");</script>';
				header( "refresh:0;url=login.php" ); 
			}	
		}
			if($phanquyen == 3){
				if( $trangthai == "Hoạt động"){
				header('location: view/actors/teachers/index_giangvien.php');
				}
				else{
					echo '<script> alert("Tài khoản của bạn đã bị khóa. Vui lòng liên hệ CSKH để tìm hiểu thêm. XIn cảm ơn.");</script>';
					header( "refresh:0;url=login.php" ); 
				}	
			}
				if($phanquyen == 4 ){
					if( $trangthai == "Hoạt động"){
					header('location: view/actors/student/index_hocvien.php');
					}
					else{
						echo '<script> alert("Tài khoản của bạn đã bị khóa. Vui lòng liên hệ CSKH để tìm hiểu thêm. XIn cảm ơn.");</script>';
						header( "refresh:0;url=login.php" ); 
					}	
				}
					if($phanquyen == 5 ){
						if( $trangthai == "Hoạt động"){
						header('location: view/actors/director/index_giamdoctt.php');
						}
						else{
							echo '<script> alert("Tài khoản của bạn đã bị khóa. Vui lòng liên hệ CSKH để tìm hiểu thêm. XIn cảm ơn.");</script>';
							header( "refresh:0;url=login.php" ); 
						}	
					}

}
