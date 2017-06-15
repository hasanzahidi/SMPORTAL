<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'helpers/template_helper.php');
class Page extends Template{
    public $assignment_replies;
    public $id;
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
                  <br>
                  <h4>Replies</h4>
                  <div>
                      <table class="gt_classes_table">
                  <thead class="gt_table_head">
                    <tr >
                      <th>Sl. no.</th>
                      <th>Student ID.</th>
                      <th>Reply</th>
                    </tr>
                  </thead>
                  <tbody class="gt_class_body_bg">
                      
                          <?php
                            $i=1;
                            foreach($this->assignment_replies as $reply){
                           ?>
                      <tr>
                          <td><?php echo $i;?></td>
                          <td><?php echo $reply->student_id;?></td>
                          <td><a href="<?php echo base_url();?>index.php/assignments/seestudentssubmission/<?php echo $this->id;?>/<?php echo $reply->student_id;?>">See Answers</a></td>
                      </tr>
                            <?php
                            $i++;
                            }
                            ?>
                  </tbody>
                  </table>
                  </div>
                  <br>
              </div>
          </div>
              
          </div>
      </section>
    </div>
        <?php
    }
}  
$page = new Page();
$page->title='Assignment Replies | Smportal';
$page->page_title='Assignment Replies';
$page->sub_title='';
$page->assignment_replies=$reply_list;
$page->id=$id;
$page->display();