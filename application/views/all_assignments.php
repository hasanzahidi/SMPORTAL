<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'helpers/template_helper.php');
class Page extends Template{
    public $all_assignments;
    public function additional_header() {
        ?>
        <link href="<?php echo base_url(); ?>css/dashboard.css" rel="stylesheet">
        </head>
        <?php
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
          <h2>Assignments</h2>
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
                <li><a href="<?php echo base_url();?>index.php/assignments">Assignments</a></li>
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
              <?php
                $this->profileSidebar();
            ?>
            <div class="col-md-8">
            <div class="gt_d_classes_wrap default_width mb20">
                <h4 class="gt_d_title">Assignments</h4>
                <?php
                    $i=1;
                    foreach($this->all_assignments as $assignment){
                ?>
                 <div class="gt_d_courses_wrap default_width mb20 wow slideInUp">
                <figure>
                  <img src="<?php echo base_url();?>extra-images/courses-0<?php echo $i;?>.jpg" alt="">
                  <figcaption class="gt_listing_rating">
                    New
                  </figcaption>
                </figure>
                <div class="gt_d_classes_des">
                  <h6><a href="<?php echo base_url();?>index.php/assignments/assignmentpage/<?php echo $assignment->assignment_id;?>"><?php echo $assignment->assignment_title;?></a></h6>
                  <ul>
                    <li>
                      <ul class="gt_rating_star">
                        <li>
                          <a href="#"><i class="fa fa-star"></i></a>
                          <a href="#"><i class="fa fa-star"></i></a>
                          <a href="#"><i class="fa fa-star"></i></a>
                          <a href="#"><i class="fa fa-star"></i></a>
                          <a href="#"><i class="fa fa-star"></i></a>
                        </li>
                      </ul>
                    </li>
                    <li>Subject: <a href="<?php echo base_url();?>index.php//subjects/subjectpage/<?php echo $assignment->subject_id;?>"><?php echo $assignment->subject_name;?></a></li>
                  </ul>
                  <p>Assignment Issue Date: <?php echo $assignment->issue_date;?><br>
                  Assignment Due Date: <?php echo $assignment->due_date;?>
                  </p>
                </div>
              </div>
                <?php
                $i++;
                    }
                ?>
            </div>
          </div>
              
          </div>
      </section>
    </div>
        <?php
    }
}
$page = new Page();
$page->title='Assigments | Smportal';
$page->page_title='My Assignments';
$page->sub_title='';
$page->all_assignments=$all_assignments;
$page->display();