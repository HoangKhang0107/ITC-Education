<?php 
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_ketoan.php';
 ?>

<div class="container-fluid"> 
<!--DataTables -->

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"> Sửa Thông Tin Học Sinh</h6>
	</div>
	<div class="card-body">
		<?php

				
				if(isset($_POST['edit_btn']))
				{
					$id = $_POST['edit_id'];

					$query = "SELECT * FROM hoc_sinh WHERE id = '$id' ";
					$query_run= mysqli_query($connection,$query);
					foreach ($query_run as $row) 
					{
						 ?>
			
						<form action="pq/kt/hoc_sinh_code.php" method="POST">
							<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

							<div class="form-group">
				                <label>Mã Học Sinh</label>
				                <input type="text" name="ma_hs" value="<?php echo $row['MaHocSinh'] ?>" class="form-control" >
				            </div>
							<div class="form-group">
				                <label>Tên Học Sinh</label>
				                <input type="text" name="ten_hs" value="<?php echo $row['TenHocSinh'] ?>" class="form-control" >
            				</div>
				            
				             <div class="form-group">
				                <label>Ngày Sinh</label>
				                <input type="date" name="ngay_sinh" value="<?php echo $row['NgaySinh'] ?>" class="form-control" >
				            </div>
				            
				            
				            <div class="form-group">
				                <label>Phụ Huynh</label>
				                <input type="text" name="phu_huynh" value="<?php echo $row['PhuHuynh'] ?>" class="form-control">
				            </div>				            
				            
				            <div class="form-group">
				                <label>SĐT</label>
				                <input type="text" name="sdt" value="<?php echo $row['PhuHuynh_Sdt'] ?>" class="form-control" >
				            </div>

				            <div class="form-group">
				                <label>Địa Chỉ</label>
				                <input type="text" name="dia_chi" value="<?php echo $row['DiaChi'] ?>" class="form-control" >
				            </div>

				            <div class="form-group">
				                <label>Ghi Chú</label>
				                <input type="text" name="ghi_chu" value="<?php echo $row['GhiChu'] ?>" class="form-control" >
				            </div>
				            <?php 
			                      $lop ="SELECT * FROM lop_hoc ORDER BY MaLop";
			                      $run = mysqli_query($connection,$lop);
			                      if(mysqli_num_rows($run) > 0)
			                      {

			                          ?>
			                          <div class="form-group">
			                            <label>Lớp Học </label>
			                            <select name="lop" class="form-control ">                     
			                              <?php 
			                                 foreach ($run as $row) 
			                                 {
			                                ?>
			                                   <option value="<?php echo $row['MaLop'] ?>" > <?php echo $row['MaLop'] ?> </option>
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
							<button type="submit" name="update_btn" class="btn btn-primary"> Update</button>
							<a href="pq/kt/hoc_sinh.php" class="btn btn-danger"> CANCEL </a>	
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