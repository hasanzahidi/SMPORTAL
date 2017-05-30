<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Marksheet extends CI_Controller{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Marksheet');
        if(!isset($_SESSION['userid'])){
            redirect(base_url().'index.php/login');
        }
    }
    public function index(){
        if($_SESSION['role']=='teacher'){
            redirect(base_url().'index.php');
        }
        else{
            $all_marks=$this->Marksheet->listAllMarks($_SESSION['userid']);
            $this->load->view('see_marks_page',$all_marks);
        }
    }
    public function semMarks($sem=0){
        if($sem===0){
            redirect(base_url().'index.php/marksheet');
        }
        if($_SESSION['role']=='teacher'){
            redirect(base_url().'index.php');
        }
        $sem_marks=$this->Marksheet->getMySemMarks($_SESSION['userid'],$sem);
        $this->load->view('sem_marks_page',$sem_marks);
    }
    public function semAverages(){
        if($_SESSION['role']=='teacher'){
            redirect(base_url().'index.php');
        }
        $sem_average=$this->Marksheet->viewByTeacher($_SESSION['userid'],$sem);
        $this->load->view('sem_marks_average',$sem_average);
    }
}