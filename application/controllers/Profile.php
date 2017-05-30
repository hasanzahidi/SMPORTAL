<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller{
    //put your code here
    public $user_data;
    public function __construct() 
    {
        parent::__construct();
        if(isset($_SESSION['userid']))
        {
            if($_SESSION['role']==='student')
            {
                $this->load->model('Students');
                $this->load->model('Users');
                $user=$this->Users->getUser($_SESSION['userid'])->row();
                $student=$this->Students->getStudent($_SESSION['userid'])->row();
                $student['user_dp']=$user->dp_present=='Y'?md5($_SESSION['userid']).'.jpg':'no-image.jpg';
                $this->user_data=$student;
            }
            elseif($_SESSION['role']==='teacher')
            {
                $this->load->model('Teachers');
                $this->load->model('Users');
                $user=$this->Users->getUser($_SESSION['userid'])->row();
                $teacher=$this->Teachers->getTeacher($_SESSION['userid'])->row();
                $teacher['user_dp']=$user->dp_present=='Y'?md5($_SESSION['userid']).'.jpg':'no-image.jpg';
                $this->user_data=$teacher;
            }
        }
        else
        {
            redirect(base_url().'index.php/login');
        }
    }
    public function index()
    {
        $this->load->view('profile_page',$this->user_data);
    }
}
