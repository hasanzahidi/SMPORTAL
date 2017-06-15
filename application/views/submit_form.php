<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'helpers/template_helper.php');
class Page extends Template{
    public $assignment_question;
    public $a_message;
    public function additional_header() {
        ?>
        <link href="<?php echo base_url(); ?>css/crazycss.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/dashboard.css" rel="stylesheet">
        </head>
        <?php
    }

    public function additional_scripts() {
        ?>
        <script>
        $('form[id^="add-answer-form-"]').on('submit', function (e) {
                    e.preventDefault();
                    var $form = $(this);
                    var qid = $form.find('input[name="qid"]').val();
                    var answer = $form.find('input[name="answer"]').val();
                    var url = "<?php echo base_url();?>index.php/assignments/assignmentreplies";
                /* Send the data using post */
                    var posting = $.post(url, {
                        'qid': qid,
                        'answer': answer
                    });

                /* Put the results in a div */
                    var formid=$(document.activeElement).attr('id');
                    console.log(formid);
                    posting.done(function(data) {
                        if(data==-1){
                            $("#add-answer-form-"+formid).empty().append("Error!");
                        }
                        else{
                            $("#add-answer-form-"+formid).empty().append("Success!");
                        }
                    });
                });    
        </script>
        <?php
        echo '</body></html>';
    }

    public function body_section() {
        ?>
    <div class="gt_sub_banner_bg default_width">
      <div class="container">
        <div class="gt_sub_banner_hdg  default_width">
          <h2>Submit Assignment</h2>
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
                
                  <h4>Your Answers</h4><br>
                  <?php
                    $i=1;
                    foreach($this->assignment_question as $question){
                  ?>
                  <table class="gt_classes_table">
                  <tbody class="gt_class_body_bg">
                      <tr>
                          <td>Sl No : </td>
                          <td><?php echo $i;?></td>
                      </tr>
                      <tr>
                          <td>Question : </td>
                          <td><?php echo $question->question;?></td>
                      </tr>
                      <tr>
                          <td>Diagram : </td>
                          <td><?php echo $question->diagrams;?></td>
                      </tr>
                      <tr>
                          <td>Marks : </td>
                          <td><?php echo $question->marks;?></td>
                      </tr>
                      <tr>
                          <td>Your Answer : </td>
                          <td>
                              <div class="custom-input">
                                <form id="add-answer-form-<?php echo $i; ?>" action="<?php echo base_url(); ?>/index.php/assignments/assignmentreplies" method="post">
                                    <input type="hidden" name="qid" value="<?php echo $question->question_id;?>">
                                    <br><input type="text" name="answer" placeholder="Your answer" required>
                                    <br><input type="submit" id="<?php echo $i; ?>" value="Sumbit" style="background-color:#000;color:#fff">
                                </form>
                            </div>
                              
                          </td>
                      </tr>
                      
                  </tbody>
                  </table>
                  <br>
                  <br>
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
$page->title='Submit Assignment | Smportal';
$page->page_title='Submit Assignment';
$page->sub_title='';
$page->a_message='';
$page->assignment_question=$assignment_question;
$page->display();