<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Exams extends CI_Controller{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Exams');
        if(!isset($_SESSION['userid'])){
            redirect(base_url().'index.php/login');
        }
    }
    public function index(){
        if($_SESSION['role']==='teacher'){
            redirect(base_url().'index.php');
        }
        $my_exams=$this->Exams->getMyExams($_SESSION['userid']);
        $this->load->view('my_exam_page',$my_exams);
    }
    public function upcomingExams(){
        if($_SESSION['role']==='teacher'){
            redirect(base_url().'index.php');
        }
        $upcoming_exams=$this->Exams->getUpcomingExams($_SESSION['userid']);
        $this->load->view('my_exam_page',$upcoming_exams);
    }
}