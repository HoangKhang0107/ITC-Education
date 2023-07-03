<?php 
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_ketoan.php';
 ?>

<div class="container-fluid">
<!--DataTables -->

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"> EDIT</h6>
	</div>
	<div class="card-body">
		<?php

				
				if(isset($_POST['edit_btn']))
				{

					$id = $_POST['edit_id'];

					$query = "SELECT * FROM thu_chi WHERE id = '$id' ";
					$query_run= mysqli_query($connection,$query);
					
                                   
					foreach ($query_run as $row) 
					{
						$thoigian = $row['NgayThang'];
                        $date = date("d-m-Y", strtotime($thoigian));

						 ?>
							
						<form action="quan_ly_thu_chi_code.php" method="POST">
							<input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>" >

							<div class="form-group" >
								<label> Ngày Tháng </label>
								<input type="date" name="ngay_thang"  disabled value="<?php echo $row['NgayThang']; ?>" class="form-control" >
							</div>
							<div class="form-group">
								<label> Thu/ Chi </label>
								<input type="text" name="thu_chi" disabled value="<?php echo $row['ThuChi']; ?>" class="form-control"  >
							</div>
	
							
							<div class="form-group" >
								<label> Loại </label>
								<input type="text" name="loai" value="<?php echo $row['Loai'] ?>" class="form-control"  >
							</div>
							<div class="form-group" >
								<label> Người </label>
								<input type="text" name="nguoi" value="<?php echo $row['Nguoi'] ?>" class="form-control"  >
							</div>
							
							<div class="form-group">
								<label> Nội Dung </label>
								<input type="text" name="noi_dung" value="<?php echo $row['NoiDung'] ?>" class="form-control" >
							</div>

							<div  class="form-group" >
								<label> Số Tiền Thu </label>
								<input type="text" name="tien_thu" value="<?php echo $row['SoTienThu'] ?>" class="form-control" >
							</div>
							
							<div  class="form-group" >
								<label> Số Tiền Chi</label>
								<input type="text" name="tien_chi" value="<?php echo $row['SoTienChi'] ?>" class="form-control" >
							</div>
							
							<div class="form-group">
								<label> Ghi Chú</label>
								<input type="text" name="ghi_chu" value="<?php echo $row['GhiChu'] ?>" class="form-control" >
							</div>
							<button type="submit" name="update_btn" class="btn btn-primary"> Update</button>
							<a href="quan_ly_thu_chi.php" class="btn btn-danger"> CANCEL </a>	
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

/*<div class="form-group">
				                <label> Thu/ Chi</label>
				                <select id="mySelect" onchange="changeDropdown(this.value);" name="thu_chi" class="form-control" value="<?php echo $row['ThuChi'] ?>">
				                  <option value="Thu"> Thu </option>            
				                  <option value="Chi"> Chi </option>
				                
				                </select>
				            </div>*/
 ?> 