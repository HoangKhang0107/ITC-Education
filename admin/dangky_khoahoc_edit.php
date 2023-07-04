<?php
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_admin.php';
?>

<div class="container-fluid">
	<!--DataTables -->

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> Sửa thông tin học viên</h6>
		</div>
		<div class="card-body">
			<?php


			if (isset($_POST['edit_btn'])) {
				$id = $_POST['edit_id'];

				$query = "SELECT * FROM hocviendangkykhoahoc WHERE id = '$id' ";
				$query_run = mysqli_query($connection, $query);
				foreach ($query_run as $row) {
			?>

					<form action="hoc_vien_code.php" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
						<div class="form-group">
							<label>Họ Tên</label>
							<input type="text" name="hten" value="<?php echo $row['TenHocVien'] ?>" class="form-control">
						</div>
						<div class="form-group">
							<label>Số Điện Thoại</label>
							<input type="text" name="sdienthoai" value="<?php echo $row['Sdt'] ?>" class="form-control">
						</div>
						<div class="form-group">
							<label>Khóa Học</label>
							<input type="text" name="lophoc" value="<?php echo $row['MaLopHoc'] ?>" class="form-control">
						</div>


						<div class="form-group">
							<label>Tình Trạng Tư Vấn</label>
							<select name="ttrang" class="form-control">
								<option value="Đã Tư Vấn">Đã Tư Vấn</option>
								<option value="Đợi Nhân Viên Tư Vấn">Đợi Nhân Viên Tư Vấn</option>
							</select>
						</div>


						<button type="submit" name="update_btn" class="btn btn-primary">Update</button>
						<a href="dangky_khoahoc.php" class="btn btn-danger"> CANCEL </a>
					</form>
			<?php
				}
			}
			?>
		</div>
	</div>
</div>

<?php
include 'includes/scripts.php';
include 'includes/footer.php';
?>