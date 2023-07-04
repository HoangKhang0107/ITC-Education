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
      <a class="btn btn-info"  href="quan_ly_thu_chi_view_dir.php" >Back</a>    
  </div>
  <div class="table-responsive">      
    <div class="card-body">
     <?php 
        if(isset($_POST['nam_id']))
        {
              $nam = $_POST['nam'];
           
        }
      ?>
      <p class="h3 mb-2 text-gray-800" align="center">Tổng thu chi năm <?php echo $nam ?></p>
    
       
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          
           <th>Thu</th> 
           <th>Chi</th>
           <th>Luỹ Kế</th>  
           
          </tr>
        </thead>
        <tbody>

        <?php 
        if(isset($_POST['nam_id']))
        {
              $nam = $_POST['nam'];
              $query ="SELECT * FROM thu_chi WHERE Nam = '$nam'";
              $query_run= mysqli_query($connection,$query);
              $tong_thu =0;
              $tong_chi =0;

          while ($row=mysqli_fetch_array($query_run)) 
          {                  
              $thu = $row['SoTienThu'];
              $chi = $row['SoTienChi'];
              $tong_thu = $tong_thu + $thu; 
              $tong_chi = $tong_chi + $chi;
              $luy_ke = $tong_thu - $tong_chi;  
            ?>      
           
      <?php 
       
          }
        }
       
        ?>
          <tr>                   
                  <td> <?php echo number_format($tong_thu); ?></td>
                  <td> <?php echo number_format($tong_chi); ?></td>
                  <td> <?php echo number_format($luy_ke); ?></td>                  
          </tr> 
      
        
        </tbody>
      </table>
       <br>
       

        <?php 
        if(isset($_POST['nam_id']))
        {
              
              $nam = $_POST['nam'];
              $query ="SELECT * FROM thu_chi WHERE Nam = '$nam' And Quy='1'";
              $query_run= mysqli_query($connection,$query);
              $tong_thu =0;
              $tong_chi =0;
           if(mysqli_num_rows($query_run)>0)
            {
                 
                     
              while ($row=mysqli_fetch_array($query_run)) 
              {                  
                  $thu = $row['SoTienThu'];
                  $chi = $row['SoTienChi'];
                  $tong_thu = $tong_thu + $thu; 
                  $tong_chi = $tong_chi + $chi;
                  $luy_ke = $tong_thu - $tong_chi;  
         
              }
              ?>
              <p class="h3 mb-2 text-gray-800" align="center">Tổng thu chi quý 1</p>
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                  
                   <th>Thu</th> 
                   <th>Chi</th>
                   <th>Luỹ Kế</th>  
                   
                  </tr>
                </thead>
                <tbody>
                <tr>                   
                      <td> <?php echo number_format($tong_thu); ?></td>
                      <td> <?php echo number_format($tong_chi); ?></td>
                      <td> <?php echo number_format($luy_ke); ?></td>                  
                </tr> 
                 </tbody>
                 </table>
              <?php
            }
           
           }
            ?>
     
       

        <?php 
        if(isset($_POST['nam_id']))
        {
              
              $nam = $_POST['nam'];
              $query ="SELECT * FROM thu_chi WHERE Nam = '$nam' And Quy='2'";
              $query_run= mysqli_query($connection,$query);
              $tong_thu =0;
              $tong_chi =0;
           if(mysqli_num_rows($query_run)>0)
            {
                 
                     
              while ($row=mysqli_fetch_array($query_run)) 
              {                  
                  $thu = $row['SoTienThu'];
                  $chi = $row['SoTienChi'];
                  $tong_thu = $tong_thu + $thu; 
                  $tong_chi = $tong_chi + $chi;
                  $luy_ke = $tong_thu - $tong_chi;  
         
              }
              ?>
              <br>
               <p class="h3 mb-2 text-gray-800" align="center">Tổng thu chi quý 2</p>
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                  
                   <th>Thu</th> 
                   <th>Chi</th>
                   <th>Luỹ Kế</th>  
                   
                  </tr>
                </thead>
                <tbody>
                <tr>                   
                      <td> <?php echo number_format($tong_thu); ?></td>
                      <td> <?php echo number_format($tong_chi); ?></td>
                      <td> <?php echo number_format($luy_ke); ?></td>                  
                </tr> 
                 </tbody>
                 </table>
              <?php
            }
          
           }
            ?>        
      

        <?php 
        if(isset($_POST['nam_id']))
        {
              
              $nam = $_POST['nam'];
              $query ="SELECT * FROM thu_chi WHERE Nam = '$nam' And Quy='3'";
              $query_run= mysqli_query($connection,$query);
              $tong_thu =0;
              $tong_chi =0;
           if(mysqli_num_rows($query_run)>0)
            {
                 
                     
              while ($row=mysqli_fetch_array($query_run)) 
              {                  
                  $thu = $row['SoTienThu'];
                  $chi = $row['SoTienChi'];
                  $tong_thu = $tong_thu + $thu; 
                  $tong_chi = $tong_chi + $chi;
                  $luy_ke = $tong_thu - $tong_chi;  
         
              }
              ?>
              <br>
              <p class="h3 mb-2 text-gray-800" align="center">Tổng thu chi quý 3</p>
       
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                  
                   <th>Thu</th> 
                   <th>Chi</th>
                   <th>Luỹ Kế</th>  
                   
                  </tr>
                </thead>
                <tbody>
                <tr>                   
                      <td> <?php echo number_format($tong_thu); ?></td>
                      <td> <?php echo number_format($tong_chi); ?></td>
                      <td> <?php echo number_format($luy_ke); ?></td>                  
                </tr> 
                 </tbody>
                 </table>
              <?php
            }
           
           }
            ?>
       

        <?php 
        if(isset($_POST['nam_id']))
        {
              
              $nam = $_POST['nam'];
              $query ="SELECT * FROM thu_chi WHERE Nam = '$nam' And Quy='4'";
              $query_run= mysqli_query($connection,$query);
              $tong_thu =0;
              $tong_chi =0;
           if(mysqli_num_rows($query_run)>0)
            {
                 
                     
              while ($row=mysqli_fetch_array($query_run)) 
              {                  
                  $thu = $row['SoTienThu'];
                  $chi = $row['SoTienChi'];
                  $tong_thu = $tong_thu + $thu; 
                  $tong_chi = $tong_chi + $chi;
                  $luy_ke = $tong_thu - $tong_chi;  
         
              }
              ?>
              <br>
               <p class="h3 mb-2 text-gray-800" align="center">Tổng thu chi quý 4</p>
       
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                  
                   <th>Thu</th> 
                   <th>Chi</th>
                   <th>Luỹ Kế</th>  
                   
                  </tr>
                </thead>
                <tbody>
                <tr>                   
                      <td> <?php echo number_format($tong_thu); ?></td>
                      <td> <?php echo number_format($tong_chi); ?></td>
                      <td> <?php echo number_format($luy_ke); ?></td>                  
                </tr> 
                 </tbody>
                 </table>
              <?php
            }
            
           }
            ?> 
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
         
           <th>Tháng</th> 
           <th>Chi Tiết</th>
           
          </tr>
        </thead>
        <tbody>

        <?php 
        if(isset($_POST['nam_id']))
        {
              $nam = $_POST['nam'];
              $query ="SELECT distinct Thang FROM thu_chi WHERE Nam = '$nam'";            
              $query_run= mysqli_query($connection,$query);
              $serial_number=0;    
          while ($row=mysqli_fetch_array($query_run)) 
          {
            
            
            ?>      
            <tr>
                 
                  <td> <?php echo $row['Thang']; ?></td>
                  <td> 
                      <form action="quan_ly_thu_chi_chart_dir.php" method="POST">
                        <input type="hidden" name="nam" value="<?php echo $nam; ?>">
                        <input type="hidden" name="thang" value="<?php echo $row['Thang']; ?>">
                        <input type="submit" name="chart" value="Chi Tiết" class="btn btn-primary">
                        
                      </form>
                  </td>                 
            </tr>
      <?php 
       
          }
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