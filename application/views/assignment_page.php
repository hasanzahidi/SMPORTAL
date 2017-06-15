<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'helpers/template_helper.php');
class Page extends Template{
    public $assignment_info;
    public $assignment_question;
    public $assignment_button;
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
          <h2>Assignment Page</h2>
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
                
                  <table class="gt_classes_table">
                  <thead class="gt_table_head">
                    <tr >
                      <th></th>
                      <th>Details</th>
                    </tr>
                  </thead>
                  <tbody class="gt_class_body_bg">
                      <tr>
                          <td>Assignment Name : </td>
                          <td><?php echo $this->assignment_info->assignment_title;?></td>
                      </tr>
                      <tr>
                          <td>Subject : </td>
                          <td><a href="<?php echo base_url();?>index.php/subjects/subjectpage/<?php echo $this->assignment_info->subject_id;?>"><?php echo $this->assignment_info->subject_name;?></a></td>
                      </tr>
                      <tr>
                          <td>Issue Date : </td>
                          <td><?php echo $this->assignment_info->issue_date;?></td>
                      </tr>
                      <tr>
                          <td>Due Date : </td>
                          <td><?php echo $this->assignment_info->due_date;?></td>
                      </tr>
                      <tr>
                          <td>Note : </td>
                          <td><?php echo $this->assignment_info->notes;?></td>
                      </tr>
                  </tbody>
                  </table>
                  <br>
                  <br>
                  <h4>Questions</h4>
                  <div>
                      <table class="gt_classes_table">
                  <thead class="gt_table_head">
                    <tr >
                      <th>Serial No.</th>
                      <th>Question</th>
                      <th>Diagram</th>
                      <th>Marks</th>
                    </tr>
                  </thead>
                  <tbody class="gt_class_body_bg">
                      
                          <?php
                            $i=1;
                            foreach($this->assignment_question as $question){
                           ?>
                      <tr>
                          <td><?php echo $i;?></td>
                          <td><?php echo $question->question;?></td>
                          <td><?php echo $question->diagrams;?></td>
                          <td><?php echo $question->marks;?></td>
                      </tr>
                            <?php
                            $i++;
                            }
                            ?>
                  </tbody>
                  </table>
                  </div>
                  <br>
                  <div class="gt_course_listing_des">
                      
                      <?php
                      $link='';
                      if($this->assignment_button==='SUBMIT REPLY'){
                          $link='http://localhost/smportal/index.php/assignments/submitform'; 
                      }
                      elseif($this->assignment_button==='SEE SUBMISSION'){
                          $link='http://localhost/smportal/index.php/assignments/seeyoursubmission/'.$this->assignment_info->assignment_id;
                      }
                      elseif($this->assignment_button==='Submissions'){
                          $link='http://localhost/smportal/index.php/assignments/seereplieslist/'.$this->assignment_info->assignment_id;
                      }
                      ?>
                      <a href="<?php echo $link;?>"><?php echo $this->assignment_button;?></a></div>
              </div>
            </div>
          </div>
              
          </div>
      </section>
    </div>
        <?php
    }
}  
$page = new Page();
$page->title='Assignment Page | Smportal';
$page->page_title='Assignment Page';
$page->sub_title='';
$page->assignment_info=$assignment_info;
$page->assignment_question=$assignment_question;
$page->assignment_button=$button;
$page->display();