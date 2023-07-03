<?php 
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_superadmin.php';
 ?>

<div class="container-fluid">
<!--DataTables -->

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"> Sửa Lớp Học</h6>
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
			
						<form action="lop_hoc_codesa.php" method="POST">
							<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
							<div class="form-group">
								<label> Mã Lớp </label>
								<input type="text" name="ma_lop" value="<?php echo $row['MaLop'] ?>" class="form-control" >
							</div>
							<div class="form-group">
								<label> Tên Lớp Học </label>
								<input type="text" name="ten_lop" value="<?php echo $row['TenLop'] ?>" class="form-control" >
							</div>
							
				              <?php 
				              $chuc_vu ="SELECT * FROM nhan_vien Where ChucVu = 'Giáo Viên'";
				              $run = mysqli_query($connection,$chuc_vu);
				              if(mysqli_num_rows($run) > 0)
				              {

				                  ?>
				                  <div class="form-group">
				                    <label> Giáo Viên </label>
				                    <select name="giao_vien" class="form-control ">                     
				                      <?php 
				                         foreach ($run as $row) 
				                         {
				                        ?>
				                           <option value="<?php echo $row['MaNhanVien'] ?>" > <?php echo $row['MaNhanVien'] ?> - <?php echo $row['TenNhanVien'] ?> </option>
				                       <?php     
				                         }
				                      ?>                                                    
				                    </select>
				                  </div>
				                 <?php
				              }
				              else{
				                echo "No Data Available";
				              }           
				             ?>    
							<div class="form-group">
				                <label> Tình Trạng</label>
				                <select name="tinh_trang" class="form-control" >
				                  <option value="Đã Học Xong"> Đã Học Xong </option> 	
				                  <option value="Đang Học"> Đang Học </option>            
				                  <option value="Dự Kiến"> Dự Kiến </option>             
				                </select>
				            </div>
							<button type="submit" name="update_lop" class="btn btn-primary"> Update</button>
							<a href="lop_hocsa.php" class="btn btn-danger"> CANCEL </a>	
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