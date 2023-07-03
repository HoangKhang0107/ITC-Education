<?php  
      include 'security.php';
      $output = '';   
      $mph = $_POST['id'];
      $query = "select * from phu_huynh where MaPH = $mph";
      $query_run = mysqli_query($connection,$query);
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">
           <tr>  
                   <th width="15%">Mã Phụ Huynh</td>  
                   <th width="25%">Tên Phụ Huynh</td>  
                   <th width="15%">SDT</td> 
                   <th width="30%">Địa Chỉ</td> 
                   <th width="15%">Facebook</td> 
           </tr>  ';  
      while ($row = mysqli_fetch_array($query_run, MYSQLI_ASSOC)) 
      {  
           $output .= ' 
                <tr>  
                     <td width="15%">'.$row["MaPH"].'</td>  
                     <td width="25%">'.$row["TenPH"].'</td>  
                     <td width="15%">'.$row["PhuHuynh_Sdt"].'</td> 
                     <td width="30%">'.$row["PhuHuynh_Fb"].'</td> 
                     <td width="15%">'.$row["Diachi"].'</td> 
                </tr>   
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 ?>