<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'helpers/template_helper.php');
class Page extends Template{
    public $login_message;
    public $login_form_data;
    public $pwd_message;
    public function additional_header() {
        ?>
            <link href="<?php echo base_url(); ?>css/crazycss.css" rel="stylesheet">
        <?php
        echo '</head>';
    }

    public function additional_scripts() {
    echo '</body></html>';
    }

    public function body_section() {
        ?> 
    <!--Sub Banner Wrap Start -->
    <div class="gt_sub_banner_bg default_width">
      <div class="container">
        <div class="gt_sub_banner_hdg  default_width">
          <h2>Login</h2>
          <h6>Welcome To SMPORTAL</h6>
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
                <li><a href="<?php echo base_url();?>index.php/login">Login</a></li>
            </ul>
        </div>
      </div>
    </div>
    <!--Breadcrumb Wrap End -->

    <!-- login content section start -->
	<section class="pages login-page section-padding-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="login-text">
                            <div class="log-title">
				<h3><strong>Registered Users</strong></h3><hr />
                            </div>
                            <div class="custom-input">
				<p><?php echo "$this->pwd_message";?><br><?php echo "$this->login_message";?></p>
				<form action="<?php echo base_url(); ?>/index.php/login/loginuser" method="post" autocomplete="on">
                                    <input type="email" name="email" placeholder="Email" value="<?php echo "$this->login_form_data";?>" maxlength="50" required>
                                    <input type="password" name="password" placeholder="Password" value="" minlength="8" maxlength="16" required>
                                    <table><tbody>
                                        <tr><td><input type="radio" name="login-as" value="student"></td><td align="center">Login as Student</td></tr>
                                        <tr><td><input type="radio" name="login-as" value="teacher"></td><td align="center">Login as Teacher</td></tr>
                                    </tbody></table>                                     
                                    <br><br><a class="forget" href="<?php echo base_url(); ?>/index.php/login/forgotpassword">Forget your password?</a>
                                    <input type="submit" value="LOGIN" style="background-color:#000;color:#fff">
				</form>
                                <br>
                            </div>
			</div>
                    </div>
		</div>
            </div>
	</section>
	<!-- login content section end -->
        <?php
    }
}  
$page = new Page();
$page->login_message=$login_message;
$page->login_form_data=$login_form_data;
$page->title='Login | Smportal';
$page->page_title='Login';
$page->sub_title='';
$page->display();