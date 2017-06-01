<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'helpers/template_helper.php');
class Page extends Template{
    public $all_departments;
    public function additional_header() {
        echo '</head>';
    }

    public function additional_scripts() {
        ?>
        <?php
        echo '</body></html>';
    }

    public function body_section() {
        ?>
    <div class="gt_sub_banner_bg default_width">
      <div class="container">
        <div class="gt_sub_banner_hdg  default_width">
          <h2>Departments</h2>
          <h6>SMPORTAL</h6>
        </div>
      </div>
    </div>
    <!--Sub Banner Wrap End -->
    <!--Breadcrumb Wrap End -->
    <div class="gt_breadcrumb_bg default_width">
      <div class="container">
        <div class="gt_breadcrumb_wrap default_width">
            <ul>
                <li><a href="<?php echo base_url();?>index.php">Home</a></li>
                <li><a href="<?php echo base_url();?>index.php/departments">departments</a></li>
            </ul>
        </div>
      </div>
    </div>
    <!--Breadcrumb Wrap End -->
    <!--Main Content Wrap Start-->
    <div class="gt_content_wrap">
      <!--Course Grid Wrap Start-->
      <section class="gt_courses_bg">
          <div class="container">
              <div class="row">
              <?php
              $i=1;
              foreach($this->all_departments as $department){
                  ?>
                  
                  <div class="col-md-4 col-sm-6 mb30">
              <div class="gt_courses_wrap default_width wow slideInUp">
                <figure>
                    <img src="<?php echo base_url();?>extra-images/courses-0<?php echo $i;?>.jpg" alt="">
                  <figcaption class="gt_course_img_des">
                    <div class="gt_course_des_holder">
                      <div class="gt_course_author">
                        <img src="<?php echo base_url();?>extra-images/course-author.png" alt="">
                        <a href="#"><i class="fa fa-user"></i><a href="<?php echo base_url();?>index.php/profileviewer/teachersprofile/<?php echo $department->hod;?>"></a><?php echo $department->hod;?></a>
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
                  <span><?php echo $department->degree;?></span>
                  <h5><a href="<?php echo base_url();?>index.php/departments/departmentpage/<?php echo $department->department_id?>"><?php echo $department->stream;?></a></h5>
                  <p>Campus Location: <?php echo $department->campus_location;?>  Office Location<?php echo $department->office_location;?> </p>
                </div>
                <div class="gt_course_bottom default_width">
                  <h5>$65<span>Per Month</span></h5>
                  <a href="#">Add to favorities</a>
                </div>
              </div>
            </div>
                  <?php
                  $i++;
              }
              ?>
              </div>
          </div>
      </section>
    </div>
        <?php
    }
}  
$page = new Page();
$page->title='Departments | Smportal';
$page->page_title='Departments';
$page->sub_title='';
$page->all_departments=$all_departments;
$page->display();