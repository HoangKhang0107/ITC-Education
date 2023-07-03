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

				
				if(isset($_POST['edit_btn']))
				{
					$id = $_POST['edit_id'];

					$query = "SELECT * FROM lop_hoc WHERE id = '$id' ";
					$query_run= mysqli_query($connection,$query);
					foreach ($query_run as $row) 
					{
						 ?>
			
						<form action="pq/sa/lop_hoc_code.php" method="POST">
							<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
							<div class="form-group">
								<label> Mã Lớp </label>
								<input type="text" name="edit_ma_lop" value="<?php echo $row['MaLop'] ?>" class="form-control" >
							</div>
							<div class="form-group">
								<label> Tên Lớp Học </label>
								<input type="text" name="edit_ten_lop" value="<?php echo $row['TenLop'] ?>" class="form-control" >
							</div>
							
							
							<button type="submit" name="update_lop" class="btn btn-primary"> Update</button>
							<a href="pq/sa/lop_hoc.php" class="btn btn-danger"> CANCEL </a>	
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