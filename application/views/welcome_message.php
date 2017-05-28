<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'helpers/template_helper.php');
class Page extends Template{
    public function additional_header() {
        echo '</head>';
    }

    public function additional_scripts() {
        echo '</body></html>';
    }

    public function body_section() {
        ?>
        <section class="pages section-padding">
            <div class="container">
		<div class="row">
                    <center>
                        <h3>Hello World</h3>
                        <p><a href="<?php echo base_url(); ?>">GO TO HOME</a></p>
                    </center>
		</div>
            </div>
	</section>
        <?php
    }
}  
$page = new Page();
$page->title='Home | Smportal';
$page->page_title='SMPORTAL';
$page->sub_title='';
$page->display();