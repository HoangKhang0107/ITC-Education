<?php
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_admin.php';
?>

<div class="container-fluid">
	<!--DataTables -->

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> Sửa Khách Hàng</h6>
		</div>
		<div class="card-body">
			<?php


			if (isset($_POST['edit_btn'])) {
				$id = $_POST['edit_id'];

				$query = "SELECT * FROM khach_hang_dang_ky WHERE id = '$id' ";
				$query_run = mysqli_query($connection, $query);
				foreach ($query_run as $row) {
			?>

					<form action="khach_hang_code.php" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
						<div class="form-group">
							<label>Họ Tên</label>
							<input type="text" name="hten" value="<?php echo $row['HoTen'] ?>" class="form-control">
						</div>
						<div class="form-group">
							<label>Số Điện Thoại</label>
							<input type="text" name="sdienthoai" value="<?php echo $row['Sdt'] ?>" class="form-control">
						</div>
						<div class="form-group">
							<label>Trình Độ Hiện Tại</label>
							<input type="text" name="tdo" value="<?php echo $row['TrinhDoHienTai'] ?>" class="form-control">
						</div>
						<div class="form-group">
							<label>Khóa Học</label>
							<input type="text" name="khoc" value="<?php echo $row['KhoaHoc'] ?>" class="form-control">
						</div>


						<div class="form-group">
							<label>Tình Trạng Tư Vấn</label>
							<select name="ttrang" class="form-control">
								<option value="Đã Tư Vấn">Đã Tư Vấn</option>
								<option value="Đợi Nhân Viên Tư Vấn">Đợi Nhân Viên Tư Vấn</option>
							</select>
						</div>


						<button type="submit" name="update_btn" class="btn btn-primary"> Update</button>
						<a href="khach_hang.php" class="btn btn-danger"> CANCEL </a>
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