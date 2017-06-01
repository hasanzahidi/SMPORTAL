<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'helpers/template_helper.php');
class Page extends Template{
    public $verify_mobile_message;
    public function additional_header() {
    ?>
            <link href="<?php echo base_url(); ?>css/crazycss.css" rel="stylesheet">
        </head>
    <?php
    }

    public function additional_scripts() {
                ?>
            <script>
                $('#verify-mobile-form').on('submit', function (e) {
                    e.preventDefault();
                    var $form = $(this);
                    var term = $form.find('input[name="mobile-code"]').val();
                    var url = "<?php echo base_url();?>index.php/account/verifymobile/1";
                /* Send the data using post */
                    var posting = $.post(url, {
                        'mobile-code': term
                    });

                /* Put the results in a div */
                    posting.done(function(data) {
                        if(data==0){
                            $("#verify-mobile-message").empty().append("Invalid Code!");
                        }
                        else{
                            $("#mobile-verification-area").empty().append("Your Mobile Number Has Been Successfully Verified!");
                            $("#account-link").empty().append('<a href="<?php echo base_url();?>index.php/account">Go to your account page</a>');
                        }
                    });
                });
                $('#mobile-code-resend').on('click',function(e){
                    var url = "<?php echo base_url();?>index.php/account/resendmobilecode/1";
                    var posting = $.post(url, {
                        'd': 1
                    });
                    posting.done(function(data) {
                        if(data==1){
                            $("#verify-mobile-message").empty().append("A new code has been send to you mobile phone");
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
                        <div class="login-text" id="mobile-verification-area">
                            <div class="log-title"><h3><strong>Verify Your Mobile</strong></h3><hr /></div>
                            <div class="custom-input">
                                <p id="verify-mobile-message"><?php echo "$this->verify_mobile_message";?></p>
				<form id="verify-mobile-form">
                                    <input type="text" name="mobile-code" placeholder="Mobile Verification Code" maxlength="6" minlength="6" required>
                                    <input type="submit" value="Verify" style="background-color:#000;color:#fff">
                                    <input type="button" id="mobile-code-resend" value="Resend Code" style="background-color:#000;color:#fff">
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
$page->sub_title='Verify Mobile';
$page->verify_mobile_message='Enter the code sent to your mobile';
$page->display();