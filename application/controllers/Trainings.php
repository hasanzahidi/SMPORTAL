<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Trainings extends CI_Controller{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Trainings');
        if(!isset($_SESSION['userid'])){
            redirect(base_url().'index.php/login');
        }
    }
    public function index(){
        if($_SESSION['role']===teacher){
            redirect(base_url().'index.php/trainings');
        }
        $all_trainings=$this->Trainings->listAllTrainings();
        $this->load->view('training_lists',$all_trainings);
    }
    public function trainingPage($id=0){
        if($id==0 || $_SESSION['role']===teacher){
            redirect(base_url().'index.php/trainings');
        }
        else{
            $training_info=$this->Trainings->getTrainingInfo($id,$_SESSION['userid']);
            $this->load->view('training_page',$training_info);
        }
    }
    public function listCompleted(){
        if($_SESSION['role']===teacher){
            redirect(base_url().'index.php/trainings');
        }
        else{
            $all_trainings=$this->Trainings->listAllCompletedTrainings($_SESSION['userid']);
            $this->load->view('training_lists',$all_trainings);
        }
    }
    public function listUpcoming(){
        if($_SESSION['role']===teacher){
            redirect(base_url().'index.php/trainings');
        }
        else{
            $all_trainings=$this->Trainings->listAllUpcomingTrainings($_SESSION['userid']);
            $this->load->view('training_lists',$all_trainings);
        }
    }
    public function enroll(){
        if($_SESSION['role']===teacher){
            redirect(base_url().'index.php/trainings');
        }
        $this->load->model('Students');
        $data['training_id']=$this->input->post('training-id');
        $data['student_id']=$this->Students->getStudent($_SESSION['user_id'])->row()->student_id;
        $r=$this->Training->registerStudent($data);
        if($r==1){
            $this->load->view('registration_result','Success');
        }
        else{
            $this->load->view('registration_result','Failure');
        }
    }
}