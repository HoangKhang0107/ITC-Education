<?php 
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_superadmin.php';
 ?> 

<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Thông Tin Giới Thiệu Trang Web</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  

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
          
          $stmt = $connection->prepare("SELECT * FROM gioi_thieu ");
          $stmt->execute();
          $result=$stmt->get_result();

        ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
        <thead align="center">
          <tr>    
            <th>STT</th>       
           <th>Content </th>
           <th>Ảnh </th>
           <th>Video </th>
           <th>Mã Nhân Viên </th>           
           <th>EDIT</th>           
          </tr>
        </thead>
        <tbody>
          <?php 
           $serial_number=0;
          while ($row=$result->fetch_assoc()) 
          {
            $serial_number++;           
            ?>    
            <tr>
                  <td> <?php echo $serial_number; ?></td>
                  <td> <?php echo $row['Content']; ?></td>               
                  <td> <?php echo '<img src="anh_web/'.$row['img'].'" width="100px;" height="100px" alt="Image">' ?></td>              
                  <td> <?php echo $row['video']; ?> </td>
                  <td> <?php echo $row['MaNhanVien']; ?> </td>                  
                  <td>
                      <form action="gioi_thieu_edit.php" method="POST">
                          <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>" >
                          <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>                        
                      </form>
                  </td>
                  
              </tr>
      <?php     
          }
     
      // ?>
              
        </tbody>
      </table>

    </div>
  </div>
</div>


 <?php 
  include 'includes/scripts.php'; 
  include 'includes/footer.php';
  ?>

  

 