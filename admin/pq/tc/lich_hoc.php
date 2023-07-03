<?php 
  include 'security.php';

  include 'includes/header.php';
  include 'includes/navbar_teacher.php';
 ?>

    <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        
      </div>
     
<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Lịch Học</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    
     
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