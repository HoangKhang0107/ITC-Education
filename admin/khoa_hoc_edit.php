<?php
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_superadmin.php';
?>

<div class="container-fluid">
	<!--DataTables -->

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Sửa Khóa Học</h6>
		</div>
		<div class="card-body">
			<?php


			if (isset($_POST['edit_btnn'])) {
				$ID = $_POST['idd'];

				$query = "SELECT * FROM khoa_hoc WHERE id = '$ID' ";
				$query_run = mysqli_query($connection, $query);
				foreach ($query_run as $row) {
			?>

					<form action="code.php" method="POST">
          <!-- <div class="form-group">
                <label>ID</label>
                <input type="text" name="Id" value="<?php echo $row['id'] ?>" class="form-control" placeholder="">
            </div> -->
          <div class="form-group">
                <label>Mã Khóa Học</label>
                <input type="text" name="ma_khoa_hoc" value="<?php echo $row['MaKhoaHoc'] ?>" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label>Tên Khóa Học</label>
                <input type="text" name="ten_khoa_hoc" value="<?php echo $row['TenKhoaHoc'] ?>" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label>Năm Học</label>
                <input type="text" name="nam_hoc" value="<?php echo $row['NamHoc'] ?>" class="form-control" placeholder="">
            </div>
             <div class="form-group">
                <label>Thời gian học</label>
                <input type="text" name="time" value="<?php echo $row['ThoiGianHoc'] ?>" class="form-control" placeholder="">
            </div>
        </div>
        <div class="modal-footer">           
            <button type="submit" name="suakhoahoc" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
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