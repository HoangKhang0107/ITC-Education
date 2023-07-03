<?php 
include 'admin/database/dbconfig.php'; 
 $query = "SELECT * FROM thongtin_web";
          $query_run= mysqli_query($connection,$query);
?>
<div id="footer">
          <div class="container">
            <div class="row">
               <?php while ($row=mysqli_fetch_assoc($query_run)) 
          {            
            
            ?>      
              <div class="col-md-4 col-footer">
                  <div id="location-us">

                  </div>
              </div>
              <div class="col-md-3 col-footer">
                <div id="social-network">
                  <p class="social-network-title">Facebook liên hệ</p>
                  <ul>
                    <li><a href="<?= $row['Facebook']; ?>"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="<?= $row['Youtube']; ?>"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                    
                  </ul>
                  
                </div>

              </div>
                 <?php } ?>
              <div class="col-md-3 col-footer">
                <div id="guide">
                </div>
              </div>
              <div class="col-md-2 col-footer">
                <div id="footer-course">

                </div>
              </div>
            </div>
          </div>
      </div>

      <div id="copyright">
        <div class="container">
          <p class="text-center">
            © 2023 HỆ THỐNG THÔNG TIN ITC
        </p>
        </div>
      </div>
        
  </div>
  <!-- End Copyright Section -->
    <!-- Script -->
    <script src="js/scrip.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    