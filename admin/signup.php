<?php 

	session_start();
	include 'includes/header.php';
  	
 ?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Đăng ký tài khoản</h1>
            					<?php 

            						
                        if(isset($_SESSION['status'])&& $_SESSION['status']!='')
                          {
                            echo '
                            <div class="alert alert-danger">
                              '.$_SESSION['status'].'
                            </div>';
                            unset($_SESSION['status']);
                          }
            					 ?>	

                  </div>
                  <form class="user" action="logincode.php" method="POST">
                  <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" id="email"class="form-control" placeholder="">
                <div id="mail" style="color: red; float: right;"></div> 
            </div>

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username"id="username"class="form-control" placeholder="">
                <div id="name" style="color: red; float: right;"></div>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="">
                <div id="pass" style="color: red; float: right;"></div>
            </div>
            <div class="form-group">
                <label>Nhập lại Password</label>
                <input type="password" name="confirmpassword" onkeyup="cRePass()" id="confirmpassword" class="form-control" placeholder="Nhập lại pass word">
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
            </div>
            
            <input type="hidden" name="usertype" value="admin">
        </div>
        <div class="modal-footer">           
            <button type="submit" name="registerbtn" id="registerbtn" class="btn btn-primary">Đăng ký</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
        </div>
                    <hr>
                   </form>

                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>



  <?php 
	include 'includes/scripts.php';
  	
  ?>