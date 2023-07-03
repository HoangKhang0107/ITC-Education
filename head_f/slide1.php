<?php 
    require_once 'admin/database/dbconfig.php';

    $slideQuery = "SELECT * from slide order by stt_slide";
    $kq = mysqli_query($connection, $slideQuery);
    
?>
<div id="carouselId" class="carousel slide my-2" data-ride="carousel">
               
        <div class="carousel-inner" role="listbox">

                <?php 
          while($slide = mysqli_fetch_assoc($kq)){ 
             ?>
          <div class="carousel-item active">
            <a href="<?= $slide["url"]; ?>"><?php echo "<img src=slide-img/".$row['anh_slide']."style="width:100%">" ?></a>   
          </div>
        <?php } ?>
        </div>

        <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Trước</span>
        </a>
        <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Sau</span>
        </a>
    </div>
<div id="contact-bar">
                    <div class="container">
                      <div class="row">
                        <!--  -->
                        <div class="col-md-4">
                          <div class="row conten-contact">
                            <div class="col-md-2">
                              <i class="fas fa-phone icon-contact-bar"></i>
                            </div>
                            <div class="col-md-10 text-contact-bar">
                              <p>Hotline</p>
                              
                            </div>
                          </div>
                        </div>
                        <!--  -->
                        <div class="col-md-4">
                            <div class="row conten-contact">
                              <div class="col-md-2">
                                  <i class="fas fa-clock icon-contact-bar"></i>
                              </div>
                              <div class="col-md-10 text-contact-bar">
                                <p>Trung tâm hoạt động</p>
                                
                              </div>
                            </div>
                        </div>
                          <!--  -->
                        <div class="col-md-4">
                              <div class="row conten-contact">
                                <div class="col-md-2">
                                    <i class="fas fa-envelope-open-text icon-contact-bar"></i>
                                </div>
                                <div class="col-md-10 text-contact-bar">
                                  <p>E-mail</p>
                                  <p>ngoaingutomatohp@gmail.com</p>
                                </div>
                              </div>
                        </div>
                      </div>
                    </div>
                  </div>
      

                 
