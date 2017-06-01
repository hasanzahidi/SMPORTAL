<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'helpers/template_helper.php');
class Page extends Template{
    public $verify_email_message;
    public function additional_header() {
        ?>
            <link href="<?php echo base_url(); ?>css/crazycss.css" rel="stylesheet">
        </head>
    <?php
    }

    public function additional_scripts() {
                ?>
            <script>
               $('#verify-email-form').on('submit', function (e) {
                    e.preventDefault();
                    var $form = $(this);
                    var term = $form.find('input[name="email-code"]').val();
                    var url = "<?php echo base_url();?>index.php/account/verifyemail/1";
                /* Send the data using post */
                    var posting = $.post(url, {
                        'email-code': term
                    });

                /* Put the results in a div */
                    posting.done(function(data) {
                        if(data==0){
                            $("#verify-email-message").empty().append("Invalid Code!");
                        }
                        else{
                            $("#email-verification-area").empty().append("Your Email Id Has Been Successfully Verified!");
                            $("#account-link").empty().append('<a href="<?php echo base_url();?>index.php/account">Go to your account page</a>');
                        }
                    });
                });
                $('#email-code-resend').on('click',function(e){
                    var url = "<?php echo base_url();?>index.php/account/resendemailcode/1";
                    var posting = $.post(url, {
                        'd': 1
                    });
                    posting.done(function(data) {
                        if(data==1){
                            $("#verify-email-message").empty().append("A new code has been send to your email id");
                        }
                    });
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
          <h2>Verify Account</h2>
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
                <li><a href="<?php echo base_url();?>index.php/account">Account</a></li>
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
                        <div class="login-text" id="email-verification-area">
                            <div class="log-title">
				<h3><strong>Verify Your Email</strong></h3><hr />
                            </div>
                            <div class="custom-input">
				<p id="verify-email-message"><?php echo "$this->verify_email_message";?></p>
                                <form id="verify-email-form">
                                    <input type="text" name="email-code" placeholder="Email Verification Code" maxlength="6" minlength="6" required>
                                    <input type="submit" value="Verify" style="background-color:#000;color:#fff">
                                    <input type="button" id="email-code-resend" value="Resend Code" style="background-color:#000;color:#fff">
                                </form>
                            </div>
			</div>
                    </div>
                    <br><br>
                    <div class="col-sm-6" id="account-link"></div>
		</div>
            </div>
	</section>
        <?php
    }
}  
$page = new Page();
$page->title='My Account | SMPORTAL';
$page->page_title='My Account';
$page->sub_title='Verify Email and Mobile';
$page->verify_email_message='Enter the code sent to your email';
$page->display();