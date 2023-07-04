<?php 
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_superadmin.php'; 
 ?>

<div class="container-fluid">
<!--DataTables -->

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"> Sửa Chức Vụ</h6>
	</div>
	<div class="card-body">
		<?php

				
				if(isset($_POST['edit_cv']))
				{
					$id = $_POST['edit_id'];

					$query = "SELECT * FROM chuc_vu WHERE id = '$id' ";
					$query_run= mysqli_query($connection,$query);
					foreach ($query_run as $row) 
					{
						 ?>
			
						<form action="chuc_vu_codesa.php" method="POST">
							<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
							<div class="form-group">
								<label> Chức Vụ </label>
								<input type="text" name="edit_chuc_vu" value="<?php echo $row['TenChucVu'] ?>" class="form-control" >
							</div>
							<button type="submit" name="update_cv" class="btn btn-primary"> Update</button>
							<a href="chuc_vu.php" class="btn btn-danger"> CANCEL </a>	
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