<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'helpers/template_helper.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Page extends Template{
    public $user_data;
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
            function removeaddress(removebutton){
                var bid = removebutton.getAttribute("id");
                var aid = bid.substring(3);
                var url = "<?php echo base_url();?>index.php/account/address/remove";
                var posting = $.post(url, {
                    'aid': aid
                });
                posting.done(function(data) {
                    var divid='con'+aid;
                    if(data==1){
                        document.getElementById(divid).remove();
                    }
                });
            }
            function makedefault(defaultbutton)
            {
                var bid = defaultbutton.getAttribute("id");
                var aid = bid.substring(3);
                var url = "<?php echo base_url();?>index.php/account/address/setdefault";
                var posting = $.post(url, {
                    'aid': aid
                });
                posting.done(function(data) {
                    document.getElementById('def'+aid).remove();
                    console.log(data);
                    if(data!=0){
                        var btn=document.createElement("button");
                        btn.setAttribute('id','def'+data);
                        btn.setAttribute('onclick','makedefault(this)');
                        btn.setAttribute('class','btn btn-success');
                        btn.innerHTML='Set Default';
                        var npanel=document.getElementById('pan'+data);
                        npanel.removeAttribute('class');
                        npanel.setAttribute('class','panel panel-info');
                        var dpanel=document.getElementById('pan'+aid);
                        dpanel.removeAttribute('class');
                        dpanel.setAttribute('class','panel panel-danger');
                        document.getElementById('rem'+data).before(btn, " ");
                    }
                });
            }
        </script>
        <?php
        echo '</body></html>';
    }

    public function body_section() {
        ?>
        <div class="gt_sub_banner_bg default_width">
      <div class="container">
        <div class="gt_sub_banner_hdg  default_width">
          <h2>ADDRESS</h2>
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
                <li><a href="<?php echo base_url();?>index.php/account/address">Address</a></li>
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
                <section class="pages login-page section-padding">
            <div class="container">
		<div class="row">
                    <?php
                    if(sizeof($this->all_addresses)==0){
                        echo '<h6>You dont have any saved address!</h6>';
                    }
                    foreach($this->all_addresses as $address)
                    {
                        echo '<div id="con'.$address->address_id.'">';
                        echo '<div class="col-sm-3">';
                        if($address->is_default=='Y')
                        {
                            echo '<div id="pan'.$address->address_id.'" class="panel panel-danger" >';
                        }
                        else
                        {
                            echo '<div id="pan'.$address->address_id.'" class="panel panel-info">';
                        }
                        echo '<div class="panel-heading"><b>'.$address->label.'</b></div>';
                        echo '<div class="panel-body">'.
                             '<p><b>Name</b>: '.$address->name.'</p>'.
                             '<p><b>Contact Number</b>: '.$address->contact.'</p>'.
                             '<p>'.$address->building_name_no.'  '.$address->area_street.'</p>';
                        echo '<p>'.$address->city.'</p>'.
                             '<p>'.$address->state_province.'</p>'.
                             '<p>'.$address->pin.'</p>';
                        if($address->landmark!='')
                        {
                            echo '<p><b>Near</b>: '.$address->landmark.'</p>';
                        }
                        echo '</div>';
                        echo '<div id="foot'.$address->address_id.'" class="panel-footer">';
                        if($address->is_default=='N')
                        {
                            echo '<button id="def'.$address->address_id.'" onclick="makedefault(this)" class="btn btn-success">Set Default</button>';
                        }
                        echo ' <button id="rem'.$address->address_id.'" onclick="removeaddress(this)" class="btn btn-danger">Remove</button>'.
                             '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
	</section>
        <section class="pages login-page section-padding-top" style="border-top: 1px dashed #b8b8b8">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="login-text">
                            <div class="log-title">
				<h3><strong>Add a new Address</strong></h3><hr />
                            </div>
                            <div class="custom-input">
				<p id="address-message"><?php echo "$this->address_message";?></p>
                                <form id="add-address-form" action="<?php echo base_url(); ?>/index.php/account/address/add" method="post">
                                    <input type="text" name="name" placeholder="Name" maxlength="100" value="" required>
                                    <input type="number" name="contact" placeholder="10 Digit Contact Number" maxlength="10" minlength="10" max="9999999999" min="6999999999" required>
                                    <input type="text" name="building-name-no" maxlength="50" placeholder="Building Name or Number" required>
                                    <input type="text" name="area-street" maxlength="256" placeholder="Area or Street" required>
                                    <input type="text" name="landmark" maxlength="256" placeholder="Landmark">
                                    <input type="number" name="floor" placeholder="Floor if any?" maxlength="3" minlength="1" max="170" min="0">
                                    <input type="text" name="city" placeholder="City, Town or Village" maxlength="100" required>
                                    <input type="text" name="state-province" placeholder="State" maxlength="100" required>
                                    <input type="number" name="pin" placeholder="Area Pincode" maxlength="16" required>
                                    <input type="text" name="label" placeholder="Label. Eg: Home, Office" maxlength="50" required>
                                    <input type="submit" value="Add" style="background-color:#000;color:#fff">
                                </form>
                            </div>
			</div>
                    </div>
		</div>
            </div>
	</section>
                
              </div>
            </div>

            

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
$address_page = new Page();
$address_page->title='My Addresses | Blackbands';
$address_page->page_title='My Account';
$address_page->sub_title='Saved Addresses';
$address_page->all_addresses=$addresses;
$address_page->address_message=$address_message;
$address_page->display();