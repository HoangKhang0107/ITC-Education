<?php 
include 'security.php';

$connection->query("SET NAMES 'utf8'");

$output ='';

if(isset($_POST['query'])){
  $search=$_POST['query'];
  $stmt=$connection->prepare("SELECT * FROM hoc_sinh WHERE 
MaHocSinh LIKE CONCAT('%',?,'%') OR TenHocSinh LIKE CONCAT('%',?,'%')") ;
  $stmt->bind_param("ss",$search,$search);


}
else{
  $stmt=$connection->prepare("SELECT * FROM hoc_sinh ");

}
$stmt->execute();
$result=$stmt->get_result();

if ($result->num_rows>0) {


  $output .='
  <div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead align="center">
              <tr>
               <th>STT </th>
               <th>Mã Học Sinh </th>
               <th>Tên Học Sinh </th>
               <th>Ngày Sinh </th>
               <th>Lớp </th>
               <th>Phụ Huynh </th>   
               <th>SDT </th>
               <th>Địa Chỉ </th>
               <th>Ghi Chú </th>              
           <th>Tình Trạng </th>             
             </tr>
             </thead>
             <tbody>';
             while ($row=$result->fetch_assoc()) {
              $thoigian = $row['NgaySinh'];
              $date = date("d-m-Y", strtotime($thoigian));
               $output.='
          <tr>
                  <td>'.$row['id'].'</td>
                  <td>'.$row['MaHocSinh'].'</td>               
                  <td>'.$row['TenHocSinh'].'</td>
                  <td>'.$date.'</td>
                  <td>'.$row['Lop'].'</td>
                  <td>'.$row['MaPH'].'</td>
                  <td>'.$row['SDT'].'</td>
                  <td>'.$row['DiaChi'].'</td>
                  <td>'.$row['GhiChu'].'</td>                
                  <td>'.$row['tinhtrang'].'</td>
              </tr>';              
             }
             $output.="</tbody>";
             echo $output;  
} else {
  echo "<h3> No Records Found!</h3>";
}
  

 


  ?>



   