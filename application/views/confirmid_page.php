<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'helpers/template_helper.php');
class Page extends Template{
    public $verify_email_message;
    public $pwd_message;
    public function additional_header() {
    ?>
            <link href="<?php echo base_url(); ?>css/crazycss.css" rel="stylesheet">
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
            var email;
            $('#verify-email-form').on('submit', function (e) {
                e.preventDefault();
                var $form = $(this);
                email = $form.find('input[name="email"]').val();
                var url = "<?php echo base_url();?>index.php/login/forgotpassword/confirm";
                /* Send the data using post */
                var posting = $.post(url, {
                    'email': email
                });

                /* Put the results in a div */
                posting.done(function(data) {
                    if(data==0){
                        $("#verify-email-message").empty().append("This Email ID is not registered with us");
                    }
                    else{
                        $("#email-verification-area").empty();
                        $("#password-update-area").removeAttr("style");
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function(){
                var ps='<?php echo $this->pwd_message; ?>';
                if(ps==='Invalid Code'){
                    $("#email-verification-area").empty();
                    $("#password-update-area").removeAttr("style");
                }
            });
        </script>
        <?php
        echo '</body></html>';
    }

    public function body_section() {
        ?>
        <!--Sub Banner Wrap Start -->
    <div class="gt_sub_banner_bg default_width">
      <div class="container">
        <div class="gt_sub_banner_hdg  default_width">
          <h2>Password Reset</h2>
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
                <li><a href="<?php echo base_url();?>index.php/login/forgotpassword">Forgot Password</a></li>
            </ul>
        </div>
      </div>
    </div>
    <!--Breadcrumb Wrap End -->
        <section class="pages login-page section-padding-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="login-text" id="email-verification-area">
                            <div class="log-title">
				<h3><strong>What is your email id?</strong></h3><hr />
                            </div>
                            <div class="custom-input">
				<p id="verify-email-message"><?php echo "$this->verify_email_message";?></p>
                                <form id="verify-email-form">
                                    <div class="gt_login_field"><input type="email" name="email" placeholder="Enter your registered Email ID" maxlength="100" required></div>
                                    <div class="gt_login_field"><input type="submit" value="Verify" style="background-color:#000;color:#fff"></div>
                                </form>
                            </div>
			</div>
                    </div>
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="login-text" id="password-update-area" style="display:none;">
                            <div class="log-title">
				<h3><strong>Change your password</strong></h3><hr />
                            </div>
                            <div class="custom-input">
				<p id="password-update-message"><?php echo "$this->pwd_message";?></p>
                                <form id="password-update-form" action="<?php echo base_url();?>index.php/login/forgotpassword/verifyandchange" method="post">
                                    <div class="gt_login_field"><input type="text" name="email-code" placeholder="Enter the code sent to your email" maxlength="6" minlength="6" required></div>
                                    <div class="gt_login_field"><input id="password" type="password" name="password" placeholder="Password" minlength="8" maxlength="16" required></div>
                                    <div class="gt_login_field"><input id="conf-password" type="password" name="conf-password" placeholder="Confirm Password" minlength="8" maxlength="16" required></div>
                                    <div class="gt_login_field"><input type="submit" value="Change" style="background-color:#000;color:#fff"></div>
                                </form>
                            </div>
			</div>
                    </div>
		</div>
            </div>
	</section>
        <?php
    }
}  
$page = new Page();
$page->title='Forgot Password | SMPORTAL';
$page->page_title='Forgot Password';
$page->sub_title='';
$page->verify_email_message=$pwdchange_message;
$page->pwd_message=$pwdchange_message;
$page->display();