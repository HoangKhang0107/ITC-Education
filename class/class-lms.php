<?php

class lms
{

	private function connect()
	{
		$con = mysqli_connect("localhost", "root", "", "btl_cnm");
		if (!$con) {
			die("Không kết nối được với CSDL!");
			exit();
		} else {
			mysqli_set_charset($con, "utf8");
			return $con;
		}
	}
	public function laycot($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		$kq = '';
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$id = $row[0];
				$kq = $id;
			}
		}
		return $kq;
	}

	public function load_dstailieu($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$filetailieu = $row['Filetailieu'];
				echo '<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-info">
					  <div class="inner">
						<h4>' . $filetailieu . '</h4>
					  </div>
					  <a href="../uploadsTaiLieuGV/' . $filetailieu . '" class="small-box-footer" download >Tải tài liệu <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				  </div>';
			}
		} else {
			echo 'Không có dữ liệu file';
		}
	}
	public function load_dsnguoidung($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		$dem = 1;
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$MaTK = $row['MaTK'];
				$TenHV = $row['TenDangNhap'];
				$phanquyen = $row['PhanQuyen'];
				$Trangthai = $row['Trangthai'];
				echo '	<table cellpadding="0" cellspacing="0" border="0">
								<tbody>
								<tr>
									<td>' . $dem . '</td>
									<td>' . $TenHV . '</td>
									<td>' . $phanquyen . '</td>
									<td>' . $Trangthai . '</td>
									<td><a href="../../../controller/adminnitor/delete.php?matk=' . $MaTK . '" id="btn-basic-sm-delete">Xóa</a><a href="quantrivien_nguoidung_suanguoidung.php?matk=' . $MaTK . '" id="btn-basic-sm-edit">Sửa</a></td>
								</tr>
								</tbody>
							</table>';
				$dem++;
			}
		} else {
			echo 'Khong co du lieu!!!';
		}
	}
	public function load_dsnguoidungHV($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		$dem = 1;
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$MaTK = $row['MaTK'];
				$TenHV = $row['TenDangNhap'];
				$phanquyen = $row['PhanQuyen'];
				$Trangthai = $row['Trangthai'];
				$malh = $_REQUEST['malh'];
				echo '	<table cellpadding="0" cellspacing="0" border="0">
								<tbody>
								<tr>
									<td>' . $dem . '</td>
									<td>' . $TenHV . '</td>
									<td>' . $phanquyen . '</td>
									<td>' . $Trangthai . '</td>
									<td><a href="../../../controller/adminnitor/add.php?matk=' . $MaTK . '&malh='.$malh.'" id="btn-basic-sm-edit">Thêm vào lớp</a></td>
								</tr>
								</tbody>
							</table>';
				$dem++;
			}
		} else {
			echo 'Khong co du lieu!!!';
		}
	}
	public function load_dsnguoidungHVgiaovu($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		$dem = 1;
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$MaTK = $row['MaTK'];
				$TenHV = $row['TenDangNhap'];
				$phanquyen = $row['PhanQuyen'];
				$Trangthai = $row['Trangthai'];
				$malh = $_REQUEST['malh'];
				echo '	<table cellpadding="0" cellspacing="0" border="0">
								<tbody>
								<tr>
									<td>' . $dem . '</td>
									<td>' . $TenHV . '</td>
									<td>' . $phanquyen . '</td>
									<td>' . $Trangthai . '</td>
									<td><a href="../../../controller/ministry/add.php?matk=' . $MaTK . '&malh='.$malh.'" id="btn-basic-sm-edit">Thêm vào lớp</a></td>
								</tr>
								</tbody>
							</table>';
				$dem++;
			}
		} else {
			echo 'Khong co du lieu!!!';
		}
	}
	//------------------------------------------------------------------------------------------------------------------------------------//
	public function load_dslophoc($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		$dem = 1;
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$malh = $row['MaLH'];
				$tenlophoc = $row['TenLopHoc'];
				$siso = $row['SiSo'];
				$Trangthai = $row['Trangthai'];
				echo '	<table cellpadding="0" cellspacing="0" border="0">
								<tbody>
									<tr>
										<td>' . $dem . '</td>
										<td>' . $tenlophoc . '</td>
										<td>' . $siso . '</td>
										<td>' . $Trangthai . '</td>
										<td><a href="quantrivien_lophoc_themhocvienvaolophoc.php?malh=' . $malh . '" id="btn-basic-sm-edit">Thêm học viên</a></td>
									</tr>
								</tbody>
							</table>';
				$dem++;
			}
		} else {
			echo 'Khong co du lieu!!!';
		}
	}
	public function load_dslophocgiaovu($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		$dem = 1;
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$malh = $row['MaLH'];
				$tenlophoc = $row['TenLopHoc'];
				$siso = $row['SiSo'];
				$Trangthai = $row['Trangthai'];
				echo '	<table cellpadding="0" cellspacing="0" border="0">
								<tbody>
									<tr>
										<td>' . $dem . '</td>
										<td>' . $tenlophoc . '</td>
										<td>' . $siso . '</td>
										<td>' . $Trangthai . '</td>
										<td><a href="giaovu_lophoc_themhocvienvaolophoc.php?malh=' . $malh . '" id="btn-basic-sm-edit">Thêm học viên</a></td>
									</tr>
								</tbody>
							</table>';
				$dem++;
			}
		} else {
			echo 'Khong co du lieu!!!';
		}
	}
	public function load_dslophocnhapdiem($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		$dem = 1;
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$malh = $row['MaLH'];
				$tenlophoc = $row['TenLopHoc'];
				$siso = $row['SiSo'];
				$Trangthai = $row['Trangthai'];
				echo '	<table cellpadding="0" cellspacing="0" border="0">
								<tbody>
									<tr>
										<td><a href="quantrivien_diem_danhsachhocviencualophoc.php?malh=' . $malh . '">' . $dem . '</a></td>
										<td><a href="quantrivien_diem_danhsachhocviencualophoc.php?malh=' . $malh . '">' . $tenlophoc . '</a></td>
										<td><a href="quantrivien_diem_danhsachhocviencualophoc.php?malh=' . $malh . '">' . $siso . '</a></td>
										<td><a href="quantrivien_diem_danhsachhocviencualophoc.php?malh=' . $malh . '">' . $Trangthai . '</a></td>
										</tr>
									</tbody>
							</table>';
				$dem++;
			}
		} else {
			echo 'Khong co du lieu!!!';
		}
	}
	public function load_dslophocnhapdiemgiaovu($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		$dem = 1;
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$malh = $row['MaLH'];
				$tenlophoc = $row['TenLopHoc'];
				$siso = $row['SiSo'];
				$Trangthai = $row['Trangthai'];
				echo '	<table cellpadding="0" cellspacing="0" border="0">
								<tbody>
									<tr>
										<td><a href="giavu_diem_danhsachhocviencualophoc.php?malh=' . $malh . '">' . $dem . '</a></td>
										<td><a href="giavu_diem_danhsachhocviencualophoc.php?malh=' . $malh . '">' . $tenlophoc . '</a></td>
										<td><a href="giavu_diem_danhsachhocviencualophoc.php?malh=' . $malh . '">' . $siso . '</a></td>
										<td><a href="giavu_diem_danhsachhocviencualophoc.php?malh=' . $malh . '">' . $Trangthai . '</a></td>
										</tr>
									</tbody>
							</table>';
				$dem++;
			}
		} else {
			echo 'Khong co du lieu!!!';
		}
	}
	public function load_dshocviencualophoc($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		$dem = 1;
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$matk = $row['MaTK'];
				$hovaten = $row['Hovatennguoidung'];
				$ngaysinh = $row['Ngaysinh'];
				$sdt = $row['Sdt'];
				$cccd = $row['CCCD'];
				$malh = $row['MaLH'];
				echo '
								<tbody>
									<tr>
										<td>' . $dem . '</td>
										<td>' . $hovaten . '</td>
										<td>' . $ngaysinh . '</td>
										<td>' . $sdt . '</td>
										<td>' . $cccd . '</td>
										<td><a href="quantrivien_diem_Nhapdiem.php?matk=' . $matk . '&malh='.$malh.'" id="btn-basic-sm-edit">Nhập Điểm</a></td>
									</tr>
								</tbody>';
				$dem++;
			}
		} else {
			echo 'Khong co du lieu!!!';
		}
	}
	public function load_dshocviencualophocgiaovu($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		$dem = 1;
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$matk = $row['MaTK'];
				$hovaten = $row['Hovatennguoidung'];
				$ngaysinh = $row['Ngaysinh'];
				$sdt = $row['Sdt'];
				$cccd = $row['CCCD'];
				$malh = $row['MaLH'];
				echo '
								<tbody>
									<tr>
										<td>' . $dem . '</td>
										<td>' . $hovaten . '</td>
										<td>' . $ngaysinh . '</td>
										<td>' . $sdt . '</td>
										<td>' . $cccd . '</td>
										<td><a href="giaovu_diem_Nhapdiem.php?matk=' . $matk . '&malh='.$malh.'" id="btn-basic-sm-edit">Nhập Điểm</a></td>
									</tr>
								</tbody>';
				$dem++;
			}
		} else {
			echo 'Khong co du lieu!!!';
		}
	}
	//-----------------------------------------------------------------------------------------------------------------------------------//
	public function load_dssinhviendangkykhoahoc($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$mahv = $row['MaHV'];
				$tenhocvien = $row['TenHV'];
				$sdt = $row['SDT'];
				$ngaysinh = $row['Ngaysinh'];
				$diachi = $row['Diachi'];
				$email = $row['Email'];
				$khoahoc = $row['MaKH'];
				echo '<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
					  <div class="inner">
						<h4>Tên học viên: ' . $tenhocvien . '</h4>
						<p>Ngày sinh: ' . $ngaysinh . '</p>
						<p>SDT: ' . $sdt . '</p>
						<p>Địa chỉ: ' . $diachi . '</p>
						<p>Emai: ' . $email . '</p>
						<p>Khóa học đăng ký: ' . $khoahoc . '</p>
					  </div>
					</div>
				  </div>
						';
			}
		} else {
			echo 'Khong co du lieu!!!';
		}
	}
	public function load_dslophocGV($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$malh = $row['MaLH'];
				$tenlophoc = $row['TenLopHoc'];
				$siso = $row['SiSo'];
				$ngaybd = $row['NgayBD'];
				$ngaykt = $row['NgayKT'];
				echo '<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
					  <div class="inner">
						<h4>' . $tenlophoc . '</h4>
						<p>Sỉ số: ' . $siso . '</p>
						<p>Ngày bắt đầu: ' . $ngaybd . '</p>
						<p>Ngày kết thúc: ' . $ngaykt . '</p>
					  </div>
					  <div class="icon">
						<i class="ion ion-person-add"></i>
					  </div>
					  <a href="Loaddanhsachhocvien.php?id=' . $malh . '" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				  </div>
						';
			}
		} else {
			echo 'Khong co du lieu!!!';
		}
	}
	public function load_dsqllophoc($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$malh = $row['MaLH'];
				$tenlophoc = $row['TenLopHoc'];
				$siso = $row['SiSo'];
				$ngaybd = $row['NgayBD'];
				$ngaykt = $row['NgayKT'];
				echo '<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
					  <div class="inner">
						<h3>' . $tenlophoc . '</h3>
		
						<p>' . $siso . '</p>
					  </div>
					  <div class="icon">
						<i class="ion ion-person-add"></i>
					  </div>
					  <a href="Suathongtin.php?id=' . $malh . '" class="small-box-footer">Xem danh sách <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				  </div>
							';
			}
		} else {
			echo 'Khong co du lieu!!!';
		}
	}
	public function load_dshocvienlopday($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			echo '<table class="table">                
				<tr>
				<th class="table__heading" style="text-align: center;">STT</th>
				<th class="table__heading" style="text-align: center;">Mã Học Viên</th>
				<th class="table__heading" style="text-align: center;">Tên Học Viên</th>
				<th class="table__heading" style="text-align: center;">Lớp</th>
			  </tr>';
			$dem = 1;
			while ($row = mysqli_fetch_array($ketqua)) {
				$mahv = $row['MaHV'];
				$tenhocvien = $row['TenHV'];
				$lophoc = $row['TenLopHoc'];
				echo '  <tr>
								<td align="center" valign="middle">' . $dem . '</td>
								<td align="center" valign="middle">' . $mahv . '</td>
								<td align="center" valign="middle">' . $tenhocvien . '</td>
								<td align="center" valign="middle">' . $lophoc . '</td>
							</tr>';
				$dem++;
			}
			echo '</table>';
		} else {
			echo 'Khong co du lieu!!!';
		}
	}
	public function load_dslichhoc($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$malichhoc = $row['MaLichHoc'];
				$tenlophoc = $row['TenLopHoc'];
				$cahoc = $row['Thoigian'];
				$phonghoc = $row['Tenphong'];
				echo '<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
					  <div class="inner">
						<h4>' . $tenlophoc . '</h4>
						<p>Ca học: ' . $cahoc . '</p>

						<p>Phòng học: ' . $phonghoc . '</p>
					  </div>
					  <div class="icon">
						<i class="ion ion-person-add"></i>
					  </div>
					</div>
				  </div>
						';
			}
		} else {
			echo 'Khong co du lieu!!!';
		}
	}
	public function load_dslichday($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$tenlophoc = $row['TenLopHoc'];
				$thoigian = $row['ThoiGian'];
				$tenphonghoc = $row['TenPhongHoc'];
				$tengiaovien = $row['TenGV'];
				$ngayday = $row['MaLichHoc'];
				$ngaydayhoc = substr($ngayday, 0, 2);
				echo '<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
					  <div class="inner">
						<h4>' . $tenlophoc . '</h4>
						<p>Phòng học: ' . $tenphonghoc . '</p>
						<p>Thời gian: ' . $thoigian . '</p>
						<p>Giảng Viên: ' . $tengiaovien . '</p>
						<p>Ngày học: ' . $ngaydayhoc . '</p>
					  </div>
					</div>
				  </div>
							';
			}
		} else {
			echo 'Khong co du lieu!!!';
		}
	}
	public function load_dskhoahoc($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		$dem = 1;
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$makh = $row['MaKH'];
				$tenkhoahoc = $row['TenKH'];
				$Trangthai = $row['Trangthai'];
				$ngayBD = $row['NgayBD'];
				echo '	<table cellpadding="0" cellspacing="0" border="0">
								<tbody>
								<tr>
									<td>' . $dem . '</td>
									<td>' . $tenkhoahoc . '</td>
									<td>' . $ngayBD . '</td>
									<td>' . $Trangthai . '</td>
									<td><a href="./../../../controller/adminnitor/deletekh.php?makh=' . $makh . '" id="btn-basic-sm-delete">Xóa</a><a href="quantrivien_khoahoc_Sua.php?makh=' . $makh . '" id="btn-basic-sm-edit">Sửa</a></td>
								</tr>
								</tbody>
							</table>';
				$dem++;
			}
		} else {
			echo 'Khong co du lieu!!!';
		}
	}
	public function load_dskhoahocgiaovu($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		$dem = 1;
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$makh = $row['MaKH'];
				$tenkhoahoc = $row['TenKH'];
				$Trangthai = $row['Trangthai'];
				$ngayBD = $row['NgayBD'];
				echo '	<table cellpadding="0" cellspacing="0" border="0">
								<tbody>
								<tr>
									<td>' . $dem . '</td>
									<td>' . $tenkhoahoc . '</td>
									<td>' . $ngayBD . '</td>
									<td>' . $Trangthai . '</td>
									<td><a href="../../../controller/ministry/deletekh.php?makh=' . $makh . '" id="btn-basic-sm-delete">Xóa</a><a href="giaovu_khoahoc_Sua.php?makh=' . $makh . '" id="btn-basic-sm-edit">Sửa</a></td>
								</tr>
								</tbody>
							</table>';
				$dem++;
			}
		} else {
			echo 'Khong co du lieu!!!';
		}
	}
	public function load_dslichthi($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		$dem = 1;
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$malichthi = $row['MaLT'];
				$tenlophoc = $row['TenLopHoc'];
				$giothi = $row['GioThi'];
				$ngaythi = $row['NgayThi'];
				$phongthi = $row['PhongThi'];
				$siso = $row['SoLuongThiSinh'];

				echo '	<table cellpadding="0" cellspacing="0" border="0">
								<tbody>
									<tr>
										<td>' . $dem . '</td>
										<td>' . $tenlophoc . '</td>
										<td>' . $giothi . '</td>
										<td>' . $ngaythi . '</a></td>
										<td>' . $phongthi . '</td>
										<td>' . $siso . '</td>
										<td><a href="../../../controller/adminnitor/deletelt.php?malt=' . $malichthi . '" id="btn-basic-sm-delete">Xóa</a><a href="quantrivien_lichthi_Sua.php?malt=' . $malichthi . '" id="btn-basic-sm-edit">Sửa</a></td>
									</tr>
								</tbody>
							</table>';
				$dem++;
			}
		} else {
			echo 'Khong co du lieu!!!';
		}
	}
	public function load_selectionGV($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			echo '<select name="form-giangvien" id="form-giangvien" style="height: 40px; min-width: 400px; margin-top: 40px; border: 3px double navy; border-top-style: hidden; border-left-style: hidden; border-right-style: hidden; text-align: Center;">';
			while ($row = mysqli_fetch_array($ketqua)) {
				$magv = $row['MaGV'];
				$tengv = $row['TenGV'];
				echo '<option value="' . $magv . '">' . $tengv . '</option>';
			}
			echo '</select>';
		} else {
			echo 'Chưa có dữ liệu Giảng Viên.';
		}
	}
	// --------------------------------------------------------------------------------------------------
	public function load_selectionvaitro($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$phanquyen = $row['PhanQuyen'];
				echo '<option value="' . $phanquyen . '")>' . $phanquyen . '</option>';
			}
		} else {
			echo 'Chưa có dữ liệu Giảng Viên.';
		}
	}
	// ------------------------------------------------------------------------------------------------------------

	public function load_selectiontrangthai($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$MaTT = $row['MaTT'];
				$TrangThai = $row['TrangThai'];
				echo '<option value="' . $TrangThai . '")>' . $TrangThai . '</option>';
			}
		} else {
			echo 'Chưa có dữ liệu Giảng Viên.';
		}
	}
	// -----------------------------------------------------------------------------------------------------------------------

	public function load_selectiontrangthaiLH($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$TrangThai = $row['TrangThai'];
				echo '<option value="' . $TrangThai . '")>' . $TrangThai . '</option>';
			}
		} else {
			echo 'Chưa có dữ liệu Giảng Viên.';
		}
	}
	public function load_selectionPH($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$maph = $row['MaPH'];
				$tenph = $row['TenPhong'];
				echo '<option value="' . $tenph . '">' . $tenph . '</option>';
			}
		} else {
			echo 'Chưa có dữ liệu Phòng Học.';
		}
	}
	public function load_selectionPHLT($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			echo '<select name="form-phonghoc" id="form-phonghoc" style="text-align: center; height: 40px; min-width: 400px; margin-top: 40px; border: 3px double navy; border-top-style: hidden; border-left-style: hidden; border-right-style: hidden;">';
			while ($row = mysqli_fetch_array($ketqua)) {
				$maph = $row['MaPH'];
				$tenph = $row['TenPhong'];
				echo '<option value="' . $tenph . '">' . $tenph . '</option>';
			}
			echo '</select>';
		} else {
			echo 'Chưa có dữ liệu Phòng Học.';
		}
	}
	public function load_selectionKH($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$makh = $row['MaKH'];
				$tenkh = $row['TenKH'];
				echo '<option value="' . $makh . '">' . $tenkh . '</option>';
			}
		} else {
			echo 'Chưa có dữ liệu Lop Học.';
		}
	}
	public function load_selectioncahoc($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {

			while ($row = mysqli_fetch_array($ketqua)) {
				$macahoc = $row['MaCaHoc'];
				$thoigian = $row['Thoigian'];
				echo '<option value="' . $macahoc . '">' . $thoigian . '</option>';
			}
		} else {
			echo 'Chưa có dữ liệu Lop Học.';
		}
	}
	public function themxoasua($sql)
	{
		$link = $this->connect();
		if (mysqli_query($link, $sql)) {
			return 1;
		} else {
			return 0;
		}
	}
}
