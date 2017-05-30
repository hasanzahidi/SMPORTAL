<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subjects extends CI_Controller{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Subjects');
        if(!isset($_SESSION['userid'])){
            redirect(base_url().'index.php/login');
        }
    }
    public function index(){
        $all_subjects=$this->Subjects->listAllSubjects();
        $this->load->view('subject_list',$all_subjects);
    }
    public function mySubjects(){
        $my_subjects=$this->Subjects->listMySubjects($_SESSION['userid'],$_SESSION['role']);
        $this->load->view('subject_list',$my_subjects);
    }
    public function subjectPage($id=0){
        if($id==0){
            redirect(base_url().'index.php/subjects');
        }
        else{
            $subject_info=$this->Subjects->getSubjectInfo($id);
            $this->load->view('subject_page',$subject_info);
        }
    }
    public function subjectList($department=0,$sem=0){
        if($department===0 && $sem===0){
            redirect(base_url().'index.php/subjects');
        }
        elseif($department===0 && $sem!==0){
            $sem_subjects=$this->Subjects->listBySem($sem);
            $this->load->view('subject_list',$sem_subjects);
        }
        elseif($department!==0 && $sem===0){
            $department_subjects=$this->Subjects->listByDepartment($department);
            $this->load->view('subjects_list',$department_subjects);
        }
        elseif($department!==0 && $sem!==0){
            $department_sem_subjects=$this->Subjects->listByDepartmentSem($department,$sem);
            $this->load->view('subject_list',$department_sem_subjects);
        }
    }
}