<?php 
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_admin.php';
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

					$query = "SELECT * FROM lich_hoc WHERE id = '$id' ";
					$query_run= mysqli_query($connection,$query);
					foreach ($query_run as $row) 
					{
						 ?>
			
						<form action="lich_hoc_code.php" method="POST" enctype=multipart/form-data>
							<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
							<div class="form-group">
								<label> Tuần </label>
								<input type="text" name="tuan_hoc" value="<?php echo $row['tuan'] ?>" class="form-control" >
							</div>
							<div class="form-group">
								<label> Ghi Chú </label>
								<input type="text" name="ghi_chu" value="<?php echo $row['ghi_chu'] ?>" class="form-control" >
							</div>
							<div class="form-group">
								<label> Hình Ảnh </label>
								<input type="file" name="image" id="image" value="<?php echo $row['img'] ?>" class="form-control" >
							</div>

							<button type="submit" name="update_btn" class="btn btn-primary"> Update</button>
							<a href="lich_hoc.php" class="btn btn-danger"> CANCEL </a>	
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