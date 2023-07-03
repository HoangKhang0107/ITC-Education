<?php 
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_superadmin.php';
 ?>
 
 <head>
<script src="../../../js/jquery-3.6.0.js"></script>
<script src="../../../js/bootstrap.js"></script>
<script>
   // var count = 1;
   //    $(document).ready(function () {

   //       //-------------//
   //      //  var txtm = $("#makh");
   //      //  var tbma = $("#mkh");
   //       function ktkh() {
   //        var regten = /^([a-zA-Z0-9_\.\-])+\@(([gmail|yahoo\-])+\.)+([.com])+$/;
   //          var ten = $("#email").val();
   //          if (regten.test(ten)) {
   //             $("#mail").html("*")
   //             return true;
   //          }
   //          else {
   //             $("#mail").html("X")
   //             return false;
   //          }
   //       }
   //       $("#email").blur(ktkh)
   //       function ktten() 
   //       {
   //        var regten = /^([A-Z|Đ|a-z]{1}[a-z|á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|í|ì|ỉ|ĩ|ị|ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|ý|ỳ|ỷ|ỹ|ỵ]*\s)*([A-Z|Ý|Đ|a-z]{1}[a-z|á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|í|ì|ỉ|ĩ|ị|ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|ý|ỳ|ỷ|ỹ|ỵ|a-z]*)$/;
   //         var ten = $("#username").val();
   //          if (regten.test(ten)) {
   //             $("#name").html("*")
   //             return true;
   //          }
   //          else {
   //             $("#name").html("X")
   //             return false;
   //          }
   //       }
   //       $("#username").blur(ktten)
   //       function ktpass() 
   //       {
   //          var regten = /^([0-9|a-z|A-Z]{1,10})$/;
   //           var ten = $("#password").val();
   //          if (regten.test(ten)) {
   //             $("#pass").html("*")
   //             return true;
   //          }
   //          else {
   //             $("#pass").html("X")
   //             return false;
   //          }
   //       }
   //      $("#password").blur(ktpass)
        
   //      var txtp2 = $("#confirmpassword");
   //      var tbp = $("#pass1");
   //      var txtp1 = $("#password");
   //       function KiemTra() {
            
   //          var day = txtp1.val() ;
   //          var dayy = txtp2.val();
          
   //          if (day == dayy )  {
   //             tbp.html("*");
   //             return true;
   //          }
   //          tbp.html("X");
   //          return false;
   //       }
   //       txtp2.blur(KiemTra);

   //       function ktma() {
   //        var regten = /^([A-Z|a-z|0-9]{3,10})+$/;
   //          var ten = $("#ma").val();
   //          if (regten.test(ten)) {
   //             $("#matk").html("*")
   //             return true;
   //          }
   //          else {
   //             $("#matk").html("X")
   //             return false;
   //          }
   //       }
   //       $("#ma").blur(ktma)
   //       $("#registerbtn").click(function()
   //        { 
   //          //----//
   //          if (ktkh()==false) {
   //             alert("Chưa nhập đủ thông tin");
   //             return false;
   //          }
   //          if (ktten()==false) {
   //            alert("Chưa nhập đủ thông tin");
   //             return false;
   //          }
   //          if (KiemTra()==false) {
   //            alert("Chưa nhập đủ thông tin");
   //             return false;
   //          }
   //          if (ktma()==false) {
   //            alert("Chưa nhập đủ thông tin");
   //             return false;
   //          }
   //          if (ktpass()==false) {
   //            alert("Chưa nhập đủ thông tin");
   //             return false;
   //          }
   //       })
   //      })
  </script>
</head>
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Tài Khoản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <form action="" method="POST">

        <div class="modal-body">

        <input type="file" name="excel" required value="">
			<button type="submit" name="import">Import</button> -->
       
         
            <!-- <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" id="email"class="form-control" placeholder="Enter Email">
                <div id="mail" style="color: red; float: right;"></div> 
            </div>

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username"id="username"class="form-control" placeholder="Enter Username">
                <div id="name" style="color: red; float: right;"></div>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                <div id="pass" style="color: red; float: right;"></div>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" onkeyup="cRePass()" id="confirmpassword" class="form-control" placeholder="Confirm Password">
                <div id="pass1" style="color: red; float: right;"></div>
            </div>
            <div class="form-group">
                <label>Usertype</label>
                <select name="usertype" class="form-control">
                  <option value="">Chọn vai trò</option>
                  <option value="admin">Admin</option>
                  <option value="teacher">Giảng Viên</option>
                  <option value="student">Học Viên</option>
                  <option value="ministry">Giáo Vụ</option>
                  <option value="director">Giám Đốc</option>
                </select>
            </div>
            <div class="form-group">
                <label>Mã</label>
                <input type="text" name="ma" id ="ma"class="form-control">
                <div id="matk" style="color: red; float: right;"></div>
            </div> -->
            
            <input type="hidden" name="usertype" value="admin">
        </div>
        <!-- <div class="modal-footer">           
            <button type="submit" name="registerbtn" id="registerbtn" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div> -->
        
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Quản Lý Tài Khoản</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    
    <a href="them.php"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
        Thêm Tài Khoản
      </button></a>
 
  </div>

        <div class="card-body">

        <?php 
        if(isset($_SESSION['success'])&& $_SESSION['success']!='')
        {
        	echo '<h2 class="bg-primary text-white"> '.$_SESSION['success'].' </h2>';
        	unset($_SESSION['success']);
        }

        if(isset($_SESSION['status'])&& $_SESSION['status']!='')
        {
        	echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
        	unset($_SESSION['status']);
        }
         ?>

          <div class="table-responsive">

      	<?php  
      		
      		$query = "SELECT * FROM register";
      		$query_run= mysqli_query($connection,$query);
      	?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Email </th>
            <th> Username </th>           
            <th>Password</th>
            <th>Usertype</th>
            <th>Mã</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
     	<?php 
     		if(mysqli_num_rows($query_run)>0)
     		{
     			while ($row=mysqli_fetch_assoc($query_run)) 
     			{
     				?>			
     				<tr>
			            <td> <?php echo $row['email']; ?></td>
			            <td> <?php echo $row['username']; ?></td>			            
			            <td> <?php echo $row['password']; ?> </td>
                  <td> <?php echo $row['usertype']; ?> </td>
                  <td> <?php echo $row['Ma']; ?> </td>
			            <td>
			                <form action="register_edit.php" method="POST">
			                    <input type="hidden" name="edit_email" value="<?php echo $row['email']; ?>" >
			                    <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>		                    
			                </form>
			            </td>
			            <td>
			                <form action="code.php" method="POST">
			                  <input type="hidden" name="delete_email" value="<?php echo $row['email']; ?>">
			                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
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