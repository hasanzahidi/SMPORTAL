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
                            <li><a href="<?php echo base_url(); ?>index.php/faq">Have A Question?</a></li>
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
			<a href="<?php echo base_url(); ?>index.php/loginandregister"><i class="icon-lock"></i>Login &#38; Register</a>
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
                            <li><a href="javascript:avoid(0);">Courses</a>
                                <ul>
                                    <li><a href="javascript:avoid(0);">Under Graduate</a>
                                        <ul>
                                            <li><a href="<?php echo base_url();?>index.php/courses/ce">Civil Engineering</a></li>
                                            <li><a href="<?php echo base_url();?>index.php/courses/cse">Computer Science And Engineering</a></li>
                                            <li><a href="<?php echo base_url();?>index.php/courses/ece">Electronics And Communication Engineering</a></li>
                                            <li><a href="<?php echo base_url();?>index.php/courses/ee">Electrical Engineering</a></li>
                                            <li><a href="<?php echo base_url();?>index.php/courses/it">Information Technology</a></li>
                                            <li><a href="<?php echo base_url();?>index.php/courses/me">Mechanical Engineering</a></li>
                                            <li><a href="<?php echo base_url();?>index.php/courses/bca">Bachelor of Computer Application</a></li>
                                            <li><a href="<?php echo base_url();?>index.php/courses/bba">Bachelor of Business Administrator</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:avoid(0);">Post Graduate</a>
                                        <ul>
                                            <li><a href="<?php echo base_url();?>index.php/courses/mca">Master Of Computer Application</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url();?>index.php/assignments">Assignments</a></li>
                            <li><a href="<?php echo base_url();?>index.php/exams">Exams</a></li>
                            <li><a href="<?php echo base_url();?>index.php/events">Events</a></li>
                            <li><a href="javascript:avoid(0);">Teachers</a>
                                <ul>
                                    <li><a href="<?php echo base_url();?>index.php/teachers/principal">Principal</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/teachers/hods">HODs</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/teachers/departmental_teachers">Departmental Teachers</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/teachers/lab_assistants">Lab Assistants</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url();?>index.php/placements">Placements</a>
                                <ul>
                                    <li><a href="<?php echo base_url();?>index.php/placements/2018">Batch 2018</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/placements/2017">Batch 2017</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/placements/2016">Batch 2016</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url();?>index.php/trainings">Training</a></li>
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
                                <li><a href="<?php echo base_url();?>index.php/courses">Courses</a></li>
                                <li><a href="<?php echo base_url();?>index.php/assignments">Assignments</a></li>
                                <li><a href="<?php echo base_url();?>index.php/exams">Examinations</a></li>
                                <li><a href="<?php echo base_url();?>index.php/events">Events</a></li>
                                <li><a href="<?php echo base_url();?>index.php/teachers">Teachers</a></li>
                                <li><a href="<?php echo base_url();?>index.php/placements">Placements</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 wow zoomIn">
                        <div class="gt_foo_about gt_widget_hdg">
                            <h5>My Account</h5>
                            <ul>
                                <li><a href="<?php echo base_url();?>index.php/account/profile">My Profile</a></li>
                                <li><a href="<?php echo base_url();?>index.php/assignments">My Assignments</a></li>
                                <li><a href="<?php echo base_url();?>index.php/exams">My Exams</a></li>
                                <li><a href="<?php echo base_url();?>index.php/events">My Events</a></li>
                                <li><a href="<?php echo base_url();?>index.php/timetables">Time Table</a></li>
                                <li><a href="<?php echo base_url();?>index.php/examroutine">Exam Routines</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 wow zoomIn">
                        <div class="gt_foo_about gt_widget_hdg">
                            <h5>Our Support</h5>
                            <ul>
                                <li><a href="<?php echo base_url();?>index.php/contact">Contact Us</a></li>
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