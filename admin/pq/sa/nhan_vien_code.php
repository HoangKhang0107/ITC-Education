<?php 
include 'security.php';



$connection->query("SET NAMES 'utf8'");

if (isset($_POST['add_nv'])) 
{
  $ma_nhan_vien = $_POST['ma_nhan_vien'];
  $ten_nhan_vien = $_POST['ten_nhan_vien'];
  $dia_chi = $_POST['dia_chi']; 
  $sdt = $_POST['sdt'];
  $email = $_POST['email'];
  
  $trinh_do = $_POST['trinh_do'];  
  $ngay_sinh= $_POST['ngay_sinh'];
  $chuc_vu= $_POST['chuc_vu'];
  $image = $_FILES['image']['name'];


  if(file_exists("anh_nhan_vien/".$_FILES["image"]["name"])) 
  {
       $store = $_FILES["image"]["name"];
       $_SESSION['status'] = "Hình Ảnh Đã Tồn Tại $store";
       header('Location:pq/sa/nhan_vien.php');
  }
  else
  {
      $query = "
      INSERT INTO nhan_vien(MaNhanVien,TenNhanVien,DiaChi,SDT,Email,TrinhDo,ChucVu,NgaySinh,img) 
      VALUES('$ma_nhan_vien','$ten_nhan_vien','$dia_chi','$sdt','$email','$trinh_do','$chuc_vu','$ngay_sinh','$image')"; 
      $query_run = mysqli_query($connection,$query);

      if ($query_run) 
      { 
        move_uploaded_file($_FILES["image"]["tmp_name"],"anh_nhan_vien/".$_FILES["image"]["name"]);
        $_SESSION['success']="Thêm Thành Công";
        header('Location: pq/sa/nhan_vien.php');
      } 
      else {
        
        $_SESSION['status']="Thêm Thất Bại";
        header('Location: pq/sa/nhan_vien.php ');
        
      }
  }
}  



if(isset($_POST['update_btn']))
 {
    
    $id =$_POST['edit_id'];
    $ma_nhan_vien = $_POST['ma_nhan_vien'];
    $ten_nhan_vien = $_POST['ten_nhan_vien'];
    $dia_chi = $_POST['dia_chi']; 
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    
    $trinh_do = $_POST['trinh_do'];  
    $ngay_sinh= $_POST['ngay_sinh'];
    $chuc_vu= $_POST['chuc_vu'];
    $image = $_FILES['image']['name'];

    $query= "
    UPDATE nhan_vien 
    SET MaNhanVien ='$ma_nhan_vien',
        TenNhanVien ='$ten_nhan_vien', 
        DiaChi='$dia_chi', 
        SDT='$sdt', 
        Email='$email', 
        TrinhDo='$trinh_do', 
        ChucVu='$chuc_vu',
        NgaySinh ='$ngay_sinh', 
        img='$image' 
    WHERE id ='$id'";
    $query_run = mysqli_query($connection,$query);

    if ($query_run) {
    
        move_uploaded_file($_FILES["image"]["tmp_name"],"anh_nhan_vien/".$_FILES["image"]["name"]);
        $_SESSION['success']="Sửa Thành Công";
        header('Location: pq/sa/nhan_vien.php');
    } else {
  
      $_SESSION['status']= "Sửa Thất Bại";
      header('Location: pq/sa/nhan_vien.php');
    }
  
    
 }
  
  
  if(isset($_POST['delete_btn']))
 {
    $id = $_POST['delete_id'];
    
    $query= "DELETE FROM nhan_vien WHERE  id ='$id'";
    $query_run = mysqli_query($connection,$query);

    if ($query_run) {
      
      $_SESSION['success']= "Xóa Thành Công";
      header('Location: pq/sa/nhan_vien.php');
    } else {
      
      $_SESSION['status']= "Xóa Thất Bại";
      header('Location: pq/sa/nhan_vien.php');
    }
 }


$output ='';

if(isset($_POST['query'])){
  $search=$_POST['query'];
  $stmt=$connection->prepare("SELECT * FROM nhan_vien WHERE 
MaNhanVien LIKE CONCAT('%',?,'%') OR TenNhanVien LIKE CONCAT('%',?,'%')") ;
  $stmt->bind_param("ss",$search,$search);


}
else{
  $stmt=$connection->prepare("SELECT * FROM nhan_vien ");

}
$stmt->execute();
$result=$stmt->get_result();
$serial_number=0;
if ($result->num_rows>0) {


  $output .='
  <div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead align="center">
              <tr>
               <th>STT </th> 
               <th>Mã Nhân Viên </th>             
               <th>Hình Ảnh </th>
               <th>Tên Nhân Viên </th>
               <th>Email </th>
               <th>Chức Vụ </th>  
               <th>Địa Chỉ </th>
               <th>Số Điện Thoại </th>                
               <th>Trình Độ Chuyên Môn </th>
               <th>Ngày Sinh </th>        
               <th>EDIT </th>
               <th>DELETE </th> 
             </tr>
             </thead>
             <tbody>';
             while ($row=$result->fetch_assoc()) {
              $serial_number++;
              $thoigian = $row['NgaySinh'];
              $date = date("d-m-Y", strtotime($thoigian));
              $output.='
          <tr>
                  <td>'.$serial_number.'</td>
                  <td>'.$row['MaNhanVien'].'</td>
                  <td><img src="anh_nhan_vien/'.$row['img'].'" width="100px;" height="100px" alt="Image"></td>
                  <td>'.$row['TenNhanVien'].'</td>               
                  <td>'.$row['Email'].'</td>
                  <td>'.$row['ChucVu'].'</td>
                  <td>'.$row['DiaChi'].'</td>
                  <td>'.$row['SDT'].'</td>
                  <td>'.$row['TrinhDo'].'</td>
                  <td>'.$row['NgaySinh'].'</td>                                
                  <td>
                      <form action="pq/sa/nhan_vien_edit.php" method="POST">
                          <input type="hidden" name="edit_id" value="'.$row['id'].'" >
                          <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>                        
                      </form>
                  </td>
                  <td>
                      <form action="pq/sa/nhan_vien_code.php" method="POST">
                        <input type="hidden" name="delete_id" value="'.$row['id'].'">
                        <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                      </form>
                  </td>
              </tr>';              
             }
             $output.="</tbody>";
             echo $output;  
} else {
  echo "<h3> No Records Found!</h3>";
}
  
  ?>