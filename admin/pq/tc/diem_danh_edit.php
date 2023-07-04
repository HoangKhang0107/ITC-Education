<?php 
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_teacher.php'; 
 ?>

<div class="container-fluid">
<!--DataTables -->

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"> Sửa Chức Vụ</h6>
	</div>
	<div class="card-body">
		<?php

				
				if(isset($_POST['edit_btn']))
				{
					$id = $_POST['edit_id'];

					$query = "SELECT * FROM ca_hoc WHERE id = '$id' ";
					$query_run= mysqli_query($connection,$query);
					foreach ($query_run as $row) 
					{
						 ?>
			
						<form action="diem_danh_code.php" method="POST">
							<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
							
							<div class="form-group">
								<label> Mã Ca Học </label>
								<input type="text" name="ma_ca" value="<?php echo $row['MaCaHoc'] ?>" class="form-control" >
							</div>

							<div class="form-group">
								<label> Mã Lớp </label>
								<input type="text" name="ma_lop" value="<?php echo $row['MaLop'] ?>" class="form-control" >
							</div>

							<div class="form-group">
								<label> Mã Giáo Viên </label>
								<input type="text" name="ma_gv" value="<?php echo $row['MaGV'] ?>" class="form-control" >
							</div>

							<div class="form-group">
								<label> Mô Tả</label>
								<input type="text" name="mo_ta" value="<?php echo $row['MoTa'] ?>" class="form-control" >
							</div>
							<div class="form-group">
								<label> Ngày </label>
								<input type="date" name="ngay" value="<?php echo $row["Ngay"]; ?>" class="form-control" >
							</div>

							<div class="form-group">
								<label> Giờ </label>
								<input type="time" name="gio" value="<?php echo $row['Gio'] ?>" class="form-control" >
							</div>

							<div class="form-group">
								<label> Nội Dung </label>
								<input type="text" name="noi_dung" value="<?php echo $row['NoiDung'] ?>" class="form-control" >
							</div>

							<div class="form-group">
								<label> Nhận Xét Chung </label>
								<input type="text" name="nhan_xet_chung" value="<?php echo $row['NhanXetChung'] ?>" class="form-control" >
							</div>
							<button type="submit" name="update_btn" class="btn btn-primary"> Update</button>
							<a href="diem_danh.php" class="btn btn-danger"> CANCEL </a>	
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