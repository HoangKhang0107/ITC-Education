<?php  
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_superadmin.php';
 ?>

<div class="container-fluid">
<!--DataTables -->

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"> Sửa Tin Tức</h6>
	</div>
	<div class="card-body">
		<?php

				
				if(isset($_POST['edit_btn']))
				{
					$id = $_POST['edit_id'];

					$query = "SELECT * FROM tin_tuc WHERE id = '$id' ";
					$query_run= mysqli_query($connection,$query);
					foreach ($query_run as $row) 
					{
						 ?>
			
						<form action="tin_tuc_codesa.php" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
							<div class="form-group">
				                <label>Tựa Đề</label>
				                <input type="text" name="tuad" value="<?php echo $row['TuaDe'] ?>" class="form-control" >
            				</div>
							<div class="form-group">
				                <label>Tin Tức u</label>
				                <textarea name="tint" id="tt" rows="15" value="<?php echo $row['TinTuc'] ?>" class="form-control"></textarea> 				                
            				</div>
            				<div class="form-group">
				                <label>Hình Ảnh</label>
				                <input type="file" name="ima" value="<?php echo "<img src=anh_web/".$row['anh_slide']." />" ?>" class="form-control" >
				            </div>				           
				             <div class="form-group">
				                <label>Video</label>
				                <input type="text" name="vid" value="<?php echo $row['video'] ?>" class="form-control" >
				            </div>
				             <div class="form-group">
				                <label>Mã Nhân Viên</label>
				                <input type="text" name="manv" value="<?php echo $row['MaNhanVien'] ?>" class="form-control" >
				            </div>

							<button type="submit" name="update_btn" class="btn btn-primary"> Update</button>
							<a href="tai_lieusa.php" class="btn btn-danger"> CANCEL </a>	
						</form>
						<?php 
					}
				}	
						 ?>
	</div>
</div>
</div>
<script>CKEDITOR.replace('tt');

</script>
<?php 
include 'includes/scripts.php';
include 'includes/footer.php';
 ?> 