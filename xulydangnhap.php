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
    if($phanquyen == 1 && $trangthai == "Hoạt Động"){
        header('location: view/actors/adminitors/index_quantrivien.php');
    }
		if($phanquyen == 2 && $trangthai == "Hoạt Động"){
			header('location: view/actors/ministry/index_giaovu.php');
		}
			if($phanquyen == 3 && $trangthai == "Hoạt Động"){
				header('location: view/actors/teachers/index_giangvien.php');
			}
				if($phanquyen == 4 && $trangthai == "Hoạt Động"){
					header('location: view/actors/student/index_hocvien.php');
				}
					if($phanquyen == 5 && $trangthai == "Hoạt Động"){
						header('location: view/actors/director/index_giamdoctt.php');
					}
					else{
						echo '<script> alert("Tài khoản của bạn đã bị khóa. Vui lòng liên hệ CSKH để tìm hiểu thêm. XIn cảm ơn.");</script>';
						header( "refresh:0;url=login.php" ); 
					}	
}
?>