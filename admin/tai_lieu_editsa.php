<?php  
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_superadmin.php';
 ?>

<div class="container-fluid">
<!--DataTables -->

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"> Sửa Tài Liệu</h6>
	</div>
	<div class="card-body">
		<?php

				
				if(isset($_POST['edit_btn']))
				{
					$id = $_POST['edit_id'];

					$query = "SELECT * FROM tai_lieu WHERE id = '$id' ";
					$query_run= mysqli_query($connection,$query);
					foreach ($query_run as $row) 
					{
						 ?>
			
						<form action="tai_lieu_codesa.php" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
							<div class="form-group">
				                <label>Tựa Đề</label>
				                <input type="text" name="tuade" value="<?php echo $row['TuaDe'] ?>" class="form-control" >
            				</div>
							<div class="form-group">
				                <label>Tóm Tắt</label>
				                <input type="text" name="tomtat" value="<?php echo $row['TomTat'] ?>" class="form-control" >
            				</div>
				            <div class="form-group">
				                <label>URL</label>
				                <input type="text" name="url" value="<?php echo $row['url'] ?>" class="form-control" >
				            </div>
				            <div class="form-group">
				                <label>Hình Ảnh</label>
				                <input type="file" name="image" value="<?php echo "<img src=anh_nhan_vien/".$row['img']." />" ?>" class="form-control" >
				            </div>
				             <div class="form-group">
				                <label>Mã Nhân Viên</label>
				                <input type="text" name="manv" value="<?php echo $row['MaNhanVien'] ?>" class="form-control" >
				            </div>

							<button type="submit" name="update_btn" class="btn btn-primary"> Update</button>
							<a href="tai_lieu.php" class="btn btn-danger"> CANCEL </a>	
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