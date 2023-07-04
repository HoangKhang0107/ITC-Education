<?php 
  include 'security.php';

  include 'includes/header.php';
  include 'includes/navbar_superadmin.php';
 ?>

    <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Lịch Học</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="lich_hoc_code.php" method="POST" enctype=multipart/form-data>

        <div class="modal-body">           
            <div class="form-group">
                <label>Tuần Học</label>
                <input type="text" name="tuan_hoc" class="form-control">
            </div>
            
        </div>
        <div class="modal-body">           
            <div class="form-group">
                <label>Ghi Chú</label>
                <input type="text" name="ghi_chu" class="form-control">
            </div>
            
        </div>

        <div class="modal-body">           
            <div class="form-group">
                <label>Upload Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            
        </div>
        <div class="modal-footer">           
            <button type="submit" name="add" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Lịch Học</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
        Thêm Lịch Học
      </button>
 
  </div>

        <div class="card-body">

        <?php 
          if(isset($_SESSION['success'])&& $_SESSION['success']!='')
          {
            echo '
            <div class="alert alert-success">
              '.$_SESSION['success'].'
            </div>'
            ;
            unset($_SESSION['success']);
          }

          if(isset($_SESSION['status'])&& $_SESSION['status']!='')
          {
            echo '
            <div class="alert alert-danger">
              '.$_SESSION['status'].'
            </div>';
            unset($_SESSION['status']);
          }
        ?>

          <div class="table-responsive">

        <?php  
          
          $query = "SELECT * FROM lich_hoc";
          $query_run= mysqli_query($connection,$query);
        ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
           <th>STT </th>
           <th>Tuần Học </th>  
           <th>Ghi Chú </th>     
           <th>Hình Ảnh </th>      
           <th>EDIT </th>
           <th>DELETE </th>
          </tr>
        </thead>
        <tbody>

        <?php 
        $serial_number=0;

        if(mysqli_num_rows($query_run)>0)
        {
          while ($row=mysqli_fetch_assoc($query_run)) 
          {
            $serial_number++;
            $image = $row['img'];
            ?>      
            <tr>
                  <td> <?php echo $serial_number; ?></td>
                  <td> <?php echo $row['tuan']; ?></td>
                  <td> <?php echo $row['ghi_chu']; ?></td>
                
                  <td> <?php echo '<a href="upload/'.$row['img'].'" data-lightbox="image-1" data-title="'.$row['tuan'].'"> <img src="upload/'.$row['img'].'" width="100px;" height="100px" alt="Image"></a>' ?></td>
                  <td>
                      <form action="lich_hoc_editsa.php" method="POST">
                          <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>" >
                          <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>                        
                      </form>
                  </td>
                  <td>
                      <form action="lich_hoc_codesa.php" method="POST">
                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
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

                          

 <?php 
  include 'includes/scripts.php';
  include 'includes/footer.php';
   ?>