<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'helpers/template_helper.php');
class Page extends Template{
    public $replies;
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
              <div class="gt_d_profile_wrap default_width wow slideInUp">
                
                  <h4>Submission</h4>
                  <?php
                        foreach($this->replies as $reply){
                  ?>
                  <table class="gt_classes_table">
                  <tbody class="gt_class_body_bg">
                      <tr>
                          <td>Question : </td>
                          <td><?php echo $reply->question;?></td>
                      </tr>
                      <tr>
                          <td>Diagram : </td>
                          <td><?php echo $reply->diagrams;?></td>
                      </tr>
                      <tr>
                          <td>Marks : </td>
                          <td><?php echo $reply->marks;?></td>
                      </tr>
                      <tr>
                          <td>Answer : </td>
                          <td><?php echo $reply->answer;?></td>
                      </tr>
                      <tr>
                          <td>Timestamp : </td>
                          <td><?php echo $reply->timestamp;?></td>
                      </tr>
                  </tbody>
                  </table>
                  <br>
                  <?php
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
$page->title='Your Replies | Smportal';
$page->page_title='Your  Replies';
$page->sub_title='';
$page->replies=$assignment_answers;
$page->display();