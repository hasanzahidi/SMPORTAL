<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'helpers/template_helper.php');
class Page extends Template{
    public $enrolled;
    public $create_message;
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
          <h2>Assignment Replies</h2>
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
                
                 <section class="pages login-page section-padding-top" style="border-top: 1px dashed #b8b8b8">
            <div class="container">
                <div class="row">
                  <div class="col-sm-6">
                        <div class="login-text">
                            <div class="log-title">
				<h3><strong>Add a new Assignment</strong></h3><hr />
                            </div>
                            <div class="custom-input">
				<p id="create-message"><?php echo "$this->create_message";?></p>
                                <form id="create-form" action="<?php echo base_url(); ?>/index.php/assignments/createnewassignment" method="post">
                                    <select name="enroll-id">
                                        <?php
                                        foreach($this->enrolled as $enroll){
                                        ?>
                                        <option value="<?php echo $enroll->enroll_id;?>" ><?php echo $enroll->enroll_id;?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <br>
                                    <input type="hidden">
                                    <input type="text" name="assignment-title" placeholder="Assignment Title" required><br>
                                    <input type="hidden">
                                    <input type="date" name="due-date" placeholder="Last Submission Date" required><br>
                                    <input type="hidden">
                                    <input type="text" name="note" placeholder="Add a note"><br>
                                    <input type="hidden">
                                    <input type="submit" value="Create" style="background-color:#000;color:#fff">
                                </form>
                            </div>
			</div>
                    </div>
                   </div>
              </div>
      </section>
                  
          </div>
              
          </div>
          </div>
      </section>
    </div>
        <?php
    }
}  
$page = new Page();
$page->title='New Assignment | Smportal';
$page->page_title='New Assignment';
$page->sub_title='';
$page->enrolled=$enrolled;
$page->create_message='';
$page->display();