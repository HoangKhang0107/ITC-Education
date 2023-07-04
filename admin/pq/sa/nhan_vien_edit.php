<?php  
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_superadmin.php';
 ?>

<div class="container-fluid">
<!--DataTables -->

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"> Sửa Nhân Viên</h6>
	</div>
	<div class="card-body">
		<?php

				
				if(isset($_POST['edit_btn']))
				{
					$id = $_POST['edit_id'];

					$query = "SELECT * FROM nhan_vien WHERE id = '$id' ";
					$query_run= mysqli_query($connection,$query);
					foreach ($query_run as $row) 
					{
						 ?>
			
						<form action="pq/sa/nhan_vien_code.php" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
							<div class="form-group">
				                <label>Mã Nhân Viên</label>
				                <input type="text" name="ma_nhan_vien" value="<?php echo $row['MaNhanVien'] ?>" class="form-control" >
            				</div>
							<div class="form-group">
				                <label>Tên Nhân Viên</label>
				                <input type="text" name="ten_nhan_vien" value="<?php echo $row['TenNhanVien'] ?>" class="form-control" >
            				</div>
				            <div class="form-group">
				                <label>Địa Chỉ</label>
				                <input type="text" name="dia_chi" value="<?php echo $row['DiaChi'] ?>" class="form-control" >
				            </div>
				             <div class="form-group">
				                <label>Số Điện Thoại</label>
				                <input type="text" name="sdt" value="<?php echo $row['SDT'] ?>" class="form-control" >
				            </div>
				            
				            
				            <div class="form-group">
				                <label>Email</label>
				                <input type="text" name="email" value="<?php echo $row['Email'] ?>" class="form-control">
				            </div>

				            <div class="form-group">
				                <label>Trình Độ Học Vấn</label>
				                <input type="text" name="trinh_do" value="<?php echo $row['TrinhDo'] ?>" class="form-control" >
				            </div>
				            <div class="form-group">
				                <label>Ngày Sinh</label>
				                <input type="date" name="ngay_sinh" value="<?php echo $row['NgaySinh'] ?>" class="form-control" >
				            </div>
							<div class="form-group">
				                <label>Hình Ảnh</label>
				                <input type="file" name="image" value="<?php echo "<img src=anh_nhan_vien/".$row['image']." />" ?>" class="form-control" >
				            </div>
				            
				           
						 	<?php 
				              $chuc_vu ="SELECT * FROM chuc_vu";
				              $run = mysqli_query($connection,$chuc_vu);
				              if(mysqli_num_rows($run) > 0)
				              {
				                  ?>
				                  <div class="form-group">
				                    <label> Chức Vụ </label>
				                    <select name="chuc_vu" class="form-control ">                     
				                      <?php 
				                         foreach ($run as $row) 
				                         {
				                        ?>
				                           <option value="<?php echo $row['TenChucVu'] ?>" > <?php echo $row['TenChucVu'] ?> </option>
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
							<a href="pq/sa/nhan_vien.php" class="btn btn-danger"> CANCEL </a>	
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