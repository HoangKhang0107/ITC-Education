<?php  
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_superadmin.php';
 ?>

<div class="container-fluid">
<!--DataTables -->

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"> Sửa Phụ Huynh</h6>
	</div>
	<div class="card-body">
		<?php

				
				if(isset($_POST['edit_btn']))
				{
					$id = $_POST['edit_id'];

					$query = "SELECT * FROM phu_huynh WHERE id = '$id' ";
					$query_run= mysqli_query($connection,$query);
					foreach ($query_run as $row) 
					{
						 ?>
			
						<form action="pq/sa/phu_huynh_code.php" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
							<div class="form-group">
				                <label>Mã Phụ Huynh</label>
				                <input type="text" name="ma_ph" value="<?php echo $row['MaPH'] ?>" class="form-control" >
            				</div>
							<div class="form-group">
				                <label>Tên Phụ Huynh</label>
				                <input type="text" name="tenph" value="<?php echo $row['TenPH'] ?>" class="form-control" >
            				</div>
				            <div class="form-group">
				                <label>Địa Chỉ</label>
				                <input type="text" name="dia_chi" value="<?php echo $row['Diachi'] ?>" class="form-control" >
				            </div>
				             <div class="form-group">
				                <label>Số Điện Thoại</label>
				                <input type="text" name="sdt" value="<?php echo $row['sdt'] ?>" class="form-control" >
				            </div>
				            
				            
				            <div class="form-group">
				                <label>Facebook</label>
				                <input type="text" name="fb" value="<?php echo $row['PhuHuynh_Fb'] ?>" class="form-control">
				            </div>

				            <div class="form-group">
				                <label>Mã Học Sinh</label>
				                <input type="text" name="hs" value="<?php echo $row['Mahs'] ?>" class="form-control" >
				            </div>				            
				          						 	

							<button type="submit" name="update_btn" class="btn btn-primary"> Update</button>
							<a href="pq/sa/phu_huynh.php" class="btn btn-danger"> CANCEL </a>	
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