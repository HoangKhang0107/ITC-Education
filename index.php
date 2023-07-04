<?php include 'head_f/header.php';
include 'head_f/slide.php';
$query1 = "SELECT * FROM tin_tuc";
$tt_run = mysqli_query($connection, $query1);

?>
<div id="chinese-course">
  <div class="container">
    <h4 class="heading text-center">Khóa học Tin Học Văn Phòng</h4>
    <div class="row">
      <div class="col-md-4">
        <div class="course-box">
          <div class="course-box-up">
            <a href="tieng-anh-giao-tiep.php" class="img-course-box"><img src="img/course-img/gt.png" alt=""></a>
            <a href="tieng-anh-giao-tiep.php" class="title-course-box">
              <p>Tin Học Văn Phòng Cơ Bản</p>
            </a>
          </div>
          <div class="course-box-down">
            <div class="row">
              <div class="col-md-7">
                <span class="price-course-box">
                  1.350.000đ
                  <small>-10%</small>
                </span>
                <span class="price-course-box-through">1.500.000đ</span>
              </div>
              <div class="col-md-5">
                <a href="tieng-anh-giao-tiep.php" class="btn-detail-course-box">Chi tiết</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="course-box">
          <div class="course-box-up">
            <a href="tieng-anh-tre-em.php" class="img-course-box"><img src="img/course-img/kid.png" alt=""></a>
            <a href="tieng-anh-tre-em.php" class="title-course-box">
              <p>Kĩ Năng PowerPoint Nâng Cao</p>
            </a>

          </div>
          <div class="course-box-down">
            <div class="row">
              <div class="col-md-7">
                <span class="price-course-box">
                  500.000đ
                  <small>-50%</small>
                </span>
                <span class="price-course-box-through">1.000.000đ</span>
              </div>
              <div class="col-md-5">
                <a href="tieng-anh-tre-em.php" class="btn-detail-course-box">Chi tiết</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="course-box">
          <div class="course-box-up">
            <a href="luyen-thi-toeic.php" class="img-course-box"><img src="img/course-img/toeic.png" alt=""></a>
            <a href="#" class="title-course-box">
              <p>Kĩ Năng Tin Học Văn Phong</p>
            </a>
          </div>
          <div class="course-box-down">
            <div class="row">
              <div class="col-md-7">
                <span class="price-course-box">
                  2.500.000đ
                  <small>-10%</small>
                </span>
                <span class="price-course-box-through">2.750.000đ</span>
              </div>
              <div class="col-md-5">
                <a href="luyen-thi-toeic.php" class="btn-detail-course-box">Chi tiết</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container-fluid py-4" style="background: #f7f7f7;">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <h1 class="text-danger">ĐĂNG KÝ LỘ TRÌNH HỌC TẬP</h1>
        <p><i>Hãy để lại thông tin của bạn, Trung Tâm tin học ITC sẽ giúp xây dựng lộ trình học kỹ năng tin học tốt nhất dành riêng cho bạn.</i></p>

        <!-- <div class="embed-responsive embed-responsive-16by9">
                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/dfpAnFVKcLs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                      </div> -->
      </div>
      <div class="col-md-5">
        <div class="card shadow-sm rounded">
          <div class="card-body">
            <h2>Đăng ký</h2>
            <form action="dangky.php" method="POST" enctype=multipart/form-data>
              <div class="form-group">
                <label for="">Họ tên</label>
                <input type="text" class="form-control" name="hoten">
              </div>
              <div class="form-group">
                <label for="">Số điện thoại</label>
                <input type="text" class="form-control" name="sdt">

              </div>
              <div class="form-group">
                <label for="">Trình độ học hiện tại </label>
                <input type="text" class="form-control" name="trinhdohoc">
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Chọn khóa học</label>
                <select class="form-control" id="kh" name="khoahoc">
                  <option value="0">--Chọn khóa học--</option>
                  <option value="Tin Học cơ bản">Tin Học cơ bản</option>
                  <option value="Kỹ năng Powerpoint">Kỹ năng Powerpoint</option>
                </select>

              </div>
              <button type="submit" name="them_kh" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
  .fb-livechat,
  .fb-widget {
    display: none
  }

  .ctrlq.fb-button,
  .ctrlq.fb-close {
    position: fixed;
    right: 24px;
    cursor: pointer
  }

  .ctrlq.fb-button {
    z-index: 999;
    background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGhlaWdodD0iMTI4cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB3aWR0aD0iMTI4cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxyZWN0IGZpbGw9IiMwMDg0RkYiIGhlaWdodD0iMTI4IiB3aWR0aD0iMTI4Ii8+PC9nPjxwYXRoIGQ9Ik02NCwxNy41MzFjLTI1LjQwNSwwLTQ2LDE5LjI1OS00Niw0My4wMTVjMCwxMy41MTUsNi42NjUsMjUuNTc0LDE3LjA4OSwzMy40NnYxNi40NjIgIGwxNS42OTgtOC43MDdjNC4xODYsMS4xNzEsOC42MjEsMS44LDEzLjIxMywxLjhjMjUuNDA1LDAsNDYtMTkuMjU4LDQ2LTQzLjAxNUMxMTAsMzYuNzksODkuNDA1LDE3LjUzMSw2NCwxNy41MzF6IE02OC44NDUsNzUuMjE0ICBMNTYuOTQ3LDYyLjg1NUwzNC4wMzUsNzUuNTI0bDI1LjEyLTI2LjY1N2wxMS44OTgsMTIuMzU5bDIyLjkxLTEyLjY3TDY4Ljg0NSw3NS4yMTR6IiBmaWxsPSIjRkZGRkZGIiBpZD0iQnViYmxlX1NoYXBlIi8+PC9zdmc+) center no-repeat #0084ff;
    width: 60px;
    height: 60px;
    text-align: center;
    bottom: 50px;
    border: 0;
    outline: 0;
    border-radius: 60px;
    -webkit-border-radius: 60px;
    -moz-border-radius: 60px;
    -ms-border-radius: 60px;
    -o-border-radius: 60px;
    box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16);
    -webkit-transition: box-shadow .2s ease;
    background-size: 80%;
    transition: all .2s ease-in-out
  }

  .ctrlq.fb-button:focus,
  .ctrlq.fb-button:hover {
    transform: scale(1.1);
    box-shadow: 0 2px 8px rgba(0, 0, 0, .09), 0 4px 40px rgba(0, 0, 0, .24)
  }

  .fb-widget {
    background: #fff;
    z-index: 1000;
    position: fixed;
    width: 360px;
    height: 435px;
    overflow: hidden;
    opacity: 0;
    bottom: 0;
    right: 24px;
    border-radius: 6px;
    -o-border-radius: 6px;
    -webkit-border-radius: 6px;
    box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
    -webkit-box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
    -moz-box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
    -o-box-shadow: 0 5px 40px rgba(0, 0, 0, .16)
  }

  .fb-credit {
    text-align: center;
    margin-top: 8px
  }

  .fb-credit a {
    transition: none;
    color: #bec2c9;
    font-family: Helvetica, Arial, sans-serif;
    font-size: 12px;
    text-decoration: none;
    border: 0;
    font-weight: 400
  }

  .ctrlq.fb-overlay {
    z-index: 0;
    position: fixed;
    height: 100vh;
    width: 100vw;
    -webkit-transition: opacity .4s, visibility .4s;
    transition: opacity .4s, visibility .4s;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, .05);
    display: none
  }

  .ctrlq.fb-close {
    z-index: 4;
    padding: 0 6px;
    background: #365899;
    font-weight: 700;
    font-size: 11px;
    color: #fff;
    margin: 8px;
    border-radius: 3px
  }

  .ctrlq.fb-close::after {
    content: "X";
    font-family: sans-serif
  }

  .bubble {
    width: 20px;
    height: 20px;
    background: #c00;
    color: #fff;
    position: absolute;
    z-index: 999999999;
    text-align: center;
    vertical-align: middle;
    top: -2px;
    left: -5px;
    border-radius: 50%;
  }

  .bubble-msg {
    width: 120px;
    left: -140px;
    top: 5px;
    position: relative;
    background: rgba(59, 89, 152, .8);
    color: #fff;
    padding: 5px 8px;
    border-radius: 8px;
    text-align: center;
    font-size: 13px;
  }
</style>
<div class="fb-livechat">
  <div class="ctrlq fb-overlay"></div>
  <div class="fb-widget">
    <div class="ctrlq fb-close"></div>
    <div class="fb-page" data-href="https://www.facebook.com/100092509407121" data-tabs="messages" data-width="360" data-height="400" data-small-header="true" data-hide-cover="true" data-show-facepile="false"> </div>
    <div class="fb-credit"> <a href="https://chanhtuoi.com" target="_blank">Powered by ITC</a> </div>
    <div id="fb-root"></div>
  </div><a href="https://m.me/n.hoangkhang0107/" title="Gửi tin nhắn cho chúng tôi qua Facebook" class="ctrlq fb-button">
    <div class="bubble">1</div>
    <div class="bubble-msg">Bạn cần hỗ trợ?</div>
  </a>
</div>
<script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
  jQuery(document).ready(function($) {
    function detectmob() {
      if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i)) {
        return true;
      } else {
        return false;
      }
    }
    var t = {
      delay: 125,
      overlay: $(".fb-overlay"),
      widget: $(".fb-widget"),
      button: $(".fb-button")
    };
    setTimeout(function() {
      $("div.fb-livechat").fadeIn()
    }, 8 * t.delay);
    if (!detectmob()) {
      $(".ctrlq").on("click", function(e) {
        e.preventDefault(), t.overlay.is(":visible") ? (t.overlay.fadeOut(t.delay), t.widget.stop().animate({
          bottom: 0,
          opacity: 0
        }, 2 * t.delay, function() {
          $(this).hide("slow"), t.button.show()
        })) : t.button.fadeOut("medium", function() {
          t.widget.stop().show().animate({
            bottom: "30px",
            opacity: 1
          }, 2 * t.delay), t.overlay.fadeIn(t.delay)
        })
      })
    }
  });
</script>
<?php
include 'head_f/footer.php';
?>
</body>

</html>