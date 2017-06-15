<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'helpers/template_helper.php');
class Page extends Template{
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
          <h2>Timetable</h2>
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
                <li><a href="<?php echo base_url();?>index.php/timetable">Timetable</a></li>
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
            <div class="gt_d_classes_wrap default_width wow slideInUp">
              <h4 class="gt_d_title">Timetable</h4>
              <div class="gt_classes_wrap">
                <table class="gt_classes_table">
                  <thead class="gt_table_head">
                    <tr >
                      <th>Monday<span class="open-date">12/05/2015</span></th>
                      <th>Tuesday<span class="open-date">12/05/2015</span></th>
                      <th>Wednesday<span class="open-date">12/05/2015</span></th>
                      <th>Thursday<span class="open-date">12/05/2015</span></th>
                      <th>Friday<span class="open-date">12/05/2015</span></th>
                    </tr>
                  </thead>
                  <tbody class="gt_class_body_bg">
                    <tr>
                      <td>
                        <div class="card-container">
                          <div class="card">
                            <h4> <i class="fa fa-paint-brush"></i>Painting Art</h4>
                            <span class="open-time">9.00 am - 10.30 am</span>
                            <p class="instrutor">Instructor: <span>R. Bandana</span></p>
                            <p>Room: <span>24</span></p>
                            <p>Level: <span>Beginner</span></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="card-container">
                          <div class="card">
                            <h4><i class="fa fa-paint-brush"></i>Dancing</h4>
                            <span class="open-time">9.00 am - 10.30 am</span>
                            <p class="instrutor">Instructor: <span>R. Bandana</span></p>
                            <p>Room: <span>24</span></p>
                            <p>Level: <span>Beginner</span></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="card-container">
                          <div class="card">
                            <h4><i class="fa fa-paint-brush"></i>English</h4>
                            <span class="open-time">9.00 am - 10.30 am</span>
                            <p class="instrutor">Instructor: <span>R. Bandana</span></p>
                            <p>Room: <span>24</span></p>
                            <p>Level: <span>Beginner</span></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="card-container ">
                          <div class="card">
                              <h4><i class="fa fa-paint-brush"></i>Painting Art</h4>
                              <span class="open-time">9.00 am - 10.30 am</span>
                              <p class="instrutor">Instructor: <span>R. Bandana</span></p>
                              <p>Room: <span>24</span></p>
                              <p>Level: <span>Beginner</span></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="card-container">
                          <div class="card">
                            <h4><i class="fa fa-paint-brush"></i>English</h4>
                            <span class="open-time">9.00 am - 10.30 am</span>
                            <p class="instrutor">Instructor: <span>R. Bandana</span></p>
                            <p>Room: <span>24</span></p>
                            <p>Level: <span>Beginner</span></p>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td class="empty_class_bg"></td>
                      <td>
                        <div class="card-container ">
                          <div class="card painting">
                            <h4><i class="fa fa-paint-brush"></i>Painting Art</h4>
                            <span class="open-time">9.00 am - 10.30 am</span>
                            <p class="instrutor">Instructor: <span>R. Bandana</span></p>
                            <p>Room: <span>24</span></p>
                            <p>Level: <span>Beginner</span></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="card-container">
                          <div class="card painting">
                            <h4><i class="fa fa-paint-brush"></i>Painting Art</h4>
                            <span class="open-time">9.00 am - 10.30 am</span>
                            <p class="instrutor">Instructor: <span>R. Bandana</span></p>
                            <p>Room: <span>24</span></p>
                            <p>Level: <span>Beginner</span></p>
                          </div>
                        </div>
                      </td>
                      <td class="empty_class_bg"></td>
                      <td>
                        <div class="card-container ">
                          <div class="card painting">
                            <h4><i class="fa fa-paint-brush"></i>Painting Art</h4>
                            <span class="open-time">9.00 am - 10.30 am</span>
                            <p class="instrutor">Instructor: <span>R. Bandana</span></p>
                            <p>Room: <span>24</span></p>
                            <p>Level: <span>Beginner</span></p>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <div class="card-container">
                          <div class="card painting">
                            <h4> <i class="fa fa-paint-brush"></i>Painting Art</h4>
                            <span class="open-time">9.00 am - 10.30 am</span>
                            <p class="instrutor">Instructor: <span>R. Bandana</span></p>
                            <p>Room: <span>24</span></p>
                            <p>Level: <span>Beginner</span></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="card-container ">
                          <div class="card painting">
                            <h4><i class="fa fa-paint-brush"></i>Painting Art</h4>
                            <span class="open-time">9.00 am - 10.30 am</span>
                            <p class="instrutor">Instructor: <span>R. Bandana</span></p>
                            <p>Room: <span>24</span></p>
                            <p>Level: <span>Beginner</span></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="card-container">
                          <div class="card painting">
                            <h4><i class="fa fa-paint-brush"></i>Painting Art</h4>
                            <span class="open-time">9.00 am - 10.30 am</span>
                            <p class="instrutor">Instructor: <span>R. Bandana</span></p>
                            <p>Room: <span>24</span></p>
                            <p>Level: <span>Beginner</span></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="card-container ">
                          <div class="card painting">
                              <h4><i class="fa fa-paint-brush"></i>Painting Art</h4>
                              <span class="open-time">9.00 am - 10.30 am</span>
                              <p class="instrutor">Instructor: <span>R. Bandana</span></p>
                              <p>Room: <span>24</span></p>
                              <p>Level: <span>Beginner</span></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="card-container ">
                          <div class="card painting">
                            <h4><i class="fa fa-paint-brush"></i>Painting Art</h4>
                            <span class="open-time">9.00 am - 10.30 am</span>
                            <p class="instrutor">Instructor: <span>R. Bandana</span></p>
                            <p>Room: <span>24</span></p>
                            <p>Level: <span>Beginner</span></p>
                          </div>
                        </div>
                      </td>
                    </tr>

                  </tbody>
                </table>
                <div class="gt_table_small default_width">
                  <h3 class="header-small">Monday</h3>
                  <ul>
                      <li>
                          <a class="painting" href="#">Painting Art</a>
                          <p>9.00 am - 10.30 am</p>
                      </li>
                      <li>
                          <a class="dancing" href="#">Dancing</a>
                          <p>10.30 am - 12.00 pm</p>
                      </li>
                      <li>
                          <a class="english" href="#">English</a>
                          <p>12.00 pm - 15.00 pm</p>
                      </li>
                  </ul>
                  <h3 class="header-small">Tuesday</h3>
                  <ul>
                      <li>
                          <a class="painting" href="#">Painting Art</a>
                          <p>9.00 am - 10.30 am</p>
                      </li>
                      <li>
                          <a class="dancing" href="#">Dancing</a>
                          <p>10.30 am - 12.00 pm</p>
                      </li>
                      <li>
                          <a class="english" href="#">English</a>
                          <p>12.00 pm - 15.00 pm</p>
                      </li>
                  </ul>
                  <h3 class="header-small">Wednesday</h3>
                  <ul>
                      <li>
                          <a class="painting" href="#">Painting Art</a>
                          <p>9.00 am - 10.30 am</p>
                      </li>
                      <li>
                          <a class="dancing" href="#">Dancing</a>
                          <p>10.30 am - 12.00 pm</p>
                      </li>
                      <li>
                          <a class="english" href="#">English</a>
                          <p>12.00 pm - 15.00 pm</p>
                      </li>
                  </ul>
                  <h3 class="header-small">Thursday</h3>
                  <ul>
                      <li>
                          <a class="painting" href="#">Painting Art</a>
                          <p>9.00 am - 10.30 am</p>
                      </li>
                      <li>
                          <a class="dancing" href="#">Dancing</a>
                          <p>10.30 am - 12.00 pm</p>
                      </li>
                      <li>
                          <a class="english" href="#">English</a>
                          <p>12.00 pm - 15.00 pm</p>
                      </li>
                  </ul>
                  <h3 class="header-small">Friday</h3>
                  <ul>
                      <li>
                          <a class="painting" href="#">Painting Art</a>
                          <p>9.00 am - 10.30 am</p>
                      </li>
                      <li>
                          <a class="dancing" href="#">Dancing</a>
                          <p>10.30 am - 12.00 pm</p>
                      </li>
                      <li>
                          <a class="english" href="#">English</a>
                          <p>12.00 pm - 15.00 pm</p>
                      </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!--Classes List Wrap End-->
                  
            </div>
          </div>
              
          </div>
      </section>
    </div>
        <?php
    }
}  
$page = new Page();
$page->title='Timetable Page | Smportal';
$page->page_title='Timetable';
$page->sub_title='';
$page->display();