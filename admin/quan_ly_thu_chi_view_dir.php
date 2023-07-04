


 <?php 
  include 'security.php';

  include 'includes/header.php';
  include 'includes/navbar_director.php';
 ?>


<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Quản Lý Thu Chi</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">    
      <a class="btn btn-info"  href="quan_ly_thu_chi_dir.php" >Back</a> 
 	  
  </div>
  <div class="table-responsive">

  <div class="card-body">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
           <th>STT </th>
           <th>Năm</th>            
           <th>Show</th>
          </tr>
        </thead>
        <tbody>

        <?php 
        $query = "SELECT  distinct Nam FROM thu_chi  ";
      	$query_run= mysqli_query($connection,$query);
        $serial_number=0;      
        if(mysqli_num_rows($query_run)>0)
        {
          while ($row=mysqli_fetch_assoc($query_run)) 
          {
             $serial_number++;            
            ?>      
           	<tr>
                  <td> <?php echo $serial_number; ?></td>
                  <th><?php echo $row['Nam']; ?></th>                  
                  <td>
                      <form action="quan_ly_thu_chi_show_dir.php" method="POST">
                        <input type="hidden" name="nam" value="<?php echo $row['Nam']; ?>">
                        <input type="submit" name="nam_id" value="Show " class="btn btn-primary">
                        
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

