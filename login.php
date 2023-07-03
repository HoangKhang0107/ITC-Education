<?php
    ob_start();
    include("class/class-login.php");
	$p = new loginAccount();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="xuly.css">
    <!-- <script src="jss.js"></script> -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="js/main-nav.js"></script>
    <script src="https://kit.fontawesome.com/10f34277eb.js" crossorigin="anonymous"></script>
    <link REL="SHORTCUT ICON" HREF="images/ITC.svg">
    <title>ITC | ĐĂNG NHẬP</title>
</head>
<script>
    var count=1;
  $(document).ready(function()
  {
    function checkpass()
    {
        var mk=$("#form-matkhau").val();
        var pattern = new RegExp(/[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/); //unacceptable chars
        if (pattern.test(mk)) {
            $("#mk").html("Sai rồi bé ơi!!!");
            return false;
            }
            else
            {
                $("#mk").html("*")
                return true;
            
            }
    }
    
        $("#form-matkhau").blur(checkpass)
})
</script>
<div id="particles-js"></div>
<body class="login">
    <div class="login">
        <div class="form">
             <div class="main-content">
             <h2>Đăng nhập</h2>
            <form action="" method="post">
               
                <input type="text" name="form-iddangnhap" id="form-iddangnhap" placeholder="Tên đăng nhập"><br>
                <div>
                <input type="password" name="form-matkhau" id="form-matkhau" placeholder="Mật khẩu"><br>
                <div id="mk"> </div>
                </div>
                <input type="submit" value="Đăng nhập" id="btn-dangnhap" name="btn-dangnhap">
            </form>
        </div>
      </div>
</div>
      <div class="main-content--tb">
            <div align="center" style="color:white;">
            <?php
                switch($_POST['btn-dangnhap'] ?? null)
                {
                    case 'Đăng nhập':
                        {
                            $user = $_POST['form-iddangnhap'];
                            $matkhau = $_POST['form-matkhau'];
                            $pass = md5($matkhau);
                            if($user != '' && $pass != '')
                            {
                                if($p->myLogin($user,$pass) == 1)
                                {
                                    header('location:xulydangnhap.php');
                                }
                                else
                                {
                                    echo 'Đăng  nhập không thành công! Vui lòng kiểm tra lại thông tin đăng nhâp';
                                }
                            }
                            else
                            {
                                echo 'Vui lòng nhập đầy đủ thông tin đăng nhập';
                            }
                            break;
                        }
                }
	        ?>
            </div>
        </div>
    
  </body>x