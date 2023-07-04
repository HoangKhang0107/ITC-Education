<?php 
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_teacher.php';
 ?>

<div class="container-fluid"> 
<!--DataTables -->

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"> Thông tin Phụ Huynh</h6>		
      <a class="btn btn-info" href="hoc_sinhtc.php">Back</a>
 	  
  </div>		 

	<div class="card-body">
		 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <div class="row">
          <form action="" method="post" >
            <div class="col-sm-12 col-md-6">           
          </div>           
          </form>         
        </div>
        <thead align="center">
          <tr>
           <th>Mã Phụ Huynh</th>
           <th>Tên Phụ Huynh </th>
           <th>SDT</th>
           <th>Địa Chỉ</th>
           <th>Facebook</th>           
          </tr>
        </thead>
        <tbody>
		<?php

				
				if(isset($_POST['hienph']))
				{
					$maph = $_POST['ma_ph'];

					$query = "SELECT * FROM phu_huynh WHERE MaPH = '$maph' ";
					$query_run= mysqli_query($connection,$query);

					foreach ($query_run as $row) 
					{
						 ?>
						
				<tr>
					<td> <?php echo $row['MaPH']; ?></td> 
					<td> <?php echo $row['TenPH']; ?></td> 
					<td> <?php echo $row['PhuHuynh_Sdt']; ?></td> 					
					<td> <?php echo $row['Diachi']; ?></td>
					<td> <?php echo $row['PhuHuynh_Fb']; ?></td>                      
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