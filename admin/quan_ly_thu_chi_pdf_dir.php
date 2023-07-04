<?php 
//include 'security.php';
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$connect = mysqli_connect("localhost","root","","adminpanel");
mysqli_set_charset($connect, 'UTF8');

if(isset($_POST['xuat_pdf_ngay'])){
 
	
	$nam =$_POST['nam'];
	$thang =$_POST['thang'];
    $query ="SELECT * FROM thu_chi INNER JOIN nhan_vien on thu_chi.Nguoi = nhan_vien.MaNhanVien WHERE Nam = '$nam' AND Thang ='$thang'"; 
    $query2 ="SELECT * FROM thu_chi INNER JOIN nhan_vien on thu_chi.Nguoi = nhan_vien.MaNhanVien WHERE Nam = '$nam' AND Thang ='$thang' AND ThuChi='Chi'"; 
    $query3 ="SELECT * FROM thu_chi INNER JOIN nhan_vien on thu_chi.Nguoi = nhan_vien.MaNhanVien WHERE Nam = '$nam' AND Thang ='$thang' AND ThuChi='Thu'"; 
    $document = new Dompdf();
   
	$tong_thu =0;
    $tong_chi =0;
	$result1 =mysqli_query($connect,$query);
	$result2 =mysqli_query($connect,$query2);
	$result3 =mysqli_query($connect,$query3);
	$output ='
		
		<style>
			h1,h2,h3{
				font-family: DejaVu Sans, sans-serif; 
			}

			table{
				font-family: DejaVu Sans, sans-serif; 
				border-collapse: collapse;
				width:100%;
			}
			td,th{

				border: 1px solid #dddddd;
				text-align:left;
				padding:8px;
			}
			tr:nth-child(even){
				background-color:#dddddd;
			}
		</style>
		<h1>BÁO CÁO THU CHI THÁNG '.$thang.' NĂM '.$nam.'</h1>
		
		<br>
		<h2>TỔNG THU CHI TRONG THÁNG </h2>
		<table>
        <thead>
          <tr>         
           <th>Thu</th> 
           <th>Chi</th>
           <th>Lũy Kế</th>        
          </tr>
        </thead>
        <tbody>	

        
		';
		while ($row = mysqli_fetch_array($result1)) 
		{
			
			$thu = $row['SoTienThu'];
            $chi = $row['SoTienChi'];
            $tong_thu = $tong_thu + $thu; 
            $tong_chi = $tong_chi + $chi;
            $luy_ke = $tong_thu - $tong_chi;
			
		}
		$tien_thu =number_format($tong_thu);
		$tien_chi =number_format($tong_chi);
		$luy_ke1 =number_format($luy_ke);
		$output .='
			<tr>
				  <td>'.$tien_thu.'</td>
                  <td>'.$tien_chi.'</td> 
                  <td>'.$luy_ke1.'</td>                
				</tr>
		  </tbody>	
		  </table>
		<br>
		<h2>THU CHI THEO TỪNG NGÀY</h2>

		<h2>Số Tiền Chi</h2>
		<table >
		  	 <thead align="center">
		      <tr>
		       <th >STT</th>
		       <th >Ngày Tháng</th>           
               <th >Loại</th>                                                 
               <th >Nội Dung</th>
               <th >Chi</th>              
               <th>Ghi Chú</th> 	                            
		      </tr> 
		      </thead>
		      <tbody> ';
		 $serial_number=0;     		
		 while ($row = mysqli_fetch_array($result2)) 
		{
		   $serial_number++;
         
          $thoigian = $row['NgayThang'];
          $so_tien_thu = $row['SoTienThu'];
          $tien_thu = number_format($so_tien_thu);
          $so_tien_chi = $row['SoTienChi'];
          $tien_chi = number_format($so_tien_chi);
          $date = date("d-m-Y", strtotime($thoigian));
			$output.='

				<tr>
					<td> '.$serial_number.'</td>
                    <td> '.$date.'</td>
                   
                    <td> '.$row['Loai'].'</td>                
                    
                    <td> '.$row['NoiDung'].' </td>
                    <td> '.$tien_chi.' </td>
                    
                   
                    <td> '.$row['GhiChu'].' </td>
				</tr>
			';
		}

		$output .='
		<br>
		</tbody>
		</table >
		<h2>Số Tiền Thu</h2>
		<table >
		  	 <thead align="center">
		      <tr>
		       <th >STT</th>
		       <th >Ngày Tháng</th>           
               <th >Loại</th>                                                 
               <th >Nội Dung</th>
               <th >Thu</th>              
               <th>Ghi Chú</th> 	                            
		      </tr> 
		      </thead>
		      <tbody> ';
		 $stt=0;     		
		 while ($row = mysqli_fetch_array($result3)) 
		{
		   $stt++;
         
          $thoigian = $row['NgayThang'];
          $so_tien_thu = $row['SoTienThu'];
          $tien_thu = number_format($so_tien_thu);
          $so_tien_chi = $row['SoTienChi'];
          $tien_chi = number_format($so_tien_chi);
          $date = date("d-m-Y", strtotime($thoigian));
			$output.='

				<tr>
					<td> '.$serial_number.'</td>
                    <td> '.$date.'</td>
                   
                    <td> '.$row['Loai'].'</td>                
                    
                    <td> '.$row['NoiDung'].' </td>
                    <td> '.$tien_thu.' </td>
                    
                   
                    <td> '.$row['GhiChu'].' </td>
				</tr>
			';
		}
      $output .='
		</tbody>
		</table >
		';


		$document->loadHtml($output);
		$document->setPaper('A4','landscape');
		$document->render();

		$document->stream("thu_chi_theo_ngay",array("Attachment"=>1));
}

if(isset($_POST['xuat_pdf_loai'])){
 
	
  $nam =$_POST['nam'];
  $thang =$_POST['thang'];
    $query ="SELECT * FROM thu_chi INNER JOIN nhan_vien on thu_chi.Nguoi = nhan_vien.MaNhanVien WHERE Nam = '$nam' AND Thang ='$thang'"; 
    $query2 = "SELECT Loai, sum(LuyKe) as LuyKe,Nam,Thang from thu_chi WHERE Nam ='$nam' AND Thang='$thang' group by Loai";

    $document = new Dompdf();
   
  $tong_thu =0;
    $tong_chi =0;
  $result1 =mysqli_query($connect,$query);
  $result2 =mysqli_query($connect,$query2);
  
  $output ='
    
    <style>
      h1,h2,h3{
        font-family: DejaVu Sans, sans-serif; 
      }

      table{
        font-family: DejaVu Sans, sans-serif; 
        border-collapse: collapse;
        width:100%;
      }
      td,th{

        border: 1px solid #dddddd;
        text-align:left;
        padding:8px;
      }
      tr:nth-child(even){
        background-color:#dddddd;
      }
    </style>
    <h1>BÁO CÁO THU CHI THÁNG '.$thang.' NĂM '.$nam.'</h1>
    
    <br>
    <h2>TỔNG THU CHI TRONG THÁNG </h2>
    <table>
        <thead>
          <tr>         
           <th>Thu</th> 
           <th>Chi</th>
           <th>Lũy Kế</th>        
          </tr>
        </thead>
        <tbody> 

        
    ';
    while ($row = mysqli_fetch_array($result1)) 
    {
      
      $thu = $row['SoTienThu'];
            $chi = $row['SoTienChi'];
            $tong_thu = $tong_thu + $thu; 
            $tong_chi = $tong_chi + $chi;
            $luy_ke = $tong_thu - $tong_chi;
      
    }
    $tien_thu =number_format($tong_thu);
    $tien_chi =number_format($tong_chi);
    $luy_ke1 =number_format($luy_ke);
    $output .='
      <tr>
          <td>'.$tien_thu.'</td>
                  <td>'.$tien_chi.'</td> 
                  <td>'.$luy_ke1.'</td>                
        </tr>
      </tbody>  
      </table>
      <br>
      <h2>TỔNG THU CHI THEO LOẠI</h2>
      <table >
         <thead align="center">
          <tr>
           <th>Loại </th>
           <th>Số Tiền</th> 
                              
          </tr> 
          </thead>
          <tbody>          
    ';
    while ($row = mysqli_fetch_array($result2)) 
    {
      $loai = $row['Loai'];
            $luy_ke = $row['LuyKe'];

          
           $luy_ke1 = number_format($luy_ke);
      $output.='
        <tr>              
            <td>'.$loai.'</td>
            <td>'.$luy_ke1.'</td>         
        </tr>
      ';
    }

    $output .='
    </tbody>
    </table>
    
    ';


    $document->loadHtml($output);
    $document->setPaper('A4','landscape');
    $document->render();

    $document->stream("thu_chi_theo_loai",array("Attachment"=>1));
}

if(isset($_POST['xuat_phieu_chi'])){
 
 
  $id =$_POST['id_chi'];
  
    $query ="SELECT * FROM thu_chi INNER JOIN nhan_vien on thu_chi.Nguoi = nhan_vien.MaNhanVien WHERE thu_chi.id ='$id'"; 
  
    $document = new Dompdf();
  
  $result =mysqli_query($connect,$query);
  
  $output ='
    
    <style>
      h1,h2,h3{
        font-family: DejaVu Sans, sans-serif; 
      }

      table{
        font-family: DejaVu Sans, sans-serif; 
        border-collapse: collapse;
        width:100%;
      }
      td,th{

        border: 1px solid #dddddd;
        text-align:left;
        padding:8px;
      }
      tr:nth-child(even){
        background-color:#dddddd;
      }
    </style>
    <h3 >Trung Tâm Ngoại Ngữ Tin Học Tomato</h3>  
    <h3 >Địa Chỉ: Số 65 Quán Nam, Quận. Lê Chân, Tp. Hải Phòng</h3> 
    <h3 >SĐT:  0225 628 0123</h3>
    <h1 align="center">PHIẾU CHI</h1>  
    <br>
  ';
     while ($row = mysqli_fetch_array($result)) 
    {
          $ngay = $row['NgayThang'];
          $loai = $row['Loai'];
          $noi_dung = $row['NoiDung'];
          $so_tien_chi = $row['SoTienChi'];
          $nguoi_chi = $row['TenNhanVien'];
    }
  
   
      $output .='
      <h3>Ngày : '.$ngay.'</h3>
      <h3>Loại Chi : '.$loai.'</h3>
      <h3>Lý Do Chi : '.$noi_dung.'</h3>
      <h3>Số Tiền Chi : '.number_format($so_tien_chi).'</h3>
      <h3>Người Chi : '.$nguoi_chi.'</h3>

      <br>
      <h3 align="right">Người Lập Phiếu </h3>
      <h3 align="right">'.$nguoi_chi.'</h3>
    ';


    $document->loadHtml($output);
    $document->setPaper('A4','landscape');
    $document->render();

    $document->stream("thu_chi_theo_ngay",array("Attachment"=>0));
}

if(isset($_POST['xuat_phieu_thu'])){
 
  
  $id =$_POST['id_thu'];
  
    $query ="SELECT thu_tien_hoc.id,MaThu,thu_tien_hoc.NgayThang,hoc_sinh.MaHocSinh,TenHocSinh,SoTien,NoiDung,NguoiThu,TenNhanVien,hoc_sinh.NgaySinh,Lop,hoc_sinh.DiaChi 
              FROM thu_tien_hoc 
              INNER JOIN hoc_sinh on thu_tien_hoc.MaHocSinh = hoc_sinh.MaHocSinh 
              INNER JOIN nhan_vien on thu_tien_hoc.NguoiThu = nhan_vien.MaNhanVien 
              where thu_tien_hoc.id ='$id' "; 
  
    $document = new Dompdf();
  
  $result =mysqli_query($connect,$query);
  
  $output ='
    
    <style>
      h1,h2,h3,h5{
        font-family: DejaVu Sans, sans-serif; 
      }

      table{
        font-family: DejaVu Sans, sans-serif; 
        border-collapse: collapse;
        width:100%;
        border:none;
      }
      
      tr:nth-child(even){
        background-color:#dddddd;
      }
    </style>
    <h5 >Trung Tâm Ngoại Ngữ Tin Học Tomato</h5>  
    <h5 >Địa Chỉ: Số 65 Quán Nam, Quận. Lê Chân, Tp. Hải Phòng</h5> 
    <h5 >SĐT:  0225 628 0123</h5>
    <h1 align="center">PHIẾU THU</h1>  
 
  ';
     while ($row = mysqli_fetch_array($result)) 
    {     
          $ngay = $row['NgayThang'];
       $ma_hs = $row['MaHocSinh'];
          $ten_hs = $row['TenHocSinh'];
          $ngay_sinh = $row['NgaySinh'];
          $lop = $row['Lop'];
          $noi_dung = $row['NoiDung'];
          $so_tien_thu = $row['SoTien'];
          $nguoi_thu = $row['TenNhanVien'];
        
          
          
      
      
     
    
    }
  
   
      $output .='
      
      <h3 align="center">Ngày : '.$ngay.'</h3>
      <br>
      <br>
      <h3>Mã Học Sinh: '.$ma_hs.'</h3>
      <h3>Tên Học Sinh: '.$ten_hs.'</h3>
      <h3>Ngày Sinh: '.$ngay_sinh.'</h3>
      <h3>Lớp: '.$lop.'</h3>
      
      
      <h3>Nội Dung : '.$noi_dung.'</h3>
      <h3>Số Tiền Thu : '.number_format($so_tien_thu).'</h3>
      <h3>Người Thu : '.$nguoi_thu.'</h3>

      <br>
      <br>
      <br>
      <table >
        <thead align="center">
          <tr>
            <th>Người Nộp</th>
            <th>Người Thu Tiền</th>
          </tr>
        </thead>
        <tbody align="center">
          <tr>
            <td>'.$ten_hs.'</td>
            <td>'.$nguoi_thu.'</td>
          </tr>
        </tbody>
      </table>
     
    ';


    $document->loadHtml($output);
    $document->setPaper('A4','portrait');
    $document->render();

    $document->stream("phieu_thu",array("Attachment"=>0));
}
 ?>