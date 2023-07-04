<?php 
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_ketoan.php'; 
 ?>

<div class="container-fluid">
<!--DataTables -->

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"> Loại Thu Chi</h6>
	</div>
	<div class="card-body">
		<?php

				
				if(isset($_POST['edit_cv']))
				{
					$id = $_POST['edit_id'];

					$query = "SELECT * FROM loai_thu_chi WHERE id = '$id' ";
					$query_run= mysqli_query($connection,$query);
					foreach ($query_run as $row) 
					{
						 ?>
			
						<form action="loai_chi_code.php" method="POST">
							<input type="hidden" name="edit_id" value="<?php echo $id; ?>">
							<div class="form-group">
				                <label>Loại</label>
				                <input type="text" name="loai" class="form-control" disabled value="<?php echo $row['Loai'] ?>" >
				            </div>
			              
			               <div class="form-group">
				                <label>Tên Loại</label>
				                <input type="text" name="ten_loai" class="form-control" required="" value="<?php echo $row['TenLoai'] ?>" >
				            </div>
							<button type="submit" name="update" class="btn btn-primary"> Update</button>
							<a href="loai_chi.php" class="btn btn-danger"> CANCEL </a>	
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