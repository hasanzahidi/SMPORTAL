<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'helpers/template_helper.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Page extends Template{
    public $user_data;
    public function additional_header() {
        ?>
        <link href="<?php echo base_url(); ?>css/crazycss.css" rel="stylesheet">
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
          <h2>Profile</h2>
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
                <li><a href="<?php echo base_url();?>index.php/profile">Profile</a></li>
            </ul>
        </div>
      </div>
    </div>
    <!--Breadcrumb Wrap End -->
    <!--Main Content Wrap Start-->
    <div class="gt_content_wrap">
      <!--Classes Wrap Start-->
      <section class="gt_courses_bg">
        <div class="container">
            <?php
            $this->profileSidebar();
            ?>
          <div class="col-md-8">
            <div class="gt_d_classes_wrap default_width mb20">
              <div class="gt_d_profile_wrap default_width wow slideInUp">
                
                <div class="gt_d_profile_detail">
                  <ul>
                    <li>
                      <span>Name: </span>
                      <p><?php echo $_SESSION['user_data']['first_name'];?>  <?php echo $_SESSION['user_data']['last_name'];?></p>
                    </li>
                    <?php
                        if($_SESSION['role']=='student'){
                    ?>
                    <li>
                      <span>Student ID: </span>
                      <p><?php echo $this->user_data->student_id;?></p>
                    </li>
                    <li>
                      <span>University Roll: </span>
                      <p><?php echo $this->user_data->univ_roll;?></p>
                    </li>
                    <li>
                      <span>University Registration: </span>
                      <p><?php echo $this->user_data->univ_reg;?></p>
                    </li>
                    <li>
                      <span>Registration Year: </span>
                      <p><?php echo $this->user_data->reg_year;?></p>
                    </li>
                    <li>
                      <span>Graduating Year</span>
                      <p><?php echo $this->user_data->batch;?></p>
                    </li>
                    <li>
                      <span>Tenth Board</span>
                      <p><?php echo $this->user_data->ten_board;?></p>
                    </li>
                    <li>
                      <span>Tenth School</span>
                      <p><?php echo $this->user_data->ten_school;?></p>
                    </li>
                    <li>
                      <span>Tenth City</span>
                      <p><?php echo $this->user_data->ten_city;?></p>
                    </li>
                    <li>
                      <span>Tenth Stream</span>
                      <p><?php echo $this->user_data->ten_stream;?></p>
                    </li>
                    <li>
                      <span>Tenth Year</span>
                      <p><?php echo $this->user_data->ten_year;?></p>
                    </li>
                    <li>
                      <span>Tenth Percentage</span>
                      <p><?php echo $this->user_data->ten_percent;?></p>
                    </li>
                    <li>
                      <span>Twelfth Board</span>
                      <p><?php echo $this->user_data->twelve_board;?></p>
                    </li>
                    <li>
                      <span>Twelfth School</span>
                      <p><?php echo $this->user_data->twelve_school;?></p>
                    </li>
                    <li>
                      <span>Twelfth City</span>
                      <p><?php echo $this->user_data->twelve_city;?></p>
                    </li>
                    <li>
                      <span>Twelfth Stream</span>
                      <p><?php echo $this->user_data->twelve_stream;?></p>
                    </li>
                    <li>
                      <span>Twelfth Year</span>
                      <p><?php echo $this->user_data->twelve_year;?></p>
                    </li>
                    <li>
                      <span>Twelfth Percentage</span>
                      <p><?php echo $this->user_data->twelve_percent;?></p>
                    </li>
                    <li>
                      <span>Father Name</span>
                      <p><?php echo $this->user_data->father_name;?></p>
                    </li>
                    <li>
                      <span>Mother Name</span>
                      <p><?php echo $this->user_data->mother_name;?></p>
                    </li>
                    <li>
                      <span>Father Occupation</span>
                      <p><?php echo $this->user_data->father_occupation;?></p>
                    </li>
                    <li>
                      <span>Mother Occupation</span>
                      <p><?php echo $this->user_data->mother_occupation;?></p>
                    </li>
                    <li>
                      <span>Guardian</span>
                      <p><?php echo $this->user_data->guardian;?></p>
                    </li>
                    
                    <li>
                      <span>Father Contact</span>
                      <p><?php echo $this->user_data->father_contact;?></p>
                    </li>
                    <li>
                      <span>Mother Contact</span>
                      <p><?php echo $this->user_data->mother_contact;?></p>
                    </li>
                    <li>
                      <span>Guardian Contact</span>
                      <p><?php echo $this->user_data->guardian_contact;?></p>
                    </li>
                    
                    <?php
                        }
                        elseif($_SESSION['role']=='teacher'){   
                    ?>
                    <li>
                      <span>Teacher ID: </span>
                      <p><?php echo $this->user_data->teacher_id;?></p>
                    </li>
                    <li>
                      <span>Highest Degree: </span>
                      <p><?php echo $this->user_data->highest_degree;?></p>
                    </li>
                    <li>
                      <span>College: </span>
                      <p><?php echo $this->user_data->college;?></p>
                    </li>
                    <li>
                      <span>University: </span>
                      <p><?php echo $this->user_data->university;?></p>
                    </li>
                    <li>
                      <span>City</span>
                      <p><?php echo $this->user_data->city;?></p>
                    </li>
                    <li>
                      <span>Stream</span>
                      <p><?php echo $this->user_data->stream;?></p>
                    </li>
                    <li>
                      <span>Batch</span>
                      <p><?php echo $this->user_data->batch;?></p>
                    </li>
                    <li>
                      <span>Past Experience</span>
                      <p><?php echo $this->user_data->past_experience;?></p>
                    </li>
                    <li>
                      <span>Knowledge</span>
                      <p><?php echo $this->user_data->knowledge;?></p>
                    </li>
                    <li>
                      <span>Joined On</span>
                      <p><?php echo $this->user_data->joined_on;?></p>
                    </li>
                    <?php
                        }
                    ?>
                  </ul>
                </div>
              </div>
            </div>

            

          </div>
          <!--Classes List Wrap End-->
           
            </div>
      </section>
      <!--Classes Wrap End-->
    </div>
    <!--Main Content Wrap End-->
        <?php
    }
}  
$page = new Page();
$page->title='My Account | SMPORTAL';
$page->page_title='My Profile';
$page->sub_title='Profile';
$page->user_data=$user_data;
$page->display();