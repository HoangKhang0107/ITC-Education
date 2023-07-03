<?php 
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_superadmin.php';
 ?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Khóa Học</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

        <div class="form-group">
                <label>Mã Khóa Học</label>
                <input type="text" name="ma_khoa_hoc" class="form-control" placeholder="Nhập mã khóa học" required>
            </div>
            <div class="form-group">
                <label>Tên Khóa Học</label>
                <input type="text" name="ten_khoa_hoc" class="form-control" placeholder="Nhập tên khóa học" required>
            </div>
            <div class="form-group">
                <label>Năm Học</label>
                <input type="text" name="nam_hoc" class="form-control" placeholder="Nhập năm học" required>
            </div>
             <div class="form-group">
                <label>Thời gian học</label>
                <input type="text" name="time" class="form-control" placeholder="Nhập thời gian học" required>
            </div>
        </div>
        <div class="modal-footer">           
            <button type="submit" name="addkhoahoc" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Quản Lý Khóa Học</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
        Thêm Khóa Học 
      </button>
 
  </div>

        <div class="card-body">

        <?php 
        if(isset($_SESSION['success'])&& $_SESSION['success']!='')
        {
        	echo '<h2 class="bg-primary text-white"> '.$_SESSION['success'].' </h2>';
        	unset($_SESSION['success']);
        }

        if(isset($_SESSION['status'])&& $_SESSION['status']!='')
        {
        	echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
        	unset($_SESSION['status']);
        }
         ?>

          <div class="table-responsive">

      	<?php  
      		
      		$query = "SELECT * FROM khoa_hoc";
      		$query_run= mysqli_query($connection,$query);
      	?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
           <th>STT </th>
           <th>Mã Khóa Học </th>
           <th>Tên Khóa Học </th>
           <th>Năm Học </th>
           <th>Thời gian học </th>
           <th>EDIT </th>
           <th>DELETE </th>
          </tr>
        </thead>
        <tbody>

        <?php 
        if(mysqli_num_rows($query_run)>0)
        {
          $serial_number=0;
         
          while ($row=mysqli_fetch_assoc($query_run)) 
          {
             $serial_number++;
            ?>      
            <tr>
                  <td> <?php echo $serial_number; ?></td>
                  <td> <?php echo $row['MaKhoaHoc']; ?></td>
                  <td> <?php echo $row['TenKhoaHoc']; ?></td>                 
                  <td> <?php echo $row['NamHoc']; ?> </td>
                  <td> <?php echo $row['ThoiGianHoc']; ?> </td>
                  <td>
                      <form action="khoa_hoc_edit.php" method="POST">
                          <input type="hidden" name="idd" value="<?php echo $row['id']; ?>" >
                          <button type="submit" name="edit_btnn" class="btn btn-success"> EDIT</button>                        
                      </form>
                  </td>
                  <td>
                      <form action="code.php" method="POST">
                        <input type="hidden" name="delete_KH" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete_btnn" class="btn btn-danger"> DELETE</button>
                      </form>
                  </td>
              </tr>
      <?php     
          }
        }
        else{
          echo "No record found";
        } 
      ?>
          
     	
        
        </tbody>
      </table>

    </div>
  </div>
</div>


 