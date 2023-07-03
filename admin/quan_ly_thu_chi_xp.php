<?php 
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_ketoan.php';
 ?>


<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Quản Lý Thu Chi</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">    
      <a class="btn btn-info"  href="quan_ly_thu_chi.php" >Back</a>
 	  
  </div>
  <div class="table-responsive" >

      	<?php  
      		
      		$query = "SELECT  * FROM thu_chi Where ThuChi ='Chi'";
      		$query_run= mysqli_query($connection,$query);
      	?>
     
  <div class="card-body">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
           <th>STT </th>
           <th>Ngày Tháng</th> 
           <th>Loại</th>
           <th>Người</th>
           <th>Nội Dung</th>
           <th>Số Tiền</th> 
           <th>Xuất Phiếu Thu</th> 
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
            ?>      
            <tr>
                  <td> <?php echo $serial_number; ?></td>
                  <td> <?php echo $row['NgayThang']; ?></td> 
                  <td> <?php echo $row['Loai']; ?></td> 
                  <td> <?php echo $row['Nguoi']; ?></td>
                  <td> <?php echo $row['NoiDung']; ?></td>     
                  <td> <?php echo number_format($row['SoTienChi']); ?></td>
                 
                   <td>
                      <form action="quan_ly_thu_chi_pdf.php" method="POST">
                        <input type="hidden" name="id_chi" value="<?php echo $row['id']; ?>">
                        <input type="submit" name="xuat_phieu_chi" value="Xuất Phiếu Chi" class="btn btn-primary">
                        
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