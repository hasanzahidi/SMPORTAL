<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of Account
 *
 * @author hasan
 */
class Account extends CI_Controller {
    public $user_data;
    public function __construct() 
    {
        parent::__construct();
        if(isset($_SESSION['userid']))
        {
            $this->load->model('Users');
            $user=$this->Users->getUser($_SESSION['userid'])->row();
            $this->user_data=array(
                'email'=>$user->user_id,
                'first_name'=>$user->first_name,
                'last_name'=>$user->last_name,
                'contact'=>$user->mobile,
                'dob'=>isset($user->dob)?$user->dob:'Not updated',
                'gender'=>isset($user->gender)?$user->gender:'Not updated',
                'user_dp'=>$user->dp_present=='Y'?md5($_SESSION['userid']).'.jpg':'no-image.jpg',
                'joined_since'=>$user->timestamp,
                'subscribe_action'=>$user->mailing_list=='Y'?'Unsubscribe':'Subscribe',
                'email_verify'=>$user->email_verify,
                'mobile_verify'=>$user->mobile_verify,
                'auth_key'=>$user->auth_key
            );
            $_SESSION['user_data']=$this->user_data;
        }
        else
        {
            redirect(base_url().'index.php/login');
        }
     }
    public function index()
    {
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        if($this->user_data['email_verify']=='N' || $this->user_data['mobile_verify']=='N')
        {
            redirect(base_url().'index.php/account/verify');
        }
        $this->user_data['dp_message']='';
        $this->user_data['pwd_message']='';
        $this->user_data['subs_message']='';
        $this->user_data['unsubs_message']='';
        $this->user_data['upd_message']='';
        if(isset($_SESSION['dp_message'])){  
            $this->user_data['dp_message']=$_SESSION['dp_message'];
        }
        if(isset($_SESSION['pwd_message'])){  
            $this->user_data['pwd_message']=$_SESSION['pwd_message'];
        }
        if(isset($_SESSION['subs_message'])){  
            $this->user_data['subs_message']=$_SESSION['subs_message'];
        }
        if(isset($_SESSION['unsubs_message'])){  
            $this->user_data['unsubs_message']=$_SESSION['unsubs_message'];
        }
        if(isset($_SESSION['upd_message'])){  
            $this->user_data['upd_message']=$_SESSION['upd_message'];
        }
        $this->load->view('account_page',$this->user_data);
    }
    public function verify()
    {
        if($this->user_data['email_verify']=='N' && $this->user_data['mobile_verify']=='N')
        {
            $this->load->view('verify_email_mobile_page',$this->user_data);
        }
        else if($this->user_data['email_verify']=='Y' && $this->user_data['mobile_verify']=='N')
        {
            $this->load->view('verify_mobile_page',$this->user_data);
        }
        else if($this->user_data['email_verify']=='N' && $this->user_data['mobile_verify']=='Y')
        {
            $this->load->view('verify_email_page',$this->user_data);
        }
        else 
        {
            redirect(base_url().'index.php/account');
        }
    }
    public function verifyEmail($purpose=1)
    {
        $email_code_by_user=$this->input->post('email-code');
        $this->load->model('Validations');
        $email_code_stored=$this->Validations->getEmailCode($this->user_data['email'],$purpose);
        if($email_code_by_user===$email_code_stored)
        {
            $data['email_verify']='Y';
            $this->Users->updateUser($data,$this->user_data['email']);
            echo '1';
            $ev_status=$this->Users->getUser($this->user_data['email'])->row()->email_verify;
            $mv_status=$this->Users->getUser($this->user_data['email'])->row()->mobile_verify;
            if($ev_status=='Y' && $mv_status=='Y' && $purpose==1){
                $this->Validations->removeCode($this->user_data['email'],$purpose);
            }
        }
        else {
            echo '0';
        }
    }
    public function verifyMobile($purpose=1)
    {
        $mobile_code_by_user=$this->input->post('mobile-code');
        $this->load->model('Validations');
        $mobile_code_stored=$this->Validations->getMobileCode($this->user_data['email'],$purpose);
        if($mobile_code_by_user===$mobile_code_stored)
        {
            $data['mobile_verify']='Y';
            $this->Users->updateUser($data,$this->user_data['email']);
            echo '1';
            $ev_status=$this->Users->getUser($this->user_data['email'])->row()->email_verify;
            $mv_status=$this->Users->getUser($this->user_data['email'])->row()->mobile_verify;
            if($ev_status=='Y' && $mv_status=='Y' && $purpose==1){
                $this->Validations->removeCode($this->user_data['email'],$purpose);
            }
        }
        else {
            echo '0';
        }
    }
    public function resendEmailCode($purpose)
    {
        $d=$this->input->post('d');
        if($this->user_data['email_verify']=='N' && isset($purpose) && $purpose>0 && $purpose<4 && $d==1)
        {
            $this->load->model('Validations');
            $this->load->helper('string');
            $data['email_code']= random_string('alnum',6);
            $this->Validations->updateCode($data,$this->user_data['email']);
            //send email
            echo '1';
        }
        else
        {
            redirect(base_url().'index.php/account');
        }
    }
    public function resendMobileCode($purpose)
    {
        $d=$this->input->post('d');
        if($this->user_data['mobile_verify']=='N' && isset($purpose) && $purpose>0 && $purpose<4 && $d==1)
        {
            $this->load->model('Validations');
            $this->load->helper('string');
            $data['mobile_code']= random_string('alnum',6);
            $this->Validations->updateCode($data,$this->user_data['email']);
            //send text
            echo '1';
        }
        else
        {
            redirect(base_url().'index.php/account');
        }
    }
    public function uploaddp()
    {
        $config['upload_path']          = './assets/userdp/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048;
        $config['max_width']            = 1024;
        $config['max_height']           = 1024;
        $config['file_name']            = md5($_SESSION['userid']).'.jpg';
        $config['overwrite']            = true;
        $config['min-width']            = 64;
        $config['min-height']           = 64;
        
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('user-dp'))
        {
            $this->session->set_flashdata('dp_message', $this->upload->display_errors());
            redirect(base_url().'index.php/account');
        }
        else
        {
            $config_r['image_library'] = 'gd2';
            $config_r['source_image'] = './assets/userdp/'.md5($_SESSION['userid']).'.jpg';
            $config_r['maintain_ratio'] = TRUE;
            $config_r['width']         = 200;
            $config_r['height']       = 200;

            $this->load->library('image_lib', $config_r);
            $this->image_lib->resize();
            $data['dp_present']='Y';
            $this->Users->updateUser($data,$this->user_data['email']);
            $this->session->set_flashdata('dp_message', 'Profile Picture Successfully Updated');
            redirect(base_url().'index.php/account');
        }
    }
    public function changePassword(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('present-password', 'Present Password', 'trim|required|min_length[8]|max_length[16]|callback_validate_present_pwd');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[16]|callback_validate_new_pwd');
        $this->form_validation->set_rules('conf-password', 'Password Confirmation', 'trim|required|matches[password]');
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('pwd_message', validation_errors());
            redirect(base_url().'index.php/account');
        }
        else
        {
            $data['auth_key']=password_hash(set_value('password'), PASSWORD_DEFAULT);
            $this->Users->updateUser($data,$this->user_data['email']);
            $this->session->set_flashdata('pwd_message', 'Your password has been updated succesfully!');
            redirect(base_url().'index.php/account');
        }
    }
    public function validate_present_pwd($present_password=1)
    {
        if(password_verify($present_password,$this->user_data['auth_key']))
        {
            return true;
        }
        else
        {
            $this->form_validation->set_message('validate_present_pwd', 'The present password you provided, did not match');
            return FALSE;
        }
    }
    public function validate_new_pwd($password=1)
    {
        if(password_verify($password,$this->user_data['auth_key']))
        {
            $this->form_validation->set_message('validate_new_pwd', 'Please provide a new password which is different from present password');
            return FALSE;
        }
        return TRUE;
    }
    public function subscribe()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Your Email ID', 'trim|required|min_length[4]|max_length[50]|callback_validate_usr_mail');
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('subs_message', validation_errors());
            redirect(base_url().'index.php/account');
        }
        else
        {
            $data['mailing_list']='Y';
            $this->Users->updateUser($data,$this->user_data['email']);
            $this->session->set_flashdata('subs_message', 'You have successfully subscribed!');
            redirect(base_url().'index.php/account');
        }
    }
    public function unsubscribe()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Your Email ID', 'trim|required|min_length[4]|max_length[50]|callback_validate_usr_mail');
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('unsubs_message', validation_errors());
            redirect(base_url().'index.php/account');
        }
        else
        {
            $data['mailing_list']='N';
            $this->Users->updateUser($data,$this->user_data['email']);
            $this->session->set_flashdata('unsubs_message', 'You have successfully unsubscribed!');
            redirect(base_url().'index.php/account');
        }
    }
    public function validate_usr_mail($email=1)
    {
        if($email==$this->user_data['email'])
        {
            return TRUE;
        }
        $this->form_validation->set_message('validate_usr_mail', 'Please provid your correct email id');
        return false;
    }
    public function update()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->form_validation->set_rules('first-name', 'First Name', 'trim|max_length[50]');
        $this->form_validation->set_rules('last-name', 'Last Name', 'trim|max_length[50]');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|callback_validate_age'); 
        $this->form_validation->set_rules('contact', 'Your mobile number', 'trim|min_length[10]|max_length[13]|numeric|is_unique[users.mobile]');
        $this->form_validation->set_message('validate_age','Date of Birth is not valid!');
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('upd_message', validation_errors());
            redirect(base_url().'index.php/account');
        }
        else
        {
            $fn=$this->input->post('first-name');
            $ln=$this->input->post('last-name');
            $d=$this->input->post('dob');
            $g=$this->input->post('gender');
            $c=$this->input->post('contact');
            if($fn!='')
            {
                $data['first_name']=$fn;
            }
            if($ln!='')
            {
                $data['last_name']=$ln;
            }
            if($d!='')
            {
                $rawdob = htmlentities($d);
                $dob_u = date('Y-m-d', strtotime($rawdob));
                $data['dob']=$dob_u;
            }
            if($c!='')
            {
                $this->load->helper('string');
                $data['mobile_verify']='N';
                $data['mobile']=$c;
                $mobile_code = random_string('alnum',6);
                $this->load->model('Validations');
                $this->Validations->insertEmailMobileCodes(array('user_id'=>$this->user_data['email'],'mobile_code'=>$mobile_code,'purpose'=>1));
                //send text
            }
            if($g!='')
            {
                $data['gender']=$g;
            }
            if(isset($data))
            {
                $this->Users->updateUser($data,$this->user_data['email']);
                $this->session->set_flashdata('upd_message', 'Profile updated successfully!');
                redirect(base_url().'index.php/account');
            }
            else
            {
                redirect(base_url().'index.php/account');
            }
        }
    }
    public function validate_age($dob=1) {
        if($dob!='')
        {
            $d = new DateTime($dob);
            $n = new DateTime();
            return ($n->diff($d)->y > 3) ? true : false;
        }
        return true;
    }
    public function address($process='listall')
    {
        if($this->user_data['email_verify']=='N' || $this->user_data['mobile_verify']=='N')
        {
            redirect(base_url().'index.php/account/verify');
        }
        if($process==='listall')
        {
            $this->load->model('Addresses');
            $data['addresses']=$this->Addresses->getAddresses($this->user_data['email']);
            $data['address_message']='Address Details';
            if(isset($_SESSION['address_message']))
            {
                $data['address_message']=$_SESSION['address_message'];
            }
            $this->load->view('my_addresses_page',$data);
        }
        elseif($process==='add')
        {
            $this->load->library('form_validation');
            $this->load->helper('form');
            $this->form_validation->set_rules('name', 'Addressed Name', 'trim|max_length[100]|required');
            $this->form_validation->set_rules('contact', 'Mobile Number', 'trim|required|min_length[10]|max_length[10]|numeric');
            $this->form_validation->set_rules('building-name-no', 'Building name or number', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('area-street', 'Area or street', 'trim|required|max_length[256]');
            $this->form_validation->set_rules('landmark', 'Landmark', 'trim|max_length[256]');
            $this->form_validation->set_rules('floor', 'Floor', 'trim|max_length[3]|min_length[1]|numeric');
            $this->form_validation->set_rules('city', 'City, Town or Village', 'trim|required|max_length[100]');
            $this->form_validation->set_rules('state-province', 'State, province or U.T', 'trim|required|max_length[100]');
            $this->form_validation->set_rules('label', 'Address Label', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('pin', 'Area pin code', 'trim|required|max_length[16]|numeric');
            if ($this->form_validation->run() == FALSE)
            {
                $this->session->set_flashdata('address_message', validation_errors());
                redirect(base_url().'index.php/account/address');
            }
            else
            {
                $this->load->model('Addresses');
                $address=array(
                    'user_id'=>$this->user_data['email'],
                    'name'=>set_value('name'),
                    'contact'=>set_value('contact'),
                    'building_name_no'=>set_value('building-name-no'),
                    'area_street'=>set_value('area-street'),
                    'city'=>set_value('city'),
                    'state_province'=>set_value('state-province'),
                    'pin'=>set_value('pin'),
                    'label'=>set_value('label')
                );
                $lm=$this->input->post('landmark');
                $fl=$this->input->post('floor');
                if($lm!=''){
                    $address['landmark']=$lm;
                }
                if($fl!=''){
                    $address['floor']=$fl;
                }
                $this->Addresses->addAddress($address);
                $this->session->set_flashdata('address_message', 'Address added successfully!');
                redirect(base_url().'index.php/account/address');
            }
        }
        elseif($process==='remove')
        {
            $address_id=$this->input->post('aid');
            if($address_id!='')
            {
                $this->load->model('Addresses');
                $this->Addresses->removeAddress($address_id);
                echo 1;
            }
            else
            {
                 redirect(base_url().'index.php/account/address');
            }
        }
        elseif ($process==='setdefault') 
        {
            $address_id=$this->input->post('aid');
            if($address_id!='')
            {
                $this->load->model('Addresses');
                $msg=$this->Addresses->setDefault($this->user_data['email'],$address_id);
                echo $msg;
            }
            else
            {
                redirect(base_url().'index.php/account/address');
            }
        }
        else
        {
            redirect(base_url().'index.php/account/address');
        }
    }
}