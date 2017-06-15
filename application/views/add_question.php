<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'helpers/template_helper.php');
class Page extends Template{
    public $assignment_id;
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
        <script>
        $('#add-form').on('submit', function (e) {
                    e.preventDefault();
                    var $form = $(this);
                    var assignment_id = $form.find('input[name="assignment-id"]').val();
                    var question = $form.find('input[name="question"]').val();
                    var diagrams = $form.find('input[name="diagrams"]').val();
                    var marks = $form.find('input[name="marks"]').val();
                    var url = "<?php echo base_url();?>index.php/assignments/addnewquestion";
                /* Send the data using post */
                    var posting = $.post(url, {
                        'assignment-id': assignment_id,
                        'question': question,
                        'diagrams': diagrams,
                        'marks': marks
                    });

                /* Put the results in a div */
                    posting.done(function(data) {
                        if(data==-1){
                            $("#create-message").empty().append("Error!");
                        }
                        else{
                            $("#create-message").empty().append("Success!");
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
          <h2>Assignment Question</h2>
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
				<h3><strong>Add a new question</strong></h3><hr />
                            </div>
                            <div class="custom-input">
				<p id="create-message"><?php echo "$this->create_message";?></p>
                                <form id="add-form" method="post">
                                   
                                    <input type="text" name="assignment-id" value="<?php echo $this->assignment_id?>" required><br>
                                    <input type="text" name="question" placeholder="Your Question" required><br>
                                    <input type="text" name="diagrams" placeholder="Add a diagram link"><br>
                                    <input type="number" name="marks" placeholder="Add Marks"><br>
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
$page->title='New Assignment Question | Smportal';
$page->page_title='New Assignment Question';
$page->sub_title='';
$page->assignment_id=$id;
$page->create_message='';
$page->display();