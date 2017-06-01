<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'helpers/template_helper.php');
class Page extends Template{
    public $all_sem_fees;
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
          <h2>Semester Fee</h2>
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
                <li><a href="<?php echo base_url();?>index.php/semfees">Semester Fee</a></li>
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
                      <th>Semester</th>
                      <th>Due Date</th>
                      <th>Tuition Fee</th>
                      <th>Hostel Fee</th>
                      <th>Late Fee</th>
                      <th>Total Fee</th>
                      <th>Paid</th>
                    </tr>
                  </thead>
                  <tbody class="gt_class_body_bg">
                      <tr>
                          <?php
                            foreach($this->all_sem_fees as $sem_fee){
                           ?>
                          <td><?php echo $sem_fee->semester;?></td>
                          <td><?php echo $sem_fee->due_date;?></td>
                          <td><?php echo $sem_fee->tution_fee;?></td>
                          <td><?php echo $sem_fee->hostel_fee;?></td>
                          <td><?php echo $sem_fee->late_fee;?></td>
                          <td><?php echo $sem_fee->total;?></td>
                          <td><?php echo $sem_fee->paid;?></td>
                            <?php
                            }
                            ?>
                      </tr>
                  </tbody>
                  </table>
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
$page->title='Sem Fees | Smportal';
$page->page_title='Sem Fees';
$page->sub_title='';
$page->all_sem_fees=$all_sem_fees;
$page->display();