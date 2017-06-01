<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of LoginAndRegister
 *
 * @author hasan
 */
class Login extends CI_Controller{
    
    public function index()
    {
        if(isset($_SESSION['userid'])){
            redirect(base_url().'index.php/account');
        }
        $data['login_message']='If you have an account with us, Please log in!';
        $data['login_form_data']='';
        $data['pwd_message']='';
        if(isset($_SESSION['loginStatus'])){  
            $data['login_message']=$_SESSION['loginStatus'];
        }
        if( isset($_SESSION['login_form_data'])){
            $data['login_form_data']=$_SESSION['login_form_data'];
        }
        if(isset($_SESSION['pwd_message'])){  
            $data['pwd_message']=$_SESSION['pwd_message'];
        }
        $this->load->view('login_page',$data);
    }
    public function loginuser()
    {
        $password=$this->input->post('password');
        $email=$this->input->post('email');
        $login_as=$this->input->post('login-as');
        if(!isset($email) || !isset($password) || !isset($login_as)){
            redirect(base_url().'index.php/login');
        }
        $this->load->model('Users');
        $user=$this->Users->getUser($email);
        if($user->num_rows()==0)
        {
            //echo 'Invalid User ID';
            $this->session->set_flashdata('loginStatus', 'Invalid User ID or Password');
            $this->session->set_flashdata('login_form_data', $email);
            redirect(base_url().'index.php/login');
        }
        else
        {
            if(password_verify($password,$user->row()->auth_key) && $this->loginstatus($email,$login_as))
            {
                //echo 'Login Verified';
                $this->session->set_userdata('userid', $email);
                $this->session->set_userdata('role',$login_as);
                redirect(base_url().'index.php/account');
            }
            else
            {
                //echo 'Invalid Password';
                $this->session->set_flashdata('loginStatus', 'Invalid User ID or Password');
                $this->session->set_flashdata('login_form_data', $email);
                redirect(base_url().'index.php/login');
            }
        }
    }
    public function logout()
    {
        //savecart
        session_destroy();
        redirect(base_url().'index.php/login');
    }
    public function forgotpassword($process='fp')
    {
        $fp_email='';
        if(isset($_SESSION['userid'])){
            redirect(base_url().'index.php/account');
        }
        if($process==='fp')
        {
            $data['pwdchange_message']='';
            if(isset($_SESSION['pwdChangeStatus'])){  
                $data['pwdchange_message']=$_SESSION['pwdChangeStatus'];
            }
            $this->load->view('confirmid_page',$data);
        }
        elseif($process==='confirm')
        {
            $this->load->model('Users');
            $fp_email=$this->input->post('email');
            if(!isset($fp_email) || $fp_email=='' || $this->Users->getUser($fp_email)->num_rows()===0)
            {
                echo '';
                return;
            }
            else
            {
                $this->load->model('Validations');
                $this->load->helper('string');
                $email_code = random_string('alnum',6);
                $this->Validations->removeCode($fp_email,2);
                $this->Validations->insertEmailMobileCodes(array('user_id'=>$fp_email,'email_code'=>$email_code,'purpose'=>2));
                $this->session->set_userdata('fp_userid', $fp_email);
                //send mail
                echo 1;
                return;
            }
        }
        elseif($process==='verifyandchange')
        {
            $this->load->library('form_validation');
            $this->load->model('Validations');
            $this->load->model('Users');
            $email_code=$this->input->post('email-code');
            $pwd=$this->input->post('password');
            $fp_email=$_SESSION['fp_userid'];
            $this->form_validation->set_rules('email-code', 'Email Verification Code', 'trim|required|max_length[6]|min_length[6]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[16]');
            $this->form_validation->set_rules('conf-password', 'Password Confirmation', 'trim|required|matches[password]'); 
            if ($this->form_validation->run() == FALSE)
            {
                $this->session->set_flashdata('pwdChangeStatus', validation_errors());
                redirect(base_url().'index.php/login/forgotpassword/fp');
            }
            else if($email_code === $this->Validations->getEmailCode($fp_email,2))
            {
                $data['auth_key']=password_hash($pwd, PASSWORD_DEFAULT);
                $this->Users->updateUser($data,$fp_email);
                $this->Validations->removeCode($fp_email,2);
                $this->session->set_flashdata('pwd_message', 'Your password has been updated succesfully!');
                //send mail
                unset($_SESSION['fp_userid']);
                redirect(base_url().'index.php/login');
            }
            else
            {
                $this->session->set_flashdata('pwdChangeStatus', 'Invalid Code');
                redirect(base_url().'index.php/login/forgotpassword/fp');
            }
        }
        else
        {
            redirect(base_url().'index.php/login');
        }
    }
    private function loginstatus($email,$login_as){
        $this->load->model('Students');
        $this->load->model('Teachers');
        if($login_as==='student' && $this->Students->is_student($email)){
            return TRUE;
        }
        if($login_as==='teacher' && $this->Teachers->is_teacher($email)){
            return TRUE;
        }
        return FALSE;
    }
}
