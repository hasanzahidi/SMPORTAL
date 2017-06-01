<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'helpers/template_helper.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class AccountPage extends Template{
    public $subscribe_action;
    public $first_name;
    public $last_name;
    public $email;
    public $contact;
    public $dob;
    public $gender;
    public $joined_since;
    public $user_dp;
    public $dp_message;
    public $pwd_message;
    public $subs_message;
    public $unsubs_message;
    public $upd_message;
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
            var password = document.getElementById("password"), confirm_password = document.getElementById("conf-password");
            function validatePassword(){
                if(password.value !== confirm_password.value) {
                    confirm_password.setCustomValidity("Passwords Don't Match");
                } else {
                    confirm_password.setCustomValidity('');
                }
            }
            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;
        </script>
        <?php
        echo '</body></html>';
    }

    public function body_section() {
        ?>
        <div class="gt_sub_banner_bg default_width">
      <div class="container">
        <div class="gt_sub_banner_hdg  default_width">
          <h2>Profile Settings</h2>
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
                <li><a href="<?php echo base_url();?>index.php/account">Settings</a></li>
            </ul>
        </div>
      </div>
    </div>
    <!--Breadcrumb Wrap End -->
    <!--Main Content Wrap Start-->
    <div class="gt_content_wrap">
      <!--Classes Wrap Start-->
      <section class="gt_courses_bg">
        <div class="container">
            <?php
            $this->profileSidebar();
            ?>
          <div class="col-md-8">
            <div class="gt_d_classes_wrap default_width mb20">
              <div class="gt_d_profile_wrap default_width wow slideInUp">
                <figure>
                  <img src="<?php echo base_url();?>assets/userdp/<?php echo $this->user_dp;?>" alt="">
                </figure>
                <div class="gt_d_profile_detail">
                  <ul>
                    <li>
                      <span>Name: </span>
                      <p><?php echo $this->first_name;?>  <?php echo $this->last_name;?></p>
                    </li>
                    <li>
                      <span>Email: </span>
                      <p><?php echo $this->email;?></p>
                    </li>
                    <li>
                      <span>Contact: </span>
                      <p><?php echo $this->contact;?></p>
                    </li>
                    <li>
                      <span>Date of Berth: </span>
                      <p><?php echo $this->dob;?></p>
                    </li>
                    <li>
                      <span>Gender: </span>
                      <p><?php echo $this->gender;?></p>
                    </li>
                    <li>
                      <span>Member Since</span>
                      <p><?php echo $this->joined_since;?></p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <section class="pages my-account-page">
        <div class="container">
            <div class="row">
		<div class="col-xs-12">
                    <div class="log-title">
			<h3><strong>Actions</strong></h3><hr />
                    </div>
                    <div class="row">
			<div class="col-xs-12 col-sm-8">
                            <div class="prament-area">
				<ul class="panel-group" id="accordion">
                                    <p class="red-color">
                                        <?php echo $this->pwd_message;?>
                                        <?php echo $this->dp_message;?>
                                        <?php echo $this->subs_message;?>
                                        <?php echo $this->unsubs_message;?>
                                        <?php echo $this->upd_message;?>
                                    </p>
                                    <br>    
                                    <li class="panel panelimg">
                                        <div class="account-title"  data-toggle="collapse" data-parent="#accordion" data-target="#collapse1">
                                            <label><input type="radio" value="forever" name="rememberme"> Update Profile Picture</label>
                                        </div>
                                        <div id="collapse1" class="paypal-dsc panel-collapse collapse">
                                            <div class="prayment-dsc">
						<div class="bulling-title">
                                                    <br>
                                                    <p>Upload a profile picture. Image size should be less than 5MB. Recommended size: 200 X 200 px</p>
						</div>
						<div class="custom-input">
                                                    <form action="<?php echo base_url();?>index.php/account/uploaddp" method="post" enctype="multipart/form-data">
							<input type="file" name="user-dp" placeholder="Select Image" required>
                                                        <div class="submit-text"><a href="#" onclick="$(this).closest('form').submit()">Upload</a></div>
                                                    </form>
						</div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="panel">
					<div class="account-title" data-toggle="collapse" data-parent="#accordion" data-target="#collapse2">
                                            <label><input type="radio" value="forever" name="rememberme">  Change Password</label>
					</div>
					<div id="collapse2" class="panel-collapse collapse">
                                            <div class="single-log-info">
						<div class="bulling-title">
                                                    <p>Please enter your present password here</p>	
						</div>
						<div class="custom-input">
                                                    <form action="<?php echo base_url();?>index.php/account/changepassword" method="post">
                                                        <div class="row"><div class="col-md-12"><input type="password" name="present-password" placeholder="Present Password" minlength="8" maxlength="16" required></div></div>
                                                        <label>Please enter your new Password</label>
                                                        <input type="password" id="password" name="password" placeholder="New Password" minlength="8" maxlength="16" required>
                                                        <input type="password" id="conf-password" name="conf-password" placeholder="Confirm New Password" minlength="8" maxlength="16" required>
                                                        <div class="submit-text"><input type="submit" value="Change"></div>
                                                    </form>	
						</div>
                                            </div>
					</div>
                                    </li>
                                    <li class="panel panelimg">
                                        <div class="account-title"  data-toggle="collapse" data-parent="#accordion" data-target="#collapse3">
                                            <label><input type="radio" value="forever" name="rememberme">  <?php echo $this->subscribe_action;?></label>
                                        </div>
                                        <div id="collapse3" class="paypal-dsc panel-collapse collapse">
                                            <div class="prayment-dsc">
						<div class="bulling-title">
                                                    <br>
                                                    <p>Please enter your  email address here</p>
						</div>
						<div class="custom-input">
                                                    <form action="<?php echo base_url();?>index.php/account/<?php echo $this->subscribe_action;?>" method="post">
							<input type="email" name="email" placeholder="Confirm Your Email" required>
                                                        <div class="submit-text"><input type="submit" value="<?php echo $this->subscribe_action;?>"></div>
                                                    </form>
						</div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="panel">
                                        <div class="account-title" data-toggle="collapse" data-parent="#accordion" data-target="#collapse4">
                                            <label><input type="radio" value="forever" name="rememberme">  Update Your Profile Info</label>
                                        </div>
                                        <div id="collapse4" class="panel-collapse collapse">
                                            <div class="single-log-info">
                                                <div class="bulling-title">
                                                    <h5>Your personal information</h5><p>Please be sure to update your personal information if it has changed</p>
                                                </div>
                                                <div class="custom-input">
                                                    <form action="<?php echo base_url();?>index.php/account/update" method="post">
                                                        <input type="text" name="first-name" placeholder="Your First Name" value="<?php echo $this->first_name;?>">
                                                        <input type="text" name="last-name" placeholder="Your Last Name" value="<?php echo $this->last_name;?>">
                                                        <label>Date of Birth</label><input type="date" name="dob" placeholder="Your date of birth">
                                                        <label class="social-label"> Gender</label>
                                                        <label><input type="radio" name="gender" value="F">Female</label>
                                                        <label><input type="radio" name="gender" value="M">Male</label>
                                                        <label><input type="radio" name="gender" value="O">Other</label><br><br>
                                                        <label>Mobile Number: </label>
                                                        <input type="text" name="contact" placeholder="10 Digit Mobile Number" minlength="10" maxlength="10">
                                                        <div class="submit-text text-left"><input type="submit" value="Update"></div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
			</div>
                    </div>
						
		</div>
            </div>
	</div>
    </section>

          </div>
          <!--Classes List Wrap End-->
           
            </div>
      </section>
      <!--Classes Wrap End-->
    </div>
    <!--Main Content Wrap End-->
        <?php
    }
}  
$account_page = new AccountPage();
$account_page->title='My Account | SMPORTAL';
$account_page->page_title='My Account';
$account_page->sub_title='Profile';
$account_page->subscribe_action=$subscribe_action;
$account_page->first_name=$first_name;
$account_page->last_name=$last_name;
$account_page->email=$email;
$account_page->contact=$contact;
$account_page->dob=$dob;
if($gender=='M'){
    $account_page->gender='Male';
}
elseif ($gender=='F') {
    $account_page->gender='Female';
}
 elseif ($gender=='O') {
    $account_page->gender='Other';
}
else 
{
    $account_page->gender='Not Updated';
}
$account_page->joined_since=$joined_since;
$account_page->user_dp=$user_dp;
$account_page->dp_message=$dp_message;
$account_page->pwd_message=$pwd_message;
$account_page->subs_message=$subs_message;
$account_page->unsubs_message=$unsubs_message;
$account_page->upd_message=$upd_message;
$account_page->display();