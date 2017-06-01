<?php
/**
 * Description of Template
 *
 * @author hasan
 */
abstract class Template {
    //put your code here
    public $title;
    public $page_title;
    public $sub_title;
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    public function title_section()
    {
        ?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo "$this->title";?></title>

    <link href="<?php echo base_url(); ?>css/revolution-slider.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/chosen.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/color.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/responsive.css" rel="stylesheet">
        <?php
    }
    abstract public function additional_header();
    public function header_nav()
    {
        ?>
    <body>
    <!--gt Wrapper Start-->  
    <div class="gt_wrapper">
    <!--Header Wrap Start-->
        <header>
            <div class="gt_top_wrap gt_bg_3 default_width">
                <div class="container">
                    <div class="gt_top_element">
                        <ul>
                            <?php 
                            if(isset($_SESSION['userid'])){
                            ?>
                            <li><a href="<?php echo base_url(); ?>index.php/login/logout"><i class="icon-lock"></i>Logout</a></li>
                            <?php
                            }
                            else {
                            ?>
                            <li><a href="http://msit.edu.in"><i class="icon-lock"></i>Go to College Website</a></li>
                            <?php
                            }
                            ?>
                            <li><i class="fa fa-phone"></i>111-22-333-45</li>
                            <li><i class="fa fa-envelope"></i><a href="#">info@smportal.com</a></li>
                        </ul>
                    </div>
                    <div class="gt_login_element">
                    <?php 
                	if(isset($_SESSION['userid'])){
                    ?>
			<a href="<?php echo base_url(); ?>index.php/account"><i class="icon-lock"></i>My Account</a>
                    <?php
                	}
                     	else {
                    ?>
			<a href="<?php echo base_url(); ?>index.php/login"><i class="icon-lock"></i>Login</a>
                    <?php
                     	}
                    ?>
                    </div>
                </div>
            </div>
            <div class="gt_menu_bg default_width">
                <div class="container">
                    <!--Logo Wrap Start-->
                    <div class="gt_logo">
                        <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/logo.png" alt=""></a>
                    </div>
                    <!--Logo Wrap End-->
            
                    <!--Search Wrap Start-->
                    <div class="gt_search_wrap">
                        <span class="search-fld"><i class="fa fa-search"></i></span>
                        <div class="search-wrapper-area">
                            <form action="<?php echo base_url(); ?>index.php/searchresults" method="post" class="search-area">
                                <input type="text" placeholder="Search Here" name="terms"/>
                                <input type="submit" value="Go"/>
                            </form>
                            <span class="gt_search_remove_btn"><i class="fa fa-remove"></i></span>
                        </div>
                    </div>
                    <!--Search Wrap End-->
                    <!--Navigation Wrap Start-->
                    <nav class="gt_navigation">
                        <button class="gt_mobile_menu">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <ul>
                            <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li><a href="<?php echo base_url();?>index.php/departments">Departments</a>
                                <ul>
                                    <li><a href="javascript:avoid(0);">Under Graduate</a>
                                        <ul>
                                            <li><a href="<?php echo base_url();?>index.php/departments/departmentpage/Core">Civil Engineering</a></li>
                                            <li><a href="<?php echo base_url();?>index.php/departments/departmentpage/CS">Computer Science And Engineering</a></li>
                                            <li><a href="<?php echo base_url();?>index.php/departments/departmentpage/EC">Electronics And Communication Engineering</a></li>
                                            <li><a href="<?php echo base_url();?>index.php/departments/departmentpage/Core">Electrical Engineering</a></li>
                                            <li><a href="<?php echo base_url();?>index.php/departments/departmentpage/IT">Information Technology</a></li>
                                            <li><a href="<?php echo base_url();?>index.php/departments/departmentpage/Core">Mechanical Engineering</a></li>
                                            <li><a href="<?php echo base_url();?>index.php/departments/departmentpage/BCA">Bachelor of Computer Application</a></li>
                                            <li><a href="<?php echo base_url();?>index.php/departments/departmentpage/BBA">Bachelor of Business Administrator</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:avoid(0);">Post Graduate</a>
                                        <ul>
                                            <li><a href="<?php echo base_url();?>index.php/departments/departmentpage/MCS">Master Of Computer Application</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url();?>index.php/subjects">Subjects</a></li>
                            <li><a href="<?php echo base_url();?>index.php/assignments">Assignments</a></li>
                            <li><a href="<?php echo base_url();?>index.php/profileviewer/teacherslist">Teachers</a>
                                <ul>
                                    <li><a href="<?php echo base_url();?>index.php/profileviewer/principal">Principal</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/profileviewer/teacherslist">All Teachers</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url();?>index.php/profileviewer/studentslist">Students</a>
                                <ul>
                                    <li><a href="<?php echo base_url();?>index.php/profileviewer/studentslist/0/2017">Batch 2017</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/profileviewer/studentslist/0/2018">Batch 2018</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/profileviewer/studentslist/0/2019">Batch 2019</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/profileviewer/studentslist/0/2020">Batch 2020</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:avoid(0);">Others</a>
                                <ul>
                                    <li><a href="<?php echo base_url();?>index.php/events">Events</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/clubs">Clubs</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/notices">Notices</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/timetables">Timetables</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/contact">Contact</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!--Navigation Wrap End-->
                </div>
            </div>
        </header>
        <!--Header Wrap End-->

        <?php
    }
    abstract public function body_section();
    public function profileSidebar(){
        $user_data=$_SESSION['user_data'];
        $role=$_SESSION['role'];
        ?>
        <!-- Dashboard Side Bar Wrap Start -->
          <div class="col-md-4">
            <div class="gt-user-sidebar">
              <div class="gt_d_author_wrap wow slideInUp">
                <div class="gt_d_author_pic">
                  <figure>
                    <img src="<?php echo base_url();?>assets/userdp/<?php echo $user_data['user_dp'];?>" alt="">
                  </figure>
                </div>
                <div class="gt_d_author_pic_des">
                  <h5><?php echo $user_data['first_name'];?> <?php echo $user_data['last_name'];?></h5>
                  <span class="gt_hdg_span"></span>
                  <p>Email ID</p>
                  <label><?php echo $user_data['email'];?></label>
                </div>
                <div class="gt_d_author_sbj">
                  <h6>Mobile:</h6>
                  <span><?php echo $user_data['contact'];?></span>
                  <h6>Date of Birth</h6>
                  <span><?php echo $user_data['dob'];?></span>
                </div>
              </div>
              <div class="gt-usser-account-list">
                <ul>
                    <li><a href="<?php echo base_url();?>index.php/account"><i class="icon-three gt-color"></i>Profile Setting</a></li>
                  <li class="active"><a href="<?php echo base_url();?>index.php/profile"><i class="fa fa-user-circle-o gt-color"></i>My Profile</a></li>
                  <li><a href="<?php echo base_url();?>index.php/account/address"><i class="fa-location-arrow gt-color"></i>Address</a></li>
                  <li><a href="<?php echo base_url();?>index.php/departments/mydepartment"><i class="fa-graduation-cap gt-color"></i>Department</a></li>
                  <li><a href="<?php echo base_url();?>index.php/subjects"><i class="fa-book gt-color"></i>Subjects</a></li>
                  <li><a href="<?php echo base_url();?>index.php/assignments"><i class="fa-list gt-color"></i>Assignments</a></li>
                  <li><a href="<?php echo base_url();?>index.php/clubs"><i class="fa-group gt-color"></i>Clubs</a></li>
                  <li><a href="<?php echo base_url();?>index.php/events"><i class="fa-clock-o gt-color"></i>Events</a></li>
                  <li><a href="<?php echo base_url();?>index.php/notices"><i class="fa-newspaper-o gt-color"></i>Notices</a></li>
                  <li><a href="<?php echo base_url();?>index.php/timetable"><i class="fa-calendar gt-color"></i>Timetable</a></li>
                  <?php
                    if($role==='student'){
                    ?> 
                        <li><a href="<?php echo base_url();?>index.php/exams"><i class="fa-pencil gt-color"></i>Exams</a></li>
                        <li><a href="<?php echo base_url();?>index.php/attendance"><i class="fa-check gt-color"></i>Attendance</a></li>
                        <li><a href="<?php echo base_url();?>index.php/books"><i class="fa-bookmark gt-color"></i>Issued Books</a></li>
                        <li><a href="<?php echo base_url();?>index.php/marksheet"><i class="fa-star-half-empty gt-color"></i>Marksheet</a></li>
                        <li><a href="<?php echo base_url();?>index.php/projects"><i class="fa-file gt-color"></i>Projects</a></li>
                        <li><a href="<?php echo base_url();?>index.php/trainings"><i class="fa-truck gt-color"></i>Trainings</a></li>
                        <li><a href="<?php echo base_url();?>index.php/semfees"><i class="fa-money gt-color"></i>Sem Fees</a></li>
                    <?php
                    }
                    ?>
                </ul>
                <a href="<?php echo base_url();?>index.php/login/logout" class="gt-logout"><i class="icon-arrows-2 gt-color"></i>Logout</a>
              </div>
            </div>
          </div>
          <!-- Dashboard Side Bar Wrap End -->

        <?php
    }
    public function footer_section()
    {   
        ?>
    <!--Footer Wrap Start-->
    <footer class="wow fadeInUp">
        <!--Newsletter Wrap Start-->
        <div class="gt_newsletter_bg default_width">
            <div class="container">
                <div class="gt_newsletter_inside_bg default_width">
                    <div class="gt_newsletter_wrap">
                        <h3>STAY TUNED WITH US</h3>
                        <form action="<?php echo base_url();?>" method="post" class="default_width">
                            <input type="email" class="ph_news" placeholder="Your Email address" name="email">
                            <input type="submit" value="Subscribe">
                        </form>
                        <p>Get our updates educational materials, new courses and more!</p>
                    </div>
                </div>
            </div>
        </div>
        <!--Newsletter Wrap End-->

        <!--Footer List Wrap Start-->
        <div class="gt_footer1_bg default_width">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 wow zoomIn">
                        <div class="gt_foo_about gt_widget_hdg">
                            <h5>Our Services</h5>
                            <ul>
                                <li><a href="<?php echo base_url();?>index.php/departments">Departments</a></li>
                                <li><a href="<?php echo base_url();?>index.php/assignments">Assignments</a></li>
                                <li><a href="<?php echo base_url();?>index.php/subjects">Subjects</a></li>
                                <li><a href="<?php echo base_url();?>index.php/events">Events</a></li>
                                <li><a href="<?php echo base_url();?>index.php/clubs">Clubs</a></li>
                                <li><a href="<?php echo base_url();?>index.php/notices">Notices</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 wow zoomIn">
                        <div class="gt_foo_about gt_widget_hdg">
                            <h5>My Account</h5>
                            <ul>
                                <li><a href="<?php echo base_url();?>index.php/profile">My Profile</a></li>
                                <li><a href="<?php echo base_url();?>index.php/assignments">My Assignments</a></li>
                                <li><a href="<?php echo base_url();?>index.php/exams">My Exams</a></li>
                                <li><a href="<?php echo base_url();?>index.php/marksheet">My Marksheet</a></li>
                                <li><a href="<?php echo base_url();?>index.php/projects">My Projects</a></li>
                                <li><a href="<?php echo base_url();?>index.php/trainings">Trainings</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 wow zoomIn">
                        <div class="gt_foo_about gt_widget_hdg">
                            <h5>Our Support</h5>
                            <ul>
                                <li><a href="<?php echo base_url();?>index.php/contacts">Contact Us</a></li>
                                <li><a href="<?php echo base_url();?>index.php/blog">Blog</a></li>
                                <li><a href="<?php echo base_url();?>index.php/meeting">Schedule a Meeting</a></li>
                                <li><a href="<?php echo base_url();?>index.php/bookfacility">Book a Facility</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 wow zoomIn">
                        <div class="gt_foo_about gt_widget_hdg">
                            <h5>Information</h5>
                            <ul>
                                <li><a href="<?php echo base_url();?>index.php/about">About Us</a></li>
                                <li><a href="<?php echo base_url();?>index.php/university">About University</a></li>
                                <li><a href="<?php echo base_url();?>index.php/campus">Campus Information</a></li>
                                <li><a href="<?php echo base_url();?>index.php/privacypolicy">Privacy Policy</a></li>
                                <li><a href="<?php echo base_url();?>index.php/ccoc">College Code of Conducts</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--Footer Contact Wrap Start-->
                <div class="gt_foo_contact_wrap">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 wow zoomIn">
                            <div class="gt_foo_contact_des">
                                <i class="icon-phone"></i>
                                <div class="gt_foo_icon_des">
                                    <h5>(8) 111 22 333 444</h5>
                                    <span>Mon - fri 9am to 5pm </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 wow zoomIn">
                            <div class="gt_foo_contact_des">
                                <i class="icon-tool"></i>
                                <div class="gt_foo_icon_des">
                                    <h5>info@smportal.com</h5>
                                    <span>Online information </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="gt_foo_contact_des wow zoomIn">
                                <i class="icon-pin"></i>
                                <div class="gt_foo_icon_des">
                                    <h5>Kolkata, West Bengal</h5>
                                    <span>Nazirabad,Kolkata 700150</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Footer Contact Wrap End-->
            </div>
        </div>
        <!--Footer List Wrap End-->

        <!--Copyright Wrap End-->
        <div class="gt_copyright_wrap">
            <div class="container">
                <div class="gt_copyright_des">  
                    <p>Copyright © <a href="<?php echo base_url(); ?>">Smportal </a> 2017. All rights reserved.</p>
                </div>
            </div>
        </div>
        <!--Copyright Wrap Start-->
    </footer>
    <!--Footer Wrap End-->

    <!--Back to Top Wrap Start-->
    <div class="back-to-top">
        <a href="#home"><i class="fa fa-angle-up"></i></a>
    </div>
    <!--Back to Top Wrap Start-->

</div>
<!--gt Wrapper End-->

    <script src="<?php echo base_url(); ?>js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/revolution.min.js"></script>
    <script src="<?php echo base_url(); ?>js/owl.carousel.js"></script>
    <script src="<?php echo base_url(); ?>js/chosen.jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/waypoints-min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url(); ?>js/wow.min.js"></script>
    <script src="<?php echo base_url(); ?>js/custom.js"></script>

        <?php
    }
    abstract public function additional_scripts();
    public function display()
    {
        $this->title_section();
        $this->additional_header();
        $this->header_nav();
        $this->body_section();
        $this->footer_section();
        $this->additional_scripts();
    }
}