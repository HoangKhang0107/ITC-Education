<?php 

	class loginAccount {
		
		private function connect(){
			$con = mysqli_connect("localhost","root","","btl_cnm");
			if(!$con) {
				die("Không kết nối được với cơ sở dữ liệu!");
				exit();	
			}	
			else {
				mysqli_set_charset($con,"utf8");
				return $con;
			}
		}
		
		public function myLogin($user,$pass) {
			$link = $this->connect();
			$sql = "select MaTK, TenDangNhap, MatKhau, PhanQuyen, Trangthai from taikhoan where TenDangNhap='".$user."' and MatKhau='".$pass."' LIMIT 1";
			$result = mysqli_query($link, $sql);
			$i = mysqli_num_rows($result);
			@mysqli_close($link);
			if($i>0) {
				while($row=@mysqli_fetch_array($result)) {
					
					$matk = $row['MaTK'];
					$user = $row['TenDangNhap'];
					$reponse = $row['MatKhau'];
					$hash = $reponse;
					$hash_type = "md5";
					$email = "khangnguyenkl2001@gmail.com";
					$code = "a41c8a8876acd36e";
					$pass = file_get_contents("http://md5decrypt.net/Api/api.php?hash=".$hash."&hash_type=".$hash_type."&email=".$email."&code=".$code);
					$PhanQuyen = $row['PhanQuyen'];
					session_start();
					$_SESSION['matk'] = $matk;
					$_SESSION['user'] = $user;
					$_SESSION['pass'] = $pass;
					$_SESSION['Phanquyen'] = $PhanQuyen;
				}
					
				return 1;
			}	
			else {
				return 0;	
			}
		}
		
		public function confirmLogin($matk,$user,$pass) {
			$link = $this->connect();
			$sql = "select MaTK from taikhoan where MaTK='$matk' and TenDangNhap='$user' and MatKhau='$pass' LIMIT 1";
			$result = mysqli_query($link, $sql);
			$i = mysqli_num_rows($result);
			if($i!=1) {
				header('location: ../dangnhap.php');	
			}	
		}
			
	}
