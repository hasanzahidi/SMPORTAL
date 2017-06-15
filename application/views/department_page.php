<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'helpers/template_helper.php');
class Page extends Template{
    public $department;
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
          <h2>Department Page</h2>
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
    <div class="gt_content_wrap">
      <!--Course Grid Wrap Start-->
      <section class="gt_courses_bg">
          <div class="container">
              <h4><?php echo $this->department->stream;?></h4>
              <p class="mb20">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi</p>
              <p>Tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi.Quis autem vel eum iure reprehender.a</p>
              <ul>
                <li>Ed D (University of Roehampton).</li>
                <li>MA Mathematics Education (Institute of Education).</li>
                <li>GCE Primary (Goldsmiths College, University of London)</li>
                <li>BSc Mathematics (Leicester Polytechnic).</li>
                <li>Ed D (University of Roehampton)</li>
                <li>MA Mathematics Education (Institute of Education)</li>
                <li>PGCE Primary (Goldsmiths College, University of London)</li>
              </ul>
              <ul>
                  <li>Ed D (University of Roehampton).</li>
                  <li>MA Mathematics Education (Institute of Education).</li>
                  <li>GCE Primary (Goldsmiths College, University of London)</li>
                  <li>BSc Mathematics (Leicester Polytechnic).</li>
                  <li>Ed D (University of Roehampton)</li>
                  <li>MA Mathematics Education (Institute of Education)</li>
                  <li>PGCE Primary (Goldsmiths College, University of London)</li>
                </ul>

          </div>
      </section>
    </div>
    
    <?php
    }
}  
$page = new Page();
$page->title='Department Page | Smportal';
$page->page_title='Department Page';
$page->sub_title='';
$page->department=$department_info;
$page->display();