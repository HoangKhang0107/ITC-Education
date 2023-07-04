<?php 
include 'security.php';
$connection->query("SET NAMES 'utf8'");

if (isset($_POST['add_tl'])) 
{
  $tua_de = $_POST['tua_de'];
  $image = $_FILES['image']['name'];
  $tom_tat = $_POST['tom_tat'];
  $url = $_POST['url']; 
  $ma_nhan_vien = $_POST['manv'];    

      $query = "
      INSERT INTO tai_lieu(TuaDe,TomTat,url,img,MaNhanVien) 
      VALUES('$tua_de','$tom_tat','$url','$image','$ma_nhan_vien')"; 
      $query_run = mysqli_query($connection,$query);

      if ($query_run) 
      { 
        move_uploaded_file($_FILES["image"]["tmp_name"],"anh_nhan_vien/".$_FILES["image"]["name"]);
        $_SESSION['success']="Thêm Thành Công";
        header('Location: tai_lieusa.php');
      } 
      else {
        
        $_SESSION['status']="Thêm Thất Bại";
        header('Location: tai_lieusa.php ');
        
      }
  
}  



if(isset($_POST['update_btn']))
 {
 		
	 	$id =$_POST['edit_id'];
    $td = $_POST['tuad'];
	 	$tt= $_POST['tomt'];	
		$ul = $_POST['url'];  
		$image = $_FILES['image']['name'];
    $mnv = $_POST['manv']; 
 		$query= "
    UPDATE tai_lieu
    SET TuaDe ='$td',
        TomTat ='$tt', 
        url='$ul', 
        img='$image', 
        MaNhanVien='$mnv',         
    WHERE id ='$id'";
 		$query_run = mysqli_query($connection,$query);

    if ($query_run) {
    
        move_uploaded_file($_FILES["image"]["tmp_name"],"anh_nhan_vien/".$_FILES["image"]["name"]);
        $_SESSION['success']="Sửa Thành Công";
        header('Location: tai_lieusa.php');
    } else {
  
      $_SESSION['status']= "Sửa Thất Bại";
      header('Location: tai_lieusa.php');
    }
 	
 		
 }
 	
  
  if(isset($_POST['delete_btn']))
 {
 		$id = $_POST['delete_id'];
 		
 		$query= "DELETE FROM tai_lieu WHERE  id ='$id'";
 		$query_run = mysqli_query($connection,$query);

 		if ($query_run) {
 			
 			$_SESSION['success']= "Xóa Thành Công";
 			header('Location: tai_lieusa.php');
 		} else {
 			
 			$_SESSION['status']= "Xóa Thất Bại";
 			header('Location: tai_lieusa.php');
 		}
 }


$output ='';

if(isset($_POST['query'])){
  $search=$_POST['query'];
  $stmt=$connection->prepare("SELECT * FROM tai_lieu WHERE 
TuaDe LIKE CONCAT('%',?,'%')") ;
  $stmt->bind_param("ss",$search,$search);


}
else{
  $stmt=$connection->prepare("SELECT * FROM tai_lieu ");

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
           <th>Tựa Đề </th>
           <th>Hình Ảnh </th>
           <th>Tóm Tắt</th>          
           <th>URL </th>
           
           <th>Mã Nhân Viên </th> 
               <th>EDIT </th>
               <th>DELETE </th> 
             </tr>
             </thead>
             <tbody>';
              while ($row=mysqli_fetch_assoc($query_run)) 
          {
             $serial_number++;                      
              $output.='
          <tr>
                  <td>'.$serial_number.'</td>
                  <td>'.$row['TuaDe'].'</td>
                  <td><img src="anh_nhan_vien/'.$row['img'].'" width="100px;" height="100px" alt="Image"></td>
                  <td>'.$row['TomTat'].'</td>               
                  <td>'.$row['url'].'</td>                 
                  <td>'.$row['MaNhanVien'].'</td>
                                          
                  <td>
                      <form action="tai_lieu_editsa.php" method="POST">
                          <input type="hidden" name="edit_id" value="'.$row['id'].'" >
                          <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>                        
                      </form>
                  </td>
                  <td>
                      <form action="tai_lieu_codesa.php" method="POST">
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