<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'helpers/template_helper.php');
class Page extends Template{
    public function additional_header() {
        echo '</head>';
    }

    public function additional_scripts() {
        ?>
<script type="text/javascript">
    if($('.main-slider .tp-banner').length){
    jQuery('.main-slider .tp-banner').show().revolution({
      delay:10000,
      startwidth:1200,
      startheight:780,
      hideThumbs:600,
  
      thumbWidth:80,
      thumbHeight:50,
      thumbAmount:5,
  
      navigationType:"bullet",
      navigationArrows:"0",
      navigationStyle:"preview4",
  
      touchenabled:"on",
      onHoverStop:"off",
  
      swipe_velocity: 0.7,
      swipe_min_touches: 1,
      swipe_max_touches: 1,
      drag_block_vertical: false,
  
      parallax:"mouse",
      parallaxBgFreeze:"on",
      parallaxLevels:[7,4,3,2,5,4,3,2,1,0],
  
      keyboardNavigation:"off",
  
      navigationHAlign:"center",
      navigationVAlign:"bottom",
      navigationHOffset:0,
      navigationVOffset:20,
  
      soloArrowLeftHalign:"left",
      soloArrowLeftValign:"center",
      soloArrowLeftHOffset:20,
      soloArrowLeftVOffset:0,
  
      soloArrowRightHalign:"right",
      soloArrowRightValign:"center",
      soloArrowRightHOffset:20,
      soloArrowRightVOffset:0,
  
      shadow:0,
      fullWidth:"on",
      fullScreen:"off",
  
      spinner:"spinner4",
  
      stopLoop:"off",
      stopAfterLoops:-1,
      stopAtSlide:-1,
  
      shuffle:"off",
  
      autoHeight:"off",
      forceFullWidth:"on",
  
      hideThumbsOnMobile:"on",
      hideNavDelayOnMobile:1500,
      hideBulletsOnMobile:"on",
      hideArrowsOnMobile:"on",
      hideThumbsUnderResolution:0,
  
      hideSliderAtLimit:0,
      hideCaptionAtLimit:0,
      hideAllCaptionAtLilmit:0,
      startWithSlide:0,
      videoJsPath:"",
      fullScreenOffsetContainer: ""
    });
  }
  </script>


        <?php
        echo '</body></html>';
    }

    public function body_section() {
        ?>
        <!--Banner Wrap Start-->
    <div class="main-slider default_width">
      <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                  <li data-transition="slidedown" data-slotamount="1" data-masterspeed="1000" data-thumb="<?php echo base_url(); ?>extra-images/banner-02.jpg"  data-saveperformance="off"  data-title="Awsome Service">
                        <img src="<?php echo base_url(); ?>extra-images/banner-02.jpg"  alt=""  data-bgposition="center 25%" data-bgfit="cover" data-bgrepeat="no-repeat"> 
                    
                        <div class="tp-caption lfl tp-resizeme"
                        data-x="right" data-hoffset="0"
                        data-y="center" data-voffset="-100"
                        data-speed="1500"
                        data-start="500"
                        data-easing="easeOutExpo"
                        data-splitin="none"
                        data-splitout="none"
                        data-elementdelay="0.01"
                        data-endelementdelay="0.3"
                        data-endspeed="1200"
                        data-endeasing="Power4.easeIn"
                        style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;"><h2>The Complete Students</h2></div>
                        
                        
                        <div class="tp-caption lfr tp-resizeme"
                        data-x="right" data-hoffset="0"
                        data-y="center" data-voffset="-40"
                        data-speed="1500"
                        data-start="500"
                        data-easing="easeOutExpo"
                        data-splitin="none"
                        data-splitout="none"
                        data-elementdelay="0.01"
                        data-endelementdelay="0.3"
                        data-endspeed="1200"
                        data-endeasing="Power4.easeIn"
                        style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;"><h2>Portal</h2></div>
                        
                        <div class="tp-caption lfb tp-resizeme"
                        data-x="right" data-hoffset="-220"
                        data-y="center" data-voffset="40"
                        data-speed="1500"
                        data-start="1000"
                        data-easing="easeOutExpo"
                        data-splitin="none"
                        data-splitout="none"
                        data-elementdelay="0.01"
                        data-endelementdelay="0.3"
                        data-endspeed="1200"
                        data-endeasing="Power4.easeIn"
                        style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;"><div class="link-box"><a href="<?php echo base_url(); ?>/index.php/login" class="default-btn theme-btn">Login</a></div></div>
                        
                        <div class="tp-caption lfb tp-resizeme"
                        data-x="right" data-hoffset="0"
                        data-y="center" data-voffset="40"
                        data-speed="1500"
                        data-start="1000"
                        data-easing="easeOutExpo"
                        data-splitin="none"
                        data-splitout="none"
                        data-elementdelay="0.01"
                        data-endelementdelay="0.3"
                        data-endspeed="1200"
                        data-endeasing="Power4.easeIn"
                        style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;"><div class="link-box"><a href="<?php echo base_url(); ?>/index.php/contact" class="default-btn style-two theme-btn">Contact</a></div></div>
                  </li>

                  <li data-transition="slidedown" data-slotamount="1" data-masterspeed="1000" data-thumb="<?php echo base_url(); ?>extra-images/banner-03.jpg"  data-saveperformance="off"  data-title="Awsome Service">
                        <img src="<?php echo base_url(); ?>extra-images/banner-03.jpg"  alt=""  data-bgposition="center 25%" data-bgfit="cover" data-bgrepeat="no-repeat"> 
                    
                        <div class="tp-caption lfl tp-resizeme"
                        data-x="left" data-hoffset="0"
                        data-y="center" data-voffset="-100"
                        data-speed="1500"
                        data-start="500"
                        data-easing="easeOutExpo"
                        data-splitin="none"
                        data-splitout="none"
                        data-elementdelay="0.01"
                        data-endelementdelay="0.3"
                        data-endspeed="1200"
                        data-endeasing="Power4.easeIn"
                        style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;"><h2>Meghnad Saha Institute</h2></div>
                        
                        
                        <div class="tp-caption lfr tp-resizeme"
                        data-x="left" data-hoffset="0"
                        data-y="center" data-voffset="-40"
                        data-speed="1500"
                        data-start="500"
                        data-easing="easeOutExpo"
                        data-splitin="none"
                        data-splitout="none"
                        data-elementdelay="0.01"
                        data-endelementdelay="0.3"
                        data-endspeed="1200"
                        data-endeasing="Power4.easeIn"
                        style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;"><h2>of Technology</h2></div>
                        
                        <div class="tp-caption lfb tp-resizeme"
                        data-x="left" data-hoffset="00"
                        data-y="center" data-voffset="40"
                        data-speed="1500"
                        data-start="1000"
                        data-easing="easeOutExpo"
                        data-splitin="none"
                        data-splitout="none"
                        data-elementdelay="0.01"
                        data-endelementdelay="0.3"
                        data-endspeed="1200"
                        data-endeasing="Power4.easeIn"
                        style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;"><div class="link-box"><a href="<?php echo base_url(); ?>/index.php/login" class="default-btn theme-btn">Login</a></div></div>
                        
                        <div class="tp-caption lfb tp-resizeme"
                        data-x="left" data-hoffset="200"
                        data-y="center" data-voffset="40"
                        data-speed="1500"
                        data-start="1000"
                        data-easing="easeOutExpo"
                        data-splitin="none"
                        data-splitout="none"
                        data-elementdelay="0.01"
                        data-endelementdelay="0.3"
                        data-endspeed="1200"
                        data-endeasing="Power4.easeIn"
                        style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;"><div class="link-box"><a href="<?php echo base_url(); ?>/index.php/contact" class="default-btn style-two theme-btn">Contact</a></div></div>
                  </li>

                  <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="<?php echo base_url(); ?>extra-images/banner-01.jpg"  data-saveperformance="off"  data-title="Awsome Service">
                    <img src="<?php echo base_url(); ?>extra-images/banner-01.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"> 
                    
                    <div class="tp-caption lfl tp-resizeme"
                    data-x="center" data-hoffset="0"
                    data-y="center" data-voffset="-100"
                    data-speed="1500"
                    data-start="500"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
                    data-endeasing="Power4.easeIn"
                    style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;"><h2>All Your Academic</h2></div>
                    
                    
                    <div class="tp-caption lfr tp-resizeme"
                    data-x="center" data-hoffset="0"
                    data-y="center" data-voffset="-40"
                    data-speed="1500"
                    data-start="500"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
                    data-endeasing="Power4.easeIn"
                    style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;"><h2>Online</h2></div>
                    
                    <div class="tp-caption lfb tp-resizeme"
                    data-x="center" data-hoffset="-100"
                    data-y="center" data-voffset="40"
                    data-speed="1500"
                    data-start="1000"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
                    data-endeasing="Power4.easeIn"
                    style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;"><div class="link-box"><a href="<?php echo base_url(); ?>/index.php/login" class="default-btn theme-btn">Login</a></div></div>
                    
                    <div class="tp-caption lfb tp-resizeme"
                    data-x="center" data-hoffset="100"
                    data-y="center" data-voffset="40"
                    data-speed="1500"
                    data-start="1000"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
                    data-endeasing="Power4.easeIn"
                    style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;"><div class="link-box"><a href="<?php echo base_url(); ?>/index.php/contact" class="default-btn style-two theme-btn">Contact</a></div></div>
                    </li>
                </ul>
              <div class="tp-bannertimer"></div>
            </div>
        </div>
    </div>
    <!--Banner Wrap End-->
    
    <!--Main Content Wrap Start-->
    <div class="gt_content_wrap">
      <!--Banner Services Wrap Start-->
      <div class="gt_banner_service_wrap default_width">
        <div class="container">
          <div class="col-md-4 no_padding wow slideInUp">
            <div class="gt_banner_service service_bg_1 default_width" style="background-image:url(<?php echo base_url(); ?>extra-images/courses-01.jpg);">
              <i class="icon-commerce"></i>
              <h4><a href="<?php echo base_url(); ?>index.php/login">Teachers</a></h4>
              <p>Professors and Teachers Portal</p>
              <a href="<?php echo base_url(); ?>index.php/login">View More</a>
            </div>
          </div>
          <div class="col-md-4 no_padding wow slideInUp">
            <div class="gt_banner_service service_bg_2 default_width" style="background-image:url(<?php echo base_url(); ?>extra-images/courses-02.jpg);">
              <i class="icon-computer-1"></i>
              <h4><a href="<?php echo base_url(); ?>index.php/login">Administrators</a></h4>
              <p>Portal for Web Administrator</p>
              <a href="<?php echo base_url(); ?>index.php/login">View More</a>
            </div>
          </div>
          <div class="col-md-4 no_padding wow slideInUp">
            <div class="gt_banner_service service_bg_3 default_width" style="background-image:url(<?php echo base_url(); ?>extra-images/courses-03.jpg);">
              <i class="icon-open-book"></i>
              <h4><a href="<?php echo base_url(); ?>index.php/login">Students</a></h4>
              <p>Portal for the students</p>
              <a href="<?php echo base_url(); ?>index.php/login">View More</a>
            </div>
          </div>
        </div>
      </div>
    <!--Banner Services Wrap End-->
    <!--Explore All Courses Wrap End-->
      <section class="gt_courses_bg">
        <div class="container">
          <!--Heading Wrap Start-->
          <div class="gt_hdg_1 default_width">
            <h3>Explore all the Departments</h3>
            <p>Explore the various departments that we offer with all practical lab facilities</p>
              <span class="gt_hdg_left"></span>
              <i class="icon-school"></i>
              <span class="gt_hdg_right"></span>
          </div>
          <!--Heading Wrap End-->

          <!--Search Wrap Start-->
          <div class="row">
            <div class="col-md-9 col-sm-8 wow slideInUp">
              <div class="gt_course_search default_width">
                <form>
                  <input type="search" placeholder="Search Department">
                  <a href="#"><i class="fa fa-search"></i></a>
                </form>
              </div>
            </div>
            <div class="col-md-3 col-sm-4 wow slideInUp">
              <div class="gt_sort_wrap">
                  <span>Sort by:</span>
                  <label class="fa fa-angle-down"></label>
                  <select>
                    <option>Number of seats</option>
                    <option>Popular</option>
                    <option>Cut-Off</option>
                  </select>
                </div>
            </div>
          </div>
          <!--Search Wrap End-->

          <!--Courses List Wrap Start-->
          <div class="gt_courses_slider" id="gt_courses_slider">
            <div class="item wow slideInUp">
              <div class="gt_courses_wrap default_width">
                <figure>
                  <img src="extra-images/courses-01.jpg" alt="">
                  <figcaption class="gt_course_img_des">
                    <div class="gt_course_des_holder">
                      <div class="gt_course_author">
                        <img src="extra-images/testimonial-01.jpg" alt="">
                        <a href="#"><i class="fa fa-user"></i>Biplab Kumar Burman</a>
                      </div>
                      <ul class="gt_rating_star">
                        <li>
                          <a href="#"><i class="fa fa-star"></i></a>
                          <a href="#"><i class="fa fa-star"></i></a>
                          <a href="#"><i class="fa fa-star"></i></a>
                          <a href="#"><i class="fa fa-star"></i></a>
                          <a href="#"><i class="fa fa-star"></i></a>
                        </li>
                      </ul>
                    </div>
                    <div class="gt_course_cat gt_bg_4">New</div>
                  </figcaption>
                </figure>
                <div class="gt_course_des default_width">
                  <span>Capacity: 60</span>
                  <h5><a href="#">Computer Science</a></h5>
                  <p>Computer science is the study of the theory, experimentation, and engineering that form the basis for the design and use of computers.</p>
                </div>
                <div class="gt_course_bottom default_width">
                  <h5>Rs40000<span>Sem Fees</span></h5>
                  <a href="#">Add to favorities</a>
                </div>
              </div>
            </div>
            <div class="item wow slideInUp">
              <div class="gt_courses_wrap default_width">
                <figure>
                  <img src="extra-images/courses-02.jpg" alt="">
                  <figcaption class="gt_course_img_des">
                    <div class="gt_course_des_holder">
                      <div class="gt_course_author">
                        <img src="extra-images/testimonial-02.jpg" alt="">
                        <a href="#"><i class="fa fa-user"></i>Shiladitya Munsi</a>
                      </div>
                      <ul class="gt_rating_star">
                        <li>
                          <a href="#"><i class="fa fa-star"></i></a>
                          <a href="#"><i class="fa fa-star"></i></a>
                          <a href="#"><i class="fa fa-star"></i></a>
                          <a href="#"><i class="fa fa-star"></i></a>
                          <a href="#"><i class="fa fa-star"></i></a>
                        </li>
                      </ul>
                    </div>
                    <div class="gt_course_cat gt_bg_4">New</div>
                  </figcaption>
                </figure>
                <div class="gt_course_des default_width">
                  <span>Capacity: 60 </span>
                  <h5><a href="#">Information Technology</a></h5>
                  <p>Information technology (IT) is the application of computers to store, study, and manipulate data,</p>
                </div>
                <div class="gt_course_bottom default_width">
                  <h5>Rs40000<span>Sem Fees</span></h5>
                  <a href="#">Add to favorities</a>
                </div>
              </div>
            </div>
            <div class="item wow slideInUp">
              <div class="gt_courses_wrap default_width">
                <figure>
                  <img src="extra-images/courses-03.jpg" alt="">
                  <figcaption class="gt_course_img_des">
                    <div class="gt_course_des_holder">
                      <div class="gt_course_author">
                        <img src="extra-images/testimonial-03.jpg" alt="">
                        <a href="#"><i class="fa fa-user"></i>Sudip Dogra</a>
                      </div>
                      <ul class="gt_rating_star">
                        <li>
                          <a href="#"><i class="fa fa-star"></i></a>
                          <a href="#"><i class="fa fa-star"></i></a>
                          <a href="#"><i class="fa fa-star"></i></a>
                          <a href="#"><i class="fa fa-star"></i></a>
                          <a href="#"><i class="fa fa-star"></i></a>
                        </li>
                      </ul>
                    </div>
                    <div class="gt_course_cat gt_bg_4">New</div>
                  </figcaption>
                </figure>
                <div class="gt_course_des default_width">
                  <span>Capacity: 60</span>
                  <h5><a href="#">Electronics & Communication</a></h5>
                  <p>Electronics is a subfield within electrical engineering academic subject but denotes a broad engineering field </p>
                </div>
                <div class="gt_course_bottom default_width">
                  <h5>Rs40000<span>Sem Fees</span></h5>
                  <a href="#">Add to favorities</a>
                </div>
              </div>
            </div>
            <div class="item wow slideInUp">
              <div class="gt_courses_wrap default_width">
                <figure>
                  <img src="extra-images/courses-04.jpg" alt="">
                  <figcaption class="gt_course_img_des">
                    <div class="gt_course_des_holder">
                      <div class="gt_course_author">
                        <img src="extra-images/testimonial-04.jpg" alt="">
                        <a href="#"><i class="fa fa-user"></i>Ronnie Islam</a>
                      </div>
                      <ul class="gt_rating_star">
                        <li>
                          <a href="#"><i class="fa fa-star"></i></a>
                          <a href="#"><i class="fa fa-star"></i></a>
                          <a href="#"><i class="fa fa-star"></i></a>
                          <a href="#"><i class="fa fa-star"></i></a>
                          <a href="#"><i class="fa fa-star"></i></a>
                        </li>
                      </ul>
                    </div>
                    <div class="gt_course_cat gt_bg_4">New</div>
                  </figcaption>
                </figure>
                <div class="gt_course_des default_width">
                  <span>Capacity: 60</span>
                  <h5><a href="#">Business Administration</a></h5>
                  <p>Business administration is management of a business. It includes all aspects of overseeing and supervising business operations </p>
                </div>
                <div class="gt_course_bottom default_width">
                  <h5>Rs40000<span>Sem Fees</span></h5>
                  <a href="#">Add to favorities</a>
                </div>
              </div>
            </div>
          </div>
          <!--Courses List Wrap End-->
        </div>
      </section>
    </div>    
        <?php
    }
}  
$page = new Page();
$page->title='Home | Smportal';
$page->page_title='SMPORTAL';
$page->sub_title='';
$page->display();